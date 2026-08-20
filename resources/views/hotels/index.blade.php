@extends('layouts.app')

@section('title', 'Hotel Finder')

@section('content')
<div class="min-h-screen bg-white py-20 px-4">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <h1 class="text-6xl font-black text-gray-900 mb-4 tracking-tighter uppercase">Hotel <span class="text-blue-600">Finder</span></h1>
            <p class="text-gray-500 font-bold uppercase tracking-widest text-sm">Discover the best places to stay near you.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-12 items-start">
            <!-- Search Sidebar -->
            <div class="lg:col-span-1 space-y-8 sticky top-24">
                <div class="bg-white p-10 rounded-[50px] shadow-2xl border border-gray-100 relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50 rounded-full -mr-16 -mt-16 transition-transform group-hover:scale-150 duration-700"></div>
                    
                    <div class="relative z-10 space-y-8">
                        <div>
                            <label class="block text-xs font-black uppercase tracking-widest text-gray-500 mb-4">Location</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-blue-600">
                                    <i class="fas fa-map-marked-alt"></i>
                                </span>
                                <input type="text" id="locationInput" class="w-full bg-gray-50 border-none rounded-2xl p-4 pl-12 focus:ring-4 focus:ring-blue-100 transition font-bold text-gray-800 shadow-inner" placeholder="e.g. Malir, Karachi" value="Lahore">
                            </div>
                        </div>

                        <button onclick="handleSearch()" id="searchBtn" class="w-full bg-gray-900 text-white py-5 rounded-2xl font-black uppercase tracking-widest hover:bg-blue-600 transition shadow-xl hover:shadow-blue-200 group">
                            Search Hotels <i class="fas fa-search-location ml-2 group-hover:rotate-12 transition"></i>
                        </button>
                    </div>
                </div>

                <div class="bg-blue-600 p-8 rounded-[40px] text-white shadow-xl relative overflow-hidden">
                    <div class="relative z-10">
                        <h4 class="text-xl font-black mb-4 uppercase tracking-tighter text-white">Nearby <span class="text-blue-200">Hotels</span></h4>
                        <p class="text-blue-100 font-medium text-sm">Find hotels, hostels, and guest houses instantly.</p>
                    </div>
                    <i class="fas fa-hotel absolute -bottom-6 -right-6 text-7xl text-white/10"></i>
                </div>
            </div>

            <!-- Map Area -->
            <div class="lg:col-span-3">
                <div class="bg-gray-100 rounded-[50px] overflow-hidden shadow-2xl border-8 border-white h-[700px] relative">
                    <div id="loadingOverlay" class="absolute inset-0 bg-white/80 backdrop-blur-sm z-20 hidden flex flex-col items-center justify-center">
                        <div class="w-20 h-20 border-8 border-blue-100 border-t-blue-600 rounded-full animate-spin mb-6"></div>
                        <p class="text-blue-600 font-black uppercase tracking-widest animate-pulse">Finding best stays...</p>
                    </div>
                    
                    <div id="hotel-map" class="w-full h-full"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- MapLibre GL JS -->
    <link href="https://unpkg.com/maplibre-gl@3.6.2/dist/maplibre-gl.css" rel="stylesheet">
    <script src="https://unpkg.com/maplibre-gl@3.6.2/dist/maplibre-gl.js"></script>
    
    <script>
        let map;
        let markers = [];
        let currentCoords = [74.3587, 31.5204]; // Default: Lahore

        function initMap() {
            map = new maplibregl.Map({
                container: 'hotel-map',
                style: 'https://tiles.openfreemap.org/styles/liberty', 
                center: currentCoords,
                zoom: 13,
                pitch: 0,
                antialias: true
            });

            map.on('load', () => {
                fetchHotels(currentCoords);
            });
        }

        async function handleSearch() {
            const location = document.getElementById('locationInput').value;
            if (!location) return;

            showLoading(true);
            
            try {
                // Geocoding directly in JS using Nominatim
                let query = location;
                if (!location.toLowerCase().includes('pakistan')) {
                    query += ', Pakistan';
                }

                const geoResponse = await fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(query)}&limit=1`);
                const geoData = await geoResponse.json();

                if (geoData && geoData.length > 0) {
                    const newCoords = [parseFloat(geoData[0].lon), parseFloat(geoData[0].lat)];
                    
                    map.flyTo({
                        center: newCoords,
                        zoom: 14,
                        speed: 1.2,
                        curve: 1.4,
                        essential: true
                    });

                    await fetchHotels(newCoords);
                } else {
                    alert('Location not found!');
                }
            } catch (error) {
                console.error('Search error:', error);
            } finally {
                showLoading(false);
            }
        }

        async function fetchHotels(coords) {
            // Overpass API Query for hotels within 3km
            const query = `
                [out:json];
                (
                  node["tourism"~"hotel|hostel|guest_house"](around:3000, ${coords[1]}, ${coords[0]});
                  way["tourism"~"hotel|hostel|guest_house"](around:3000, ${coords[1]}, ${coords[0]});
                );
                out center;
            `;
            
            try {
                const response = await fetch('https://overpass-api.de/api/interpreter', {
                    method: 'POST',
                    body: query
                });
                const data = await response.json();
                displayHotels(data.elements);
            } catch (error) {
                console.error('Error fetching hotels:', error);
            }
        }

        function displayHotels(elements) {
            markers.forEach(m => m.remove());
            markers = [];

            elements.forEach(el => {
                const lon = el.lon || (el.center ? el.center.lon : null);
                const lat = el.lat || (el.center ? el.center.lat : null);
                const name = el.tags.name || 'Unnamed Hotel';

                if (lon && lat) {
                    const popup = new maplibregl.Popup({ offset: 25 })
                        .setHTML(`<div class="p-2"><h3 class="font-black text-gray-900">${name}</h3><p class="text-[10px] text-blue-600 font-bold uppercase">Stay</p></div>`);

                    const marker = new maplibregl.Marker({ color: '#2563eb' })
                        .setLngLat([lon, lat])
                        .setPopup(popup)
                        .addTo(map);
                    
                    markers.push(marker);
                }
            });
        }

        function showLoading(show) {
            const overlay = document.getElementById('loadingOverlay');
            if (show) overlay.classList.remove('hidden');
            else overlay.classList.add('hidden');
        }

        // Initialize on window load
        window.onload = initMap;
    </script>
</div>
@endsection

<div class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-5xl font-black text-gray-900 mb-6 tracking-tighter uppercase">Route <span class="text-blue-600">Explorer</span></h2>
            <p class="text-xl text-gray-500 font-medium">Plan your journey by visualizing the route between any two cities.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-12">
            <!-- Controls -->
            <div class="lg:col-span-1 space-y-8">
                <div class="bg-gray-50 p-8 rounded-[40px] border border-gray-100 shadow-sm">
                    <form wire:submit.prevent="updateMap" class="space-y-6">
                        <div>
                            <label class="block text-xs font-black uppercase tracking-widest text-gray-500 mb-3">Starting Point</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-blue-600">
                                    <i class="fas fa-map-marker-alt"></i>
                                </span>
                                <input type="text" wire:model="origin" class="w-full bg-white border-none rounded-2xl p-4 pl-12 focus:ring-4 focus:ring-blue-100 transition font-bold text-gray-800 shadow-inner" placeholder="e.g. Lahore">
                            </div>
                        </div>

                        <div class="flex justify-center">
                            <div class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center shadow-lg">
                                <i class="fas fa-arrow-down"></i>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-black uppercase tracking-widest text-gray-500 mb-3">Destination</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-red-600">
                                    <i class="fas fa-flag-checkered"></i>
                                </span>
                                <input type="text" wire:model="destination" class="w-full bg-white border-none rounded-2xl p-4 pl-12 focus:ring-4 focus:ring-blue-100 transition font-bold text-gray-800 shadow-inner" placeholder="e.g. Karachi">
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-gray-900 text-white py-5 rounded-2xl font-black uppercase tracking-widest hover:bg-blue-600 transition shadow-xl hover:shadow-blue-200">
                            Find Route <i class="fas fa-search-location ml-2"></i>
                        </button>
                    </form>
                </div>

                <div class="bg-blue-600 p-8 rounded-[40px] text-white shadow-xl relative overflow-hidden">
                    <div class="relative z-10">
                        <h4 class="text-xl font-black mb-4 uppercase tracking-tighter">Pro Tip</h4>
                        <p class="text-blue-100 font-medium text-sm">You can search for specific landmarks too, like "Badshahi Mosque" to "Mazar-e-Quaid"!</p>
                    </div>
                    <i class="fas fa-lightbulb absolute -bottom-6 -right-6 text-7xl text-white/10"></i>
                </div>
            </div>

            <!-- Map Area -->
            <div class="lg:col-span-3">
                <div class="bg-gray-100 rounded-[50px] overflow-hidden shadow-2xl border-8 border-white h-[600px] relative group">
                    <div wire:loading wire:target="updateMap" class="absolute inset-0 bg-white/80 backdrop-blur-sm z-20 flex flex-col items-center justify-center">
                        <div class="w-20 h-20 border-8 border-blue-100 border-t-blue-600 rounded-full animate-spin mb-6"></div>
                        <p class="text-blue-600 font-black uppercase tracking-widest animate-pulse">Mapping your journey...</p>
                    </div>
                    
                    <iframe 
                        width="100%" 
                        height="100%" 
                        frameborder="0" 
                        style="border:0" 
                        src="{{ $mapUrl }}" 
                        allowfullscreen
                        class="grayscale-[0.2] contrast-[1.1]"
                    ></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

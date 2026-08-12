<div>
    <!-- Hero Section -->
    <div class="relative bg-blue-900 h-[600px] flex items-center overflow-hidden">
        <div class="absolute inset-0 opacity-40">
            <img src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Travel Hero" class="w-full h-full object-cover">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-white">
            <h1 class="text-5xl md:text-7xl font-black mb-6 leading-tight">Explore the World<br><span class="text-blue-400">Like Never Before</span></h1>
            <p class="text-xl md:text-2xl mb-10 max-w-2xl text-gray-200">Discover hidden gems, luxury destinations, and adventurous trails with our expert travel guides.</p>
            <div class="flex flex-wrap gap-4">
                <a href="/services" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-full font-bold text-lg transition shadow-xl shadow-blue-900/50">Our Services</a>
                <a href="/contact" class="bg-white hover:bg-gray-100 text-blue-900 px-8 py-4 rounded-full font-bold text-lg transition shadow-xl">Plan Your Trip</a>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="bg-white py-12 shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-4xl font-black text-blue-600 mb-2">150+</div>
                    <div class="text-gray-500 font-bold uppercase tracking-widest text-xs">Destinations</div>
                </div>
                <div>
                    <div class="text-4xl font-black text-blue-600 mb-2">10k+</div>
                    <div class="text-gray-500 font-bold uppercase tracking-widest text-xs">Happy Travelers</div>
                </div>
                <div>
                    <div class="text-4xl font-black text-blue-600 mb-2">250+</div>
                    <div class="text-gray-500 font-bold uppercase tracking-widest text-xs">Expert Guides</div>
                </div>
                <div>
                    <div class="text-4xl font-black text-blue-600 mb-2">4.9/5</div>
                    <div class="text-gray-500 font-bold uppercase tracking-widest text-xs">User Rating</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Services -->
    <div class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-black text-gray-900 mb-4 uppercase tracking-tighter">Why Choose Us?</h2>
                <div class="w-20 h-1.5 bg-blue-600 mx-auto rounded-full"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="bg-white p-10 rounded-3xl shadow-lg border border-gray-100 hover:-translate-y-2 transition duration-300">
                    <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center text-3xl mb-8">
                        <i class="fas fa-hotel"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Luxury Stays</h3>
                    <p class="text-gray-600 leading-relaxed">We partner with the finest hotels to ensure your comfort throughout the journey.</p>
                </div>
                <div class="bg-white p-10 rounded-3xl shadow-lg border border-gray-100 hover:-translate-y-2 transition duration-300">
                    <div class="w-16 h-16 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center text-3xl mb-8">
                        <i class="fas fa-hiking"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Expert Guides</h3>
                    <p class="text-gray-600 leading-relaxed">Our local guides know every corner of your destination to give you an authentic experience.</p>
                </div>
                <div class="bg-white p-10 rounded-3xl shadow-lg border border-gray-100 hover:-translate-y-2 transition duration-300">
                    <div class="w-16 h-16 bg-purple-100 text-purple-600 rounded-2xl flex items-center justify-center text-3xl mb-8">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Safe Travel</h3>
                    <p class="text-gray-600 leading-relaxed">Your safety is our priority. We provide 24/7 support and comprehensive insurance.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Blogs -->
    <div class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-16">
                <div>
                    <h2 class="text-4xl font-black text-gray-900 mb-4 uppercase tracking-tighter">Travel Stories</h2>
                    <div class="w-20 h-1.5 bg-blue-600 rounded-full"></div>
                </div>
                <a href="/blogs" class="text-blue-600 font-bold hover:underline">View All Stories <i class="fas fa-arrow-right ml-1"></i></a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                @forelse($recentBlogs as $blog)
                <div class="group cursor-pointer">
                    <a href="/blogs/{{ $blog->slug }}" wire:navigate>
                        <div class="relative h-64 mb-6 overflow-hidden rounded-3xl shadow-xl">
                            <img src="{{ $blog->image ? asset('storage/'.$blog->image) : 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=800&q=80' }}" alt="{{ $blog->title }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                            <div class="absolute top-4 left-4">
                                <span class="bg-white/90 backdrop-blur px-4 py-1.5 rounded-full text-xs font-black uppercase text-gray-900 tracking-wider">Travel</span>
                            </div>
                        </div>
                        <h3 class="text-2xl font-black mb-3 text-gray-900 group-hover:text-blue-600 transition">{{ $blog->title }}</h3>
                    </a>
                    <p class="text-gray-500 line-clamp-2 leading-relaxed">{{ Str::limit(strip_tags($blog->content), 120) }}</p>
                </div>
                @empty
                <div class="col-span-3 text-center py-10">
                    <p class="text-gray-400">No travel stories published yet.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

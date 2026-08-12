<div class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-5xl font-black text-gray-900 mb-6 uppercase tracking-tighter">Premium Travel Services</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Everything you need for a perfect vacation, all in one place. We handle the details so you can enjoy the view.</p>
        </div>

        <!-- Skeleton Loaders -->
        <div wire:loading.grid wire:target="render" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
            @for($i = 0; $i < 6; $i++)
            <div class="animate-pulse bg-white p-12 rounded-[40px] shadow-xl border border-gray-100">
                <div class="w-20 h-20 bg-gray-200 rounded-3xl mb-10"></div>
                <div class="h-8 bg-gray-200 rounded w-3/4 mb-6"></div>
                <div class="space-y-3">
                    <div class="h-4 bg-gray-200 rounded"></div>
                    <div class="h-4 bg-gray-200 rounded w-5/6"></div>
                </div>
            </div>
            @endfor
        </div>

        <div wire:loading.remove wire:target="render" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
            @forelse($services as $service)
            <div class="bg-white p-12 rounded-[40px] shadow-xl border border-gray-100 hover:shadow-2xl transition duration-300">
                <div class="w-20 h-20 bg-blue-100 text-blue-600 rounded-3xl flex items-center justify-center text-4xl mb-10 shadow-inner">
                    <i class="{{ $service->icon ?? 'fas fa-suitcase-rolling' }}"></i>
                </div>
                <h3 class="text-2xl font-black mb-6 text-gray-900 tracking-tight">{{ $service->title }}</h3>
                <p class="text-gray-600 leading-relaxed text-lg">{{ $service->description }}</p>
            </div>
            @empty
            <!-- Static Placeholder Services if DB is empty -->
            <div class="bg-white p-12 rounded-[40px] shadow-xl border border-gray-100">
                <div class="w-20 h-20 bg-blue-100 text-blue-600 rounded-3xl flex items-center justify-center text-4xl mb-10 shadow-inner">
                    <i class="fas fa-plane"></i>
                </div>
                <h3 class="text-2xl font-black mb-6 text-gray-900 tracking-tight">Flight Booking</h3>
                <p class="text-gray-600 leading-relaxed text-lg">Hassle-free flight bookings to any destination worldwide at the best competitive prices.</p>
            </div>
            <div class="bg-white p-12 rounded-[40px] shadow-xl border border-gray-100">
                <div class="w-20 h-20 bg-green-100 text-green-600 rounded-3xl flex items-center justify-center text-4xl mb-10 shadow-inner">
                    <i class="fas fa-hotel"></i>
                </div>
                <h3 class="text-2xl font-black mb-6 text-gray-900 tracking-tight">Hotel Reservations</h3>
                <p class="text-gray-600 leading-relaxed text-lg">From luxury resorts to cozy boutique hotels, we find the perfect stay for your travel style.</p>
            </div>
            <div class="bg-white p-12 rounded-[40px] shadow-xl border border-gray-100">
                <div class="w-20 h-20 bg-purple-100 text-purple-600 rounded-3xl flex items-center justify-center text-4xl mb-10 shadow-inner">
                    <i class="fas fa-camera-retro"></i>
                </div>
                <h3 class="text-2xl font-black mb-6 text-gray-900 tracking-tight">Guided Tours</h3>
                <p class="text-gray-600 leading-relaxed text-lg">Explore hidden gems with our local expert guides who know the culture and history by heart.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>

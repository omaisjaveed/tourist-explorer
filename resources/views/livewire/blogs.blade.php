<div class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-24">
            <h2 class="text-6xl font-black text-gray-900 mb-6 uppercase tracking-tighter">Travel <span class="text-blue-600">Insights</span></h2>
            <div class="w-24 h-2 bg-blue-600 mx-auto rounded-full"></div>
            <p class="text-xl text-gray-500 mt-8 max-w-2xl mx-auto font-medium">Read the latest travel tips, destination guides, and stories from our expert explorers.</p>
            
            <!-- Search Bar -->
            <div class="mt-12 max-w-xl mx-auto relative">
                <span class="absolute inset-y-0 left-0 pl-6 flex items-center text-gray-400">
                    <i class="fas fa-search"></i>
                </span>
                <input wire:model.live.debounce.300ms="search" type="text" class="w-full bg-gray-50 border-2 border-gray-100 rounded-full p-5 pl-14 focus:ring-4 focus:ring-blue-100 focus:border-blue-600 transition font-bold text-gray-800 shadow-sm" placeholder="Search travel stories...">
            </div>
        </div>

        <!-- Skeleton Loaders -->
        <div wire:loading.grid wire:target="render" class="grid grid-cols-1 md:grid-cols-2 gap-16">
            @for($i = 0; $i < 4; $i++)
            <div class="animate-pulse flex flex-col md:flex-row gap-8 items-center bg-gray-50 p-8 rounded-[40px] border border-gray-100">
                <div class="w-full md:w-1/2 h-64 bg-gray-200 rounded-[30px] shrink-0"></div>
                <div class="flex-grow space-y-4">
                    <div class="h-4 bg-gray-200 rounded w-1/4"></div>
                    <div class="h-8 bg-gray-200 rounded w-3/4"></div>
                    <div class="space-y-2">
                        <div class="h-4 bg-gray-200 rounded"></div>
                        <div class="h-4 bg-gray-200 rounded w-5/6"></div>
                    </div>
                </div>
            </div>
            @endfor
        </div>

        <div wire:loading.remove wire:target="render" class="grid grid-cols-1 md:grid-cols-2 gap-16">
            @forelse($blogs as $blog)
            <div class="group flex flex-col md:flex-row gap-8 items-center bg-gray-50 p-8 rounded-[40px] border border-gray-100 transition hover:shadow-2xl hover:bg-white">
                <div class="w-full md:w-1/2 h-64 overflow-hidden rounded-[30px] shadow-lg shrink-0">
                    <img src="{{ $blog->image ? asset('storage/'.$blog->image) : 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=800&q=80' }}" alt="{{ $blog->title }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                </div>
                <div class="flex-grow">
                    <div class="text-blue-600 font-black uppercase text-xs tracking-widest mb-4">Travel</div>
                    <a href="/blogs/{{ $blog->slug }}" wire:navigate>
                        <h3 class="text-3xl font-black text-gray-900 mb-4 group-hover:text-blue-600 transition leading-tight">{{ $blog->title }}</h3>
                    </a>
                    <p class="text-gray-500 mb-6 line-clamp-3 font-medium">{{ Str::limit(strip_tags($blog->content), 150) }}</p>
                    <a href="/blogs/{{ $blog->slug }}" wire:navigate class="inline-flex items-center text-gray-900 font-black hover:text-blue-600 transition group/btn">
                        Read Story 
                        <span class="ml-2 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow transition group-hover/btn:translate-x-2 group-hover/btn:bg-blue-600 group-hover/btn:text-white">
                            <i class="fas fa-chevron-right text-xs"></i>
                        </span>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-2 text-center py-20 bg-gray-50 rounded-[40px] border-2 border-dashed border-gray-200">
                <i class="fas fa-book-open text-6xl text-gray-200 mb-6"></i>
                <p class="text-gray-400 text-2xl font-bold tracking-tight">Our travel journal is being updated. Check back soon!</p>
            </div>
            @endforelse
        </div>
    </div>
</div>

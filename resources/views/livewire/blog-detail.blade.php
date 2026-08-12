<div class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Back Button -->
        <a href="/blogs" wire:navigate class="inline-flex items-center text-blue-600 font-black uppercase text-xs tracking-widest mb-10 hover:translate-x-[-4px] transition">
            <i class="fas fa-arrow-left mr-2"></i> Back to Blogs
        </a>

        <!-- Blog Header -->
        <div class="mb-12">
            <div class="text-blue-600 font-black uppercase text-sm tracking-widest mb-4">Travel Journal</div>
            <h1 class="text-5xl md:text-6xl font-black text-gray-900 mb-6 tracking-tighter leading-tight">{{ $blog->title }}</h1>
            <div class="flex items-center text-gray-400 font-bold uppercase text-xs tracking-widest">
                <span><i class="far fa-calendar-alt mr-2"></i> {{ $blog->created_at->format('M d, Y') }}</span>
                <span class="mx-4">•</span>
                <span><i class="far fa-user mr-2"></i> Admin Explorer</span>
            </div>
        </div>

        <!-- Featured Image -->
        <div class="h-[500px] w-full rounded-[50px] overflow-hidden shadow-2xl mb-16 border-8 border-gray-50">
            <img src="{{ $blog->image ? asset('storage/'.$blog->image) : 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1200&q=80' }}" alt="{{ $blog->title }}" class="w-full h-full object-cover">
        </div>

        <!-- Content -->
        <div class="prose prose-xl prose-blue max-w-none text-gray-700 font-medium leading-relaxed space-y-8">
            {!! nl2br(e($blog->content)) !!}
        </div>

        <!-- Share Section -->
        <div class="mt-20 pt-10 border-t border-gray-100 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="text-gray-900 font-black uppercase text-sm tracking-widest">Share this adventure</div>
            <div class="flex space-x-4">
                <a href="#" class="w-12 h-12 bg-gray-50 text-gray-900 rounded-2xl flex items-center justify-center text-xl hover:bg-blue-600 hover:text-white transition shadow-sm">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="w-12 h-12 bg-gray-50 text-gray-900 rounded-2xl flex items-center justify-center text-xl hover:bg-blue-400 hover:text-white transition shadow-sm">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="w-12 h-12 bg-gray-50 text-gray-900 rounded-2xl flex items-center justify-center text-xl hover:bg-pink-600 hover:text-white transition shadow-sm">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </div>
    </div>
</div>

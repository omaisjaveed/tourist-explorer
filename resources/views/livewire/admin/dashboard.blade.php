<div>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <!-- Stat Card -->
        <div class="bg-white p-8 rounded-[40px] shadow-sm border border-gray-100 flex items-center group hover:shadow-xl transition duration-300">
            <div class="w-20 h-20 bg-blue-100 text-blue-600 rounded-3xl flex items-center justify-center text-3xl mr-6 shadow-inner group-hover:scale-110 transition">
                <i class="fas fa-newspaper"></i>
            </div>
            <div>
                <p class="text-xs font-black uppercase tracking-widest text-gray-500 mb-1">Blogs</p>
                <h3 class="text-4xl font-black text-gray-900 tracking-tighter">{{ $stats['blogs'] }}</h3>
            </div>
        </div>

        <div class="bg-white p-8 rounded-[40px] shadow-sm border border-gray-100 flex items-center group hover:shadow-xl transition duration-300">
            <div class="w-20 h-20 bg-green-100 text-green-600 rounded-3xl flex items-center justify-center text-3xl mr-6 shadow-inner group-hover:scale-110 transition">
                <i class="fas fa-concierge-bell"></i>
            </div>
            <div>
                <p class="text-xs font-black uppercase tracking-widest text-gray-500 mb-1">Services</p>
                <h3 class="text-4xl font-black text-gray-900 tracking-tighter">{{ $stats['services'] }}</h3>
            </div>
        </div>

        <a href="/admin/messages" wire:navigate class="bg-white p-8 rounded-[40px] shadow-sm border border-gray-100 flex items-center group hover:shadow-xl transition duration-300">
            <div class="w-20 h-20 bg-purple-100 text-purple-600 rounded-3xl flex items-center justify-center text-3xl mr-6 shadow-inner group-hover:scale-110 transition">
                <i class="fas fa-comment-dots"></i>
            </div>
            <div>
                <p class="text-xs font-black uppercase tracking-widest text-gray-500 mb-1">Chats</p>
                <h3 class="text-4xl font-black text-gray-900 tracking-tighter">{{ $stats['messages'] }}</h3>
            </div>
        </a>

        <div class="bg-white p-8 rounded-[40px] shadow-sm border border-gray-100 flex items-center group hover:shadow-xl transition duration-300">
            <div class="w-20 h-20 bg-orange-100 text-orange-600 rounded-3xl flex items-center justify-center text-3xl mr-6 shadow-inner group-hover:scale-110 transition">
                <i class="fas fa-envelope-open-text"></i>
            </div>
            <div>
                <p class="text-xs font-black uppercase tracking-widest text-gray-500 mb-1">Inquiries</p>
                <h3 class="text-4xl font-black text-gray-900 tracking-tighter">{{ $stats['inquiries'] }}</h3>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="mt-12">
        <h3 class="text-2xl font-black text-gray-900 mb-8 tracking-tighter uppercase">Quick Actions</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <a href="/admin/blogs" class="bg-gray-900 text-white p-10 rounded-[40px] shadow-xl hover:bg-blue-600 transition group relative overflow-hidden">
                <div class="relative z-10">
                    <h4 class="text-3xl font-black mb-4">Write a New Blog Post</h4>
                    <p class="text-gray-400 group-hover:text-blue-100 transition font-bold">Share your latest travel experience with the world.</p>
                </div>
                <i class="fas fa-pen-nib absolute -bottom-10 -right-10 text-9xl text-white/5 group-hover:text-white/10 transition"></i>
            </a>
            <a href="/admin/services" class="bg-white p-10 rounded-[40px] shadow-xl border border-gray-100 hover:border-blue-600 transition group relative overflow-hidden">
                <div class="relative z-10">
                    <h4 class="text-3xl font-black mb-4 text-gray-900">Manage Services</h4>
                    <p class="text-gray-500 group-hover:text-blue-600 transition font-bold">Update or add new travel packages and services.</p>
                </div>
                <i class="fas fa-concierge-bell absolute -bottom-10 -right-10 text-9xl text-gray-100 group-hover:text-blue-50 transition"></i>
            </a>
        </div>
    </div>
</div>

<div class="min-h-[80vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white p-12 rounded-[50px] shadow-2xl border border-gray-100">
        <div class="text-center mb-10">
            <div class="w-20 h-20 bg-blue-600 text-white rounded-3xl flex items-center justify-center text-4xl mx-auto mb-6 shadow-xl shadow-blue-200">
                <i class="fas fa-lock"></i>
            </div>
            <h2 class="text-3xl font-black text-gray-900 tracking-tighter uppercase">Admin <span class="text-blue-600">Login</span></h2>
            <p class="text-gray-500 font-bold mt-2 uppercase tracking-widest text-xs">Enter your credentials to access the panel</p>
        </div>
        
        <form wire:submit.prevent="login" class="space-y-8">
            <div>
                <label class="block text-xs font-black uppercase tracking-widest text-gray-500 mb-3">Email Address</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <input type="email" wire:model="email" class="w-full bg-gray-50 border-none rounded-2xl p-4 pl-12 focus:ring-4 focus:ring-blue-100 transition font-bold text-gray-800" placeholder="admin@example.com">
                </div>
                @error('email') <span class="text-red-500 text-xs font-bold mt-2 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-black uppercase tracking-widest text-gray-500 mb-3">Password</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                        <i class="fas fa-key"></i>
                    </span>
                    <input type="password" wire:model="password" class="w-full bg-gray-50 border-none rounded-2xl p-4 pl-12 focus:ring-4 focus:ring-blue-100 transition font-bold text-gray-800" placeholder="••••••••">
                </div>
                @error('password') <span class="text-red-500 text-xs font-bold mt-2 block">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="w-full bg-gray-900 text-white py-5 rounded-2xl font-black uppercase tracking-widest hover:bg-blue-600 transition shadow-xl hover:shadow-blue-200 group">
                Sign In <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition"></i>
            </button>
        </form>
    </div>
</div>

<div class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-[50px] shadow-2xl overflow-hidden border border-gray-100">
            <div class="flex flex-col md:flex-row">
                <!-- Info Section -->
                <div class="md:w-2/5 bg-blue-600 p-16 text-white relative overflow-hidden">
                    <div class="relative z-10">
                        <h2 class="text-5xl font-black mb-8 tracking-tighter uppercase">Let's Plan Your <br><span class="text-blue-200">Next Adventure</span></h2>
                        <p class="text-blue-100 text-xl mb-12 font-medium">Our travel experts are ready to help you create the journey of a lifetime.</p>
                        
                        <div class="space-y-10">
                            <div class="flex items-center group">
                                <div class="w-14 h-14 bg-white/10 rounded-2xl flex items-center justify-center text-2xl transition group-hover:bg-white group-hover:text-blue-600">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="ml-6">
                                    <p class="text-sm font-black uppercase tracking-widest text-blue-200 mb-1">Office</p>
                                    <p class="text-lg font-bold">123 Travel St, Explorer City, PK</p>
                                </div>
                            </div>
                            <div class="flex items-center group">
                                <div class="w-14 h-14 bg-white/10 rounded-2xl flex items-center justify-center text-2xl transition group-hover:bg-white group-hover:text-blue-600">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="ml-6">
                                    <p class="text-sm font-black uppercase tracking-widest text-blue-200 mb-1">Call Us</p>
                                    <p class="text-lg font-bold">+92 300 1234567</p>
                                </div>
                            </div>
                            <div class="flex items-center group">
                                <div class="w-14 h-14 bg-white/10 rounded-2xl flex items-center justify-center text-2xl transition group-hover:bg-white group-hover:text-blue-600">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="ml-6">
                                    <p class="text-sm font-black uppercase tracking-widest text-blue-200 mb-1">Email</p>
                                    <p class="text-lg font-bold">hello@touristexplorer.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Decorative Circles -->
                    <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-white/5 rounded-full"></div>
                    <div class="absolute -top-20 -right-20 w-48 h-48 bg-white/5 rounded-full"></div>
                </div>

                <!-- Form Section -->
                <div class="md:w-3/5 p-16">
                    <form wire:submit.prevent="submit" class="space-y-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <label class="block text-xs font-black uppercase tracking-widest text-gray-500 mb-3">Your Name</label>
                                <input type="text" wire:model="name" class="w-full bg-gray-50 border-none rounded-2xl p-4 focus:ring-4 focus:ring-blue-100 transition font-bold text-gray-800" placeholder="John Doe">
                                @error('name') <span class="text-red-500 text-xs font-bold mt-2 block">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-xs font-black uppercase tracking-widest text-gray-500 mb-3">Email Address</label>
                                <input type="email" wire:model="email" class="w-full bg-gray-50 border-none rounded-2xl p-4 focus:ring-4 focus:ring-blue-100 transition font-bold text-gray-800" placeholder="john@example.com">
                                @error('email') <span class="text-red-500 text-xs font-bold mt-2 block">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-black uppercase tracking-widest text-gray-500 mb-3">Subject</label>
                            <input type="text" wire:model="subject" class="w-full bg-gray-50 border-none rounded-2xl p-4 focus:ring-4 focus:ring-blue-100 transition font-bold text-gray-800" placeholder="Trip Inquiry">
                            @error('subject') <span class="text-red-500 text-xs font-bold mt-2 block">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-black uppercase tracking-widest text-gray-500 mb-3">Your Message</label>
                            <textarea wire:model="message" rows="5" class="w-full bg-gray-50 border-none rounded-2xl p-4 focus:ring-4 focus:ring-blue-100 transition font-bold text-gray-800" placeholder="Tell us about your dream trip..."></textarea>
                            @error('message') <span class="text-red-500 text-xs font-bold mt-2 block">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" class="w-full bg-gray-900 text-white py-5 rounded-2xl font-black uppercase tracking-widest hover:bg-blue-600 transition shadow-xl hover:shadow-blue-200">
                            Send Message <i class="fas fa-paper-plane ml-2"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

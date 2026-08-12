<div class="py-24 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <div class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-600 rounded-full text-xs font-black uppercase tracking-widest mb-6">
                <i class="fas fa-robot mr-2"></i> Powered by AI
            </div>
            <h2 class="text-5xl font-black text-gray-900 mb-6 tracking-tighter uppercase">AI Itinerary <span class="text-blue-600">Generator</span></h2>
            <p class="text-xl text-gray-500 font-medium">Enter your destination and we'll create a custom travel plan for you in seconds.</p>
        </div>

        <div class="bg-white rounded-[50px] shadow-2xl p-12 border border-gray-100">
            <form wire:submit.prevent="generate" class="space-y-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-gray-500 mb-3">Where do you want to go?</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                            <input type="text" wire:model="destination" class="w-full bg-gray-50 border-none rounded-2xl p-4 pl-12 focus:ring-4 focus:ring-blue-100 transition font-bold text-gray-800" placeholder="e.g. Hunza Valley, Paris, Tokyo">
                        </div>
                        @error('destination') <span class="text-red-500 text-xs font-bold mt-2 block">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-gray-500 mb-3">Number of Days (1-7)</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                                <i class="fas fa-calendar-day"></i>
                            </span>
                            <input type="number" wire:model="days" class="w-full bg-gray-50 border-none rounded-2xl p-4 pl-12 focus:ring-4 focus:ring-blue-100 transition font-bold text-gray-800" placeholder="e.g. 3">
                        </div>
                        @error('days') <span class="text-red-500 text-xs font-bold mt-2 block">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-gray-500 mb-3">Trip Focus</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                                <i class="fas fa-bullseye"></i>
                            </span>
                            <select wire:model="focus" class="w-full bg-gray-50 border-none rounded-2xl p-4 pl-12 focus:ring-4 focus:ring-blue-100 transition font-bold text-gray-800 appearance-none">
                                <option value="sightseeing">Sightseeing</option>
                                <option value="adventure">Adventure</option>
                                <option value="food">Food & Culture</option>
                            </select>
                        </div>
                        @error('focus') <span class="text-red-500 text-xs font-bold mt-2 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <button type="submit" class="w-full bg-gray-900 text-white py-5 rounded-2xl font-black uppercase tracking-widest hover:bg-blue-600 transition shadow-xl hover:shadow-blue-200 flex items-center justify-center group" wire:loading.attr="disabled">
                    <span wire:loading.remove>Generate My Trip <i class="fas fa-magic ml-2 group-hover:rotate-12 transition"></i></span>
                    <span wire:loading class="flex items-center">
                        <i class="fas fa-circle-notch fa-spin mr-2"></i> AI is thinking...
                    </span>
                </button>
            </form>

            @if($itinerary)
            <div class="mt-16 grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
                <!-- Itinerary Plan -->
                <div class="lg:col-span-2 space-y-8">
                    <div class="p-10 bg-blue-50 rounded-[40px] border border-blue-100 relative overflow-hidden">
                        <div class="absolute top-0 right-0 p-8 opacity-10">
                            <i class="fas fa-quote-right text-9xl"></i>
                        </div>
                        <div class="relative z-10 prose prose-blue max-w-none text-gray-800">
                            <h3 class="text-2xl font-black mb-6 flex items-center uppercase tracking-tight">
                                <i class="fas fa-clipboard-list text-blue-600 mr-3"></i> Your Travel Plan
                            </h3>
                            <div class="font-medium leading-relaxed">
                                {!! $itinerary !!}
                            </div>
                        </div>
                    </div>

                    <!-- Map Integration -->
                    <div class="rounded-[40px] overflow-hidden shadow-2xl h-[400px] border-8 border-white">
                        <iframe 
                            width="100%" 
                            height="100%" 
                            frameborder="0" 
                            scrolling="no" 
                            marginheight="0" 
                            marginwidth="0" 
                            src="{{ $mapUrl }}">
                        </iframe>
                    </div>
                </div>

                <!-- Weather Widget -->
                <div class="lg:col-span-1 bg-gray-900 text-white p-10 rounded-[40px] shadow-2xl relative overflow-hidden group">
                    <div class="relative z-10">
                        <h4 class="text-xs font-black uppercase tracking-widest text-blue-400 mb-6">Current Weather</h4>
                        <div class="flex items-center justify-between mb-8">
                            <div class="text-6xl font-black tracking-tighter">{{ $weather['temp'] }}</div>
                            <div class="text-5xl group-hover:scale-110 transition duration-500">
                                <i class="{{ $weather['icon'] }}"></i>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center border-b border-white/10 pb-4">
                                <span class="text-gray-400 font-bold uppercase text-[10px] tracking-widest">Location</span>
                                <span class="font-black tracking-tight">{{ ucfirst($destination) }}</span>
                            </div>
                            <div class="flex justify-between items-center border-b border-white/10 pb-4">
                                <span class="text-gray-400 font-bold uppercase text-[10px] tracking-widest">Condition</span>
                                <span class="font-black tracking-tight text-blue-400">{{ $weather['condition'] }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-400 font-bold uppercase text-[10px] tracking-widest">Best Time</span>
                                <span class="font-black tracking-tight italic">Now!</span>
                            </div>
                        </div>
                    </div>
                    <!-- Decorative Background -->
                    <div class="absolute -bottom-20 -left-20 w-48 h-48 bg-blue-600/20 rounded-full blur-3xl"></div>
                </div>
            </div>
            
            <div class="mt-10 flex justify-center">
                <button class="bg-white text-gray-900 px-8 py-3 rounded-2xl font-black uppercase tracking-widest hover:bg-gray-900 hover:text-white transition shadow-sm border border-gray-200">
                    <i class="fas fa-download mr-2"></i> Download Full Package
                </button>
            </div>
            @endif
        </div>

        <div class="mt-12 text-center">
            <p class="text-gray-400 text-sm font-bold uppercase tracking-widest">Note: This is a demo AI feature for portfolio purposes.</p>
        </div>
    </div>
</div>

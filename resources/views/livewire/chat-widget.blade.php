<div class="fixed bottom-10 right-10 z-[100]">
    <!-- Chat Button -->
    <button wire:click="toggleChat" class="w-16 h-16 bg-blue-600 text-white rounded-full shadow-2xl flex items-center justify-center text-2xl hover:bg-blue-700 transition transform hover:scale-110 active:scale-95">
        @if($isOpen)
            <i class="fas fa-times"></i>
        @else
            <i class="fas fa-comment-dots"></i>
        @endif
    </button>

    <!-- Chat Window -->
    @if($isOpen)
    <div class="absolute bottom-20 right-0 w-96 bg-white rounded-[30px] shadow-2xl border border-gray-100 overflow-hidden flex flex-col transition-all duration-300 transform scale-100 origin-bottom-right">
        <!-- Header -->
        <div class="bg-blue-600 p-6 text-white flex items-center">
            <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center text-xl mr-4">
                <i class="fas fa-headset"></i>
            </div>
            <div>
                <h3 class="font-black text-lg tracking-tight">Travel Assistant</h3>
                <p class="text-xs font-bold text-blue-200 uppercase tracking-widest">We're Online</p>
            </div>
        </div>

        <!-- Messages Area -->
        <div class="flex-grow h-96 overflow-y-auto p-6 space-y-4 bg-gray-50" wire:poll.3s>
            @forelse($messages as $msg)
                @if($msg->is_admin)
                    <!-- Admin Message -->
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center text-xs shrink-0 mr-3">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <div class="bg-white p-4 rounded-2xl rounded-tl-none shadow-sm border border-gray-100 max-w-[80%]">
                            <p class="text-sm font-medium text-gray-800">{{ $msg->message }}</p>
                            <p class="text-[10px] text-gray-400 mt-1 font-bold">{{ $msg->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                @else
                    <!-- Guest Message -->
                    <div class="flex items-start justify-end">
                        <div class="bg-blue-600 p-4 rounded-2xl rounded-tr-none shadow-md max-w-[80%]">
                            <p class="text-sm font-medium text-white">{{ $msg->message }}</p>
                            <p class="text-[10px] text-blue-200 mt-1 font-bold">{{ $msg->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                @endif
            @empty
                <div class="text-center py-10">
                    <i class="fas fa-paper-plane text-4xl text-gray-200 mb-4"></i>
                    <p class="text-gray-400 font-bold text-sm">How can we help you today?</p>
                </div>
            @endforelse
        </div>

        <!-- Input Area -->
        <form wire:submit.prevent="sendMessage" class="p-4 bg-white border-t border-gray-100 flex items-center gap-3">
            <input type="text" wire:model="message" class="flex-grow bg-gray-50 border-none rounded-xl p-3 text-sm focus:ring-2 focus:ring-blue-100 font-medium" placeholder="Type your message...">
            <button type="submit" class="w-10 h-10 bg-blue-600 text-white rounded-xl flex items-center justify-center hover:bg-blue-700 transition">
                <i class="fas fa-paper-plane"></i>
            </button>
        </form>
    </div>
    @endif
</div>

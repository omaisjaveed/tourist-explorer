<div class="h-[calc(100vh-160px)] flex gap-8">
    <!-- Sessions Sidebar -->
    <div class="w-1/3 bg-white rounded-[40px] shadow-sm border border-gray-100 flex flex-col overflow-hidden">
        <div class="p-8 border-b border-gray-100 bg-gray-50/50">
            <h3 class="text-xl font-black text-gray-900 tracking-tighter uppercase">Active <span class="text-blue-600">Chats</span></h3>
        </div>
        <div class="flex-grow overflow-y-auto p-4 space-y-2" wire:poll.5s>
            @forelse($sessions as $session)
            <button wire:click="selectSession('{{ $session->session_id }}')" class="w-full text-left p-6 rounded-3xl transition duration-300 flex items-center group {{ $activeSession == $session->session_id ? 'bg-blue-600 text-white shadow-xl shadow-blue-200' : 'hover:bg-gray-50 bg-white border border-gray-100' }}">
                <div class="w-12 h-12 rounded-2xl flex items-center justify-center text-xl mr-4 {{ $activeSession == $session->session_id ? 'bg-white/20' : 'bg-blue-100 text-blue-600 group-hover:scale-110 transition' }}">
                    <i class="fas fa-user"></i>
                </div>
                <div class="flex-grow">
                    <p class="font-black tracking-tight {{ $activeSession == $session->session_id ? 'text-white' : 'text-gray-900' }}">Guest #{{ substr($session->session_id, 0, 8) }}</p>
                    <p class="text-[10px] font-bold uppercase tracking-widest {{ $activeSession == $session->session_id ? 'text-blue-100' : 'text-gray-400' }}">{{ $session->last_msg_at }}</p>
                </div>
                @if($activeSession == $session->session_id)
                    <i class="fas fa-chevron-right text-white/50"></i>
                @endif
            </button>
            @empty
            <div class="text-center py-20">
                <i class="fas fa-comments text-6xl text-gray-100 mb-6"></i>
                <p class="text-gray-400 font-bold uppercase tracking-widest text-xs">No active sessions</p>
            </div>
            @endforelse
        </div>
    </div>

    <!-- Chat Area -->
    <div class="w-2/3 bg-white rounded-[40px] shadow-sm border border-gray-100 flex flex-col overflow-hidden relative">
        @if($activeSession)
            <!-- Header -->
            <div class="p-8 border-b border-gray-100 flex items-center justify-between">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-green-100 text-green-600 rounded-xl flex items-center justify-center mr-4">
                        <i class="fas fa-circle text-[8px]"></i>
                    </div>
                    <h3 class="text-lg font-black text-gray-900 tracking-tight uppercase">Chatting with <span class="text-blue-600">Guest</span></h3>
                </div>
                <span class="text-[10px] font-black uppercase tracking-widest text-gray-400 bg-gray-100 px-3 py-1 rounded-full">Session ID: {{ $activeSession }}</span>
            </div>

            <!-- Messages -->
            <div class="flex-grow overflow-y-auto p-8 space-y-6 bg-gray-50/30" wire:poll.3s>
                @foreach($messages as $msg)
                    @if($msg->is_admin)
                        <div class="flex justify-end">
                            <div class="bg-gray-900 text-white p-6 rounded-[30px] rounded-tr-none shadow-xl max-w-[70%] border-4 border-white">
                                <p class="text-sm font-medium">{{ $msg->message }}</p>
                                <p class="text-[10px] text-gray-400 mt-2 font-bold uppercase tracking-widest">You • {{ $msg->created_at->format('H:i') }}</p>
                            </div>
                        </div>
                    @else
                        <div class="flex justify-start">
                            <div class="bg-white text-gray-800 p-6 rounded-[30px] rounded-tl-none shadow-sm max-w-[70%] border border-gray-100">
                                <p class="text-sm font-medium">{{ $msg->message }}</p>
                                <p class="text-[10px] text-gray-400 mt-2 font-bold uppercase tracking-widest">Guest • {{ $msg->created_at->format('H:i') }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- Reply Area -->
            <div class="p-8 bg-white border-t border-gray-100">
                <form wire:submit.prevent="sendReply" class="flex gap-4">
                    <input type="text" wire:model="replyMessage" class="flex-grow bg-gray-50 border-none rounded-2xl p-5 text-sm focus:ring-4 focus:ring-blue-100 font-bold text-gray-800" placeholder="Write your reply here...">
                    <button type="submit" class="bg-blue-600 text-white px-10 rounded-2xl font-black uppercase tracking-widest hover:bg-blue-700 transition shadow-xl shadow-blue-200 flex items-center">
                        Reply <i class="fas fa-paper-plane ml-3"></i>
                    </button>
                </form>
            </div>
        @else
            <div class="flex flex-col items-center justify-center h-full text-center p-20">
                <div class="w-32 h-32 bg-gray-50 rounded-[40px] flex items-center justify-center text-5xl text-gray-200 mb-8 border-4 border-dashed border-gray-100">
                    <i class="fas fa-inbox"></i>
                </div>
                <h3 class="text-3xl font-black text-gray-900 tracking-tighter uppercase mb-4">No Chat <span class="text-blue-600">Selected</span></h3>
                <p class="text-gray-400 font-bold max-w-sm">Select a guest session from the sidebar to start providing world-class support.</p>
            </div>
        @endif
    </div>
</div>

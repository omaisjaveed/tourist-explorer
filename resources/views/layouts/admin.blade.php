<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - TouristExplorer</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireStyles
</head>
<body class="bg-gray-100 font-sans antialiased text-gray-900">
      <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-72 bg-gray-900 text-white flex-shrink-0 flex flex-col hidden md:flex">
            <div class="p-8">
                <a href="/admin/dashboard" wire:navigate class="flex items-center group">
                    <i class="fas fa-plane-departure text-2xl text-blue-500 mr-2 transition group-hover:rotate-12"></i>
                    <span class="text-xl font-black tracking-tighter uppercase">ADMIN<span class="text-blue-500">EXPLORER</span></span>
                </a>
            </div>
            
            <nav class="flex-grow px-4 space-y-2">
                <a href="/admin/dashboard" wire:navigate class="flex items-center p-4 rounded-2xl hover:bg-white/10 transition group {{ request()->is('admin/dashboard') ? 'bg-blue-600 text-white' : 'text-gray-400' }}">
                    <i class="fas fa-chart-line mr-4 w-6 text-center group-hover:text-blue-400"></i>
                    <span class="font-bold">Dashboard</span>
                </a>
                <a href="/admin/blogs" wire:navigate class="flex items-center p-4 rounded-2xl hover:bg-white/10 transition group {{ request()->is('admin/blogs') ? 'bg-blue-600 text-white' : 'text-gray-400' }}">
                    <i class="fas fa-newspaper mr-4 w-6 text-center group-hover:text-blue-400"></i>
                    <span class="font-bold">Manage Blogs</span>
                </a>
                <a href="/admin/media" wire:navigate class="flex items-center p-4 rounded-2xl hover:bg-white/10 transition group {{ request()->is('admin/media') ? 'bg-blue-600 text-white' : 'text-gray-400' }}">
                    <i class="fas fa-images mr-4 w-6 text-center group-hover:text-blue-400"></i>
                    <span class="font-bold">Media Gallery</span>
                </a>
                <a href="/admin/services" wire:navigate class="flex items-center p-4 rounded-2xl hover:bg-white/10 transition group {{ request()->is('admin/services') ? 'bg-blue-600 text-white' : 'text-gray-400' }}">
                    <i class="fas fa-concierge-bell mr-4 w-6 text-center group-hover:text-blue-400"></i>
                    <span class="font-bold">Manage Services</span>
                </a>
                <a href="/admin/messages" wire:navigate class="flex items-center p-4 rounded-2xl hover:bg-white/10 transition group {{ request()->is('admin/messages') ? 'bg-blue-600 text-white' : 'text-gray-400' }}">
                    <i class="fas fa-envelope mr-4 w-6 text-center group-hover:text-blue-400"></i>
                    <span class="font-bold">Messages</span>
                </a>
            </nav>

            <div class="p-4 mt-auto border-t border-gray-800">
                <a href="{{ route('logout') }}" wire:navigate class="flex items-center p-4 rounded-2xl hover:bg-red-500/10 text-red-400 transition group">
                    <i class="fas fa-sign-out-alt mr-4 w-6 text-center"></i>
                    <span class="font-bold">Logout</span>
                </a>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-grow flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="bg-white shadow-sm h-20 flex items-center justify-between px-8">
                <h2 class="text-2xl font-black text-gray-800 tracking-tight uppercase">
                    @yield('title', 'Admin Panel')
                </h2>
                <div class="flex items-center space-x-6">
                    <div class="text-right">
                        <p class="text-sm font-black text-gray-900">Admin User</p>
                        <p class="text-xs font-bold text-gray-500 uppercase tracking-widest">Administrator</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-2xl flex items-center justify-center text-blue-600 text-xl shadow-inner border border-blue-200">
                        <i class="fas fa-user-shield"></i>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-grow p-8 overflow-y-auto">
                @yield('content')
                {{ $slot ?? '' }}
            </main>
        </div>
    </div>

    @livewireScripts
    <script>
        window.addEventListener('swal:modal', event => {
            Swal.fire({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.type,
                confirmButtonColor: '#2563eb'
            });
        });

        window.addEventListener('swal:toast', event => {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            Toast.fire({
                icon: event.detail.type,
                title: event.detail.title
            });
        });
    </script>
</body>
</html>

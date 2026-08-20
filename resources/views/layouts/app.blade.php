<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tourist Explorer - Professional Travel Website</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireStyles
</head>
<body class="bg-gray-50 font-sans antialiased text-gray-900">
    <div class="min-h-screen flex flex-col">
        <!-- Navigation -->
        <nav class="bg-white shadow-md sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-20">
                    <div class="flex items-center">
                        <a href="/" wire:navigate class="flex-shrink-0 flex items-center group">
                            <i class="fas fa-plane-departure text-3xl text-blue-600 mr-2 transition group-hover:rotate-12"></i>
                            <span class="text-2xl font-black text-gray-800 tracking-tighter">TOURIST<span class="text-blue-600">EXPLORER</span></span>
                        </a>
                        <div class="hidden md:ml-10 md:flex md:space-x-6">
                            <a href="/" wire:navigate class="inline-flex items-center px-1 pt-1 text-sm font-bold text-gray-700 hover:text-blue-600 border-b-2 border-transparent hover:border-blue-600 transition">Home</a>
                            <a href="/about" wire:navigate class="inline-flex items-center px-1 pt-1 text-sm font-bold text-gray-700 hover:text-blue-600 border-b-2 border-transparent hover:border-blue-600 transition">About</a>
                            <a href="/services" wire:navigate class="inline-flex items-center px-1 pt-1 text-sm font-bold text-gray-700 hover:text-blue-600 border-b-2 border-transparent hover:border-blue-600 transition">Services</a>
                            <a href="/blogs" wire:navigate class="inline-flex items-center px-1 pt-1 text-sm font-bold text-gray-700 hover:text-blue-600 border-b-2 border-transparent hover:border-blue-600 transition">Blogs</a>
                            
                            <!-- Planning Dropdown -->
                            <div class="relative flex items-center group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                                <button class="inline-flex items-center px-1 pt-1 text-sm font-bold text-gray-700 group-hover:text-blue-600 border-b-2 border-transparent group-hover:border-blue-600 transition h-20">
                                    Planning <i class="fas fa-chevron-down ml-2 text-[10px] transition-transform group-hover:rotate-180"></i>
                                </button>
                                <div x-show="open" 
                                     x-transition:enter="transition ease-out duration-200"
                                     x-transition:enter-start="opacity-0 translate-y-2"
                                     x-transition:enter-end="opacity-100 translate-y-0"
                                     class="absolute left-0 top-full w-48 bg-white rounded-2xl shadow-2xl border border-gray-100 py-4 z-[60]">
                                    <a href="/route-map" wire:navigate class="block px-6 py-3 text-sm font-bold text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">
                                        <i class="fas fa-route mr-2 w-5"></i> Route Map
                                    </a>
                                    <a href="/hotel-finder" wire:navigate class="block px-6 py-3 text-sm font-bold text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">
                                        <i class="fas fa-hotel mr-2 w-5"></i> Search Hotel
                                    </a>
                                    <a href="/ai-itinerary" wire:navigate class="block px-6 py-3 text-sm font-bold text-blue-600 hover:bg-blue-50 transition">
                                        <i class="fas fa-magic mr-2 w-5"></i> AI Trip Planner
                                    </a>
                                </div>
                            </div>

                            <a href="/contact" wire:navigate class="inline-flex items-center px-1 pt-1 text-sm font-bold text-gray-700 hover:text-blue-600 border-b-2 border-transparent hover:border-blue-600 transition">Contact</a>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <a href="/admin/login" wire:navigate class="bg-blue-600 text-white px-6 py-2.5 rounded-full font-bold text-sm hover:bg-blue-700 shadow-lg shadow-blue-200 transition">Admin Portal</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-grow">
            @yield('content')
            {{ $slot ?? '' }}
        </main>

        <!-- Chat Widget -->
        <livewire:chat-widget />

        <!-- Footer -->
        <footer class="bg-gray-900 text-white py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">TouristExplorer</h3>
                    <p class="text-gray-400">Making your travel dreams come true with the best destinations and services.</p>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="/" class="hover:text-white transition">Home</a></li>
                        <li><a href="/about" class="hover:text-white transition">About Us</a></li>
                        <li><a href="/services" class="hover:text-white transition">Services</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Support</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="/contact" class="hover:text-white transition">Contact Us</a></li>
                        <li><a href="/blogs" class="hover:text-white transition">Travel Blog</a></li>
                        <li><a href="#" class="hover:text-white transition">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-2xl hover:text-blue-400 transition"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-2xl hover:text-blue-400 transition"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-2xl hover:text-blue-400 transition"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 pt-8 border-t border-gray-800 text-center text-gray-500 text-sm">
                &copy; {{ date('Y') }} TouristExplorer. All rights reserved.
            </div>
        </footer>
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

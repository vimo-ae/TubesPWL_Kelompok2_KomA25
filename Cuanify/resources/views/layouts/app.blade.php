<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Cuanify')</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon-16x16.png') }}">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-gray-900">
        
        <div
            x-data="{ sidebarOpen: true }"
            @toggle-sidebar.window="sidebarOpen = !sidebarOpen"
            class="min-h-screen flex bg-[#fff5f8] dark:bg-gray-900"
        >

            @auth
                <div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 z-40 bg-black/40 md:hidden" @click="sidebarOpen = false"></div>
                <aside
                    :class="sidebarOpen ? 'w-64' : 'w-20'"
                    class="fixed inset-y-0 left-0 z-50
                           bg-white dark:bg-gray-800
                           h-screen
                           flex flex-col justify-between
                           overflow-y-auto
                           border-r border-purple-50
                           dark:border-gray-700
                           transition-all duration-300">
                    
                    <div class="py-6 flex flex-col h-full">
                        <div
                            class="pt-4 mb-6 flex flex-col items-center"
                            :class="sidebarOpen ? 'px-6' : 'px-2'"
                        >
                            <a href="{{ route('dashboard') }}" class="logo-link inline-flex items-center">
                                <img x-show="sidebarOpen" src="{{ asset('images/Cuanify-logo.png') }}" alt="Logo Cuanify" class="h-12 w-auto object-contain">
                            </a>
                            <span
                                x-show="sidebarOpen"
                                class="text-[11px] font-bold tracking-wide text-gray-500 mt-2"
                            >
                                #BelajarJadiCuan 🚀
                            </span>
                        </div>
                        
                        <nav class="px-4 space-y-2 flex-1">
                            @include('layouts.sidebar')
                        </nav>
                    </div>
                </aside>
            @endauth

            <div :class="sidebarOpen ? 'md:ml-64' : 'md:ml-20'" class="flex-1 min-w-0 flex flex-col bg-[#fff5f8] dark:bg-gray-900 transition-all duration-300">

                @include('layouts.navigation')

                <main class="flex-1 p-6 md:p-8 mb-10 mx-7 overflow-x-hidden">
                    {{ $slot }}
                </main>

                @include('layouts.footer')
            </div>

        </div>
    </body>
</html>
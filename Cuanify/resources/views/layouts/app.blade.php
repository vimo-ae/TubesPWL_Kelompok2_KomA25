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
        
        <div x-data="{ sidebarOpen: true }" class="min-h-screen flex bg-[#fff5f8] dark:bg-gray-900">

            {{-- 1. SIDEBAR DIIZINKAN UNTUK SEMUA ROLE YANG SUDAH LOGIN --}}
            @auth
                <aside
                    x-show="sidebarOpen"
                    x-transition
                    class="w-64 bg-white dark:bg-gray-800 h-screen hidden md:flex flex-col justify-between sticky top-0 z-50 overflow-y-auto border-r border-purple-50 dark:border-gray-700">
                    
                    <div class="py-6 flex flex-col h-full">
                        {{-- Header Sidebar (Logo Cuanify) --}}
                        <div class="px-6 pt-4 mb-6">
                            <a href="{{ route('dashboard') }}" class="logo-link inline-flex items-center">
                                <img src="{{ asset('images/Cuanify-logo.png') }}" alt="Logo Cuanify" class="h-12 w-auto object-contain">
                            </a>
                            <span class="text-[11px] font-bold tracking-wide text-gray-450 dark:text-gray-400 pl-1 opacity-90 block mt-2">
                                #BelajarJadiCuan <span class="animate-pulse">🚀</span>
                            </span>
                        </div>
                        
                        <nav class="px-4 space-y-2 flex-1">
                            @include('layouts.sidebar')
                        </nav>
                    </div>
                </aside>
            @endauth

            <div class="flex-1 min-w-0 flex flex-col bg-gradient-to-br from-pink-100 via-fuchsia-100 to-purple-200 dark:bg-gray-900">
                
                {{-- Navigation/Topbar --}}
                @include('layouts.navigation')

                {{-- Konten Utama (Gradasi Cantik Cuanify) --}}
                <main class="flex-1 p-6 md:p-8 mb-10 mx-7 overflow-x-hidden">
                    {{ $slot }}
                </main>

                {{-- Footer --}}
                @include('layouts.footer')
            </div>

        </div>
    </body>
</html>
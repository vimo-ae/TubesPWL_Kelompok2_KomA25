<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-gray-900 bg-[#fff5f8] dark:bg-gray-900">
        <div class="min-h-screen flex bg-[#fff5f8]">

            @if(auth()->check() && auth()->user()->role !== 'admin')
            <aside class="w-64 bg-[#fff5f8] dark:bg-gray-800 h-screen hidden md:flex flex-col justify-between sticky top-0 z-50 overflow-y-auto border-r border-gray-100 dark:border-gray-700">
                <div class="py-6">
                    <div class="px-6 pt-4 mb-6 bg-[#fff5f8]">
                        <a href="{{ route('dashboard') }}" class="logo-link inline-flex items-center">
                            <img src="{{ asset('images/Cuanify-logo.png') }}" alt="Logo Cuanify" class="h-12 w-auto object-contain">
                        </a>

                        <span class="text-[11px] font-bold tracking-wide text-gray-450 dark:text-gray-400 pl-1 opacity-90 block mt-2">
                            #BelajarJadiCuan <span class="animate-pulse">🚀</span>
                        </span>
                    </div>
                    
                    <nav class="px-4 space-y-1.5">
                        @if(auth()->check())
                            @if(auth()->user()->role === 'admin')
                                @include('layouts.sidebar-admin')
                            @else
                                @include('layouts.sidebar-students')
                            @endif
                        @endif
                    </nav>
                </div>
            </aside>
            @endif

            <div class="flex-1 min-w-0 flex flex-col bg-[#fff5f8]">
                
                @include('layouts.navigation')

                <main class="flex-1 bg-gradient-to-br from-pink-100 via-fuchsia-100 to-purple-200 p-6 md:p-8 overflow-x-hidden">
                    {{ $slot }}
                </main>

                @include('layouts.footer')
            </div>
        </div>
    </body>
</html>
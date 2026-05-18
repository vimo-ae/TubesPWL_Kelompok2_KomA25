<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-gray-900 bg-gray-50 dark:bg-gray-900">
        <div class="min-h-screen flex">
            
            <aside class="w-64 bg-white dark:bg-gray-800 border-r border-gray-100 dark:border-gray-700 min-h-screen hidden md:flex flex-col justify-between sticky top-0 shadow-sm z-50">
                <div class="py-6">
                    <div class="px-6 pt-4 mb-6">
                        <a href="{{ route('dashboard') }}" class="flex items-center">
                            <img src="{{ asset('images/Cuanify.png') }}" alt="Logo Cuanify" class="h-12 w-auto object-contain transition-all duration-200 hover:scale-105">
                        </a>

                        <span class="text-[11px] font-bold tracking-wide text-gray-450 dark:text-gray-400 pl-1 opacity-90 block">
                            #BelajarJadiCuan <span class="animate-pulse">🚀</span>
                        </span>
                    </div>
                    
                    <nav class="px-4 space-y-1.5">
                        @include('layouts.sidebar')
                    </nav>
                </div>

                <div class="p-4 border-t border-gray-100 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-800/30">
                    <div class="flex flex-col gap-2">
                        <div class="px-3 py-1.5 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
                            <p class="text-[10px] text-gray-400 font-semibold truncate">Masuk sebagai:</p>
                            <p class="text-xs font-bold text-gray-700 dark:text-gray-200 truncate">{{ Auth::user()->name }}</p>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left flex items-center gap-2 px-3 py-2 text-xs font-bold text-red-600 hover:bg-red-50 dark:hover:bg-red-950/30 rounded-xl transition">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Keluar Aplikasi</span>
                            </button>
                        </form>
                    </div>
                </div>
            </aside>

            <div class="flex-1 min-w-0 flex flex-col">
                
                <div class="md:hidden bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 h-16 flex items-center justify-between px-4 sticky top-0 z-40 shadow-sm">
                    <img src="{{ asset('images/logo-cuanify.png') }}" alt="Logo Cuanify" class="h-8 w-auto object-contain">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-xs font-bold text-red-600 bg-red-50 px-3 py-1.5 rounded-xl">Keluar</button>
                    </form>
                </div>

                <main class="flex-1 p-6 md:p-8">
                    {{ $slot }}
                </main>

                @include('layouts.footer')
            </div>
        </div>
    </body>
</html>
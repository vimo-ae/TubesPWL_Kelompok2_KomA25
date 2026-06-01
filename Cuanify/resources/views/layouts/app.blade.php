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
            
            <aside class="w-64 bg-[#fff5f8] dark:bg-gray-800 h-screen hidden md:flex flex-col justify-between sticky top-0 z-50 overflow-y-auto">
                <div class="py-6">
                    <div class="px-6 pt-4 mb-6 bg-[#fff5f8]">
                        <a href="{{ route('dashboard') }}" class="logo-link inline-flex items-center">
                            <img src="{{ asset('images/Cuanify-jukebox-bg-removed.png') }}" alt="Logo Cuanify" class="h-12 w-auto object-contain">
                        </a>

                        <span class="text-[11px] font-bold tracking-wide text-gray-450 dark:text-gray-400 pl-1 opacity-90 block mt-2">
                            #BelajarJadiCuan <span class="animate-pulse">🚀</span>
                        </span>
                    </div>
                    
                    <nav class="px-4 space-y-1.5">
                        @include('layouts.sidebar')
                    </nav>
                </div>
            </aside>

            <div class="flex-1 min-w-0 flex flex-col bg-[#fff5f8]">
                
                <nav class="bg-[#fff5f8] dark:bg-gray-800 w-full h-16 flex items-center justify-end px-6 sticky top-0 z-40">
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-[#fff5f8] dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>
                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('settings.edit')">
                                    {{ __('Settings') }}
                                </x-dropdown-link>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </nav>

                <div class="md:hidden bg-[#fff5f8] dark:bg-gray-800 h-16 flex items-center justify-between px-4 sticky top-0 z-40">
                    <img src="{{ asset('images/Cuanify-jukebox-bg-removed.png') }}" alt="Logo Cuanify" class="h-8 w-auto object-contain">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-xs font-bold text-red-600 bg-red-50 px-3 py-1.5 rounded-xl">Keluar</button>
                    </form>
                </div>

                <main class="flex-1 bg-gradient-to-br from-pink-100 via-fuchsia-100 to-purple-200  p-6 md:p-8 overflow-x-hidden">
                    {{ $slot }}
                </main>

                @include('layouts.footer')
            </div>
        </div>
    </body>
</html>
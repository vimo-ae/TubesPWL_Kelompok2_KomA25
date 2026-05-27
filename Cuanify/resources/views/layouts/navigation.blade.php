@php
    $dashboardRoute = match(auth()->user()->role) {
        'admin' => '/admin',
        'instructor' => '/instructor',
        default => '/dashboard'
    };
@endphp

<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ url($dashboardRoute) }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="url($dashboardRoute)" :active="request()->is(trim($dashboardRoute, '/'))">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>
            <span class="text-xl font-black tracking-wider bg-gradient-to-r from-purple-600 via-indigo-600 to-purple-700 bg-clip-text text-transparent">
                Cuanify
            </span>
        </div>

        <div class="px-4 space-y-1.5">
            
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" 
                class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-2xl transition duration-200 w-full border-none {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-600 dark:bg-indigo-950/50 dark:text-indigo-400' : 'text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-800' }}">
                <span class="text-base">📊</span> {{ __('Dashboard') }}
            </x-nav-link>

            <a href="#" class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-600 dark:text-gray-400 rounded-2xl hover:bg-gray-50 dark:hover:bg-gray-800 transition duration-200">
                <span class="text-base">📖</span> Course Saya
            </a>

            <a href="#" class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-600 dark:text-gray-400 rounded-2xl hover:bg-gray-50 dark:hover:bg-gray-800 transition duration-200">
                <span class="text-base">🔍</span> Daftar Course
            </a>

            <hr class="my-4 border-gray-100 dark:border-gray-800">

            <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')"
                class="flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-2xl transition duration-200 w-full border-none {{ request()->routeIs('profile.edit') ? 'bg-indigo-50 text-indigo-600 dark:bg-indigo-950/50' : 'text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-800' }}">
                <span class="text-base">⚙️</span> Pengaturan Profil
            </x-nav-link>

        </div>
    </div>

    <div class="p-4 border-t border-gray-100 dark:border-gray-800 bg-gray-50/50 dark:bg-gray-800/20">
        <x-dropdown align="top" width="48">
            <x-slot name="trigger">
                <button class="flex items-center justify-between w-full px-3 py-2 border border-transparent text-sm font-medium rounded-xl text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none transition duration-150">
                    <div class="truncate max-w-[140px] font-bold text-left">{{ Auth::user()->name }}</div>
                    <svg class="fill-current h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-dropdown-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>
</nav>

<div class="sm:hidden bg-white dark:bg-gray-900 border-b border-gray-100 dark:border-gray-800 w-full h-16 fixed top-0 left-0 flex items-center justify-between px-4 z-50">
    <span class="text-lg font-black bg-gradient-to-r from-purple-600 to-indigo-600 bg-clip-text text-transparent">Cuanify</span>
    <button @click="open = ! open" class="p-2 rounded-md text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800">
        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>

<div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden fixed top-16 left-0 w-full bg-white dark:bg-gray-900 z-40 border-b border-gray-200 shadow-lg pt-2 pb-4 px-4 space-y-1">
    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">Dashboard</x-responsive-nav-link>
    <a href="#" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:bg-gray-50">Course Saya</a>
    <a href="#" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:bg-gray-50">Daftar Course</a>
    <x-responsive-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">Pengaturan Profil</x-responsive-nav-link>
    <form method="POST" action="{{ route('logout') }}" class="pt-2 border-t border-gray-100">
        @csrf
        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</x-responsive-nav-link>
    </form>
</div>
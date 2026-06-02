<nav x-data="{ open: false }" class="w-full bg-[#fff5f8] dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <div class="mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between md:justify-end">
        
        <div class="flex items-center md:hidden">
            <img src="{{ asset('images/Cuanify-jukebox-bg-removed.png') }}" alt="Logo Cuanify" class="h-8 w-auto object-contain">
        </div>

        <div class="hidden md:flex md:items-center">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center gap-3 px-3 py-1.5 border border-transparent text-sm leading-4 font-medium rounded-xl text-gray-500 dark:text-gray-400 bg-[#fff5f8] dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150 group">
                        
                        <div class="relative w-10 h-10 rounded-full overflow-hidden border border-pink-200/60 shadow-sm group-hover:scale-105 transition duration-200">
                            <img 
                                src="{{ 
                                    Auth::user()->profile && Auth::user()->profile->profile_photo
                                        ? asset('storage/' . Auth::user()->profile->profile_photo)
                                        : asset('images/profile-default.jpg')
                                }}"
                                alt="Avatar" 
                                class="w-full h-full object-cover"
                            >
                        </div>

                        <div class="text-left hidden lg:block">
                            <div class="text-md font-black text-gray-700 dark:text-gray-300">
                                {{ Auth::user()->profile->full_name ?? Auth::user()->username }}
                            </div>
                            <div class="text-[10px] text-gray-400 font-medium">
                                {{ '@' . Auth::user()->username }}
                            </div>
                        </div>

                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile')">
                        {{ __('Profil Saya') }}
                    </x-dropdown-link>
                    
                    <x-dropdown-link :href="route('settings.edit')">
                        {{ __('Pengaturan Akun') }}
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

        <div class="flex items-center md:hidden">
            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700 shadow-lg py-3 px-4 space-y-1">
        
        <div class="flex items-center gap-3 px-3 py-2 mb-2 bg-pink-50/40 dark:bg-gray-800 rounded-xl">
            <img
                src="{{
                    auth()->check() &&
                    auth()->user()->profile &&
                    auth()->user()->profile->profile_photo
                        ? asset('storage/' . auth()->user()->profile->profile_photo)
                        : asset('images/profile-default.jpg')
                }}"
                alt="Avatar"
                class="w-full h-full object-cover"
            >
            <div>
                <div class="text-sm font-black text-gray-700 dark:text-gray-200">
                    {{ Auth::user()->profile->full_name ?? Auth::user()->username }}
                </div>
                <div class="text-xs text-purple-600 font-bold">
                    {{ '@' . Auth::user()->username }}
                </div>
            </div>
        </div>

        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">Dashboard</x-responsive-nav-link>
        <a href="{{ route('my-courses.index') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 dark:text-gray-400 hover:bg-gray-50">Course Saya</a>
        <a href="{{ route('courses.index') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 dark:text-gray-400 hover:bg-gray-50">Daftar Course</a>
        
        <hr class="my-2 border-gray-100 dark:border-gray-800">
        
        <x-responsive-nav-link :href="route('profile')" :active="request()->routeIs('profile')">Profil Saya</x-responsive-nav-link>
        <x-responsive-nav-link :href="route('settings.edit')" :active="request()->routeIs('settings.edit')">Pengaturan Akun</x-responsive-nav-link>
        
        <form method="POST" action="{{ route('logout') }}" class="pt-2 border-t border-gray-100 dark:border-gray-800">
            @csrf
            <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-600">
                Log Out
            </x-responsive-nav-link>
        </form>
    </div>
</nav>
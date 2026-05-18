<div class="space-y-1 px-4">
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="w-full flex items-center space-x-2 py-3 px-4 rounded-lg">
        <i class="fas fa-home"></i>
        <span>{{ __('Dashboard') }}</span>
    </x-nav-link>

    <x-nav-link href="#" class="w-full flex items-center space-x-2 py-3 px-4 rounded-lg">
        <i class="fas fa-book-open"></i>
        <span>Course Saya</span>
    </x-nav-link>

    <x-nav-link href="#" class="w-full flex items-center space-x-2 py-3 px-4 rounded-lg">
        <i class="fas fa-search"></i>
        <span>Daftar Course</span>
    </x-nav-link>

    <hr class="my-4 border-gray-200">

    <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')" class="w-full flex items-center space-x-2 py-3 px-4 rounded-lg">
        <i class="fas fa-user-cog"></i>
        <span>Pengaturan Profil</span>
    </x-nav-link>
</div>
<div class="w-64 bg-white shadow-sm border-r border-purple-50 flex-shrink-0 hidden md:block">
    <div class="p-6 mb-4">
        <div class="text-2xl font-extrabold text-gray-800 flex items-center gap-2">
            <img src="{{ asset('images/Cuanify-logo.png') }}" alt="Logo Cuanify" class="h-12 w-auto object-contain">
        </div>
        <span class="text-[11px] font-bold tracking-wide text-gray-450 dark:text-gray-400 pl-1 opacity-90 block mt-2">
            #BelajarJadiCuan <span class="animate-pulse">🚀</span>
        </span>
    </div>

    <nav class="px-4 space-y-2">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-fuchsia-500 to-purple-600 text-white shadow-md' : 'text-gray-600 hover:bg-purple-50 hover:text-purple-600 font-medium' }}">
            <i class="fas fa-chart-line w-5"></i>
            <span class="text-sm">Dashboard</span>
        </a>

        <a href="{{ route('admin.instructors') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all {{ request()->routeIs('admin.instructors') ? 'bg-gradient-to-r from-fuchsia-500 to-purple-600 text-white shadow-md' : 'text-gray-600 hover:bg-purple-50 hover:text-purple-600 font-medium' }}">
            <i class="fas fa-user-check w-5"></i>
            <span class="text-sm">Verifikasi Instruktur</span>
        </a>

        <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all {{ request()->routeIs('admin.categories.*') ? 'bg-gradient-to-r from-fuchsia-500 to-purple-600 text-white shadow-md' : 'text-gray-600 hover:bg-purple-50 hover:text-purple-600 font-medium' }}">
            <i class="fas fa-folder w-5"></i>
            <span class="text-sm">Kelola Kategori</span>
        </a>

        <a href="{{ route('admin.students') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all {{ request()->routeIs('admin.students') || request()->routeIs('admin.all_instructors') || request()->routeIs('admin.users.show') ? 'bg-gradient-to-r from-fuchsia-500 to-purple-600 text-white shadow-md' : 'text-gray-600 hover:bg-purple-50 hover:text-purple-600 font-medium' }}">
            <i class="fas fa-users w-5"></i>
            <span class="text-sm">Kelola Pengguna</span>
        </a>

        <a href="{{ route('admin.courses') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all {{ request()->routeIs('admin.courses') || request()->routeIs('admin.courses.show') ? 'bg-gradient-to-r from-fuchsia-500 to-purple-600 text-white shadow-md' : 'text-gray-600 hover:bg-purple-50 hover:text-purple-600 font-medium' }}">
            <i class="fas fa-book w-5"></i>
            <span class="text-sm">Kelola Course</span>
        </a>
    </nav>
</div>
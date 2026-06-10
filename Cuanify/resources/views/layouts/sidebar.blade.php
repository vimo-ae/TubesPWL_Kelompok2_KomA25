@if(auth()->user()->role === 'admin')

    <div class="flex flex-col gap-3 mt-4">

        <a href="{{ route('admin.dashboard') }}"
           class="w-full flex items-center justify-center lg:justify-start gap-4 px-5 py-4 rounded-3xl transition-all duration-300
            {{ request()->routeIs('admin.dashboard')
                ? 'bg-gradient-to-r from-fuchsia-500 via-purple-500 to-purple-700 text-white shadow-lg shadow-purple-300/50 font-semibold'
                : 'text-gray-600 hover:bg-purple-50 hover:text-purple-600 hover:translate-x-1 font-medium' }}">
            <i class="fas fa-chart-line text-lg w-5 text-center"></i>
            <span x-show="sidebarOpen" class="text-[15px]">Dashboard Admin</span>
        </a>

        <a href="{{ route('admin.instructors') }}"
           class="w-full flex items-center justify-center lg:justify-start gap-4 px-5 py-4 rounded-3xl transition-all duration-300
           {{ request()->routeIs('admin.instructors')
                ? 'bg-gradient-to-r from-fuchsia-500 via-purple-500 to-purple-700 text-white shadow-lg shadow-purple-300/50 font-semibold'
                : 'text-gray-600 hover:bg-purple-50 hover:text-purple-600 hover:translate-x-1 font-medium' }}">
            <i class="fas fa-user-check text-lg w-5 text-center"></i>
            <span x-show="sidebarOpen" class="text-[15px]">Verifikasi Instruktur</span>
        </a>

        <a href="{{ route('admin.categories.index') }}"
           class="w-full flex items-center justify-center lg:justify-start gap-4 px-5 py-4 rounded-3xl transition-all duration-300
           {{ request()->routeIs('admin.categories.*')
                ? 'bg-gradient-to-r from-fuchsia-500 via-purple-500 to-purple-700 text-white shadow-lg shadow-purple-300/50 font-semibold'
                : 'text-gray-600 hover:bg-purple-50 hover:text-purple-600 hover:translate-x-1 font-medium' }}">
            <i class="fas fa-folder text-lg w-5 text-center"></i>
            <span x-show="sidebarOpen" class="text-[15px]">Kelola Kategori</span>
        </a>

        <a href="{{ route('admin.users') }}"
           class="w-full flex items-center justify-center lg:justify-start gap-4 px-5 py-4 rounded-3xl transition-all duration-300
           {{ request()->routeIs('admin.users*') || request()->routeIs('admin.students') || request()->routeIs('admin.all_instructors')
                ? 'bg-gradient-to-r from-fuchsia-500 via-purple-500 to-purple-700 text-white shadow-lg shadow-purple-300/50 font-semibold'
                : 'text-gray-600 hover:bg-purple-50 hover:text-purple-600 hover:translate-x-1 font-medium' }}">
            <i class="fas fa-users text-lg w-5 text-center"></i>
            <span x-show="sidebarOpen" class="text-[15px]">Kelola Pengguna</span>
        </a>

        <a href="{{ route('admin.courses') }}"
           class="w-full flex items-center justify-center lg:justify-start gap-4 px-5 py-4 rounded-3xl transition-all duration-300
           {{ request()->routeIs('admin.courses*')
                ? 'bg-gradient-to-r from-fuchsia-500 via-purple-500 to-purple-700 text-white shadow-lg shadow-purple-300/50 font-semibold'
                : 'text-gray-600 hover:bg-purple-50 hover:text-purple-600 hover:translate-x-1 font-medium' }}">
            <i class="fas fa-book text-lg w-5 text-center"></i>
            <span x-show="sidebarOpen" class="text-[15px]">Kelola Course</span>
        </a>

    </div>

@else

    <div class="flex flex-col gap-3 mt-4">

        <a href="{{ route('dashboard') }}"
           class="w-full flex items-center justify-center lg:justify-start gap-4 px-5 py-4 rounded-3xl transition-all duration-300
           {{ request()->routeIs('dashboard')
                ? 'bg-gradient-to-r from-fuchsia-500 via-purple-500 to-purple-700 text-white shadow-lg shadow-purple-300/40 font-semibold'
                : 'text-gray-600 hover:bg-purple-50 hover:text-purple-600 hover:translate-x-1 font-medium' }}">
            <i class="fas fa-house w-5 text-center"></i>
            <span x-show="sidebarOpen" class="text-[15px]">Dashboard</span>
        </a>

        @if(auth()->user()->role === 'instructor')
            <a href="{{ route('instructor.courses.index') }}"
               class="w-full flex items-center justify-center lg:justify-start gap-4 px-5 py-4 rounded-3xl transition-all duration-300
               {{ request()->routeIs('instructor.courses.*')
                    ? 'bg-gradient-to-r from-fuchsia-500 via-purple-500 to-purple-700 text-white shadow-lg shadow-purple-300/40 font-semibold'
                    : 'text-gray-600 hover:bg-purple-50 hover:text-purple-600 hover:translate-x-1 font-medium' }}">
                <i class="fas fa-book-open w-5 text-center"></i>
                <span x-show="sidebarOpen" class="text-[15px]">Course Saya</span>
            </a>
        @elseif(auth()->user()->role === 'student')
            <a href="{{ url('/my-courses') }}"
               class="w-full flex items-center justify-center lg:justify-start gap-4 px-5 py-4 rounded-3xl transition-all duration-300
               {{ request()->is('my-courses*')
                    ? 'bg-gradient-to-r from-fuchsia-500 via-purple-500 to-purple-700 text-white shadow-lg shadow-purple-300/40 font-semibold'
                    : 'text-gray-600 hover:bg-purple-50 hover:text-purple-600 hover:translate-x-1 font-medium' }}">
                <i class="fas fa-book-open w-5 text-center"></i>
                <span x-show="sidebarOpen" class="text-[15px]">Course Saya</span>
            </a>
        @endif

        <a href="{{ route('courses.index') }}"
           class="w-full flex items-center justify-center lg:justify-start gap-4 px-5 py-4 rounded-3xl transition-all duration-300
           {{ request()->routeIs('courses.*')
                ? 'bg-gradient-to-r from-fuchsia-500 via-purple-500 to-purple-700 text-white shadow-lg shadow-purple-300/40 font-semibold'
                : 'text-gray-600 hover:bg-purple-50 hover:text-purple-600 hover:translate-x-1 font-medium' }}">
            <i class="fas fa-earth-asia w-5 text-center"></i>
            <span x-show="sidebarOpen" class="text-[15px]">Semua Course</span>
        </a>

    </div>

@endif
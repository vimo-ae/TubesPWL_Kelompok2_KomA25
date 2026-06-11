@if(auth()->user()->role === 'admin')

    <div class="flex flex-col gap-3 mt-4 items-stretch">

        <a href="{{ route('admin.dashboard') }}"
           :class="sidebarOpen ? 'w-full px-5 py-4 rounded-3xl justify-start gap-4' : 'w-12 h-12 rounded-full justify-center gap-0'"
           class="flex items-center transition-all duration-300 flex-shrink-0
            {{ request()->routeIs('admin.dashboard')
                ? 'bg-gradient-to-r from-fuchsia-500 via-purple-500 to-purple-700 text-white shadow-lg shadow-purple-300/50 font-semibold'
                : 'text-gray-600 hover:bg-purple-50 hover:text-purple-600 hover:translate-x-1 font-medium' }}">
            <i class="fas fa-chart-line text-base w-5 text-center flex-shrink-0"></i>
            <span x-show="sidebarOpen" x-transition.duration.150ms x-cloak class="text-[15px] whitespace-nowrap">Dashboard Admin</span>
        </a>

        <a href="{{ route('admin.instructors') }}"
           :class="sidebarOpen ? 'w-full px-5 py-4 rounded-3xl justify-start gap-4' : 'w-12 h-12 rounded-full justify-center gap-0'"
           class="flex items-center transition-all duration-300 flex-shrink-0
           {{ request()->routeIs('admin.instructors')
                ? 'bg-gradient-to-r from-fuchsia-500 via-purple-500 to-purple-700 text-white shadow-lg shadow-purple-300/50 font-semibold'
                : 'text-gray-600 hover:bg-purple-50 hover:text-purple-600 hover:translate-x-1 font-medium' }}">
            <i class="fas fa-user-check text-base w-5 text-center flex-shrink-0"></i>
            <span x-show="sidebarOpen" x-transition.duration.150ms x-cloak class="text-[15px] whitespace-nowrap">Verifikasi Instruktur</span>
        </a>

        <a href="{{ route('admin.categories.index') }}"
           :class="sidebarOpen ? 'w-full px-5 py-4 rounded-3xl justify-start gap-4' : 'w-12 h-12 rounded-full justify-center gap-0'"
           class="flex items-center transition-all duration-300 flex-shrink-0
           {{ request()->routeIs('admin.categories.*')
                ? 'bg-gradient-to-r from-fuchsia-500 via-purple-500 to-purple-700 text-white shadow-lg shadow-purple-300/50 font-semibold'
                : 'text-gray-600 hover:bg-purple-50 hover:text-purple-600 hover:translate-x-1 font-medium' }}">
            <i class="fas fa-folder text-base w-5 text-center flex-shrink-0"></i>
            <span x-show="sidebarOpen" x-transition.duration.150ms x-cloak class="text-[15px] whitespace-nowrap">Kelola Kategori</span>
        </a>

        <a href="{{ route('admin.users') }}"
           :class="sidebarOpen ? 'w-full px-5 py-4 rounded-3xl justify-start gap-4' : 'w-12 h-12 rounded-full justify-center gap-0'"
           class="flex items-center transition-all duration-300 flex-shrink-0
           {{ request()->routeIs('admin.users*') || request()->routeIs('admin.students') || request()->routeIs('admin.all_instructors')
                ? 'bg-gradient-to-r from-fuchsia-500 via-purple-500 to-purple-700 text-white shadow-lg shadow-purple-300/50 font-semibold'
                : 'text-gray-600 hover:bg-purple-50 hover:text-purple-600 hover:translate-x-1 font-medium' }}">
            <i class="fas fa-users text-base w-5 text-center flex-shrink-0"></i>
            <span x-show="sidebarOpen" x-transition.duration.150ms x-cloak class="text-[15px] whitespace-nowrap">Kelola Pengguna</span>
        </a>

        <a href="{{ route('admin.courses') }}"
           :class="sidebarOpen ? 'w-full px-5 py-4 rounded-3xl justify-start gap-4' : 'w-12 h-12 rounded-full justify-center gap-0'"
           class="flex items-center transition-all duration-300 flex-shrink-0
           {{ request()->routeIs('admin.courses*')
                ? 'bg-gradient-to-r from-fuchsia-500 via-purple-500 to-purple-700 text-white shadow-lg shadow-purple-300/50 font-semibold'
                : 'text-gray-600 hover:bg-purple-50 hover:text-purple-600 hover:translate-x-1 font-medium' }}">
            <i class="fas fa-book text-base w-5 text-center flex-shrink-0"></i>
            <span x-show="sidebarOpen" x-transition.duration.150ms x-cloak class="text-[15px] whitespace-nowrap">Kelola Course</span>
        </a>

    </div>

@else

    <div class="flex flex-col gap-3 mt-4 items-stretch">

        <a href="{{ route('dashboard') }}"
           :class="sidebarOpen ? 'w-full px-5 py-4 rounded-3xl justify-start gap-4' : 'w-12 h-12 rounded-full justify-center gap-0'"
           class="flex items-center transition-all duration-300 flex-shrink-0
           {{ request()->routeIs('dashboard')
                ? 'bg-gradient-to-r from-fuchsia-500 via-purple-500 to-purple-700 text-white shadow-lg shadow-purple-300/40 font-semibold'
                : 'text-gray-600 hover:bg-purple-50 hover:text-purple-600 hover:translate-x-1 font-medium' }}">
            <i class="fas fa-house text-base w-5 text-center flex-shrink-0"></i>
            <span x-show="sidebarOpen" x-transition.duration.150ms x-cloak class="text-[15px] whitespace-nowrap">Dashboard</span>
        </a>

        @if(auth()->user()->role === 'instructor')
            <a href="{{ route('instructor.courses.index') }}"
               :class="sidebarOpen ? 'w-full px-5 py-4 rounded-3xl justify-start gap-4' : 'w-12 h-12 rounded-full justify-center gap-0'"
               class="flex items-center transition-all duration-300 flex-shrink-0
               {{ request()->routeIs('instructor.courses.*')
                    ? 'bg-gradient-to-r from-fuchsia-500 via-purple-500 to-purple-700 text-white shadow-lg shadow-purple-300/40 font-semibold'
                    : 'text-gray-600 hover:bg-purple-50 hover:text-purple-600 hover:translate-x-1 font-medium' }}">
                <i class="fas fa-book-open text-base w-5 text-center flex-shrink-0"></i>
                <span x-show="sidebarOpen" x-transition.duration.150ms x-cloak class="text-[15px] whitespace-nowrap">Course Saya</span>
            </a>
        @elseif(auth()->user()->role === 'student')
            <a href="{{ url('/my-courses') }}"
               :class="sidebarOpen ? 'w-full px-5 py-4 rounded-3xl justify-start gap-4' : 'w-12 h-12 rounded-full justify-center gap-0'"
               class="flex items-center transition-all duration-300 flex-shrink-0
               {{ request()->is('my-courses*')
                    ? 'bg-gradient-to-r from-fuchsia-500 via-purple-500 to-purple-700 text-white shadow-lg shadow-purple-300/40 font-semibold'
                    : 'text-gray-600 hover:bg-purple-50 hover:text-purple-600 hover:translate-x-1 font-medium' }}">
                <i class="fas fa-book-open text-base w-5 text-center flex-shrink-0"></i>
                <span x-show="sidebarOpen" x-transition.duration.150ms x-cloak class="text-[15px] whitespace-nowrap">Course Saya</span>
            </a>
        @endif

        <a href="{{ route('courses.index') }}"
           :class="sidebarOpen ? 'w-full px-5 py-4 rounded-3xl justify-start gap-4' : 'w-12 h-12 rounded-full justify-center gap-0'"
           class="flex items-center transition-all duration-300 flex-shrink-0
           {{ request()->routeIs('courses.*')
                ? 'bg-gradient-to-r from-fuchsia-500 via-purple-500 to-purple-700 text-white shadow-lg shadow-purple-300/40 font-semibold'
                : 'text-gray-600 hover:bg-purple-50 hover:text-purple-600 hover:translate-x-1 font-medium' }}">
            <i class="fas fa-earth-asia text-base w-5 text-center flex-shrink-0"></i>
            <span x-show="sidebarOpen" x-transition.duration.150ms x-cloak class="text-[15px] whitespace-nowrap">Semua Course</span>
        </a>

    </div>

@endif
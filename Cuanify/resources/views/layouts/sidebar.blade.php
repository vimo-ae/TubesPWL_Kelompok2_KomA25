{{-- JANGAN BUNGKUS DENGAN DIV ATAU NAV LAGI DI BAGIAN LUAR SINI --}}

@if(auth()->user()->role === 'admin')
    
    {{-- ================= MENU KHUSUS ADMIN ================= --}}
    <a href="{{ route('admin.dashboard') }}" 
       class="w-full flex items-center gap-3 px-4 py-3 rounded-2xl transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-fuchsia-500 to-purple-600 text-white shadow-md font-medium' : 'text-gray-600 hover:bg-purple-50 hover:text-purple-600 font-medium' }}">
        <i class="fas fa-chart-line w-5"></i>
        <span class="text-sm">Dashboard Admin</span>
    </a>

    <a href="{{ route('admin.instructors') }}" 
       class="w-full flex items-center gap-3 px-4 py-3 rounded-2xl transition-all {{ request()->routeIs('admin.instructors') ? 'bg-gradient-to-r from-fuchsia-500 to-purple-600 text-white shadow-md font-medium' : 'text-gray-600 hover:bg-purple-50 hover:text-purple-600 font-medium' }}">
        <i class="fas fa-user-check w-5"></i>
        <span class="text-sm">Verifikasi Instruktur</span>
    </a>

    <a href="{{ route('admin.categories.index') }}" 
       class="w-full flex items-center gap-3 px-4 py-3 rounded-2xl transition-all {{ request()->routeIs('admin.categories.*') ? 'bg-gradient-to-r from-fuchsia-500 to-purple-600 text-white shadow-md font-medium' : 'text-gray-600 hover:bg-purple-50 hover:text-purple-600 font-medium' }}">
        <i class="fas fa-folder w-5"></i>
        <span class="text-sm">Kelola Kategori</span>
    </a>

    <a href="{{ route('admin.users') }}" 
        class="w-full flex items-center gap-3 px-4 py-3 rounded-2xl transition-all 
        {{ request()->routeIs('admin.users') || request()->routeIs('admin.students') || request()->routeIs('admin.all_instructors') ? 'bg-gradient-to-r from-fuchsia-500 to-purple-600 text-white shadow-md font-medium' : 'text-gray-600 hover:bg-purple-50 hover:text-purple-600 font-medium' }}">
            <i class="fas fa-users w-5"></i>
            <span class="text-sm">Kelola Pengguna</span>
    </a>

    <a href="{{ route('admin.courses') }}" 
       class="w-full flex items-center gap-3 px-4 py-3 rounded-2xl transition-all {{ request()->routeIs('admin.courses') ? 'bg-gradient-to-r from-fuchsia-500 to-purple-600 text-white shadow-md font-medium' : 'text-gray-600 hover:bg-purple-50 hover:text-purple-600 font-medium' }}">
        <i class="fas fa-book w-5"></i>
        <span class="text-sm">Kelola Course</span>
    </a>

@else

    {{-- ================= MENU USER UTAMA (STUDENT & INSTRUCTOR) ================= --}}
    <a href="{{ route('dashboard') }}" 
       class="w-full flex items-center gap-3 px-4 py-3 rounded-2xl transition-all {{ request()->routeIs('dashboard') ? 'bg-gradient-to-r from-fuchsia-500 to-purple-600 text-white shadow-md font-medium' : 'text-gray-600 hover:bg-purple-50 hover:text-purple-600 font-medium' }}">
        <i class="fas fa-home w-5"></i> 
        <span class="text-sm">{{ __('Dashboard') }}</span>
    </a>
    
    <hr class="my-3 border-purple-100/60">
    
    @if(auth()->user()->role === 'instructor')
        {{-- Menu Spesifik Instruktur --}}
        <a href="{{ route('instructor.courses.index') }}" 
           class="w-full flex items-center gap-3 px-4 py-3 rounded-2xl transition-all {{ request()->routeIs('instructor.courses.*') ? 'bg-gradient-to-r from-fuchsia-500 to-purple-600 text-white shadow-md font-medium' : 'text-gray-600 hover:bg-purple-50 hover:text-purple-600 font-medium' }}">
            <i class="fas fa-book-open w-5"></i>
            <span class="text-sm">Course Saya</span>
        </a>
        
        <hr class="my-3 border-purple-100/60">
        
        <a href="{{ url('/courses') }}" 
           class="w-full flex items-center gap-3 px-4 py-3 rounded-2xl transition-all {{ request()->url() == url('/courses') ? 'bg-gradient-to-r from-fuchsia-500 to-purple-600 text-white shadow-md font-medium' : 'text-gray-600 hover:bg-purple-50 hover:text-purple-600 font-medium' }}">
            <i class="fas fa-globe w-5"></i>
            <span class="text-sm">Semua Course</span>
        </a>
        
    @elseif(auth()->user()->role === 'student')
        {{-- Menu Spesifik Student --}}
        <a href="{{ url('/my-courses') }}" 
           class="w-full flex items-center gap-3 px-4 py-3 rounded-2xl transition-all {{ request()->url() == url('/my-courses') ? 'bg-gradient-to-r from-fuchsia-500 to-purple-600 text-white shadow-md font-medium' : 'text-gray-600 hover:bg-purple-50 hover:text-purple-600 font-medium' }}">
            <i class="fas fa-book-open w-5"></i>
            <span class="text-sm">Course Saya</span>
        </a>
        
        <hr class="my-3 border-purple-100/60">
        
        <a href="{{ route('courses.index') }}" 
           class="w-full flex items-center gap-3 px-4 py-3 rounded-2xl transition-all {{ request()->routeIs('courses.index') ? 'bg-gradient-to-r from-fuchsia-500 to-purple-600 text-white shadow-md font-medium' : 'text-gray-600 hover:bg-purple-50 hover:text-purple-600 font-medium' }}">
            <i class="fas fa-globe w-5"></i>
            <span class="text-sm">Semua Course</span>
        </a>
    @endif

@endif
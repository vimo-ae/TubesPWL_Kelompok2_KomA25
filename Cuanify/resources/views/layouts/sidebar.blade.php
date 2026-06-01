<div class="space-y-1 px-4 sidebar-container">
    <a href="{{ route('dashboard') }}" 
       class="w-full flex items-center space-x-3 py-3 px-4 rounded-lg transition-all duration-300 text-gray-600 hover-gradient font-medium">
        <i class="fas fa-home text-sm"></i>
        <span>{{ __('Dashboard') }}</span>
    </a>

    @if(auth()->check())
    
        @if(auth()->user()->role === 'instructor')
            <a href="{{ route('instructor.courses.index') }}" 
               class="w-full flex items-center space-x-3 py-3 px-4 rounded-lg transition-all duration-300 text-gray-600 hover-gradient font-medium">
                <i class="fas fa-book-open text-sm"></i>
                <span>Course Saya</span>
            </a>
            
        @elseif(auth()->user()->role === 'student')
            <a href="{{ url('/student/courses') }}" 
               class="w-full flex items-center space-x-3 py-3 px-4 rounded-lg transition-all duration-300 text-gray-600 hover-gradient font-medium">
                <i class="fas fa-book-open text-sm"></i>
                <span>Course Saya</span>
            </a>
        @endif

    @endif
    <hr class="my-4 border-pink-200/60">

    <a href="{{ route('profile.edit') }}" 
       class="w-full flex items-center space-x-3 py-3 px-4 rounded-lg transition-all duration-300 text-gray-600 hover-gradient font-medium">
        <i class="fas fa-user-cog text-sm"></i>
        <span>Pengaturan Profil</span>
    </a>
</div>

<style>
    .sidebar-container .hover-gradient:hover {
        background: linear-gradient(to right, #ec4899, #d946ef, #a855f7) !important;
        color: #ffffff !important;
        box-shadow: 0 10px 20px -5px rgba(217, 70, 239, 0.4);
        transform: translateY(-1px);
    }
    
    .sidebar-container .hover-gradient:hover i {
        color: #ffffff !important;
    }
</style>
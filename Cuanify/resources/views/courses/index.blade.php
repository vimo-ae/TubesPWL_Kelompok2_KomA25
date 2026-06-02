<x-app-layout>

<div class="min-h-screen w-full bg-[#f7eef7] -mx-4 sm:-mx-6 lg:-mx-8 -mt-6 p-6">
    <div class="max-w-7xl mx-auto">

        <div class="flex justify-between items-center mb-8">
            <div>
                @if(auth()->check() && auth()->user()->role === 'instructor')
                    <h1 class="text-3xl font-extrabold text-gray-800">
                        Katalog Seluruh Course
                    </h1>
                    <p class="text-gray-500 mt-1 text-sm">
                        Eksplorasi dan lihat referensi course yang tersedia di platform
                    </p>
                @else
                    <h1 class="text-3xl font-extrabold text-gray-800">
                        Rekomendasi Kursus untuk Kamu
                    </h1>
                    <p class="text-gray-500 mt-1 text-sm">
                        Temukan course terbaik untuk meningkatkan skill kamu
                    </p>
                @endif
            </div>

            @auth
                @if(auth()->user()->role === 'instructor')
                    <a href="{{ route('instructor.courses.index') }}"
                       class="text-sm font-bold text-purple-600 hover:text-purple-800 transition">
                        Kelola Course Saya →
                    </a>
                @elseif(auth()->user()->role === 'student')
                    <a href="{{ route('my-courses.index') }}"
                       class="text-sm font-bold text-purple-600 hover:text-purple-800 transition">
                        Lihat My Courses →
                    </a>
                @endif
            @endauth
        </div>

        <div class="mb-6">
        <details class="relative inline-block">
        
            <summary class="cursor-pointer list-none px-5 py-3 bg-white rounded-xl shadow-sm border border-gray-200 font-medium text-gray-700 hover:bg-gray-50">
                {{ request('category')
                    ? $categories->firstWhere('category_id', request('category'))->category_name
                    : 'Semua Kategori' }}
                ▼
            </summary>
        
            <div class="absolute mt-2 w-64 bg-white rounded-xl shadow-lg border z-50">
            
                <a href="{{ route('courses.index') }}"
                   class="block px-4 py-3 hover:bg-purple-50">
                    Semua Kategori
                </a>
            
                @foreach($categories as $category)
                    <a href="{{ route('courses.index', ['category' => $category->category_id]) }}"
                       class="block px-4 py-3 hover:bg-purple-50">
                        {{ $category->category_name }}
                    </a>
                @endforeach
                
            </div>
        
        </details>
    </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach($courses as $course)

            @php
            $banner = match($course->category_id) {
                1 => 'images/courses/literasi-keuangan.jpg',
                2 => 'images/courses/umkm-kewirausahaan.jpg',
                3 => 'images/courses/digital-marketing.jpg',
                4 => 'images/courses/pengembangan-diri.jpg',
                5 => 'images/courses/ekonomi-berkelanjutan.jpg',
                default => 'images/courses/default-course.jpg',
            };
            @endphp

                <a href="{{ route('courses.show', $course->course_id) }}"
                   class="group bg-white dark:bg-gray-800 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-xl transition duration-300 block">

                    <div class="h-40 overflow-hidden relative">
                        <img
                            src="{{ asset($banner) }}"
                            alt="{{ $course->title }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-500"
                        >

                        <span class="absolute top-3 left-3 bg-white/90 px-3 py-1 rounded-full text-[10px] font-bold text-purple-700 capitalize shadow-sm">
                            {{ $course->difficulty_level }}
                        </span>
                    </div>

                    <div class="p-5">

                        <h3 class="font-bold text-gray-800 dark:text-gray-200 text-base line-clamp-2 mb-1">
                            {{ $course->title }}
                        </h3>

                        <p class="text-xs text-gray-500 mb-3 font-medium">
                            {{ $course->category->category_name ?? 'No Category' }}
                        </p>

                        <div class="flex justify-between items-center text-xs mb-4">

                            <span class="text-gray-500 font-medium bg-gray-50 px-2 py-1 rounded-md">
                                📚 {{ $course->difficulty_level }}
                            </span>
                        
                            <span class="text-gray-500 font-medium bg-gray-50 px-2 py-1 rounded-md">
                                ⏱ {{ $course->estimated_duration }} jam
                            </span>
                        
                        </div>

                        @auth
                            @if(auth()->user()->role === 'student')
                                @if(auth()->user()->courses->contains('course_id', $course->course_id))
                                    <p class="text-green-600 text-xs font-bold mb-3 flex items-center gap-1">
                                        <i class="fas fa-check-circle"></i> Sudah Enroll
                                    </p>
                                @else
                                    <p class="text-indigo-600 text-xs font-bold mb-3 flex items-center gap-1">
                                        <i class="fas fa-bookmark"></i> Belum Enroll
                                    </p>
                                @endif
                            @endif
                        @endauth

                        <div class="text-center text-sm font-bold text-purple-600 group-hover:text-purple-800 transition mt-2">
                            Lihat Course →
                        </div>

                    </div>
                </a>

            @endforeach

        </div>

    </div>
</div>

<style>
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>

</x-app-layout>
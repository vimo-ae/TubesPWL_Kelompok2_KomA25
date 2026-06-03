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

            <div class="flex gap-2 flex-wrap mb-6">
                <a href="{{ route('courses.index') }}"
                class="px-4 py-2 rounded-lg bg-gray-300 text-gray-800 font-medium">
                    Semua
                </a>

                @foreach($categories as $category)
                    <a href="{{ route('courses.index', ['category' => $category->category_id]) }}"
                    class="px-4 py-2 rounded-lg bg-indigo-500 hover:bg-indigo-600 transition text-white font-medium">
                        {{ $category->category_name }}
                    </a>
                @endforeach
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach($courses as $course)
    @php
        $requiredLevel = $course->getRequiredLevel(); 
        $userLevel = (auth()->check() && auth()->user()->role === 'student') ? (auth()->user()->profile->level ?? 1) : 0;
        $isLocked = (auth()->check() && auth()->user()->role === 'student' && $userLevel < $requiredLevel);
        
        // Cek apakah student sudah enroll course ini
        $isEnrolled = (auth()->check() && auth()->user()->role === 'student') ? in_array($course->course_id, $enrolledCourseIds) : false;
    @endphp

    <a href="{{ $isLocked ? '#' : route('courses.show', $course->course_id) }}" class="group bg-white dark:bg-gray-800 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-xl transition duration-300 block relative {{ $isLocked ? 'opacity-80' : '' }}">

        <div class="h-40 overflow-hidden relative">
            @if($isLocked)
                <div class="absolute inset-0 bg-black/40 z-10 flex flex-col items-center justify-center text-white backdrop-blur-sm">
                    <i class="fas fa-lock text-2xl mb-2"></i>
                    <span class="text-[10px] font-bold uppercase">Butuh Level {{ $requiredLevel }}</span>
                </div>
            @endif

            @if($course->thumbnail)
                <img src="{{ asset('storage/' . $course->thumbnail) }}"
                    class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
            @else
                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=400"
                    class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
            @endif

            {{-- Badge Level (Kiri Atas) --}}
            <span class="absolute top-3 left-3 bg-white/90 px-3 py-1 rounded-full text-[10px] font-bold text-purple-700 capitalize shadow-sm">
                {{ $course->difficulty_level }}
            </span>

            {{-- Badge Sudah Enroll (Kanan Atas) --}}
            @if($isEnrolled)
                <span class="absolute top-3 right-3 bg-green-500/95 text-white px-3 py-1 rounded-full text-[10px] font-bold shadow-sm backdrop-blur-md border border-green-400">
                    ✅ Diikuti
                </span>
            @endif
        </div>

        <div class="p-5">
            <h3 class="font-bold text-gray-800 dark:text-gray-200 text-base line-clamp-2 mb-1">
                {{ $course->title }}
            </h3>
            
            {{-- Teks Link Bawah Berubah Sesuai Status --}}
            <div class="text-center text-sm font-bold transition mt-2 {{ $isEnrolled ? 'text-green-600 dark:text-green-400' : 'text-purple-600' }}">
                @if($isLocked)
                    Terkunci 🔒
                @elseif($isEnrolled)
                    Lanjut Belajar 🚀
                @else
                    Lihat Course →
                @endif
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
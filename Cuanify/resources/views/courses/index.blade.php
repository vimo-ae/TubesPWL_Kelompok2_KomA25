<x-app-layout>
    @section('title', 'Courses - Cuanify')

    <div class="min-h-screen w-full -mx-4 sm:-mx-6 lg:-mx-8 -mt-6 p-6">
        <div class="max-w-7xl mx-auto">

            {{-- Header Section --}}
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

            {{-- Filter Kategori (Dropdown UI) --}}
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
                           class="block px-4 py-3 hover:bg-purple-50 {{ !request('category') ? 'bg-purple-50 font-semibold text-purple-700' : '' }}">
                            Semua Kategori
                        </a>
                    
                        @foreach($categories as $category)
                            <a href="{{ route('courses.index', ['category' => $category->category_id]) }}"
                               class="block px-4 py-3 hover:bg-purple-50 {{ request('category') == $category->category_id ? 'bg-purple-50 font-semibold text-purple-700' : '' }}">
                                {{ $category->category_name }}
                            </a>
                        @endforeach
                    </div>
                
                </details>
            </div>

            {{-- Grid Cards Course --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach($courses as $course)
                    
                    @php
                        // --- Logika Leveling & Enrollment ---
                        $requiredLevel = method_exists($course, 'getRequiredLevel') ? $course->getRequiredLevel() : 1; 
                        $userLevel = (auth()->check() && auth()->user()->role === 'student') ? (auth()->user()->profile->level ?? 1) : 0;
                        $isLocked = (auth()->check() && auth()->user()->role === 'student' && $userLevel < $requiredLevel);
                        
                        $enrolledIds = isset($enrolledCourseIds) ? $enrolledCourseIds : (auth()->check() ? auth()->user()->courses->pluck('course_id')->toArray() : []);
                        $isEnrolled = (auth()->check() && auth()->user()->role === 'student') ? in_array($course->course_id, $enrolledIds) : false;

                        // --- Logika Fallback Banner Image ---
                        $defaultBanner = match($course->category_id) {
                            1 => 'images/courses/literasi-keuangan.jpg',
                            2 => 'images/courses/umkm-kewirausahaan.jpg',
                            3 => 'images/courses/digital-marketing.jpg',
                            4 => 'images/courses/pengembangan-diri.jpg',
                            5 => 'images/courses/ekonomi-berkelanjutan.jpg',
                            default => null,
                        };

                        if ($course->thumbnail) {
                            $imageSrc = asset('storage/' . $course->thumbnail);
                        } elseif ($defaultBanner && file_exists(public_path($defaultBanner))) {
                            $imageSrc = asset($defaultBanner);
                        } else {
                            $imageSrc = 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=400';
                        }
                    @endphp

                    <a href="{{ $isLocked ? '#' : route('courses.show', $course->course_id) }}"
                       class="group bg-white dark:bg-gray-800 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-xl transition duration-300 block relative flex flex-col justify-between {{ $isLocked ? 'opacity-80' : '' }}">
                        
                        <div>
                            {{-- Image Container (Menggunakan h-32 ringkas sesuai request) --}}
                            <div class="h-32 overflow-hidden relative">
                                {{-- Overlay Blur Layar Terkunci jika level mahasiswa kurang --}}
                                @if($isLocked)
                                    <div class="absolute inset-0 bg-black/40 z-20 flex flex-col items-center justify-center text-white backdrop-blur-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mb-1 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                        <span class="text-[10px] font-bold uppercase tracking-wider">Butuh Level {{ $requiredLevel }}</span>
                                    </div>
                                @endif

                                <img src="{{ $imageSrc }}"
                                     alt="{{ $course->title }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                
                                {{-- Badge Tingkat Kesulitan --}}
                                <span class="absolute top-3 left-3 flex items-center gap-1 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-[10px] font-bold text-purple-700 capitalize shadow-sm z-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.483 9.246 5 7.5 5S4.168 5.483 3 6.253v13C4.168 18.483 5.754 18 7.5 18s3.332.483 4.5 1.253m0-13C13.168 5.483 14.754 5 16.5 5S19.832 5.483 21 6.253v13C19.832 18.483 18.246 18 16.5 18s-3.332.483-4.5 1.253"/>
                                    </svg>
                                    {{ $course->difficulty_level }}
                                </span>

                                {{-- Badge Durasi --}}
                                <span class="absolute bottom-3 right-3 flex items-center gap-1 bg-white/90 backdrop-blur-sm px-2 py-1 rounded-full text-[10px] font-semibold text-gray-700 shadow-sm z-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <circle cx="12" cy="12" r="9" stroke-width="2"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7v5l3 3"/>
                                    </svg>
                                    {{ $course->estimated_duration }} jam
                                </span>
                            </div>
                            
                            {{-- Card Body --}}
                            <div class="p-5 flex flex-col h-40">
                                
                                <h3 class="font-bold text-gray-800 dark:text-gray-200 text-base line-clamp-2 mb-1">
                                    {{ $course->title }}
                                </h3>
                                
                                <p class="text-xs text-gray-500 mb-3 font-medium">
                                    {{ $course->category->category_name ?? 'No Category' }}
                                </p>
                                
                                {{-- Baris Kaki di dalam Badan Kartu (Rating & Status Pendaftaran) --}}
                                <div class="flex justify-between items-center text-xs mt-auto">
                                    
                                    {{-- Rating --}}
                                    <span class="flex items-center gap-1 text-yellow-500 font-bold bg-yellow-50 px-2 py-1 rounded-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.719c-.783-.57-.38-1.81.588-1.81H7.03a1 1 0 00.95-.69l1.07-3.292z"/>
                                        </svg>
                                        4.8
                                    </span>
                                    
                                    {{-- Status Enroll Terintegrasi (Menyatu di Badan Kartu) --}}
                                    @auth
                                        @if(auth()->user()->role === 'student')
                                            @if($isLocked)
                                                <span class="flex items-center gap-1 text-red-600 font-semibold bg-red-50 px-2 py-1 rounded-md">
                                                    Terkunci 🔒
                                                </span>
                                            @elseif($isEnrolled)
                                                <span class="flex items-center gap-1 text-green-600 font-semibold bg-green-50 px-2 py-1 rounded-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                                    </svg>
                                                    Sudah Enroll
                                                </span>
                                            @else
                                                <span class="flex items-center gap-1 text-indigo-600 font-semibold bg-indigo-50 px-2 py-1 rounded-md">
                                                    Belum Enroll
                                                </span>
                                            @endif
                                        @endif
                                    @endauth
                                    
                                </div>
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
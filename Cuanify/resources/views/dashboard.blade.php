<x-app-layout>

    @section('title', 'Dashboard - Cuanify')

    <div class="min-h-screen w-full transition-all duration-300 -mx-4 sm:-mx-6 lg:-mx-8 -mt-6 p-4 sm:p-6 lg:p-8">

        <div class="py-6 max-w-7xl mx-auto space-y-10 w-full">

            {{-- Alert Error --}}
            @if(session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-800 p-5 rounded-2xl shadow-sm flex items-start gap-4 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-7 h-7 text-red-500 mt-0.5 flex-shrink-0"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 9v2m0 4h.01M10.29 3.86l-7.5 13A1 1 0 003.66 18h16.68a1 1 0 00.87-1.5l-7.5-13a1 1 0 00-1.74 0z"/>
                    </svg>
                    <div>
                        <h3 class="font-bold text-lg mb-1">Perhatian!</h3>
                        <p class="text-sm opacity-90 leading-relaxed">{!! session('error') !!}</p>
                    </div>
                </div>
            @endif

            {{-- Header Hero --}}
            <div class="relative overflow-hidden rounded-[35px] bg-gradient-to-br from-fuchsia-600 via-purple-600 to-indigo-700 shadow-2xl min-h-[240px] flex items-center">
                <div class="absolute top-[-50px] right-[-50px] w-80 h-80 bg-white/10 blur-[80px] rounded-full"></div>
                <div class="relative z-10 w-full flex flex-col md:flex-row items-center justify-between px-10 md:px-16 py-8">
                    <div class="w-full md:w-2/3 text-white">
                        <div class="inline-block bg-white/20 backdrop-blur-md px-3 py-1 rounded-full text-[10px] font-bold tracking-widest uppercase mb-4 border border-white/30">
                            Welcome Back
                        </div>
                        <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight mb-3">
                            Selamat datang, <span class="text-yellow-300">{{ Auth::user()->username }}!</span>
                        </h1>
                        <p class="text-purple-100 text-sm max-w-lg leading-relaxed opacity-90">
                            Memahami ekonomi itu investasi berharga. Terus konsisten, jadikan ide sebagai peluang <span class="text-yellow-300 font-bold italic">cuan!</span>
                        </p>
                        <div class="flex flex-wrap gap-4 mt-6">
                            <a href="{{ route('courses.index') }}" class="border border-white hover:bg-white hover:text-indigo-600 px-6 py-3 rounded-xl font-semibold transition duration-300 inline-block">
                                Jelajahi Kursus
                            </a>
                        </div>
                    </div>
                    <div class="hidden md:flex flex-col items-center justify-center opacity-20 select-none">
                        <span class="text-[90px] rotate-12 drop-shadow-2xl">💰</span>
                    </div>
                </div>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                <div class="bg-gradient-to-br from-purple-600 to-indigo-700 rounded-3xl p-5 text-white shadow-xl flex flex-col justify-between transition-all duration-300 hover:scale-[1.02]">
                    <div>
                        <p class="text-[10px] font-bold tracking-widest uppercase text-purple-200 mb-1">Level Kamu</p>
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-2xl font-extrabold">Level {{ $level }}</h3>
                            <span class="bg-yellow-400 text-indigo-900 text-[10px] font-black px-3 py-1 rounded-full uppercase tracking-wider">
                                {{ $profile->level_title }}
                            </span>
                        </div>
                    </div>

                    <div class="mt-2">
                        <div class="flex justify-between text-[10px] text-purple-200 mb-1">
                            <span>Progress Level</span>
                            <span>500 XP</span>
                        </div>

                        <div class="w-full bg-white/20 rounded-full h-5 relative overflow-hidden">
                            <div class="bg-yellow-400 h-full rounded-full flex items-center justify-end pr-2 transition-all duration-500" 
                                style="width: {{ $xpPercentage }}%">

                                <span class="text-[10px] font-black text-indigo-900 truncate">
                                    {{ $xp % 500 }} XP
                                </span>
                            </div>
                        </div>

                        <p class="text-[10px] text-purple-200 mt-1">{{ 500 - ($xp % 500) }} XP lagi ke Level {{ $level + 1 }}</p>
                    </div>
                </div>

                {{-- Progress Belajar (Versi Compact + Link Profil) --}}
        <div class="bg-white dark:bg-gray-800 rounded-3xl p-5 shadow-sm border border-gray-100 dark:border-gray-700 flex flex-col justify-between gap-4">

            <div class="flex justify-between items-center gap-2">
                <h3 class="font-extrabold text-gray-800 dark:text-gray-200 text-sm whitespace-nowrap truncate">
                    <i class="fas fa-chart-pie text-purple-500 mr-1"></i> Progress
                </h3>
                <span class="text-[10px] font-bold tracking-wide text-purple-600 bg-purple-50 dark:bg-purple-900/30 dark:text-purple-400 px-2 py-1 rounded-lg whitespace-nowrap flex-shrink-0">
                    Semangat!
                </span>
            </div>
        
            <div class="flex items-center gap-4">

                <div class="relative w-16 h-16 flex-shrink-0">
                    <svg class="w-16 h-16 -rotate-90" viewBox="0 0 80 80">
                        <circle cx="40" cy="40" r="32" fill="none" stroke="#f3f4f6" stroke-width="8" class="dark:stroke-gray-700"/>
                        <circle cx="40" cy="40" r="32" fill="none" stroke="#a855f7" stroke-width="8"
                            stroke-dasharray="201.06" 
                            stroke-dashoffset="{{ 201.06 - (201.06 * $progressPercentage / 100) }}" 
                            stroke-linecap="round"
                            class="transition-all duration-1000 ease-out"/>
                    </svg>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span class="text-sm font-black text-gray-800 dark:text-gray-200 leading-none">
                            {{ number_format($progressPercentage, 0) }}%
                        </span>
                    </div>
                </div>
            
                <div class="flex-1 w-full min-w-0">

                    <div class="w-full">
                        <div class="flex justify-between items-end text-[11px] font-bold text-gray-600 dark:text-gray-400 mb-1.5">
                            <span class="whitespace-nowrap truncate flex-1">
                                <i class="fas fa-book-open text-fuchsia-500 mr-1"></i> Materi
                            </span>
                            <span class="whitespace-nowrap flex-shrink-0 ml-2">
                                {{ $completedLessons }} <span class="text-gray-400 font-normal">/ {{ $totalLessons }}</span>
                            </span>
                        </div>
                        <div class="w-full bg-gray-100 dark:bg-gray-700 h-2 rounded-full overflow-hidden">
                            <div class="bg-gradient-to-r from-purple-500 to-fuchsia-500 h-full rounded-full transition-all duration-1000" 
                                style="width: {{ $totalLessons > 0 ? ($completedLessons / $totalLessons) * 100 : 0 }}%">
                            </div>
                        </div>
                    </div>
                
                    @if(isset($kuisSelesai) && isset($totalKuis))
                    <div class="w-full mt-3">
                        <div class="flex justify-between items-end text-[11px] font-bold text-gray-600 dark:text-gray-400 mb-1.5">
                            <span class="whitespace-nowrap truncate flex-1">
                                <i class="fas fa-tasks text-pink-500 mr-1"></i> Kuis
                            </span>
                            <span class="whitespace-nowrap flex-shrink-0 ml-2">
                                {{ $kuisSelesai }} <span class="text-gray-400 font-normal">/ {{ $totalKuis }}</span>
                            </span>
                        </div>
                        <div class="w-full bg-gray-100 dark:bg-gray-700 h-2 rounded-full overflow-hidden">
                            <div class="bg-gradient-to-r from-pink-500 to-rose-500 h-full rounded-full transition-all duration-1000" 
                                style="width: {{ $totalKuis > 0 ? ($kuisSelesai / $totalKuis) * 100 : 0 }}%">
                            </div>
                        </div>
                    </div>
                    @endif
                
                </div>
            </div>

            <div class="mt-1 pt-3 border-t border-gray-100 dark:border-gray-700 flex justify-end">
                <a href="{{ url('/profile') }}" class="text-[11px] font-bold text-purple-600 dark:text-purple-400 hover:text-purple-800 hover:underline transition-all flex items-center gap-1.5">
                    Lihat Detail Progress <i class="fas fa-arrow-right text-[9px]"></i>
                </a>
            </div>
        
        </div>
                @php
                    $badgeClass = match(true) {
                        $profile->streak_days >= 90 => 'bg-purple-100 text-purple-600',
                        $profile->streak_days >= 30 => 'bg-yellow-100 text-yellow-600',
                        $profile->streak_days >= 14 => 'bg-blue-100 text-blue-600',
                        $profile->streak_days >= 7  => 'bg-green-100 text-green-600',
                        default => 'bg-orange-100 text-orange-600'
                    };
                @endphp

                <div class="bg-white dark:bg-gray-800 rounded-3xl p-5 shadow-sm border border-gray-100 dark:border-gray-700 flex flex-col justify-between">
                    <div class="flex flex-col items-center justify-center text-center h-full">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-10 h-10 text-orange-500 mb-2"
                             fill="currentColor"
                             viewBox="0 0 24 24">
                            <path d="M13.5 2s1 3-1 5c-2 2-4 3-4 7a5.5 5.5 0 0011 0c0-5-4-6-6-12z"/>
                        </svg>
                    
                        <span class="text-3xl font-extrabold text-orange-500">
                            {{ $profile->streak_days ?? 0 }}
                        </span>
                    
                        <span class="text-xs font-semibold text-gray-700 dark:text-gray-300">
                            Hari Berturut-turut
                        </span>

                        <span class="mt-2 px-3 py-1 rounded-full text-[10px] font-bold {{ $badgeClass }}">
                            @php
                                $streakTitle = match(true) {
                                    ($profile->streak_days ?? 0) >= 90 => 'Legendary',
                                    ($profile->streak_days ?? 0) >= 30 => 'Master',
                                    ($profile->streak_days ?? 0) >= 14 => 'Advanced',
                                    ($profile->streak_days ?? 0) >= 7  => 'Consistent',
                                    default => 'Beginner',
                                };
                            @endphp
                            
                            {{ $streakTitle }}
                        </span>
                    
                        <p class="text-[10px] text-gray-500 mt-2 max-w-[180px]">
                            @if($profile->streak_days > 0)
                                Pertahankan konsistensimu untuk mendapatkan XP dan level lebih cepat.
                            @else
                                Mulai belajar hari ini untuk membangun streak pertamamu.
                            @endif
                        </p>
                        
                    </div>

                </div>

                <div class="bg-white dark:bg-gray-800 rounded-3xl p-5 shadow-sm border border-gray-100 dark:border-gray-700 flex flex-col justify-between">
    <div>
        <div class="flex justify-between items-center mb-2">
            <h3 class="font-extrabold text-gray-800 dark:text-gray-200 text-sm">Pencapaian</h3>
        </div>
        
        <div class="space-y-1.5 max-h-[80px] overflow-y-auto no-scrollbar">
            @forelse($recentAchievements->reverse() as $ach)
                <div class="flex items-center justify-between text-[10px] bg-gray-50 dark:bg-gray-700/50 p-1 rounded-xl">
                    <span class="flex items-center gap-1 truncate pr-1 text-gray-700 dark:text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-3 h-3 text-purple-500 flex-shrink-0"
                             fill="currentColor"
                             viewBox="0 0 20 20">
                            <path d="M10 2a8 8 0 108 8h-2a6 6 0 11-6-6V2z"/>
                            <circle cx="10" cy="10" r="2"/>
                        </svg>
                        {{ $ach->lesson->title }}
                    </span>
                    <span class="font-extrabold text-purple-600 flex-shrink-0">+{{ $ach->xp_earned }} XP</span>
                </div>
            @empty
                <p class="text-[10px] text-gray-400">Belum ada data.</p>
            @endforelse
        </div>
    </div>

    <div class="mt-1 pt-3 border-t border-gray-100 dark:border-gray-700 flex justify-end">
        <a href="{{ url('/profile') }}" class="text-[11px] font-bold text-purple-600 dark:text-purple-400 hover:text-purple-800 hover:underline transition-all flex items-center gap-1.5">
            Lihat Detail Progress <i class="fas fa-arrow-right text-[9px]"></i>
        </a>
    </div>
</div>
            </div>

            <div>
    <h2 class="text-xl font-extrabold text-gray-900 dark:text-white mb-4">Kategori Populer</h2>
    <div class="flex overflow-x-auto gap-4 pb-4 no-scrollbar">
        
        <a href="{{ url('/courses?category=1') }}" 
           class="flex-none w-48 bg-purple-50/60 p-5 rounded-2xl border border-purple-100 flex flex-col items-center text-center shadow-sm hover:shadow-md hover:border-purple-200 transition-all cursor-pointer">
            <span class="text-3xl mb-2">
                <svg class="w-8 h-8 text-purple-600 mb-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M21 18v1c0 1.1-.9 2-2 2H5c-1.11 0-2-.9-2-2V5c0-1.1.89-2 2-2h14c1.1 0 2 .9 2 2v1h-9c-1.11 0-2 .9-2 2v8c0 1.1.89 2 2 2h9zm-9-2h10V8H12v8zm4-2.5c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/>
                </svg>
            </span>
            <p class="font-bold text-gray-800 text-xs">Literasi Keuangan</p>
        </a>

        <a href="{{ url('/courses?category=2') }}" 
           class="flex-none w-48 bg-purple-50/60 p-5 rounded-2xl border border-purple-100 flex flex-col items-center text-center shadow-sm hover:shadow-md hover:border-purple-200 transition-all cursor-pointer">
            <span class="text-3xl mb-2">
                <svg class="w-8 h-8 text-purple-600 mb-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M10 4h4v2h5a2 2 0 012 2v11a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h5V4zm-5 6v11h14V10H5z"/>
                </svg>
            </span>
            <p class="font-bold text-gray-800 text-xs">UMKM & Kewirausahaan</p>
        </a>

        <a href="{{ url('/courses?category=3') }}" 
           class="flex-none w-48 bg-purple-50/60 p-5 rounded-2xl border border-purple-100 flex flex-col items-center text-center shadow-sm hover:shadow-md hover:border-purple-200 transition-all cursor-pointer">
            <span class="text-3xl mb-2">
                <svg class="w-8 h-8 text-purple-600 mb-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M3 3h2v18h16v2H3V3zm6 12h2v6H9v-6zm4-8h2v14h-2V7zm4-4h2v18h-2V3z"/>
                </svg>
            </span>
            <p class="font-bold text-gray-800 text-xs">Digital Marketing</p>
        </a>

        <a href="{{ url('/courses?category=4') }}" 
           class="flex-none w-48 bg-purple-50/60 p-5 rounded-2xl border border-purple-100 flex flex-col items-center text-center shadow-sm hover:shadow-md hover:border-purple-200 transition-all cursor-pointer">
            <span class="text-3xl mb-2">
                <svg class="w-8 h-8 text-purple-600 mb-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2.5a14.72 14.72 0 00-4.3 9.47c.56-.23 1.17-.37 1.8-.4a8.21 8.21 0 014.5 1.34 14.73 14.73 0 00-2-10.41zm-4 13c0 .8.2 1.5.5 2.2l-2.7 2.7c-.4.4-.4 1 0 1.4s1 .4 1.4 0l2.7-2.7c.7.3 1.4.5 2.2.5h1v-4H8v.1zM16 15.5h-1v4c.8 0 1.5-.2 2.2-.5l2.7 2.7c.4.4 1 .4 1.4 0s.4-1 0-1.4l-2.7-2.7c.3-.7.5-1.4.5-2.2v-.1h-3z"/>
                </svg>
            </span>
            <p class="font-bold text-gray-800 text-xs">Karier & Pengembangan Diri</p>
        </a>

        <a href="{{ url('/courses?category=5') }}" 
           class="flex-none w-48 bg-purple-50/60 p-5 rounded-2xl border border-purple-100 flex flex-col items-center text-center shadow-sm hover:shadow-md hover:border-purple-200 transition-all cursor-pointer">
            <span class="text-3xl mb-2">
                <svg class="w-8 h-8 text-purple-600 mb-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17 8C14.24 8 12.01 9.94 11.19 12.5C11.67 12.18 12.3 12 13 12C15.21 12 17 13.79 17 16C17 16.7 16.82 17.33 16.5 17.81C19.06 16.99 21 14.76 21 12C21 9.79 19.21 8 17 8ZM4 15C4 18.87 7.13 22 11 22C14.87 22 18 18.87 18 15C18 11.13 14.87 8 11 8C7.13 8 4 11.13 4 15Z"/>
                </svg>
            </span>
            <p class="font-bold text-gray-800 text-xs">Ekonomi Berkelanjutan</p>
        </a>

    </div>
</div>

            <div class="mb-6">
            
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-extrabold text-gray-900 dark:text-white">
                        Rekomendasi Kursus untuk Kamu
                    </h2>
                
                    <a href="{{ route('courses.index') }}"
                       class="text-purple-600 dark:text-purple-400 font-bold hover:text-purple-800 hover:underline">
                        Lihat Semua
                    </a>
                </div>
            
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                
                    @forelse($recommendedCourses as $category)

                        @php
                            $course = $category->courses->first();

                            $defaultBanner = match($course->category_id) {
                                1 => asset('images/courses/literasi-keuangan.jpg'),
                                2 => asset('images/courses/umkm-kewirausahaan.jpg'),
                                3 => asset('images/courses/digital-marketing.jpg'),
                                4 => asset('images/courses/pengembangan-diri.jpg'),
                                5 => asset('images/courses/ekonomi-berkelanjutan.jpg'),
                                default => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=400',
                            };

                            $imageSrc = $course->thumbnail
                                ? asset('storage/'.$course->thumbnail)
                                : $defaultBanner;
                            @endphp

                        <a href="{{ route('courses.show', $course->course_id) }}"
                           class="group bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition duration-300 block">
                        
                            {{-- Thumbnail --}}
                            <div class="h-32 overflow-hidden relative">
                            
                                <img 
                                    src="{{ $imageSrc }}" 
                                    alt="{{ $course->title }}" 
                                    class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            
                                <span class="absolute top-3 left-3 flex items-center gap-1 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-[10px] font-bold text-purple-700 shadow-sm">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="w-3 h-3"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M12 6.253v13m0-13C10.832 5.483 9.246 5 7.5 5S4.168 5.483 3 6.253v13C4.168 18.483 5.754 18 7.5 18s3.332.483 4.5 1.253m0-13C13.168 5.483 14.754 5 16.5 5S19.832 5.483 21 6.253v13C19.832 18.483 18.246 18 16.5 18s-3.332.483-4.5 1.253"/>
                                    </svg>
                                
                                    {{ $course->difficulty_level }}
                                </span>
                            
                                <span class="absolute bottom-3 right-3 flex items-center gap-1 bg-white/90 backdrop-blur-sm px-2 py-1 rounded-full text-[10px] font-semibold text-gray-700 shadow-sm">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="w-3 h-3"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor">

                                        <circle cx="12" cy="12" r="9" stroke-width="2"/>
                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M12 7v5l3 3"/>
                                    </svg>
                                
                                    {{ $course->estimated_duration }} jam
                                </span>
                            
                            </div>
                        
                            {{-- Body --}}
                            <div class="p-5 flex flex-col h-40">
                            
                                <h3 class="font-bold text-gray-800 text-base line-clamp-2 mb-1">
                                    {{ $course->title }}
                                </h3>
                            
                                <p class="text-xs text-gray-500 mb-3 font-medium">
                                    {{ $category->category_name }}
                                </p>
                            
                                <div class="flex justify-between items-center text-xs mt-auto">
                                
                                    <span class="flex items-center gap-1 text-yellow-500 font-bold bg-yellow-50 px-2 py-1 rounded-md">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-4 h-4"
                                             fill="currentColor"
                                             viewBox="0 0 20 20">

                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.719c-.783-.57-.38-1.81.588-1.81H7.03a1 1 0 00.95-.69l1.07-3.292z"/>
                                        </svg>
                                    
                                        4.8
                                    </span>
                                
                                    <span class="flex items-center gap-1 text-purple-600 font-semibold bg-purple-50 px-2 py-1 rounded-md">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-4 h-4"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  stroke-width="2"
                                                  d="M12 6.253v13m0-13C10.832 5.483 9.246 5 7.5 5S4.168 5.483 3 6.253v13C4.168 18.483 5.754 18 7.5 18s3.332.483 4.5 1.253m0-13C13.168 5.483 14.754 5 16.5 5s3.332.483 4.5 1.253v13C19.832 18.483 18.246 18 16.5 18s-3.332.483-4.5 1.253"/>
                                        </svg>
                                    
                                        {{ $course->lessons->count() }} Lesson
                                    </span>
                                
                                </div>
                            
                            </div>
                        
                        </a>
                    
                    @empty
                    
                        <div class="col-span-3 text-center py-8 text-gray-500">
                            Belum ada rekomendasi kursus untuk saat ini.
                        </div>
                    
                    @endforelse
                    
                </div>
            
            </div>
    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
    </style>
</x-app-layout>
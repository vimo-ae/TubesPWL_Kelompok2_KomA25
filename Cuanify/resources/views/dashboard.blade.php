<x-app-layout>
    <div class="min-h-screen w-full transition-all duration-300 -mx-4 sm:-mx-6 lg:-mx-8 -mt-6 p-4 sm:p-6 lg:p-8">

        <div class="py-6 max-w-7xl mx-auto space-y-10 w-full">

            {{-- Alert Error --}}
            @if(session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-800 p-5 rounded-2xl shadow-sm flex items-start gap-4 transition-all">
                    <span class="text-2xl mt-0.5">🚨</span>
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

                {{-- Progress Belajar --}}
                <div class="bg-white dark:bg-gray-800 rounded-3xl p-5 shadow-sm border border-gray-100 dark:border-gray-700 flex flex-col justify-between">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="font-extrabold text-gray-800 dark:text-gray-200 text-sm">Progress Belajar</h3>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="relative w-16 h-16 flex-shrink-0">
                            <svg class="w-16 h-16 -rotate-90" viewBox="0 0 80 80">
                                <circle cx="40" cy="40" r="32" fill="none" stroke="#e5e7eb" stroke-width="8"/>
                                <circle cx="40" cy="40" r="32" fill="none" stroke="#a855f7" stroke-width="8"
                                    stroke-dasharray="201.06" 
                                    stroke-dashoffset="{{ 201.06 - (201.06 * $progressPercentage / 100) }}" 
                                    stroke-linecap="round"/>
                            </svg>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <span class="text-sm font-extrabold text-gray-800 dark:text-gray-200">{{ number_format($progressPercentage, 0) }}%</span>
                            </div>
                        </div>
                        <div class="text-[11px] text-gray-600 dark:text-gray-400 flex-1">
                            <div>✅ Selesai: <strong>{{ $completedLessons }} / {{ $totalLessons }}</strong></div>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-3xl p-5 shadow-sm border border-gray-100 dark:border-gray-700 flex flex-col justify-between">
                    <div class="flex justify-between items-center mb-1">
                        <h3 class="font-extrabold text-gray-800 dark:text-gray-200 text-sm flex items-center gap-2">
                            {{ $profile->streak_days > 0 ? '🔥 Streak Belajar' : '💤 Streak Belajar' }}
                        </h3>
        
                        <span class="font-extrabold text-sm {{ $profile->streak_days > 0 ? 'text-orange-500' : 'text-gray-400' }}">
                            {{ $profile->streak_days ?? 0 }} hari
                        </span>
                    </div>

                <div class="text-[11px] text-gray-500 mt-2">
                    @if($profile->streak_days > 0)
                        Kamu sudah rajin belajar selama <strong>{{ $profile->streak_days }} hari</strong> berturut-turut! Pertahankan! 🚀
                    @else
                        Belum ada streak nih. Ayo mulai belajar hari ini buat bangun streak kamu! 📚
                    @endif
                </div>
            </div>

                <div class="bg-white dark:bg-gray-800 rounded-3xl p-5 shadow-sm border border-gray-100 dark:border-gray-700 flex flex-col justify-between">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="font-extrabold text-gray-800 dark:text-gray-200 text-sm">Pencapaian</h3>
                    </div>
                    <div class="space-y-1.5 max-h-[80px] overflow-y-auto no-scrollbar">
                        @forelse($recentAchievements as $ach)
                            <div class="flex items-center justify-between text-[10px] bg-gray-50 dark:bg-gray-700/50 p-1 rounded-xl">
                                <span class="truncate pr-1 text-gray-700 dark:text-gray-300">🎯 {{ $ach->lesson->title }}</span>
                                <span class="font-extrabold text-purple-600 flex-shrink-0">+{{ $ach->xp_earned }} XP</span>
                            </div>
                        @empty
                            <p class="text-[10px] text-gray-400">Belum ada data.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <div>
                <h2 class="text-xl font-extrabold text-gray-900 dark:text-white mb-4">Kategori Populer</h2>
                <div class="flex overflow-x-auto gap-4 pb-4 no-scrollbar">
                    <div class="flex-none w-48 bg-purple-50/60 p-5 rounded-2xl border border-purple-100 flex flex-col items-center text-center shadow-sm">
                        <span class="text-3xl mb-2">💼</span>
                        <p class="font-bold text-gray-800 text-xs">Kewirausahaan</p>
                    </div>
                    <div class="flex-none w-48 bg-purple-50/60 p-5 rounded-2xl border border-purple-100 flex flex-col items-center text-center shadow-sm">
                        <span class="text-3xl mb-2">📈</span>
                        <p class="font-bold text-gray-800 text-xs">Marketing</p>
                    </div>
                    </div>
            </div>

            <div class="mb-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-extrabold text-gray-900 dark:text-white">Rekomendasi Kursus untuk Kamu</h2>
        <a href="{{ route('courses.index') }}" class="text-purple-600 dark:text-purple-400 font-bold hover:text-purple-800 hover:underline">Lihat Semua</a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($recommendedCourses as $category)
            @php $course = $category->courses->first(); @endphp
            
            <a href="{{ route('courses.show', $course->course_id) }}" class="group bg-white dark:bg-gray-800 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-xl transition duration-300">
                <div class="h-40 relative overflow-hidden">
                    <img src="{{ $course->thumbnail ? asset('storage/' . $course->thumbnail) : 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=400' }}" 
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    <span class="absolute top-2 left-2 bg-white/90 px-2 py-0.5 rounded-full text-[9px] font-bold text-purple-700 shadow-sm">
                        {{ $category->category_name }}
                    </span>
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-800 dark:text-gray-200 text-sm leading-tight mb-1 line-clamp-2">
                        {{ $course->title }}
                    </h3>
                    <p class="text-xs text-gray-400 mb-2 line-clamp-1">{{ $course->description }}</p>
                    <div class="flex justify-between items-center text-xs">
                        <span class="text-purple-600 font-bold">📚 {{ $course->lessons->count() }} Lesson</span>
                    </div>
                </div>
            </a>
        @empty
            <div class="col-span-3 bg-white rounded-3xl shadow-sm border border-gray-100 p-8 text-center text-gray-500 italic">
                Belum ada kursus yang tersedia saat ini.
            </div>
        @endforelse
    </div>
</div>

        </div>
    </div>

    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
    </style>
</x-app-layout>
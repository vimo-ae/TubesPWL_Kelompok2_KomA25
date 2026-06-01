<x-app-layout>
    <div class="min-h-screen w-full transition-all duration-300 -mx-4 sm:-mx-6 lg:-mx-8 -mt-6 p-4 sm:p-6 lg:p-8">

        <div class="py-6 max-w-7xl mx-auto space-y-10 w-full">

            <div class="relative overflow-hidden rounded-[35px] bg-gradient-to-br from-fuchsia-600 via-purple-600 to-indigo-700 shadow-2xl min-h-[240px] flex items-center">
                <div class="absolute top-[-50px] right-[-50px] w-80 h-80 bg-white/10 blur-[80px] rounded-full"></div>
                <div class="absolute bottom-[-20px] right-[10%] w-40 h-40 border-[20px] border-white/5 rounded-full"></div>
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
                            <h3 class="text-2xl font-extrabold">Level 12</h3>
                            <span class="bg-yellow-400 text-indigo-900 text-[10px] font-black px-3 py-1 rounded-full">🏅 Expert</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-[10px] text-purple-200 mb-1">
                            <span>1,240 XP</span>
                            <span>2,000 XP</span>
                        </div>
                        <div class="w-full bg-white/20 rounded-full h-2">
                            <div class="bg-yellow-400 h-2 rounded-full" style="width: 62%"></div>
                        </div>
                        <p class="text-[10px] text-purple-200 mt-1">760 XP lagi ke Level 13</p>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-3xl p-5 shadow-sm border border-gray-100 dark:border-gray-700 flex flex-col justify-between transition-all duration-300 hover:scale-[1.02]">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="font-extrabold text-gray-800 dark:text-gray-200 text-sm">Progress Belajar</h3>
                        <a href="#" class="text-purple-600 text-[10px] font-bold hover:underline">Lihat Detail</a>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="relative w-16 h-16 flex-shrink-0">
                            <svg class="w-16 h-16 -rotate-90" viewBox="0 0 80 80">
                                <circle cx="40" cy="40" r="32" fill="none" stroke="#e5e7eb" stroke-width="8"/>
                                <circle cx="40" cy="40" r="32" fill="none" stroke="#a855f7" stroke-width="8"
                                    stroke-dasharray="201.06" stroke-dashoffset="56" stroke-linecap="round"/>
                            </svg>
                            <div class="absolute inset-0 flex flex-col items-center justify-center">
                                <span class="text-sm font-extrabold text-gray-800 dark:text-gray-200">72%</span>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-x-3 gap-y-1 text-[11px] text-gray-600 dark:text-gray-400 flex-1">
                            <div>📖 Diikuti: <strong>5</strong></div>
                            <div>✅ Selesai: <strong>3</strong></div>
                            <div>¼ Materi: <strong>28/40</strong></div>
                            <div>🎯 Kuis: <strong>18/25</strong></div>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-3xl p-5 shadow-sm border border-gray-100 dark:border-gray-700 flex flex-col justify-between transition-all duration-300 hover:scale-[1.02]">
                    <div class="flex justify-between items-center mb-1">
                        <h3 class="font-extrabold text-gray-800 dark:text-gray-200 text-sm">🔥 Streak Belajar</h3>
                        <span class="text-orange-500 font-extrabold text-sm">12 hari</span>
                    </div>
                    <div class="grid grid-cols-7 gap-1 mt-2">
                        @php
                            $days = ['Sen','Sel','Rab','Kam','Jum','Sab','Min'];
                            $done = [true, true, true, true, true, false, false];
                        @endphp
                        @foreach($days as $i => $day)
                        <div class="flex flex-col items-center gap-0.5">
                            <div class="w-6 h-6 rounded-lg flex items-center justify-center text-[9px] font-bold
                                {{ $done[$i] ? 'bg-purple-100 text-purple-700 dark:bg-purple-950/50 dark:text-purple-400' : 'bg-gray-100 text-gray-400 dark:bg-gray-700' }}">
                                {{ $done[$i] ? '✓' : '' }}
                            </div>
                            <span class="text-[8px] text-gray-400">{{ $day }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-3xl p-4 shadow-sm border border-gray-100 dark:border-gray-700 flex flex-col justify-between transition-all duration-300 hover:scale-[1.02]">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="font-extrabold text-gray-800 dark:text-gray-200 text-sm">Pencapaian Terbaru</h3>
                        <a href="#" class="text-purple-600 text-[10px] font-bold hover:underline">Semua</a>
                    </div>
                    <div class="space-y-1.5 overflow-y-auto max-h-[80px] no-scrollbar">
                        <div class="flex items-center justify-between text-[10px] bg-gray-50 dark:bg-gray-700/50 p-1 rounded-xl">
                            <span class="truncate pr-1 text-gray-700 dark:text-gray-300">🏆 Kuis Master</span>
                            <span class="font-extrabold text-purple-600 flex-shrink-0">+200 XP</span>
                        </div>
                        <div class="flex items-center justify-between text-[10px] bg-gray-50 dark:bg-gray-700/50 p-1 rounded-xl">
                            <span class="truncate pr-1 text-gray-700 dark:text-gray-300">🔥 Rajin Belajar</span>
                            <span class="font-extrabold text-purple-600 flex-shrink-0">+150 XP</span>
                        </div>
                    </div>
                </div>

            </div>

            <div>
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-extrabold text-gray-900 dark:text-white">Kategori Populer</h2>
                </div>
                <div class="flex overflow-x-auto gap-4 pb-4 no-scrollbar">
                    <div class="flex-none w-48 bg-purple-50/60 dark:bg-gray-800 p-5 rounded-2xl border border-purple-100 dark:border-gray-700 flex flex-col items-center text-center shadow-sm hover:bg-purple-600 hover:text-white transition duration-300 group">
                        <span class="text-3xl mb-2">💼</span>
                        <p class="font-bold text-gray-800 text-xs dark:text-gray-200 group-hover:text-white">Kewirausahaan</p>
                        <p class="text-[10px] text-gray-400 group-hover:text-purple-200 mt-1">18 Kursus</p>
                    </div>
                    <div class="flex-none w-48 bg-purple-50/60 dark:bg-gray-800 p-5 rounded-2xl border border-purple-100 dark:border-gray-700 flex flex-col items-center text-center shadow-sm hover:bg-purple-600 hover:text-white transition duration-300 group">
                        <span class="text-3xl mb-2">📈</span>
                        <p class="font-bold text-gray-800 text-xs dark:text-gray-200 group-hover:text-white">Marketing</p>
                        <p class="text-[10px] text-gray-400 group-hover:text-purple-200 mt-1">14 Kursus</p>
                    </div>
                    <div class="flex-none w-48 bg-purple-50/60 dark:bg-gray-800 p-5 rounded-2xl border border-purple-100 dark:border-gray-700 flex flex-col items-center text-center shadow-sm hover:bg-purple-600 hover:text-white transition duration-300 group">
                        <span class="text-3xl mb-2">💰</span>
                        <p class="font-bold text-gray-800 text-xs dark:text-gray-200 group-hover:text-white">Keuangan</p>
                        <p class="text-[10px] text-gray-400 group-hover:text-purple-200 mt-1">12 Kursus</p>
                    </div>
                    <div class="flex-none w-48 bg-purple-50/60 dark:bg-gray-800 p-5 rounded-2xl border border-purple-100 dark:border-gray-700 flex flex-col items-center text-center shadow-sm hover:bg-purple-600 hover:text-white transition duration-300 group">
                        <span class="text-3xl mb-2">👥</span>
                        <p class="font-bold text-gray-800 text-xs dark:text-gray-200 group-hover:text-white">Manajemen</p>
                        <p class="text-[10px] text-gray-400 group-hover:text-purple-200 mt-1">9 Kursus</p>
                    </div>
                    <div class="flex-none w-48 bg-purple-50/60 dark:bg-gray-800 p-5 rounded-2xl border border-purple-100 dark:border-gray-700 flex flex-col items-center text-center shadow-sm hover:bg-purple-600 hover:text-white transition duration-300 group">
                        <span class="text-3xl mb-2">💡</span>
                        <p class="font-bold text-gray-800 text-xs dark:text-gray-200 group-hover:text-white">Self Dev</p>
                        <p class="text-[10px] text-gray-400 group-hover:text-purple-200 mt-1">8 Kursus</p>
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-extrabold text-gray-900 dark:text-white">Rekomendasi Kursus untuk Kamu</h2>
                    <a href="#" class="text-purple-600 dark:text-purple-400 font-bold hover:text-purple-800 hover:underline">Lihat Semua</a>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                    <div class="group bg-white dark:bg-gray-800 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-xl transition duration-300">
                        <div class="h-40 relative overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1557804506-669a67965ba0?w=400" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            <span class="absolute top-2 left-2 bg-white/90 px-2 py-0.5 rounded-full text-[9px] font-bold text-purple-700 shadow-sm">Beginner</span>
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-800 dark:text-gray-200 text-sm leading-tight mb-1 line-clamp-2">Strategi Marketing Digital</h3>
                            <p class="text-xs text-gray-400 mb-2">by Aleesha Basyira</p>
                            <div class="flex justify-between items-center text-xs">
                                <span class="text-yellow-500 font-bold">⭐ 4.8</span>
                                <span class="text-gray-400">2.1k siswa</span>
                            </div>
                        </div>
                    </div>

                    <div class="group bg-white dark:bg-gray-800 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-xl transition duration-300">
                        <div class="h-40 relative overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?w=400" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            <span class="absolute top-2 left-2 bg-white/90 px-2 py-0.5 rounded-full text-[9px] font-bold text-purple-700 shadow-sm">Beginner</span>
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-800 dark:text-gray-200 text-sm stroke-none leading-tight mb-1 line-clamp-2">Branding Bisnis Kecil</h3>
                            <p class="text-xs text-gray-400 mb-2">by Davina Valerie</p>
                            <div class="flex justify-between items-center text-xs">
                                <span class="text-yellow-500 font-bold">⭐ 4.9</span>
                                <span class="text-gray-400">2.3k siswa</span>
                            </div>
                        </div>
                    </div>

                    <div class="group bg-white dark:bg-gray-800 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-xl transition duration-300">
                        <div class="h-40 relative overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=400" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            <span class="absolute top-2 left-2 bg-white/90 px-2 py-0.5 rounded-full text-[9px] font-bold text-fuchsia-700 shadow-sm">Intermediate</span>
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-800 dark:text-gray-200 text-sm leading-tight mb-1 line-clamp-2">Keuangan UMKM</h3>
                            <p class="text-xs text-gray-400 mb-2">by Vincent Tamimi</p>
                            <div class="flex justify-between items-center text-xs">
                                <span class="text-yellow-500 font-bold">⭐ 4.9</span>
                                <span class="text-gray-400">2.3k siswa</span>
                            </div>
                        </div>
                    </div>

                    <div class="group bg-white dark:bg-gray-800 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-xl transition duration-300">
                        <div class="h-40 relative overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=400" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            <span class="absolute top-2 left-2 bg-white/90 px-2 py-0.5 rounded-full text-[9px] font-bold text-purple-700 shadow-sm">Beginner</span>
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-800 dark:text-gray-200 text-sm leading-tight mb-1 line-clamp-2">Mindset Wirausaha</h3>
                            <p class="text-xs text-gray-400 mb-2">by Azzam Baskara</p>
                            <div class="flex justify-between items-center text-xs">
                                <span class="text-yellow-500 font-bold">⭐ 4.6</span>
                                <span class="text-gray-400">1.5k siswa</span>
                            </div>
                        </div>
                    </div>

                    <div class="group bg-white dark:bg-gray-800 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-xl transition duration-300">
                        <div class="h-40 relative">
                            <img src="https://images.unsplash.com/photo-1512428559087-560fa5ceab42?w=400" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            <span class="absolute top-2 left-2 bg-white/90 px-2 py-0.5 rounded-full text-[9px] font-bold text-indigo-700 shadow-sm">Advanced</span>
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-800 dark:text-gray-200 text-sm leading-tight mb-1">Ekspansi Pasar Global</h3>
                            <p class="text-xs text-gray-400 mb-2">by Rayyan Fernando</p>
                            <div class="flex justify-between items-center text-xs">
                                <span class="text-yellow-500 font-bold">⭐ 5.0</span>
                                <span class="text-gray-400">900 siswa</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

        aside a:hover, 
        nav a:hover,
        aside button:hover,
        nav button:hover,
        [class*="sidebar-menu-"]:hover {
            background: linear-gradient(to right, #ec4899, #d946ef, #a855f7) !important;
            color: #ffffff !important;
            box-shadow: 0 10px 15px -3px rgba(168, 85, 247, 0.4);
            transform: translateY(-1px);
            transition: all 0.3s ease;
        }
    </style>
</x-app-layout>
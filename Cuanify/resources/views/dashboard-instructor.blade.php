<x-app-layout>
    <div class="min-h-screen w-full transition-all duration-300 -mx-4 sm:-mx-6 lg:-mx-8 -mt-6 p-4 sm:p-6 lg:p-8">
        <div class="py-6 max-w-7xl mx-auto space-y-8 w-full">

            {{-- Header Hero --}}
            <div class="relative overflow-hidden rounded-[35px] bg-gradient-to-br from-indigo-700 via-purple-700 to-fuchsia-700 shadow-xl min-h-[200px] flex items-center">
                <div class="absolute top-[-50px] right-[-50px] w-80 h-80 bg-white/10 blur-[80px] rounded-full"></div>
                <div class="relative z-10 w-full flex flex-col md:flex-row items-center justify-between px-10 md:px-12 py-8">
                    <div class="w-full md:w-2/3 text-white">
                        <div class="inline-block bg-white/20 backdrop-blur-md px-3 py-1 rounded-full text-[10px] font-bold tracking-widest uppercase mb-4 border border-white/30">
                            Instructor Panel
                        </div>
                        <h1 class="text-3xl font-extrabold tracking-tight mb-2">
                            Halo Instruktur, <span class="text-yellow-300">{{ Auth::user()->username }}!</span>
                        </h1>
                        <p class="text-purple-100 text-sm max-w-lg leading-relaxed opacity-90">
                            Waktunya berbagi ilmu dan ciptakan *impact*! Pantau performa kursusmu dan lihat seberapa banyak siswa yang telah kamu bantu hari ini.
                        </p>
                        <div class="mt-6">
                            <a href="{{ route('instructor.courses.index') }}" class="bg-yellow-400 text-indigo-900 hover:bg-yellow-300 px-6 py-3 rounded-xl font-bold transition duration-300 inline-block shadow-md">
                                + Buat Kursus Baru
                            </a>
                        </div>
                    </div>
                    <div class="hidden md:flex flex-col items-center justify-center opacity-30 select-none">
                        <span class="text-[80px] rotate-12 drop-shadow-2xl">👨‍🏫</span>
                    </div>
                </div>
            </div>

            {{-- Stats Grid (Metrik Instruktur) --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-gray-800 rounded-3xl p-6 shadow-sm border border-gray-100 dark:border-gray-700 flex items-center gap-5 transition hover:shadow-md">
                    <div class="w-14 h-14 rounded-2xl bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center text-2xl">
                        📚
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Kursus Dibuat</p>
                        <h3 class="text-3xl font-black text-gray-800 dark:text-white">{{ $totalCourses }}</h3>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-3xl p-6 shadow-sm border border-gray-100 dark:border-gray-700 flex items-center gap-5 transition hover:shadow-md">
    <div class="w-14 h-14 rounded-2xl bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center text-2xl">
        👥
    </div>
    <div>
        <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Total Siswa Aktif</p>
        <h3 class="text-3xl font-black text-gray-800 dark:text-white">{{ $totalStudents }}</h3>
    </div>
</div>

<div class="bg-white dark:bg-gray-800 rounded-3xl p-6 shadow-sm border border-gray-100 dark:border-gray-700 flex items-center gap-5 transition hover:shadow-md">
    <div class="w-14 h-14 rounded-2xl bg-yellow-100 dark:bg-yellow-900/30 flex items-center justify-center text-2xl">
        ⭐
    </div>
    <div>
        <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Rata-rata Rating</p>
        <h3 class="text-3xl font-black text-gray-800 dark:text-white">{{ $averageRating }} <span class="text-sm font-medium text-gray-400">/ 5.0</span></h3>
    </div>
</div>
            </div>

            {{-- Kursus Terbaru Saya --}}
            <div class="mt-8">
                <div class="flex justify-between items-center mb-5">
                    <h2 class="text-xl font-extrabold text-gray-900 dark:text-white">Kursus Terakhir Dibuat</h2>
                    <a href="{{ route('instructor.courses.index') }}" class="text-purple-600 font-bold hover:underline text-sm">Kelola Semua Kursus →</a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                    @forelse($recentCourses as $course)
                        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-lg transition flex flex-col">
                            <div class="h-32 bg-gray-200 relative">
                                @if($course->thumbnail)
                                    <img src="{{ asset('storage/' . $course->thumbnail) }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-gradient-to-r from-indigo-400 to-purple-400"></div>
                                @endif
                                <span class="absolute top-2 left-2 bg-white/90 px-2 py-0.5 rounded-full text-[9px] font-bold text-purple-700 shadow-sm capitalize">
                                    {{ $course->difficulty_level }}
                                </span>
                            </div>
                            <div class="p-4 flex-1 flex flex-col justify-between">
                                <div>
                                    <h3 class="font-bold text-gray-800 dark:text-gray-200 text-sm line-clamp-2 mb-2">{{ $course->title }}</h3>
                                    <div class="text-[10px] text-gray-500 flex justify-between items-center mb-3">
                                        <span>⏱ {{ $course->estimated_duration }} jam</span>
                                    </div>
                                </div>
                                <a href="{{ route('instructor.courses.show', $course->course_id) }}" class="block text-center w-full bg-purple-50 text-purple-700 hover:bg-purple-600 hover:text-white transition py-2 rounded-lg text-xs font-bold">
                                    Edit Kursus
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-4 bg-white dark:bg-gray-800 rounded-2xl p-8 text-center border border-dashed border-gray-300">
                            <p class="text-gray-500 mb-3">Kamu belum membuat kursus apapun.</p>
                            <a href="#" class="text-purple-600 font-bold hover:underline">Mulai buat kursus pertamamu sekarang!</a>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
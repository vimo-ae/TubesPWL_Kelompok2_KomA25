<x-app-layout>
    <div class="min-h-screen w-full transition-all duration-300 -mx-4 sm:-mx-6 lg:-mx-8 -mt-6 p-4 sm:p-6 lg:p-8">
        <div class="py-6 max-w-7xl mx-auto space-y-8 w-full">

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
                            Waktunya berbagi ilmu dan ciptakan impact! Pantau performa kursusmu dan lihat seberapa banyak siswa yang telah kamu bantu hari ini.
                        </p>
                        <div class="mt-6">
                            <a href="{{ route('instructor.courses.create') }}" class="bg-yellow-400 text-indigo-900 hover:bg-yellow-300 px-6 py-3 rounded-xl font-bold transition duration-300 inline-block shadow-md">
                                + Buat Kursus Baru
                            </a>
                        </div>
                    </div>
                    <div class="hidden md:flex flex-col items-center justify-center opacity-30 select-none">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-24 h-24 text-white rotate-12 drop-shadow-2xl"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="1.5"
                                  d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422A12.083 12.083 0 0112 20.055a12.083 12.083 0 01-6.16-9.477L12 14z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="group bg-white dark:bg-gray-800 rounded-3xl p-6 shadow-sm border border-gray-100 dark:border-gray-700 flex items-center gap-5 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                    <div class="w-14 h-14 rounded-2xl bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center text-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-7 h-7 text-purple-600"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M12 6.253v13m0-13C10.832 5.483 9.246 5 7.5 5S4.168 5.483 3 6.253v13C4.168 18.483 5.754 18 7.5 18s3.332.483 4.5 1.253m0-13C13.168 5.483 14.754 5 16.5 5s3.332.483 4.5 1.253v13C19.832 18.483 18.246 18 16.5 18s-3.332.483-4.5 1.253"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Kursus Dibuat</p>
                        <h3 class="text-3xl font-black text-gray-800 dark:text-white">{{ $totalCourses }}</h3>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-3xl p-6 shadow-sm border border-gray-100 dark:border-gray-700 flex items-center gap-5 transition hover:shadow-md">
                    <div class="w-14 h-14 rounded-2xl bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center text-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-7 h-7 text-purple-600"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">
                                            
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M12 6.253v13m0-13C10.832 5.483 9.246 5 7.5 5S4.168 5.483 3 6.253v13C4.168 18.483 5.754 18 7.5 18s3.332.483 4.5 1.253m0-13C13.168 5.483 14.754 5 16.5 5s3.332.483 4.5 1.253v13C19.832 18.483 18.246 18 16.5 18s-3.332.483-4.5 1.253"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Total Siswa Aktif</p>
                        <h3 class="text-3xl font-black text-gray-800 dark:text-white">{{ $totalStudents }}</h3>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-3xl p-6 shadow-sm border border-gray-100 dark:border-gray-700 flex items-center gap-5 transition hover:shadow-md">
                    <div class="w-14 h-14 rounded-2xl bg-yellow-100 dark:bg-yellow-900/30 flex items-center justify-center text-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-7 h-7 text-yellow-500"
                             fill="currentColor"
                             viewBox="0 0 20 20">

                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.719c-.783-.57-.38-1.81.588-1.81H7.03a1 1 0 00.95-.69l1.07-3.292z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Rata-rata Rating</p>
                        <h3 class="text-3xl font-black text-gray-800 dark:text-white">{{ number_format($averageRating, 1) }} <span class="text-sm font-medium text-gray-400">/ 5.0</span></h3>
                    </div>
                </div>
            </div>

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
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="w-4 h-4 inline-block mr-1"
                                                 fill="none"
                                                 viewBox="0 0 24 24"
                                                 stroke="currentColor">

                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>{{ $course->estimated_duration }} jam
                                        </span>
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
                            <a href="{{ route('instructor.courses.create') }}" class="text-purple-600 font-bold hover:underline">Mulai buat kursus pertamamu sekarang!</a>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
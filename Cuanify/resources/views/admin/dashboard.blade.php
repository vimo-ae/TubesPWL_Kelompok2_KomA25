<x-app-layout>

    @section('title', 'Admin Dashboard - Cuanify')

    <div class="flex min-h-screen">

        <div class="flex-1 p-0 sm:p-2">
            
            <div class="relative overflow-hidden rounded-[35px] bg-gradient-to-r from-[#b55fe6] via-[#df49a6] to-[#e84393] shadow-md min-h-[200px] flex items-center w-full mb-8">
                <div class="absolute right-0 top-0 bottom-0 w-1/2 overflow-hidden pointer-events-none">
                    <div class="hidden sm:block absolute w-64 h-64 bg-white/10 rounded-full -right-10 -top-16 blur-sm"></div>
                    <div class="hidden sm:block absolute w-40 h-40 bg-white/5 rounded-full right-16 -bottom-12 blur-sm"></div>
                </div>
                <div class="relative z-10 w-full flex flex-col justify-center px-5 sm:px-8 lg:px-10 py-6 sm:py-8 text-white">
                    <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md px-4 py-1.5 rounded-full text-[10px] font-bold tracking-wider uppercase mb-4 border border-white/20 w-fit">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h-2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                        </svg>
                        ADMIN DASHBOARD
                    </div>
                    <h1 class="text-2xl sm:text-3xl  font-semibold tracking-normal mb-3 text-white">
                        Selamat datang di <span class="text-[#f7e06d] font-bold">Cuanify</span>
                    </h1>
                    <p class="text-white/90 text-[13px] max-w-4xl font-normal leading-relaxed">
                        Kelola platform belajar mengajar dengan mudah dan efisien.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                
                <div class="bg-white rounded-3xl p-6 shadow-sm border border-purple-50 text-center flex flex-col items-center justify-center relative overflow-hidden transition hover:shadow-md">
                    <div class="absolute top-0 right-0 w-2 h-full bg-purple-500 rounded-r-3xl"></div>
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-2">Total Student</p>
                    <div class="flex flex-col sm:flex-row items-center gap-2 sm:gap-3 mb-2">
                        <div class="w-14 h-14 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center text-lg p-2">
                            <svg class="w-full h-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <h3 class="text-3xl font-black text-gray-800">{{ $totalStudents }}</h3>
                    </div>
                    <span class="text-[10px] font-bold text-purple-600 bg-purple-50 px-3 py-1 rounded-full">Aktif</span>
                </div>

                <div class="bg-white rounded-3xl p-6 shadow-sm border border-purple-50 text-center flex flex-col items-center justify-center relative overflow-hidden transition hover:shadow-md">
                    <div class="absolute top-0 right-0 w-2 h-full bg-pink-400 rounded-r-3xl"></div>
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-2">Total Instructor</p>
                    <div class="flex flex-col sm:flex-row items-center gap-2 sm:gap-3 mb-2">
                        <div class="w-14 h-14 rounded-xl bg-pink-50 text-pink-500 flex items-center justify-center text-lg p-2">
                            <svg class="w-full h-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-3xl font-black text-gray-800">{{ $totalInstructors }}</h3>
                    </div>
                    <span class="text-[10px] font-bold text-pink-500 bg-pink-50 px-3 py-1 rounded-full">Terdaftar</span>
                </div>

                <div class="bg-white rounded-3xl p-6 shadow-sm border border-purple-50 text-center flex flex-col items-center justify-center relative overflow-hidden transition hover:shadow-md">
                    <div class="absolute top-0 right-0 w-2 h-full bg-teal-400 rounded-r-3xl"></div>
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-2">Total Course</p>
                    <div class="flex flex-col sm:flex-row items-center gap-2 sm:gap-3 mb-2">
                        <div class="w-14 h-14 rounded-xl bg-teal-50 text-teal-500 flex items-center justify-center text-lg p-2">
                            <svg class="w-full h-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.168.477 4 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h3 class="text-3xl font-black text-gray-800">{{ $totalCourses }}</h3>
                    </div>
                    <span class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-3 py-1 rounded-full">Tersedia</span>
                </div>

                <div class="bg-white rounded-3xl p-6 shadow-sm border border-amber-100 text-center flex flex-col items-center justify-center relative overflow-hidden transition hover:shadow-md">
                    <div class="absolute top-0 right-0 w-2 h-full bg-amber-400 rounded-r-3xl"></div>
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-2">Pending Verifikasi</p>
                    <div class="flex flex-col sm:flex-row items-center gap-2 sm:gap-3 mb-2">
                        <div class="w-14 h-14 rounded-xl bg-amber-50 text-amber-500 flex items-center justify-center text-lg p-2">
                            <svg class="w-full h-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-3xl font-black text-gray-800">{{ $pendingInstructors + $pendingCourses }}</h3>
                    </div>
                    <span class="text-[10px] font-bold text-amber-600 bg-amber-50 px-3 py-1 rounded-full">Perlu Tindakan</span>
                </div>

            </div>

            <div class="bg-white rounded-3xl p-8 shadow-sm border border-purple-50">
                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3 mb-6">
                    <div>
                        <h2 class="text-xl font-extrabold text-gray-800">Tugas Menunggu Anda</h2>
                        <p class="text-sm text-gray-500">Item yang memerlukan perhatian segera</p>
                    </div>
                    @if(($pendingInstructors + $pendingCourses) > 0)
                        <div class="bg-fuchsia-600 text-white w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm shadow-md">
                            {{ $pendingInstructors + $pendingCourses }}
                        </div>
                    @endif
                </div>

                <div class="space-y-4">
                    @if($pendingInstructors > 0)
                        <a href="{{ route('admin.instructors') }}" class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 p-5 bg-amber-50/50 rounded-2xl border border-amber-100 hover:bg-amber-100/50 transition cursor-pointer group">
                            <div class="flex items-center justify-between sm:justify-start gap-4 w-full sm:w-auto">
                                <div class="w-3 h-3 bg-amber-500 rounded-full shadow-sm"></div>
                                <div>
                                    <h4 class="font-bold text-gray-800">Instruktur menunggu verifikasi</h4>
                                    <p class="text-xs text-gray-500 mt-0.5">Tinjau dan setujui akun instruktur baru</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between sm:justify-start gap-4 w-full sm:w-auto">
                                <span class="bg-amber-500 text-white text-xs font-bold px-3 py-1 rounded-lg">{{ $pendingInstructors }}</span>
                                <i class="fas fa-arrow-right text-amber-400 group-hover:text-amber-600 transition"></i>
                            </div>
                        </a>
                    @else
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 p-5 bg-emerald-50/50 rounded-2xl border border-emerald-100">
                            <div class="flex items-center justify-between sm:justify-start gap-4 w-full sm:w-auto">
                                <div class="w-3 h-3 bg-emerald-500 rounded-full shadow-sm"></div>
                                <div>
                                    <h4 class="font-bold text-gray-800">Semua instruktur sudah ditinjau</h4>
                                    <p class="text-xs text-gray-500 mt-0.5">Tidak ada pendaftaran instruktur baru</p>
                                </div>
                            </div>
                            <i class="fas fa-check text-emerald-500 text-xl"></i>
                        </div>
                    @endif

                    @if($pendingCourses > 0)
                        <a href="{{ route('admin.courses') }}" class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 p-5 bg-amber-50/50 rounded-2xl border border-amber-100 hover:bg-amber-100/50 transition cursor-pointer group">
                            <div class="flex items-center justify-between sm:justify-start gap-4 w-full sm:w-auto">
                                <div class="w-3 h-3 bg-amber-500 rounded-full shadow-sm"></div>
                                <div>
                                    <h4 class="font-bold text-gray-800">Course menunggu verifikasi</h4>
                                    <p class="text-xs text-gray-500 mt-0.5">Tinjau dan setujui materi materi pembelajaran baru</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between sm:justify-start gap-4 w-full sm:w-auto">
                                <span class="bg-amber-500 text-white text-xs font-bold px-3 py-1 rounded-lg">{{ $pendingCourses }}</span>
                                <i class="fas fa-arrow-right text-amber-400 group-hover:text-amber-600 transition"></i>
                            </div>
                        </a>
                    @else
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 p-5 bg-emerald-50/50 rounded-2xl border border-emerald-100">
                            <div class="flex items-center justify-between sm:justify-start gap-4 w-full sm:w-auto">
                                <div class="w-3 h-3 bg-emerald-500 rounded-full shadow-sm"></div>
                                <div>
                                    <h4 class="font-bold text-gray-800">Semua course sudah ditinjau</h4>
                                    <p class="text-xs text-gray-500 mt-0.5">Tidak ada kursus yang menunggu review</p>
                                </div>
                            </div>
                            <i class="fas fa-check text-emerald-500 text-xl"></i>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
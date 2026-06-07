<x-app-layout>
    <div class="flex min-h-screen -mx-4 sm:-mx-6 lg:-mx-8">
        {{-- Sidebar Admin --}}
        @include('admin.partials.sidebar')
        

        {{-- Main Content Area --}}
        <div class="flex-1 p-6 lg:p-10">
            
            {{-- Welcome Hero Banner --}}
            <div class="relative overflow-hidden rounded-[30px] bg-gradient-to-r from-[#b55fe6] via-[#df49a6] to-[#e84393] shadow-md min-h-[190px] flex items-center w-full mb-8">
                <div class="absolute right-0 top-0 bottom-0 w-1/2 overflow-hidden pointer-events-none">
                    <div class="absolute w-64 h-64 bg-white/10 rounded-full -right-10 -top-16 blur-sm"></div>
                    <div class="absolute w-40 h-40 bg-white/5 rounded-full right-16 -bottom-12 blur-sm"></div>
                </div>
                <div class="relative z-10 w-full flex flex-col justify-center px-10 py-8 text-white">
                    <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md px-4 py-1.5 rounded-full text-[10px] font-bold tracking-wider uppercase mb-4 border border-white/20 w-fit">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                        </svg>
                        ADMIN DASHBOARD
                    </div>
                    <h1 class="text-3xl font-semibold tracking-normal mb-3 text-white">
                        Selamat datang di <span class="text-[#f7e06d] font-bold">Cuanify</span>
                    </h1>
                    <p class="text-white/90 text-[13px] max-w-4xl font-normal leading-relaxed">
                        Kelola platform belajar mengajar dengan mudah dan efisien.
                    </p>
                </div>
            </div>

            {{-- Stats Grid Card --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                
                {{-- Total Student --}}
                <div class="bg-white rounded-3xl p-6 shadow-sm border border-purple-50 text-center flex flex-col items-center justify-center relative overflow-hidden transition hover:shadow-md">
                    <div class="absolute top-0 right-0 w-2 h-full bg-purple-500 rounded-r-3xl"></div>
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-2">Total Student</p>
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center text-lg">
                            <i class="fas fa-user"></i>
                        </div>
                        <h3 class="text-3xl font-black text-gray-800">{{ $totalStudents }}</h3>
                    </div>
                    <span class="text-[10px] font-bold text-purple-600 bg-purple-50 px-3 py-1 rounded-full">Aktif</span>
                </div>

                <div class="bg-white rounded-3xl p-6 shadow-sm border border-purple-50 text-center flex flex-col items-center justify-center relative overflow-hidden transition hover:shadow-md">
                    <div class="absolute top-0 right-0 w-2 h-full bg-pink-400 rounded-r-3xl"></div>
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-2">Total Instructor</p>
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 rounded-xl bg-pink-50 text-pink-500 flex items-center justify-center text-lg">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <h3 class="text-3xl font-black text-gray-800">{{ $totalInstructors }}</h3>
                    </div>
                    <span class="text-[10px] font-bold text-pink-500 bg-pink-50 px-3 py-1 rounded-full">Terdaftar</span>
                </div>

                <div class="bg-white rounded-3xl p-6 shadow-sm border border-purple-50 text-center flex flex-col items-center justify-center relative overflow-hidden transition hover:shadow-md">
                    <div class="absolute top-0 right-0 w-2 h-full bg-teal-400 rounded-r-3xl"></div>
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-2">Total Course</p>
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 rounded-xl bg-teal-50 text-teal-500 flex items-center justify-center text-lg">
                            <i class="fas fa-book"></i>
                        </div>
                        <h3 class="text-3xl font-black text-gray-800">{{ $totalCourses }}</h3>
                    </div>
                    <span class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-3 py-1 rounded-full">Tersedia</span>
                </div>

                <div class="bg-white rounded-3xl p-6 shadow-sm border border-amber-100 text-center flex flex-col items-center justify-center relative overflow-hidden transition hover:shadow-md">
                    <div class="absolute top-0 right-0 w-2 h-full bg-amber-400 rounded-r-3xl"></div>
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-2">Pending Verifikasi</p>
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-500 flex items-center justify-center text-lg">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h3 class="text-3xl font-black text-gray-800">{{ $pendingInstructors + $pendingCourses }}</h3>
                    </div>
                    <span class="text-[10px] font-bold text-amber-600 bg-amber-50 px-3 py-1 rounded-full">Perlu Tindakan</span>
                </div>

            </div>

            {{-- Action Tasks Section --}}
            <div class="bg-white rounded-3xl p-8 shadow-sm border border-purple-50">
                <div class="flex justify-between items-center mb-6">
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
                    {{-- Verification: Instructors --}}
                    @if($pendingInstructors > 0)
                        <a href="{{ route('admin.instructors') }}" class="flex items-center justify-between p-5 bg-amber-50/50 rounded-2xl border border-amber-100 hover:bg-amber-100/50 transition cursor-pointer group">
                            <div class="flex items-center gap-4">
                                <div class="w-3 h-3 bg-amber-500 rounded-full shadow-sm"></div>
                                <div>
                                    <h4 class="font-bold text-gray-800">Instruktur menunggu verifikasi</h4>
                                    <p class="text-xs text-gray-500 mt-0.5">Tinjau dan setujui akun instruktur baru</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <span class="bg-amber-500 text-white text-xs font-bold px-3 py-1 rounded-lg">{{ $pendingInstructors }}</span>
                                <i class="fas fa-arrow-right text-amber-400 group-hover:text-amber-600 transition"></i>
                            </div>
                        </a>
                    @else
                        <div class="flex items-center justify-between p-5 bg-emerald-50/50 rounded-2xl border border-emerald-100">
                            <div class="flex items-center gap-4">
                                <div class="w-3 h-3 bg-emerald-500 rounded-full shadow-sm"></div>
                                <div>
                                    <h4 class="font-bold text-gray-800">Semua instruktur sudah ditinjau</h4>
                                    <p class="text-xs text-gray-500 mt-0.5">Tidak ada pendaftaran instruktur baru</p>
                                </div>
                            </div>
                            <i class="fas fa-check text-emerald-500 text-xl"></i>
                        </div>
                    @endif

                    {{-- Verification: Courses --}}
                    @if($pendingCourses > 0)
                        <a href="{{ route('admin.courses') }}" class="flex items-center justify-between p-5 bg-amber-50/50 rounded-2xl border border-amber-100 hover:bg-amber-100/50 transition cursor-pointer group">
                            <div class="flex items-center gap-4">
                                <div class="w-3 h-3 bg-amber-500 rounded-full shadow-sm"></div>
                                <div>
                                    <h4 class="font-bold text-gray-800">Course menunggu verifikasi</h4>
                                    <p class="text-xs text-gray-500 mt-0.5">Tinjau dan setujui materi materi pembelajaran baru</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <span class="bg-amber-500 text-white text-xs font-bold px-3 py-1 rounded-lg">{{ $pendingCourses }}</span>
                                <i class="fas fa-arrow-right text-amber-400 group-hover:text-amber-600 transition"></i>
                            </div>
                        </a>
                    @else
                        <div class="flex items-center justify-between p-5 bg-emerald-50/50 rounded-2xl border border-emerald-100">
                            <div class="flex items-center gap-4">
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
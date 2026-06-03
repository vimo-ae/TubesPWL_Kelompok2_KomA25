<x-app-layout>
    <div class="flex min-h-screen bg-[#fcf9fe] -mx-4 sm:-mx-6 lg:-mx-8 -mt-6">
        
        @include('admin.partials.sidebar')

        <div class="flex-1 p-6 lg:p-10">
            
            <div class="bg-gradient-to-r from-purple-600 to-fuchsia-500 rounded-[30px] p-8 md:p-10 text-white mb-8 shadow-lg relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full blur-3xl -mr-20 -mt-20"></div>
                <div class="absolute bottom-0 right-32 w-32 h-32 bg-white opacity-5 rounded-full blur-2xl mb-4"></div>
                <h1 class="text-3xl font-extrabold mb-2 relative z-10">Selamat datang di Cuanify</h1>
                <p class="text-purple-100 relative z-10 text-sm">Kelola platform belajar mengajar dengan mudah dan efisien.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                
                <div class="bg-white rounded-3xl p-6 shadow-sm border border-purple-50 text-center flex flex-col items-center justify-center relative overflow-hidden transition hover:shadow-md">
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-2">Total Student</p>
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center text-lg"><i class="fas fa-user"></i></div>
                        <h3 class="text-3xl font-black text-gray-800">{{ $totalStudents }}</h3>
                    </div>
                    <span class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-3 py-1 rounded-full">Aktif</span>
                </div>

                <div class="bg-white rounded-3xl p-6 shadow-sm border border-purple-50 text-center flex flex-col items-center justify-center relative overflow-hidden transition hover:shadow-md">
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-2">Total Instructor</p>
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 rounded-xl bg-pink-50 text-pink-500 flex items-center justify-center text-lg"><i class="fas fa-user-tie"></i></div>
                        <h3 class="text-3xl font-black text-gray-800">{{ $totalInstructors }}</h3>
                    </div>
                    <span class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-3 py-1 rounded-full">Terdaftar</span>
                </div>

                <div class="bg-white rounded-3xl p-6 shadow-sm border border-purple-50 text-center flex flex-col items-center justify-center relative overflow-hidden transition hover:shadow-md">
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-2">Total Course</p>
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 rounded-xl bg-teal-50 text-teal-500 flex items-center justify-center text-lg"><i class="fas fa-book"></i></div>
                        <h3 class="text-3xl font-black text-gray-800">{{ $totalCourses }}</h3>
                    </div>
                    <span class="text-[10px] font-bold text-blue-500 bg-blue-50 px-3 py-1 rounded-full">Tersedia</span>
                </div>

                <div class="bg-white rounded-3xl p-6 shadow-sm border border-amber-100 text-center flex flex-col items-center justify-center relative overflow-hidden transition hover:shadow-md">
                    <div class="absolute top-0 right-0 w-2 h-full bg-amber-400"></div>
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-2">Pending Verifikasi</p>
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-500 flex items-center justify-center text-lg"><i class="fas fa-clock"></i></div>
                        <h3 class="text-3xl font-black text-gray-800">{{ $pendingInstructors + $pendingCourses }}</h3>
                    </div>
                    <span class="text-[10px] font-bold text-amber-600 bg-amber-50 px-3 py-1 rounded-full">Perlu Tindakan</span>
                </div>

            </div>

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
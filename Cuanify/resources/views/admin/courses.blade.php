<x-app-layout>

    @section('title', 'Courses - Cuanify')

    <div class="flex min-h-screen -mx-4 sm:-mx-6 lg:-mx-8 -mt-6" x-data="{ showRejectModal: false, selectedCourseId: null, selectedCourseTitle: '' }">
        
        {{-- Main Content Container --}}
        <div class="flex-1 p-4 sm:p-6 lg:p-10 min-w-0">
            
            <!-- Banner Section -->
            <div class="relative overflow-hidden rounded-[30px] bg-gradient-to-r from-[#b55fe6] via-[#df49a6] to-[#e84393] shadow-md min-h-[190px] flex items-center w-full mb-8">
                <div class="absolute right-0 top-0 bottom-0 w-1/2 overflow-hidden pointer-events-none flex items-center justify-end">
                    <div class="absolute w-64 h-64 bg-white/10 rounded-full -right-10 -top-16 blur-sm"></div>
                    <div class="absolute w-40 h-40 bg-white/5 rounded-full right-16 -bottom-12 blur-sm"></div>
                </div>
                <div class="relative z-10 w-full flex flex-col justify-center px-10 py-8 text-white">
                    <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md px-4 py-1.5 rounded-full text-[10px] font-bold tracking-wider uppercase mb-4 border border-white/20 w-fit text-white/95">
                        <svg class="w-3.5 h-3.5 text-white/90" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0-2.625.372 9.337 9.337 0 0 0-4.121-1.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>
                        KELOLA COURSE
                    </div>
                    <h1 class="text-3xl font-semibold tracking-normal mb-3 text-white">
                        Verifikasi Course <span class="text-[#f7e06d] font-bold">Cuanify</span>
                    </h1>
                    <p class="text-white/90 text-[13px] max-w-4xl font-normal tracking-normal leading-relaxed opacity-95">
                        Tinjau course yang dikirim instruktur, lakukan approve atau reject sebelum course dipublikasikan ke platform pembelajaran.
                    </p>
                </div>
            </div>

            <!-- ==================== SECTION: PENDING COURSES ==================== -->

            {{-- Section Heading --}}
            <div class="mb-5">
                <div class="inline-flex items-center gap-2 mb-1">
                    <div class="w-1 h-6 rounded-full bg-gradient-to-b from-[#b55fe6] to-[#e84393]"></div>
                    <h2 class="text-xl font-bold text-gray-800">Menunggu Verifikasi</h2>
                </div>
                <p class="text-gray-400 text-sm ml-3">Course yang dikirim instruktur dan belum ditinjau.</p>
            </div>

            {{-- Pending Courses: Mobile View --}}
            <div class="grid grid-cols-1 gap-4 sm:hidden mb-10">
                @forelse ($pendingCourses as $course)
                    <div class="bg-white p-5 rounded-2xl shadow-sm border border-purple-100 flex flex-col gap-3">
                        <div class="flex justify-between items-start gap-3">
                            <div class="font-bold text-gray-800 text-base line-clamp-2">{{ $course->title }}</div>
                            <span class="bg-amber-50 border border-amber-200 text-amber-600 px-2 py-1 rounded-md text-[10px] font-extrabold uppercase tracking-wider shrink-0">
                                Menunggu
                            </span>
                        </div>
                        <div class="text-sm text-gray-500 flex flex-col gap-1">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-user-tie text-purple-400 w-4"></i>
                                <span>{{ $course->instructor->username ?? 'Tidak diketahui' }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fas fa-book-open text-purple-400 w-4"></i>
                                <span>{{ $course->lessons->count() }} Lesson</span>
                            </div>
                        </div>
                        <div class="flex flex-wrap items-center gap-2 border-t border-gray-100 pt-3">
                            <a href="{{ route('admin.courses.show', $course->course_id) }}" class="flex-1 text-center bg-purple-50 text-purple-700 hover:bg-purple-600 hover:text-white px-3 py-2 rounded-xl text-xs font-bold transition">Detail</a>
                            <form action="{{ route('admin.courses.approve', $course->course_id) }}" method="POST" onsubmit="return confirm('Yakin publish course ini?');" class="flex-1">
                                @csrf
                                <button class="w-full bg-green-50 text-green-700 hover:bg-green-600 hover:text-white px-3 py-2 rounded-xl text-xs font-bold transition">Approve</button>
                            </form>
                            <button type="button"
                                @click="showRejectModal = true; selectedCourseId = {{ $course->course_id }}; selectedCourseTitle = '{{ addslashes($course->title) }}'"
                                class="flex-1 bg-red-50 text-red-600 hover:bg-red-500 hover:text-white px-3 py-2 rounded-xl text-xs font-bold transition">
                                Reject
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="bg-white p-8 text-center rounded-2xl border border-gray-100 text-gray-400 text-sm">
                        Tidak ada course yang menunggu verifikasi.
                    </div>
                @endforelse
            </div>

            {{-- Pending Courses: Desktop View --}}
            <div class="hidden sm:block bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-10">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-[#b55fe6]/10 via-[#df49a6]/10 to-[#e84393]/10 border-b border-purple-100">
                            <th class="p-4 text-left text-xs font-bold text-purple-700 uppercase tracking-wider">Judul Course</th>
                            <th class="p-4 text-left text-xs font-bold text-purple-700 uppercase tracking-wider">Instruktur</th>
                            <th class="p-4 text-center text-xs font-bold text-purple-700 uppercase tracking-wider">Jumlah Lesson</th>
                            <th class="p-4 text-center text-xs font-bold text-purple-700 uppercase tracking-wider">Status</th>
                            <th class="p-4 text-center text-xs font-bold text-purple-700 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse ($pendingCourses as $course)
                            <tr class="hover:bg-purple-50/40 transition-colors group">
                                <td class="p-4 font-semibold text-gray-800 group-hover:text-purple-700 transition-colors">{{ $course->title }}</td>
                                <td class="p-4 text-sm text-gray-500">
                                    <div class="flex items-center gap-2">
                                        <div class="w-7 h-7 rounded-full bg-gradient-to-br from-purple-400 to-pink-400 flex items-center justify-center text-white text-xs font-bold shrink-0">
                                            {{ strtoupper(substr($course->instructor->username ?? 'U', 0, 1)) }}
                                        </div>
                                        {{ $course->instructor->username ?? 'Tidak diketahui' }}
                                    </div>
                                </td>
                                <td class="p-4 text-center">
                                    <span class="inline-flex items-center gap-1 text-sm font-bold text-gray-700">
                                        <i class="fas fa-book-open text-purple-300 text-xs"></i>
                                        {{ $course->lessons->count() }}
                                    </span>
                                </td>
                                <td class="p-4 text-center">
                                    <span class="bg-amber-50 border border-amber-200 text-amber-600 px-3 py-1 rounded-full text-xs font-bold">
                                        Menunggu Review
                                    </span>
                                </td>
                                <td class="p-4">
                                    <div class="flex gap-2 justify-center">
                                        <a href="{{ route('admin.courses.show', $course->course_id) }}"
                                            class="bg-purple-50 text-purple-700 hover:bg-purple-600 hover:text-white px-3 py-1.5 rounded-xl text-xs font-bold transition">
                                            Detail
                                        </a>
                                        <form action="{{ route('admin.courses.approve', $course->course_id) }}" method="POST" onsubmit="return confirm('Yakin publish course ini?');">
                                            @csrf
                                            <button class="bg-green-50 text-green-700 hover:bg-green-500 hover:text-white px-3 py-1.5 rounded-xl text-xs font-bold transition">
                                                Approve
                                            </button>
                                        </form>
                                        <button type="button"
                                            @click="showRejectModal = true; selectedCourseId = {{ $course->course_id }}; selectedCourseTitle = '{{ addslashes($course->title) }}'"
                                            class="bg-red-50 text-red-600 hover:bg-red-500 hover:text-white px-3 py-1.5 rounded-xl text-xs font-bold transition">
                                            Reject
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-12 text-center text-gray-400 text-sm">
                                    <div class="flex flex-col items-center gap-2">
                                        <svg class="w-10 h-10 text-purple-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        Tidak ada course yang menunggu verifikasi.
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- ==================== SECTION: PUBLISHED COURSES ==================== -->

            {{-- Section Heading --}}
            <div class="mb-5">
                <div class="inline-flex items-center gap-2 mb-1">
                    <div class="w-1 h-6 rounded-full bg-gradient-to-b from-[#b55fe6] to-[#e84393]"></div>
                    <h2 class="text-xl font-bold text-gray-800">Course Publish</h2>
                </div>
                <p class="text-gray-400 text-sm ml-3">Daftar course yang telah disetujui dan dipublikasikan.</p>
            </div>

            {{-- Published Courses: Mobile View --}}
            <div class="grid grid-cols-1 gap-4 sm:hidden mb-6">
                @forelse ($publishedCourses as $course)
                    <div class="bg-white p-5 rounded-2xl shadow-sm border border-purple-100 flex flex-col gap-3">
                        <div class="flex justify-between items-start gap-3">
                            <div class="font-bold text-gray-800 text-base line-clamp-2">{{ $course->title }}</div>
                            <span class="bg-gradient-to-r from-[#b55fe6]/10 to-[#e84393]/10 border border-purple-200 text-purple-600 px-2 py-1 rounded-md text-[10px] font-extrabold uppercase tracking-wider shrink-0 flex items-center gap-1">
                                <i class="fas fa-check"></i> Pub
                            </span>
                        </div>
                        <div class="text-sm text-gray-500 flex items-center gap-2">
                            <div class="w-6 h-6 rounded-full bg-gradient-to-br from-purple-400 to-pink-400 flex items-center justify-center text-white text-[10px] font-bold shrink-0">
                                {{ strtoupper(substr($course->instructor->username ?? 'U', 0, 1)) }}
                            </div>
                            {{ $course->instructor->username ?? 'Tidak diketahui' }}
                        </div>
                        <div class="border-t border-gray-50 pt-3">
                            <a href="{{ route('admin.courses.show', $course->course_id) }}" class="block w-full text-center bg-purple-50 text-purple-700 hover:bg-purple-600 hover:text-white px-3 py-2 rounded-xl text-xs font-bold transition">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="bg-white p-8 text-center rounded-2xl border border-gray-100 text-gray-400 text-sm">
                        Belum ada course yang dipublish.
                    </div>
                @endforelse
            </div>

            {{-- Published Courses: Desktop View --}}
            <div class="hidden sm:block bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-[#b55fe6]/10 via-[#df49a6]/10 to-[#e84393]/10 border-b border-purple-100">
                            <th class="p-4 text-left text-xs font-bold text-purple-700 uppercase tracking-wider">Judul Course</th>
                            <th class="p-4 text-left text-xs font-bold text-purple-700 uppercase tracking-wider">Instruktur</th>
                            <th class="p-4 text-center text-xs font-bold text-purple-700 uppercase tracking-wider">Status</th>
                            <th class="p-4 text-center text-xs font-bold text-purple-700 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse ($publishedCourses as $course)
                            <tr class="hover:bg-purple-50/40 transition-colors group">
                                <td class="p-4 font-semibold text-gray-800 group-hover:text-purple-700 transition-colors">{{ $course->title }}</td>
                                <td class="p-4 text-sm text-gray-500">
                                    <div class="flex items-center gap-2">
                                        <div class="w-7 h-7 rounded-full bg-gradient-to-br from-purple-400 to-pink-400 flex items-center justify-center text-white text-xs font-bold shrink-0">
                                            {{ strtoupper(substr($course->instructor->username ?? 'U', 0, 1)) }}
                                        </div>
                                        {{ $course->instructor->username ?? 'Tidak diketahui' }}
                                    </div>
                                </td>
                                <td class="p-4 text-center">
                                    <span class="bg-gradient-to-r from-[#b55fe6]/10 to-[#e84393]/10 border border-purple-200 text-purple-700 px-3 py-1 rounded-full text-xs font-bold inline-flex items-center gap-1.5">
                                        <span class="w-1.5 h-1.5 rounded-full bg-purple-500 animate-pulse"></span>
                                        Published
                                    </span>
                                </td>
                                <td class="p-4 flex justify-center">
                                    <a href="{{ route('admin.courses.show', $course->course_id) }}"
                                        class="bg-purple-50 text-purple-700 hover:bg-purple-600 hover:text-white px-4 py-1.5 rounded-xl text-xs font-bold transition">
                                        Lihat Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="p-12 text-center text-gray-400 text-sm">
                                    <div class="flex flex-col items-center gap-2">
                                        <svg class="w-10 h-10 text-purple-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        </svg>
                                        Belum ada course yang dipublish.
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- ==================== MODAL: REJECT COURSE ==================== -->
            <div x-show="showRejectModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm" x-cloak>
                <div class="bg-white p-6 rounded-2xl w-full max-w-md shadow-2xl border border-purple-100" @click.away="showRejectModal = false">
                    
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-red-50 flex items-center justify-center shrink-0">
                            <i class="fas fa-times text-red-500"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-gray-800">Reject Course</h2>
                            <p class="text-xs text-gray-400">Berikan alasan penolakan yang jelas untuk instruktur</p>
                        </div>
                    </div>

                    <div class="bg-purple-50 border border-purple-100 rounded-xl px-4 py-2.5 mb-4 text-sm text-purple-700 font-semibold" x-text="selectedCourseTitle"></div>
                    
                    <form :action="'/admin/course/' + selectedCourseId + '/reject'" method="POST">
                        @csrf
                        <textarea name="reason" rows="4" required
                            placeholder="Masukkan alasan penolakan..."
                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-700 focus:ring-2 focus:ring-purple-300 focus:border-purple-400 outline-none mb-4 resize-none transition placeholder:text-gray-300">
                        </textarea>
                        <div class="flex justify-end gap-3">
                            <button type="button" @click="showRejectModal = false"
                                class="px-5 py-2 text-sm text-gray-500 hover:bg-gray-100 rounded-xl font-semibold transition">
                                Batal
                            </button>
                            <button type="submit"
                                class="px-5 py-2 text-sm bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white rounded-xl font-bold transition shadow-sm">
                                Kirim Penolakan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
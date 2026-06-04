<x-app-layout>
    <div class="flex min-h-screen bg-[#fcf9fe] -mx-4 sm:-mx-6 lg:-mx-8 -mt-6" x-data="{ showRejectModal: false, selectedCourseId: null, selectedCourseTitle: '' }">
        
        {{-- Sidebar Section --}}
        @include('admin.partials.sidebar')
        
        {{-- Main Content Container --}}
        <div class="flex-1 p-4 sm:p-6 lg:p-10 min-w-0">
            
            <!-- Banner Section (SAMA PERSIS DENGAN image_69a8c8.png) -->
            <div class="relative overflow-hidden rounded-[30px] bg-gradient-to-r from-[#b55fe6] via-[#df49a6] to-[#e84393] shadow-md min-h-[190px] flex items-center w-full mb-8">
                
                <!-- Dekorasi Lingkaran Bulat Solid (Sisi Kanan) -->
                <div class="absolute right-0 top-0 bottom-0 w-1/2 overflow-hidden pointer-events-none flex items-center justify-end">
                    <!-- Bulatan Besar Atas -->
                    <div class="absolute w-64 h-64 bg-white/10 rounded-full -right-10 -top-16 blur-sm"></div>
                    <!-- Bulatan Kecil Bawah -->
                    <div class="absolute w-40 h-40 bg-white/5 rounded-full right-16 -bottom-12 blur-sm"></div>
                </div>

                <div class="relative z-10 w-full flex flex-col justify-center px-10 py-8 text-white">
                    <!-- Badge Kapsul dengan Ikon Users/Kelola -->
                    <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md px-4 py-1.5 rounded-full text-[10px] font-bold tracking-wider uppercase mb-4 border border-white/20 w-fit text-white/95">
                        <svg class="w-3.5 h-3.5 text-white/90" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0-2.625.372 9.337 9.337 0 0 0-4.121-1.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>
                        KELOLA COURSE
                    </div>

                    <!-- Judul Utama -->
                    <h1 class="text-3xl font-semibold tracking-normal mb-3 text-white">
                        Verifikasi Course <span class="text-[#f7e06d] font-bold">Cuanify</span>
                    </h1>

                    <!-- Deskripsi Tipis Halus -->
                    <p class="text-white/90 text-[13px] max-w-4xl font-normal tracking-normal leading-relaxed opacity-95">
                        Tinjau course yang dikirim instruktur, lakukan approve atau reject sebelum course dipublikasikan ke platform pembelajaran.
                    </p>
                </div>
            </div>

            <!-- ==================== SECTION: PENDING COURSES ==================== -->
            
            {{-- Pending Courses: Mobile View (Card Layout) --}}
            <div class="grid grid-cols-1 gap-4 sm:hidden mb-10">
                @forelse ($pendingCourses as $course)
                    <div class="bg-white p-5 rounded-2xl shadow-sm border border-indigo-100 flex flex-col gap-3">
                        <div class="flex justify-between items-start gap-3">
                            <div class="font-bold text-gray-800 text-base line-clamp-2">
                                {{ $course->title }}
                            </div>
                            <span class="bg-amber-50 border border-amber-200 text-amber-600 px-2 py-1 rounded-md text-[10px] font-extrabold uppercase tracking-wider shrink-0 mt-0.5 text-center">
                                Menunggu
                            </span>
                        </div>
                        
                        <div class="text-sm text-gray-600 flex flex-col gap-1">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-user-tie text-indigo-400 w-4"></i> 
                                <span>{{ $course->instructor->username ?? 'Tidak diketahui' }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fas fa-book-open text-indigo-400 w-4"></i> 
                                <span>{{ $course->lessons->count() }} Lesson</span>
                            </div>
                        </div>

                        <div class="flex flex-wrap items-center gap-2 border-t border-gray-50 pt-3 mt-1">
                            <a href="{{ route('admin.courses.show', $course->course_id) }}" class="flex-1 text-center bg-blue-50 text-blue-700 hover:bg-blue-600 hover:text-white px-3 py-2 rounded-lg text-xs font-bold transition">
                                Detail
                            </a>

                            <form action="{{ route('admin.courses.approve', $course->course_id) }}" method="POST" onsubmit="return confirm('Yakin publish course ini?');" class="flex-1">
                                @csrf
                                <button class="w-full bg-green-50 text-green-700 hover:bg-green-600 hover:text-white px-3 py-2 rounded-lg text-xs font-bold transition">
                                    Approve
                                </button>
                            </form>

                            <button type="button" 
                                @click="showRejectModal = true; selectedCourseId = {{ $course->course_id }}; selectedCourseTitle = '{{ addslashes($course->title) }}'"
                                class="flex-1 bg-red-50 text-red-700 hover:bg-red-600 hover:text-white px-3 py-2 rounded-lg text-xs font-bold transition">
                                Reject
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="bg-white p-8 text-center rounded-2xl border border-gray-100 text-gray-500 font-medium text-sm">
                        Tidak ada course yang menunggu verifikasi.
                    </div>
                @endforelse
            </div>

            {{-- Pending Courses: Desktop View (Table Layout) --}}
            <div class="hidden sm:block bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-10">
                <table class="w-full">
                    <thead class="bg-indigo-50 border-b border-indigo-100">
                        <tr>
                            <th class="p-4 text-left text-sm font-bold text-indigo-800">Judul Course</th>
                            <th class="p-4 text-left text-sm font-bold text-indigo-800">Instruktur</th>
                            <th class="p-4 text-center text-sm font-bold text-indigo-800">Jumlah Lesson</th>
                            <th class="p-4 text-center text-sm font-bold text-indigo-800">Status</th>
                            <th class="p-4 text-center text-sm font-bold text-indigo-800">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($pendingCourses as $course)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-4 font-bold text-gray-800">{{ $course->title }}</td>
                                <td class="p-4 text-sm text-gray-600">{{ $course->instructor->username ?? 'Tidak diketahui' }}</td>
                                <td class="p-4 text-center font-bold text-gray-700">{{ $course->lessons->count() }}</td>
                                <td class="p-4 text-center">
                                    <span class="bg-amber-50 border border-amber-200 text-amber-600 px-3 py-1 rounded-full text-xs font-bold">
                                        Menunggu Review
                                    </span>
                                </td>
                                <td class="p-4 flex gap-2 justify-center">
                                    <a href="{{ route('admin.courses.show', $course->course_id) }}" class="bg-blue-100 text-blue-700 hover:bg-blue-600 hover:text-white px-3 py-1.5 rounded-lg text-sm font-bold transition">
                                        Detail
                                    </a>
                                    
                                    <form action="{{ route('admin.courses.approve', $course->course_id) }}" method="POST" onsubmit="return confirm('Yakin publish course ini?');">
                                        @csrf
                                        <button class="bg-green-100 text-green-700 hover:bg-green-600 hover:text-white px-3 py-1.5 rounded-lg text-sm font-bold transition">
                                            Approve
                                        </button>
                                    </form>
                                    
                                    <button type="button" 
                                        @click="showRejectModal = true; selectedCourseId = {{ $course->course_id }}; selectedCourseTitle = '{{ addslashes($course->title) }}'"
                                        class="bg-red-100 text-red-700 hover:bg-red-600 hover:text-white px-3 py-1.5 rounded-lg text-sm font-bold transition">
                                        Reject
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-8 text-center text-gray-500 font-medium">Tidak ada course yang menunggu verifikasi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- ==================== SECTION: PUBLISHED COURSES ==================== -->
            
            {{-- Published Heading --}}
            <div class="mb-6">
                <h2 class="text-3xl font-extrabold text-emerald-600">
                    Course Ter-Publish
                </h2>
                <p class="text-gray-500 mt-1">
                    Daftar course yang telah disetujui dan dipublikasikan.
                </p>
            </div>  

            {{-- Published Courses: Mobile View (Card Layout) --}}
            <div class="grid grid-cols-1 gap-4 sm:hidden mb-6">
                @forelse ($publishedCourses as $course)
                    <div class="bg-white p-5 rounded-2xl shadow-sm border border-emerald-100 flex flex-col gap-3">
                        <div class="flex justify-between items-start gap-3">
                            <div class="font-bold text-gray-800 text-base line-clamp-2">
                                {{ $course->title }}
                            </div>
                            <span class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-2 py-1 rounded-md text-[10px] font-extrabold uppercase tracking-wider shrink-0 mt-0.5 text-center flex items-center gap-1">
                                <i class="fas fa-check"></i> Pub
                            </span>
                        </div>
                        
                        <div class="text-sm text-gray-600 flex items-center gap-2">
                            <i class="fas fa-user-tie text-emerald-400 w-4"></i> 
                            <span>{{ $course->instructor->username ?? 'Tidak diketahui' }}</span>
                        </div>

                        <div class="border-t border-gray-50 pt-3 mt-1">
                            <a href="{{ route('admin.courses.show', $course->course_id) }}" class="block w-full text-center bg-blue-50 text-blue-700 hover:bg-blue-600 hover:text-white px-3 py-2 rounded-lg text-xs font-bold transition">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="bg-white p-8 text-center rounded-2xl border border-gray-100 text-gray-500 font-medium text-sm">
                        Belum ada course yang dipublish.
                    </div>
                @endforelse
            </div>

            {{-- Published Courses: Desktop View (Table Layout) --}}
            <div class="hidden sm:block bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <table class="w-full">
                    <thead class="bg-emerald-50 border-b border-emerald-100">
                        <tr>
                            <th class="p-4 text-left text-sm font-bold text-emerald-800">Judul Course</th>
                            <th class="p-4 text-left text-sm font-bold text-emerald-800">Instruktur</th>
                            <th class="p-4 text-center text-sm font-bold text-emerald-800">Status</th>
                            <th class="p-4 text-center text-sm font-bold text-emerald-800">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($publishedCourses as $course)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-4 font-bold text-gray-800">{{ $course->title }}</td>
                                <td class="p-4 text-sm text-gray-600">{{ $course->instructor->username ?? 'Tidak diketahui' }}</td>
                                <td class="p-4 text-center">
                                    <span class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-3 py-1 rounded-full text-xs font-bold inline-flex items-center gap-1">
                                        <i class="fas fa-check"></i> Published
                                    </span>
                                </td>
                                <td class="p-4 flex justify-center">
                                    <a href="{{ route('admin.courses.show', $course->course_id) }}" class="bg-blue-100 text-blue-700 hover:bg-blue-600 hover:text-white px-3 py-1.5 rounded-lg text-sm font-bold transition">
                                        Lihat Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="p-8 text-center text-gray-500 font-medium">Belum ada course yang dipublish.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- ==================== MODAL: REJECT COURSE ==================== -->
            <div x-show="showRejectModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50 backdrop-blur-sm" x-cloak>
                <div class="bg-white p-6 rounded-2xl w-full max-w-md shadow-xl" @click.away="showRejectModal = false">
                    <h2 class="text-xl font-bold mb-2 text-gray-800">Reject Course</h2>
                    <p class="text-sm text-gray-600 mb-4">Berikan alasan penolakan untuk: <br><strong x-text="selectedCourseTitle" class="text-indigo-600"></strong></p>
                    
                    <form :action="'/admin/course/' + selectedCourseId + '/reject'" method="POST">
                        @csrf
                        <textarea name="reason" class="w-full border-gray-300 rounded-xl focus:ring-indigo-500 focus:border-indigo-500 mb-4" rows="4" placeholder="Masukkan alasan penolakan..." required></textarea>
                        
                        <div class="flex justify-end gap-3">
                            <button type="button" @click="showRejectModal = false" class="px-5 py-2 text-gray-600 hover:bg-gray-100 rounded-xl font-bold transition">Batal</button>
                            <button type="submit" class="px-5 py-2 bg-red-600 hover:bg-red-700 text-white rounded-xl font-bold transition shadow-sm">Kirim Penolakan</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
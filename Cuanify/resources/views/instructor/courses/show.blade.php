<x-app-layout>

    @section('title', 'Course Detail (Instructor) - Cuanify')

    <div class="min-h-screen -mx-4 sm:-mx-6 lg:-mx-8 -mt-6 p-6">
        <div class="max-w-7xl mx-auto">

            <!-- Tombol Kembali -->
            <a href="{{ route('instructor.courses.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-purple-600 hover:text-purple-800 mb-6 transition">
                ← Kembali ke Daftar Course
            </a>

            <!-- Container Utama Konten (Lebar Penuh Setara Sisi Student) -->
            <div class="bg-white rounded-[35px] overflow-hidden shadow-xl border border-purple-100">

                <!-- Thumbnail Banner Section (Sama dengan Style Student) -->
                <div class="relative h-[340px] overflow-hidden">
                    @php
                        $defaultBanner = match($course->category_id) {
                            1 => asset('images/courses/literasi-keuangan.jpg'),
                            2 => asset('images/courses/umkm-kewirausahaan.jpg'),
                            3 => asset('images/courses/digital-marketing.jpg'),
                            4 => asset('images/courses/pengembangan-diri.jpg'),
                            5 => asset('images/courses/ekonomi-berkelanjutan.jpg'),
                            default => asset('images/courses/default.jpg'),
                        };
                    
                        $imageSrc = $course->thumbnail
                            ? asset('storage/' . $course->thumbnail)
                            : $defaultBanner;
                    @endphp

                    <img
                        src="{{ $imageSrc }}"
                        alt="{{ $course->title }}"
                        class="w-full h-full object-cover">

                    <!-- Overlay Gradasi Gelap -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent"></div>

                    <!-- Floating Badge Status Terkini -->
                    <div class="absolute top-6 left-6 flex gap-2">
                        <span class="bg-white/90 px-4 py-1 rounded-full text-xs font-bold text-purple-700 capitalize shadow-sm">
                            {{ $course->difficulty_level }}
                        </span>
                        
                        @if($course->status == 'draft')
                            <span class="bg-gray-900/80 backdrop-blur-sm text-white px-4 py-1 rounded-full text-xs font-bold shadow-sm">
                                Draft
                            </span>
                        @elseif($course->status == 'pending')
                            <span class="bg-amber-50 text-white px-4 py-1 rounded-full text-xs font-bold shadow-sm">
                                Pending Verification
                            </span>
                        @else
                            <span class="bg-emerald-500 text-white px-4 py-1 rounded-full text-xs font-bold shadow-sm">
                                Published
                            </span>
                        @endif
                    </div>
                    
                    <!-- Informasi Teks di Atas Banner -->
                    <div class="absolute bottom-8 left-8 right-8 text-white">
                        <p class="text-xs sm:text-sm mb-1 uppercase tracking-widest opacity-80 font-semibold text-purple-200">
                            {{ $course->category->category_name ?? 'Course Management' }}
                        </p>
                        <h1 class="text-3xl md:text-4xl font-extrabold mb-4">{{ $course->title }}</h1>
                        
                        <div class="flex flex-wrap items-center gap-6 text-sm text-purple-100">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 text-purple-300">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                <span class="capitalize">Status: <b>{{ $course->status }}</b></span>
                            </div>
                        
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 text-purple-300">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>Estimasi: {{ $course->estimated_duration ?? '-' }} Jam</span>
                            </div>
                        
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 text-purple-300">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.483 9.246 5 7.5 5S4.168 5.483 3 6.253v13C4.168 18.483 5.754 18 7.5 18s3.332.483 4.5 1.253m0-13C13.168 5.483 14.754 5 16.5 5s3.332.483 4.5 1.253v13C19.832 18.483 18.246 18 16.5 18s-3.332.483-4.5 1.253"/>
                                </svg>
                                <span>{{ $course->lessons->count() }} Lessons Terdaftar</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Blok Alert Notifikasi Flash Session -->
                @if(session('error'))
                    <div class="mx-8 mt-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-2xl flex items-center gap-2 text-sm">
                        <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
                        {{ session('error') }}
                    </div>
                @endif

                @if(session('success'))
                    <div class="mx-8 mt-6 bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-2xl flex items-center gap-2 text-sm">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Konten Utama Semakin Luas -->
                <div class="p-8 space-y-10">
                    
                    <!-- Deskripsi Kursus -->
                    <div>
                        <h2 class="text-2xl font-extrabold text-gray-800 mb-3">Deskripsi Kursus</h2>
                        <p class="text-gray-600 leading-relaxed">{{ $course->description ?? 'Belum ada deskripsi course.' }}</p>
                    </div>

                    <!-- Notifikasi Validasi Kelayakan Draft -->
                    @if($course->status == 'draft' && $course->lessons->count() < 3)
                        <div class="p-4 bg-amber-50 border border-amber-200 text-amber-700 text-xs rounded-2xl flex gap-2.5 items-start leading-relaxed">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 shrink-0 text-amber-500 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M10.29 3.86l-8.1 14A1 1 0 003.05 19h17.9a1 1 0 00.86-1.5l-8.1-14a1 1 0 00-1.72 0z"/>
                            </svg>
                            <span><b>Peringatan Batas:</b> Harap masukkan minimal 3 materi lesson sebelum tombol pengajuan verifikasi kurator terbuka.</span>
                        </div>
                    @endif

                    <!-- Area Tombol Aksi Manajemen Utama -->
                    <div class="flex flex-wrap items-center justify-between gap-3 bg-purple-50/50 p-5 rounded-2xl border border-purple-100">
    
                        <div class="flex flex-wrap items-center gap-3">
                            @if($course->status == 'draft' || $course->status == 'published')
                                <a href="{{ route('instructor.lessons.create', $course->course_id) }}" class="inline-flex items-center bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white px-5 py-2.5 rounded-xl font-bold text-sm shadow-sm transition-all duration-300 hover:-translate-y-0.5">
                                    + Tambah Lesson Baru
                                </a>
                            @endif

                            @if($course->status == 'draft' || $course->status == 'published')
                                <a href="{{ route('instructor.courses.edit', $course->course_id) }}" class="inline-flex items-center bg-white hover:bg-gray-50 text-gray-700 border border-gray-200 px-5 py-2.5 rounded-xl font-bold text-sm shadow-sm transition-all duration-300 hover:-translate-y-0.5 gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-gray-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                    Edit Detail Course
                                </a>
                            @endif

                            @if($course->status == 'draft')
                                <form action="{{ route('instructor.courses.destroy', $course->course_id) }}" 
                                    method="POST" 
                                    onsubmit="return confirm('⚠️ PERINGATAN: Apakah Anda yakin ingin menghapus course ini beserta seluruh materi lesson di dalamnya secara permanen?');"
                                    class="inline m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center bg-red-50 hover:bg-red-100 text-red-600 border border-red-200 px-5 py-2.5 rounded-xl font-bold text-sm transition-all duration-300 hover:-translate-y-0.5 gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.34 6m-4.74 0l-.34-6m4.74 6c0 1.115-.086 2.23-.251 3.325a45.105 45.105 0 0 1-5.716 0zM15.73 22.532c.753-.165 1.499-.364 2.227-.596m-12.394 0c.753-.165 1.499-.364 2.227-.596M6.16 6.16l1-1m4.93 11.07l1-1m-4.93 0l-1-1m4.93-11.07l-1-1m-3.48 3.48V3.65c0-1.18.91-2.164 2.09-2.201a51.964 51.964 0 0 1 4.566 0c1.18.037 2.09 1.022 2.09 2.201v.916m-7.5 0a48.667 48.667 0 0 0 7.5 0" />
                                        </svg>
                                        Hapus Course
                                    </button>
                                </form>
                            @endif
                        </div>

                        <div>
                            @if($course->status == 'draft')
                                <form action="{{ route('instructor.courses.submit', $course->course_id) }}" 
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin mengajukan verifikasi? Setelah diajukan, detail course dan seluruh materi lesson tidak dapat diedit atau dihapus lagi.');"
                                    class="inline m-0">
                                    @csrf
                                    <button
                                        type="submit"
                                        class="bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white px-5 py-2.5 rounded-xl font-bold text-sm shadow-sm transition-all duration-300 hover:-translate-y-0.5 disabled:opacity-40 disabled:cursor-not-allowed disabled:transform-none"
                                        {{ $course->lessons->count() < 3 ? 'disabled' : '' }}>
                                        Ajukan Verifikasi Course
                                    </button>
                                </form>
                            @elseif($course->status == 'pending')
                                <div class="bg-amber-500 text-white px-5 py-2.5 rounded-xl font-bold text-xs shadow-sm flex items-center gap-2 animate-pulse">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg> 
                                    Menunggu Tinjauan Verifikasi Admin
                                </div>
                            @else
                                <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-5 py-2.5 rounded-xl font-bold text-xs flex items-center gap-1.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                    Course Terkunci & Mengudara
                                </div>
                            @endif
                        </div>

                    </div>
                    <!-- Daftar Kelola Susunan Materi -->
                    <div>
                        <div class="flex items-center justify-between mb-5">
                            <div>
                                <h3 class="text-2xl font-extrabold text-gray-800">Manajemen Modul</h3>
                                <p class="text-gray-500 text-sm mt-0.5">Kelola visibilitas, pratinjau, rincian data materi pembelajaran siswa.</p>
                            </div>
                            <div class="px-4 py-1.5 rounded-full bg-purple-100 text-purple-700 text-xs font-bold">
                                {{ $course->lessons->count() }} Modul
                            </div>
                        </div>

                        <div class="space-y-4">
                            @forelse($course->lessons as $lesson)
                                <div class="bg-white border border-purple-50 rounded-2xl p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:shadow-xl transition-all duration-300">
                                    
                                    <!-- Info Detail Lesson -->
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 rounded-xl bg-gradient-to-r from-fuchsia-500 to-purple-600 text-white flex items-center justify-center font-black shadow-md shrink-0">
                                            {{ $loop->iteration }}
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-gray-800 text-base leading-tight">{{ $lesson->title }}</h4>
                                            <div class="flex items-center gap-2 mt-1">
                                                <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                                                <span class="text-xs font-bold text-purple-600">{{ $lesson->xp_reward ?? 0 }} XP</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Tombol Barisan Aksi (Management) -->
                                    <div class="flex flex-wrap items-center gap-2 pt-3 sm:pt-0 border-t sm:border-t-0 border-gray-100">
                                        
                                        <!-- Fitur Publikasi Materi -->
                                        @if(!$lesson->is_published)
                                            <form action="{{ route('instructor.lessons.publish', ['course' => $course->course_id, 'lesson' => $lesson->lesson_id]) }}" method="POST" class="inline m-0">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" onclick="return confirm('Yakin ingin menerbitkan materi ini ke siswa?')" class="bg-emerald-500 hover:bg-emerald-600 text-white px-3 py-1.5 rounded-xl text-xs font-bold shadow-sm transition flex items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                                    </svg>
                                                    Publish
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-emerald-700 text-xs font-extrabold bg-emerald-50 px-3 py-1.5 rounded-xl border border-emerald-100 flex items-center gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                </svg> Published
                                            </span>
                                        @endif

                                        <!-- Tombol Edit, Delete, Preview berdasarkan Kondisi Status Review -->
                                        @if($course->status == 'draft' || $course->status == 'published')
                                            <a href="{{ route('instructor.lessons.edit', ['course' => $course->course_id, 'lesson' => $lesson->lesson_id]) }}" 
                                               class="bg-blue-50 hover:bg-blue-100 text-blue-600 px-3 py-1.5 rounded-xl text-xs font-bold border border-blue-200 transition">
                                                Edit
                                            </a>

                                            <form action="{{ route('instructor.lessons.destroy', ['course' => $course->course_id, 'lesson' => $lesson->lesson_id]) }}" 
                                                  method="POST" 
                                                  onsubmit="return confirm('Yakin mau hapus lesson ini?');"
                                                  class="inline m-0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-50 hover:bg-red-100 text-red-600 px-3 py-1.5 rounded-xl text-xs font-bold border border-red-200 transition">
                                                    Hapus
                                                </button>
                                            </form>

                                            <a href="{{ route('instructor.lessons.preview', ['course' => $course->course_id, 'lesson' => $lesson->lesson_id]) }}" 
                                               class="bg-purple-50 hover:bg-purple-100 text-purple-600 px-3 py-1.5 rounded-xl text-xs font-bold border border-purple-200 transition" target="_blank"> 
                                                Preview
                                            </a>
                                        @else
                                            <span class="text-gray-400 text-[11px] font-bold bg-gray-50 border border-gray-200 px-3 py-1.5 rounded-xl flex items-center gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                                </svg> Terkunci (Review)
                                            </span>
                                        @endif

                                    </div>
                                </div>
                            @empty
                                <div class="bg-gray-50 rounded-3xl p-10 text-gray-400 text-center border border-dashed border-gray-200">
                                    <svg xmlns="http://www.w3.org/2000/xl" class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.483 9.246 5 7.5 5S4.168 5.483 3 6.253v13C4.168 18.483 5.754 18 7.5 18s3.332.483 4.5 1.253m0-13C13.168 5.483 14.754 5 16.5 5s3.332.483 4.5 1.253v13C19.832 18.483 18.246 18 16.5 18s-3.332.483-4.5 1.253" />
                                    </svg>
                                    Belum ada data materi lesson. Silakan tambahkan materi perdana Anda.
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- ⭐️ SECTION REVIEW MAHASISWA -->
                    <div class="bg-gray-50 p-6 rounded-[30px] border border-gray-100">
                        <h3 class="text-xl font-extrabold text-gray-800 mb-5 flex items-center gap-2">
                            <!-- Mengganti ⭐ dengan Ikon Bintang SVG -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-amber-500">
                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                            </svg>
                            <span>Ulasan dari Siswa</span>
                        </h3>
                        
                        <div class="space-y-4">
                            @forelse($course->reviews as $review)
                                @php
                                    $reviewerProfile = $review->user->profile;
                                    $reviewerName = $reviewerProfile->full_name ?? $review->user->name ?? 'Anonim';
                                    $photoUrl = $reviewerProfile && $reviewerProfile->profile_photo 
                                                ? asset('storage/' . $reviewerProfile->profile_photo) 
                                                : asset('images/profile/profile-default.jpg');
                                @endphp

                                <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm flex gap-4">
                                    <!-- Foto Profil Reviewer Bawaan dari profile-default asset -->
                                    <div class="w-11 h-11 rounded-full overflow-hidden shrink-0 border border-purple-200 shadow-sm bg-gray-50">
                                        <img 
    src="{{ 
        $review->user->profile && $review->user->profile->profile_photo && file_exists(public_path('storage/' . $review->user->profile->profile_photo))
            ? asset('storage/' . $review->user->profile->profile_photo)
            : asset('images/profile-default.jpg') 
    }}"
    alt="{{ $review->user->name }}" 
    class="w-full h-full object-cover"
>
                                    </div>

                                    <!-- Isi Review -->
                                    <div class="flex-1">
                                        <div class="flex items-center justify-between mb-1">
                                            <span class="font-bold text-gray-800 text-sm">{{ $reviewerName }}</span>
                                            
                                            <!-- Rating dengan Badge Ikon Bintang Mini -->
                                            <span class="flex items-center gap-1 text-amber-600 font-extrabold bg-amber-50 px-2 py-0.5 rounded-lg text-xs border border-amber-100">
                                                {{ $review->rating }}
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3.5 h-3.5 text-amber-500">
                                                    <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                        </div>
                                        <p class="text-gray-600 text-sm leading-relaxed">{{ $review->comment }}</p>
                                        <span class="text-[10px] text-gray-400 mt-2 block font-medium">
                                            {{ $review->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-6 text-gray-400 text-sm italic">
                                    Belum ada ulasan atau feedback yang masuk untuk kursus ini.
                                </div>
                            @endforelse
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
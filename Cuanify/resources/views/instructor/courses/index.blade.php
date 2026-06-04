<x-app-layout>

    <div class="p-6">

        <div class="relative overflow-hidden rounded-[32px] bg-gradient-to-r from-fuchsia-600 via-purple-600 to-indigo-600 p-6 md:p-7 shadow-xl mb-8">

            <div class="absolute -top-20 -right-16 w-80 h-80 bg-white/10 rounded-full blur-[90px]"></div>
            <div class="absolute bottom-[-40px] left-[20%] w-52 h-52 border-[18px] border-white/10 rounded-full"></div>

            <div class="relative z-10 flex justify-between items-center">
            
                <div>
                    <div class="inline-flex items-center gap-2 bg-white/15 border border-white/10 backdrop-blur-md text-white text-[11px] uppercase tracking-[3px] font-bold px-4 py-2 rounded-full mb-4">
                        Instructor Space
                    </div>
                
                    <h1 class="text-3xl font-extrabold text-white">
                        Kelola Course
                    </h1>
                
                    <p class="text-purple-100 mt-2">
                        Kelola dan pantau seluruh course yang kamu buat.
                    </p>
                </div>
            
                <div class="flex items-center gap-3">

                    <a href="{{ route('instructor.courses.create') }}"
                       class="bg-white text-purple-700 hover:bg-purple-50 px-4 py-2 rounded-xl font-bold shadow-lg transition flex items-center gap-2">
                                
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-4 h-4"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">
                                
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M12 4v16m8-8H4"/>
                                
                        </svg>
                    
                        Tambah Course
                    
                    </a>
                
                    <div class="bg-white/10 border border-white/10 backdrop-blur-md rounded-2xl px-6 py-4 text-center min-w-[140px]">
                    
                        <p class="text-xs uppercase tracking-[2px] text-purple-100">
                            Total Course
                        </p>
                    
                        <h2 class="text-3xl font-extrabold text-white">
                            {{ $courses->count() }}
                        </h2>
                    
                    </div>
                
                </div>

            
            </div>
        
        </div>

        @if($courses->count())
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        
            @foreach($courses as $course)

                @php
                $banner = match($course->category_id) {
                    1 => 'images/courses/literasi-keuangan.jpg',
                    2 => 'images/courses/umkm-kewirausahaan.jpg',
                    3 => 'images/courses/digital-marketing.jpg',
                    4 => 'images/courses/pengembangan-diri.jpg',
                    5 => 'images/courses/ekonomi-berkelanjutan.jpg',
                    default => 'images/courses/default-course.jpg',
                };
                @endphp

                <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between group">
                
                    <div>
                        {{-- Thumbnail --}}
                        <div class="relative h-44 overflow-hidden">
                            <img
                                src="{{ asset($banner) }}"
                                alt="{{ $course->title }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                            >
                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                        </div>
                    
                        {{-- Konten Teks di Dalam Card --}}
                        <div class="p-5 pb-0">
                        
                            {{-- Status Badge --}}
                            @if($course->status == 'draft')
                                <span class="inline-flex items-center gap-1 px-3 py-1 bg-white/90 backdrop-blur-sm text-slate-700 font-bold text-xs rounded-full shadow-sm">
                                    Draft
                                </span>
                            @elseif($course->status == 'pending')
                                <span class="inline-flex items-center gap-1 px-3 py-1 bg-white/90 backdrop-blur-sm text-amber-700 font-bold text-xs rounded-full shadow-sm">
                                    Menunggu Verifikasi
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 px-3 py-1 bg-white/90 backdrop-blur-sm text-emerald-700 font-bold text-xs rounded-full shadow-sm">
                                    Published
                                </span>
                            @endif
                            
                            <h2 class="text-lg font-bold mt-3 text-gray-800">
                                {{ $course->title }}
                            </h2>

                            <p class="text-sm text-gray-500 mt-2 line-clamp-2">
                                <div class="flex items-center justify-between mt-4 text-xs">
    
                                    <span class="flex items-center gap-1 text-purple-600 font-semibold">
                                        
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-4 h-4"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor">
                                    
                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  stroke-width="2"
                                                  d="M12 6.253v13m0-13C10.832 5.483 9.246 5 7.5 5S4.168 5.483 3 6.253v13C4.168 18.483 5.754 18 7.5 18s3.332.483 4.5 1.253m0-13C13.168 5.483 14.754 5 16.5 5S19.832 5.483 21 6.253v13"/>
                                        </svg>
                                    
                                        {{ $course->lessons->count() }} Lesson
                                    </span>
                                
                                    <span class="text-gray-400">
                                        {{ ucfirst($course->difficulty_level) }}
                                    </span>
                                
                                </div>
                                {{ $course->description ?? 'Belum ada deskripsi course.' }}
                            </p>

                            {{-- Pesan Penolakan Admin --}}
                            @if($course->status == 'draft' && $course->rejection_reason)
                                <div class="bg-red-50 border-l-4 border-red-400 p-3 mt-3 rounded-xl">
                                    <p class="text-xs text-red-700 font-bold">Ditolak oleh Admin:</p>
                                    <p class="text-xs text-red-600 mt-0.5">{{ $course->rejection_reason }}</p>
                                </div>
                            @endif
                        </div> 
                    </div>

                    {{-- Container Tombol Aksi (Sekarang Berada di Dalam Kotak P-5) --}}
                    <div class="p-5 pt-4 mt-auto flex gap-2 flex-wrap items-center">
                    
                        <a href="{{ route('instructor.courses.show', $course->course_id) }}"
                           class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 hover:scale-105 transition-all duration-200 text-white rounded-lg text-sm font-medium transition-all duration-200">
                            Kelola
                        </a>
                    
                        @if($course->status == 'draft')
                            <a href="{{ route('instructor.courses.edit', $course->course_id) }}"
                               class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm font-medium transition-all">
                                Edit
                            </a>
                        
                            <form action="{{ route('instructor.courses.destroy', $course->course_id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin hapus course ini?')"
                                        class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm font-medium transition-all">
                                    Hapus
                                </button>
                            </form>
                        @endif
                        
                    </div>
                
                </div>
            
            @endforeach
        
        </div>
        @else
        <div class="bg-white rounded-xl p-10 text-center">
            <h3 class="text-lg font-semibold text-gray-700">
                Belum Ada Course
            </h3>
            <p class="text-gray-500 mt-2">
                Mulai buat course pertamamu sekarang.
            </p>
        </div>
        @endif

    </div>

</x-app-layout>
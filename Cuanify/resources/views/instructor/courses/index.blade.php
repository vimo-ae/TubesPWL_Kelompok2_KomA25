<x-app-layout>

    <div class="p-6">

        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    Kelola Course
                </h1>
                <p class="text-gray-500 mt-1">
                    Kelola dan pantau seluruh course yang kamu buat.
                </p>
            </div>
        
            <a href="{{ route('instructor.courses.create') }}"
               class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-3 rounded-xl shadow">
                + Tambah Course
            </a>
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

                <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 flex flex-col justify-between">
                
                    <div>
                        {{-- Thumbnail --}}
                        <div class="h-44 overflow-hidden">
                            <img
                                src="{{ asset($banner) }}"
                                alt="{{ $course->title }}"
                                class="w-full h-full object-cover"
                            >
                        </div>
                    
                        {{-- Konten Teks di Dalam Card --}}
                        <div class="p-5 pb-0">
                        
                            {{-- Status Badge --}}
                            @if($course->status == 'draft')
                                <span class="inline-block px-3 py-1 bg-gray-100 text-gray-700 text-xs rounded-full">
                                    Draft
                                </span>
                            @elseif($course->status == 'pending')
                                <span class="inline-block px-3 py-1 bg-yellow-100 text-yellow-700 text-xs rounded-full">
                                    Menunggu Verifikasi
                                </span>
                            @else
                                <span class="inline-block px-3 py-1 bg-green-100 text-green-700 text-xs rounded-full">
                                    Published
                                </span>
                            @endif
                            
                            <h2 class="text-lg font-bold mt-3 text-gray-800">
                                {{ $course->title }}
                            </h2>

                            <p class="text-sm text-gray-500 mt-2 line-clamp-2">
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
                           class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-medium transition-all duration-200">
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
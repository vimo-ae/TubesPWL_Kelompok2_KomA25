<x-app-layout>

    @section('title', 'My Courses - Cuanify')

    <div class="min-h-screen -mx-4 sm:-mx-6 lg:-mx-8 -mt-6 px-6 py-8">
        <div class="max-w-7xl mx-auto">

            {{-- Header Banner Section --}}
            <div class="relative overflow-hidden rounded-[32px] bg-gradient-to-r from-fuchsia-600 via-purple-600 to-indigo-600 p-7 md:p-8 shadow-xl mb-8">
                <div class="absolute -top-20 -right-16 w-80 h-80 bg-white/10 rounded-full blur-[90px]"></div>
                <div class="absolute bottom-[-40px] left-[20%] w-52 h-52 border-[18px] border-white/10 rounded-full"></div>

                <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                    <div>
                        <div class="inline-flex items-center gap-2 bg-white/15 border border-white/10 backdrop-blur-md text-white text-[11px] uppercase tracking-[3px] font-bold px-4 py-2 rounded-full mb-4">
                            Instructor Space
                        </div>
                        <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-3">
                            Kelola Course
                        </h1>
                        <p class="text-sm md:text-base text-purple-100 leading-relaxed max-w-2xl">
                            Kelola dan pantau seluruh course yang kamu buat. Teruslah berkarya untuk mencerdaskan generasi bangsa!
                        </p>
                    </div>

                    <div class="flex flex-col sm:flex-row items-center gap-4">
                        <a href="{{ route('instructor.courses.create') }}"
                           class="w-full sm:w-auto bg-white text-purple-700 hover:bg-purple-50 px-6 py-4 rounded-2xl font-bold shadow-lg transition duration-300 flex items-center justify-center gap-2 hover:scale-[1.02]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                            </svg>
                            Tambah Course
                        </a>
                    
                        <div class="bg-white/10 border border-white/10 backdrop-blur-md rounded-3xl px-8 py-4 text-center min-w-[140px] shadow-lg w-full sm:w-auto">
                            <p class="text-xs uppercase tracking-[2px] text-purple-100 mb-1">
                                Total Course
                            </p>
                            <h2 class="text-4xl font-extrabold text-white">
                                {{ $courses->count() }}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Grid Course Section --}}
            @if($courses->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            
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

                        // Pengecekan asset file atau fallback thumbnail kustom
                        if ($course->thumbnail) {
                            $imageSrc = asset('storage/' . $course->thumbnail);
                        } elseif ($banner && file_exists(public_path($banner))) {
                            $imageSrc = asset($banner);
                        } else {
                            $imageSrc = 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=400';
                        }
                    @endphp

                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition duration-300 flex flex-col justify-between group">
                        
                        <div>
                            {{-- Thumbnail & Badges Top --}}
                            <div class="relative h-32 overflow-hidden">
                                <img src="{{ $imageSrc }}"
                                     alt="{{ $course->title }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent"></div>
                                 
                                {{-- Badge Tingkat Kesulitan --}}
                                <span class="absolute top-3 left-3 flex items-center gap-1 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-[10px] font-bold text-purple-700 capitalize shadow-sm z-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.483 9.246 5 7.5 5S4.168 5.483 3 6.253v13C4.168 18.483 5.754 18 7.5 18s3.332.483 4.5 1.253m0-13C13.168 5.483 14.754 5 16.5 5S19.832 5.483 21 6.253v13C19.832 18.483 18.246 18 16.5 18s-3.332.483-4.5 1.253"/>
                                    </svg>
                                    {{ $course->difficulty_level }}
                                </span>

                                {{-- Status Publish Badge --}}
                                <span class="absolute top-3 right-3 shadow-sm z-10">
                                    @if($course->status == 'draft')
                                        <span class="inline-flex items-center px-3 py-1 bg-slate-100/90 backdrop-blur-sm text-slate-700 font-bold text-[10px] uppercase tracking-wider rounded-full">
                                            Draft
                                        </span>
                                    @elseif($course->status == 'pending')
                                        <span class="inline-flex items-center px-3 py-1 bg-amber-50/90 backdrop-blur-sm text-amber-700 border border-amber-200/50 font-bold text-[10px] uppercase tracking-wider rounded-full">
                                            Pending
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1 bg-emerald-50/90 backdrop-blur-sm text-emerald-700 border border-emerald-200/50 font-bold text-[10px] uppercase tracking-wider rounded-full">
                                            Published
                                        </span>
                                    @endif
                                </span>
                            </div>
                        
                            {{-- Card Body --}}
                            <div class="p-5 flex flex-col">
                                <p class="text-[10px] uppercase tracking-[2px] font-bold text-purple-500 mb-1.5">
                                    {{ $course->category->category_name ?? 'No Category' }}
                                </p>

                                <h3 class="font-bold text-gray-800 text-base line-clamp-2 mb-1 leading-snug">
                                    {{ $course->title }}
                                </h3>
                                
                                <p class="text-xs text-gray-500 line-clamp-2 mb-4 leading-relaxed">
                                    {{ $course->description ?? 'Belum ada deskripsi course.' }}
                                </p>
                            
                                <div class="flex justify-between items-center text-xs mt-auto">
                                    {{-- Info Total Lesson --}}
                                    <span class="flex items-center gap-1 text-purple-600 font-semibold bg-purple-50 px-2 py-1 rounded-md">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-4 h-4"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor">
                                                                        
                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  stroke-width="2"
                                                  d="M12 6.253v13m0-13C10.832 5.483 9.246 5 7.5 5S4.168 5.483 3 6.253v13C4.168 18.483 5.754 18 7.5 18s3.332.483 4.5 1.253m0-13C13.168 5.483 14.754 5 16.5 5s3.332.483 4.5 1.253v13C19.832 18.483 18.246 18 16.5 18s-3.332.483-4.5 1.253"/>
                                        </svg>
                                    
                                        {{ $course->lessons->count() }} Lesson
                                    </span>
                                    
                                    {{-- Rating Dummy / Penyeimbang Visual --}}
                                    <span class="flex items-center gap-1 text-yellow-500 font-bold bg-yellow-50 px-2 py-1 rounded-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.719c-.783-.57-.38-1.81.588-1.81H7.03a1 1 0 00.95-.69l1.07-3.292z"/>
                                        </svg>
                                        4.8
                                    </span>
                                </div> 

                                {{-- Pesan Penolakan Admin --}}
                                @if($course->status == 'draft' && $course->rejection_reason)
                                    <div class="bg-red-50 border-l-4 border-red-500 p-3 mt-4 rounded-r-xl">
                                        <p class="text-[11px] text-red-700 font-bold uppercase tracking-wider">Ditolak oleh Admin:</p>
                                        <p class="text-xs text-red-600 mt-0.5 leading-relaxed">{{ $course->rejection_reason }}</p>
                                    </div>
                                @endif
                            </div> 
                        </div>

                        {{-- Action Buttons Footer --}}
                        <div class="px-5 pb-5 pt-0 mt-auto">
                            <div class="border-t border-gray-100 pt-4 flex gap-2 items-center justify-end">
                            
                                <a href="{{ route('instructor.courses.show', $course->course_id) }}"
                                   class="flex-1 text-center px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-xl text-xs font-bold shadow-md shadow-purple-200 transition duration-200">
                                    Kelola
                                </a>
                            
                                @if($course->status == 'draft')
                                    <a href="{{ route('instructor.courses.edit', $course->course_id) }}"
                                       class="px-4 py-2 bg-amber-500 hover:bg-amber-600 text-white rounded-xl text-xs font-bold shadow-md shadow-amber-100 transition duration-200">
                                        Edit
                                    </a>
                                
                                    <form action="{{ route('instructor.courses.destroy', $course->course_id) }}" method="POST" class="inline m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Yakin hapus course ini?')"
                                                class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-xl text-xs font-bold shadow-md shadow-red-100 transition duration-200">
                                            Hapus
                                        </button>
                                    </form>
                                @endif
                                
                            </div>
                        </div>

                    </div> 
                @endforeach
            
            </div>

            {{-- Empty State Section --}}
            @else
            <div class="bg-white border border-purple-100 rounded-[35px] p-14 text-center shadow-sm">
                <div class="w-24 h-24 mx-auto rounded-full bg-gradient-to-br from-fuchsia-500 via-purple-500 to-indigo-600 flex items-center justify-center text-white text-5xl shadow-xl mb-6">
                    🚀
                </div>

                <h2 class="text-3xl font-extrabold text-gray-800 mb-3">
                    Belum Ada Course
                </h2>

                <p class="text-gray-500 max-w-lg mx-auto leading-relaxed mb-8">
                    Kamu belum membuat materi course apa pun. Bagikan keahlianmu dan buat course pertamamu sekarang!
                </p>

                <a href="{{ route('instructor.courses.create') }}"
                   class="inline-block bg-gradient-to-r from-fuchsia-500 to-purple-600 hover:opacity-90 text-white px-8 py-3 rounded-2xl font-bold shadow-lg transition duration-300">
                    Mulai Buat Course
                </a>
            </div>
            @endif

        </div>
    </div>
</x-app-layout>
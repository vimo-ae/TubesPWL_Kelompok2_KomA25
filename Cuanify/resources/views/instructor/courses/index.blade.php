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
        
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300">
            
                {{-- Thumbnail --}}
                <div class="h-44 bg-gradient-to-r from-purple-500 to-indigo-600 flex items-center justify-center">
                    <span class="text-white text-lg font-semibold text-center px-4">
                        {{ $course->title }}
                    </span>
                </div>
            
                <div class="p-5">
                
                    {{-- Status --}}
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

                    <p class="text-sm text-gray-500 mt-2 line-clamp-2">
                        {{ $course->description ?? 'Belum ada deskripsi course.' }}
                    </p>
                
                    <div class="mt-4 flex gap-2 flex-wrap">
                    
                        <a href="{{ route('instructor.courses.show', $course->course_id) }}"
                            class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm">
                            Kelola
                        </a>
                    
                        @if($course->status == 'draft')
                    
                        <a href="{{ route('instructor.courses.edit', $course->course_id) }}"
                            class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm">
                            Edit
                        </a>
                    
                        <form action="{{ route('instructor.courses.destroy', $course->course_id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                        
                            <button
                                onclick="return confirm('Yakin hapus course ini?')"
                                class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm">
                                Hapus
                            </button>
                        </form>
                    
                        @endif
                    
                    </div>
                
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
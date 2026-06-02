<x-app-layout>

    <div class="p-6">

        <a href="{{ route('instructor.courses.index') }}" class="inline-block mb-4 text-indigo-600 hover:text-indigo-800 font-medium transition-all">
            ← Kembali ke Daftar Course
        </a>

        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="text-2xl font-bold">
            {{ $course->title }}
        </h1>

        <div class="mt-2 text-gray-700 space-y-1">
            <p>Jumlah Lesson: {{ $course->lessons->count() }}</p>
            <p>
                Status Course: 
                @if($course->status == 'draft')
                    <span class="px-2 py-0.5 bg-gray-100 text-gray-800 text-xs font-semibold rounded">Draft</span>
                @elseif($course->status == 'pending')
                    <span class="px-2 py-0.5 bg-amber-100 text-amber-800 text-xs font-semibold rounded">Menunggu Verifikasi</span>
                @else
                    <span class="px-2 py-0.5 bg-green-100 text-green-800 text-xs font-semibold rounded">Published</span>
                @endif
            </p>
        </div>

        @if($course->status == 'draft')
            @if($course->lessons->count() < 3)
                <p class="text-sm text-amber-600 mt-1 font-medium">
                    ⚠️ Minimal memasukkan 3 lesson sebelum mengajukan verifikasi.
                </p>
            @else
                <p class="text-sm text-green-600 mt-1 font-medium">
                    ✅ Syarat minimum terpenuhi. Anda sudah bisa mengajukan verifikasi.
                </p>
            @endif
        @endif

        <div class="flex items-center gap-3 mt-4">

            @if($course->status == 'draft' || $course->status == 'published')
                <a href="{{ route('instructor.lessons.create', $course->course_id) }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition-all">
                    + Tambah Lesson
                </a>
            @endif

            @if($course->status == 'draft')
                <form action="{{ route('instructor.courses.submit', $course->course_id) }}" 
                      method="POST"
                      onsubmit="return confirm('Yakin ingin mengajukan verifikasi? Setelah diajukan, detail course dan seluruh materi lesson tidak dapat diedit atau dihapus lagi.');">
                    @csrf
                    <button
                        type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition-all disabled:opacity-50 disabled:cursor-not-allowed"
                        {{ $course->lessons->count() < 3 ? 'disabled' : '' }}>
                        Ajukan Verifikasi
                    </button>
                </form>
            @elseif($course->status == 'pending')
                <div class="bg-amber-500 text-white px-4 py-2 rounded-lg font-medium flex items-center gap-1.5 text-sm shadow-sm animate-pulse">
                    <i class="fas fa-clock"></i> Sudah Diajukan & Menunggu Verifikasi Admin
                </div>
            @endif

        </div>

        @foreach($course->lessons as $lesson)
            <div class="bg-white p-4 rounded mt-4 flex justify-between items-center shadow-sm">
                
                <div class="font-semibold text-gray-800">
                    {{ $lesson->title }}
                </div>

                <div class="flex gap-2">
                    @if($course->status == 'draft' || $course->status == 'published')
                        <a href="{{ route('instructor.lessons.edit', ['course' => $course->course_id, 'lesson' => $lesson->lesson_id]) }}" 
                           class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md text-sm transition-all">
                            Edit
                        </a>

                        <form action="{{ route('instructor.lessons.destroy', ['course' => $course->course_id, 'lesson' => $lesson->lesson_id]) }}" 
                              method="POST" 
                              onsubmit="return confirm('Yakin mau hapus lesson ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-sm transition-all">
                                Delete
                            </button>
                        </form>

                        <a href="{{ route('instructor.lessons.preview', ['course' => $course->course_id,'lesson' => $lesson->lesson_id]) }}" 
                           class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md text-sm transition-all" target="_blank"> 
                            Preview
                        </a>

                    @else
                        <span class="text-gray-400 text-sm font-medium bg-gray-100 px-2.5 py-1 rounded flex items-center gap-1">
                            <i class="fas fa-lock text-xs"></i> Terkunci (Sedang Direview)
                        </span>
                    @endif
                </div>
            </div>
        @endforeach

    </div>

</x-app-layout>
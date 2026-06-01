<x-app-layout>

    <div class="p-6">

        <a href="{{ route('courses.index') }}" class="inline-block mb-4 text-indigo-600 hover:text-indigo-800 font-medium transition-all">
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

        @php
            $isOwner = auth()->user()->role === 'instructor' && $course->user_id === auth()->id();
            $isStudentEnrolled = auth()->user()->role === 'student' && auth()->user()->courses->contains('course_id', $course->course_id);
            $canViewLessons = $isOwner || $isStudentEnrolled;
        @endphp

        @if($isOwner && $course->status == 'draft')
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

        <div class="flex items-center gap-3 mt-4 mb-4">
            @if($isOwner)
                <a href="{{ route('instructor.lessons.create', $course->course_id) }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition-all">
                    + Tambah Lesson
                </a>

                @if($course->status == 'draft')
                    <form action="{{ route('instructor.courses.submit', $course->course_id) }}" method="POST">
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
            @endif
        </div>

        @if(auth()->user()->role === 'instructor' && !$isOwner)
            <div class="bg-amber-50 border border-amber-200 text-amber-700 p-4 rounded-lg mb-6 flex items-center gap-2 font-medium text-sm shadow-sm">
                <span>⚠️ Anda tidak dapat mengakses isi materi karena course ini milik instruktur lain.</span>
            </div>
        @endif

        @foreach($course->lessons as $lesson)
            @if($canViewLessons)
                <a href="{{ route('lessons.show', $lesson->lesson_id) }}">
                    <div class="bg-white p-4 rounded mt-4 transition duration-300 hover:scale-[1.02] hover:shadow-lg cursor-pointer">
                        <h2 class="font-bold text-lg">
                            {{ $lesson->title }}
                        </h2>
                        <p>
                            {{ Str::limit($lesson->content, 100) }}
                        </p>
                    </div>
                </a>
            @else
                <div class="bg-gray-100 p-4 rounded mt-4 opacity-75">
                    <h2 class="font-bold text-lg text-gray-500">
                        {{ $lesson->title }}
                    </h2>
                    <p class="text-gray-500">
                        {{ Str::limit($lesson->content, 100) }}
                    </p>
                    @if(auth()->user()->role === 'student')
                        <p class="text-red-600 mt-2 text-sm font-medium">
                            Enroll course terlebih dahulu untuk membuka lesson.
                        </p>
                    @elseif(auth()->user()->role === 'instructor')
                        <p class="text-amber-600 mt-2 text-sm font-medium">
                            🔒 Akses terkunci (Bukan pemilik course).
                        </p>
                    @endif
                </div>
            @endif
        @endforeach
    </div>

</x-app-layout>
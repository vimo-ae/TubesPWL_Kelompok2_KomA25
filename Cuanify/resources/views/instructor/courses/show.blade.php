<x-app-layout>

    <div class="p-6">

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

        <p class="mt-2">
            Jumlah Lesson: {{ $course->lessons->count() }}
        </p>

        <div class="flex gap-3 mt-4">

            <a href="{{ route('instructor.lessons.create', $course->course_id) }}" class="bg-green-600 text-white px-4 py-2 rounded-lg">

                + Tambah Lesson

            </a>

            @if($course->status == 'draft')

                <form action="{{ route('instructor.courses.submit', $course->course_id) }}" method="POST">

                    @csrf

                    <button
                        type="submit"
                        class="bg-green-600 text-white px-4 py-2 rounded-lg">

                        Ajukan Verifikasi

                    </button>

                </form>

            @endif

        </div>

        @foreach($course->lessons as $lesson)
            <div class="bg-white p-4 rounded mt-4 flex justify-between items-center shadow-sm">
                
                <div class="font-semibold text-gray-800">
                    {{ $lesson->title }}
                </div>

                <div class="flex gap-2">
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
                </div>
            </div>
        @endforeach

    </div>

</x-app-layout>
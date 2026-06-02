<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-6">
            Edit Lesson - {{ $lesson->title }}
        </h1>

        <form action="{{ route('instructor.lessons.update', ['course' => $course->course_id, 'lesson' => $lesson->lesson_id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Judul Lesson</label>
                <input
                    type="text"
                    name="title"
                    value="{{ old('title', $lesson->title) }}"
                    class="border p-2 w-full rounded-md">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Isi Lesson</label>
                <textarea
                    name="content"
                    rows="6"
                    class="border p-2 w-full rounded-md">{{ old('content', $lesson->content) }}</textarea>
            </div>

            <button
                type="submit"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition-all">
                Update Lesson
            </button>
            
            <a href="{{ route('instructor.courses.show', $course->course_id) }}" 
               class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-all ml-2">
                Batal
            </a>
        </form>
    </div>
</x-app-layout>
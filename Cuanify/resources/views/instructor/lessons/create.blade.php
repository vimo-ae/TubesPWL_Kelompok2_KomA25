<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-6">
            Tambah Lesson - {{ $course->title }}
        </h1>

        <form action="{{ route('instructor.lessons.store', $course->course_id) }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Judul Lesson</label>
                <input
                    type="text"
                    name="title"
                    placeholder="Judul Lesson"
                    value="{{ old('title') }}"
                    class="border p-2 w-full rounded-md">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Isi Lesson</label>
                <textarea
                    name="content"
                    placeholder="Isi Lesson"
                    rows="6"
                    class="border p-2 w-full rounded-md">{{ old('content') }}</textarea>
            </div>

            <div class="flex items-center gap-2">
                <button
                    type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition-all">
                    Simpan Lesson
                </button>
                <a href="{{ route('instructor.courses.show', $course->course_id) }}" 
                   class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-all">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
<x-app-layout>

    <div class="p-6">
        <h1 class="text-2xl font-bold">
            Daftar Courses
        </h1>

        @foreach($courses as $course)

    <div class="bg-white p-4 rounded mt-4 flex justify-between items-center">

    <div>
        <img src="{{ asset('storage/' . $course->thumbnail) }}" width="200">

        <h2>{{ $course->title }}</h2>

        <p>{{ $course->description }}</p>

        <p>Instructor: {{ $course->instructor->name }}</p>

        <p>Category: {{ $course->category->category_name }}</p>

        <p>Level: {{ $course->difficulty_level }}</p>
    </div>

        <a href="{{ route('courses.show', $course->course_id) }}"
        class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition duration-300">

            Lihat Lesson

        </a>

    </div>

@endforeach
    </div>

</x-app-layout>

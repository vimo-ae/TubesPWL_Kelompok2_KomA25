<x-app-layout>

    <a href="{{ route('courses.index') }}" class="inline-block mb-4 text-indigo-600 hover:text-indigo-800 font-medium">

    ← Kembali ke Daftar Course

</a>

    <div class="p-6">
        <h1 class="text-2xl font-bold">
            {{ $course->title }}
        </h1>

        <div class="flex justify-between items-center mt-4">

    <div>
        <p class="text-gray-600">
            {{ $course->description }}
        </p>
    </div>

    <div>

        @if(auth()->user()->courses->contains('course_id', $course->course_id))

    <span class="bg-green-100 text-green-700 px-4 py-2 rounded-lg font-semibold">

        ✓ Sudah Enroll

    </span>

@else

    <form action="{{ route('enroll.course', $course->course_id) }}" method="POST">
        @csrf

        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition duration-300">

            Enroll Sekarang

        </button>
    </form>

@endif

    </div>

</div>

@php
    $isEnrolled = auth()->user()->courses->contains('course_id', $course->course_id);
@endphp

        @foreach($course->lessons as $lesson)

    @if($isEnrolled)

    <a href="{{ route('lessons.show', $lesson->lesson_id) }}">

        <div class="bg-white p-4 rounded mt-4
                    transition duration-300 hover:scale-[1.02] hover:shadow-lg cursor-pointer">

            <h2 class="font-bold text-lg">
                {{ $lesson->title }}
            </h2>

            <p>
                {!! Str::limit($lesson->content, 100) !!}
            </p>

        </div>

    </a>

@else

    <div class="bg-gray-100 p-4 rounded mt-4 opacity-75 cursor-not-allowed">

        <h2 class="font-bold text-lg">
            {{ $lesson->title }}
        </h2>

        <p>
            {{ Str::limit($lesson->content, 100) }}
        </p>

        <p class="text-red-600 mt-2">
            Enroll course terlebih dahulu untuk membuka lesson.
        </p>

    </div>

@endif

@endforeach

    </div>

</x-app-layout>
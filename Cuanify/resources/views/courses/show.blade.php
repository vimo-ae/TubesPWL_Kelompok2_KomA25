<x-app-layout>

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

        @else

            <form action="{{ route('enroll.course', $course->course_id) }}" method="POST">
                @csrf

                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition duration-300">

                    Enroll Sekarang

                </button>
            </form>

        @endif

    </div>

</div>

        @foreach($course->lessons as $lesson)

    <a href="{{ route('lessons.show', $lesson->lesson_id) }}">

        <div class="bg-white p-4 rounded mt-4
                    transition duration-300 hover:scale-[1.02] hover:shadow-lg cursor-pointer">

            <h2 class="font-bold text-lg">
                {{ $lesson->title }}
            </h2>

            <p>
                {{ Str::limit($lesson->content, 100) }}
            </p>

        </div>

    </a>

@endforeach

    </div>

</x-app-layout>
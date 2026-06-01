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

            <span class="bg-green-600 text-white px-4 py-2 rounded-lg font-semibold">

                Sudah Enroll

            </span>

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

            <div class="bg-white p-4 rounded mt-4 flex justify-between items-center">

                <div>
                    <h2>Judul: {{ $lesson->title }}</h2>

                    <p>{{ $lesson->content }}</p>

                    <p>Link video: {{ $lesson->video_url }}</p>
                    
                    <p>File PDF: {{ $lesson->pdf_file }}</p>

                    <p>Total XP: {{ $lesson->xp_reward }}</p>
                </div>

                <a href="{{ route('quizzes.show', $lesson->lesson_id) }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition duration-300">

                    Lihat Quiz

                </a>

            </div>

        @endforeach

    </div>

</x-app-layout>
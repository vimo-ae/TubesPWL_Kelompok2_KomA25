<x-app-layout>

    <div class="p-6">

        <h1 class="text-2xl font-bold">
            Quiz {{ $lesson->title }}
        </h1>

        @foreach($lesson->quizzes as $quiz)

            <div class="bg-white p-4 rounded mt-4">

                <h2>{{ $quiz->title }}</h2>

                <p>Passing Score: {{ $quiz->passing_score }}</p>

                <p>Time Limit: {{ $quiz->time_limit }} menit</p>

            </div>

        @endforeach

    </div>

</x-app-layout>
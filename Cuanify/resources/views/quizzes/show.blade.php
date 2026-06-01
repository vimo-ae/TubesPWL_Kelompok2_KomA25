<x-app-layout>

    <div class="p-6">

        <h1 class="text-2xl font-bold">
            Quiz {{ $lesson->title }}
        </h1>

        @forelse($lesson->quizzes as $quiz)

    <div class="bg-white p-4 rounded mt-4">

        <h2 class="font-bold text-lg">
            {{ $quiz->title }}
        </h2>

        <p>Passing Score: {{ $quiz->passing_score }}</p>

        <p>Time Limit: {{ $quiz->time_limit }} menit</p>

    </div>

@empty

    <div class="bg-yellow-50 border border-yellow-200 text-yellow-800 p-4 rounded mt-4">

        Belum ada quiz untuk lesson ini.

    </div>

@endforelse

    </div>

</x-app-layout>
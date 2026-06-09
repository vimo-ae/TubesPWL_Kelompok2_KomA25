<x-app-layout>

    <a href="{{ url()->previous() }}"
       class="inline-block mb-4 text-indigo-600 hover:text-indigo-800">
        ← Kembali ke Lesson
    </a>

<div class="p-6">

    <h1 class="text-2xl font-bold mb-4">
        Quiz {{ $lesson->title }}
    </h1>

    @if ($lesson->quiz)

        @php $quiz = $lesson->quiz; @endphp

        <div class="bg-white p-5 rounded shadow mt-4">

            <h2 class="font-bold text-lg mb-2">
                {{ $quiz->title }}
            </h2>

            <p class="text-gray-600">
                Passing Score: {{ $quiz->passing_score }}
            </p>

            @if($quiz->best_score !== null)
                <p class="text-green-600 font-semibold">
                    Skor Terbaik: {{ $quiz->best_score }}/100
                </p>
            @else
                <p class="text-gray-500">
                    Belum pernah mengerjakan quiz
                </p>
            @endif

            <p class="text-gray-600 mb-3">
                Time Limit: {{ $quiz->time_limit }} menit
            </p>

            <a href="{{ route('quizzes.take', $quiz->quiz_id) }}"
               class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">
                Mulai Quiz
            </a>

        </div>

    @else

        <div class="bg-yellow-50 border border-yellow-200 text-yellow-800 p-4 rounded mt-4">
            Belum ada quiz untuk lesson ini.
        </div>

    @endif

</div>

</x-app-layout>
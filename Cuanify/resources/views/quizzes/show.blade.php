<x-app-layout>

<div class="min-h-screen bg-[#f7eef7] -mx-4 sm:-mx-6 lg:-mx-8 -mt-6 p-6">

    <div class="max-w-5xl mx-auto">

        <!-- Back Button -->
        <a href="{{ url()->previous() }}"
           class="inline-flex items-center gap-2 text-sm font-semibold text-purple-600 hover:text-purple-800 mb-6 transition">
            ← Kembali ke Lesson
        </a>

        <!-- Header -->
        <div class="relative overflow-hidden rounded-[32px] bg-gradient-to-r from-fuchsia-600 via-purple-600 to-indigo-600 p-8 shadow-xl mb-8">

    <h1 class="text-2xl font-bold mb-4">
        Quiz {{ $lesson->title }}
    </h1>

    @if ($lesson->quiz)

        @php $quiz = $lesson->quiz; @endphp

            <div class="bg-white rounded-[28px] border border-purple-100 shadow-lg p-6 mb-6 hover:shadow-xl transition duration-300">

                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">

                    <div class="flex items-start gap-4">

                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-r from-purple-500 to-indigo-600 flex items-center justify-center text-white shadow-lg">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-7 h-7"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M9 12h6m-6 4h6M7 8h10M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>

                        </div>

                        <div>

                            <h2 class="text-xl font-extrabold text-gray-800">
                                {{ $quiz->title }}
                            </h2>

                            <div class="flex flex-wrap gap-2 mt-3">

                                <span class="bg-purple-100 text-purple-700 text-xs font-bold px-3 py-1 rounded-full">
                                    Passing Score: {{ $quiz->passing_score }}
                                </span>

                                <span class="bg-indigo-100 text-indigo-700 text-xs font-bold px-3 py-1 rounded-full">
                                    {{ $quiz->time_limit }} Menit
                                </span>

                            </div>

                            <div class="mt-4">

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

</div>

</x-app-layout>
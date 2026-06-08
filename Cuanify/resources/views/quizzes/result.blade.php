<x-app-layout>

<div class="max-w-3xl mx-auto p-6">

    <div class="bg-white shadow rounded-lg p-6">

        <h2 class="text-2xl font-bold mb-4">
        Hasil Quiz
    </h2>

    <p class="mb-2">
        Skor Saat Ini:
        <strong>
            {{ session('score') }}/100
        </strong>
    </p>

    <p class="mb-2">
        Skor Terbaik:
        <strong>
            {{ session('best_score') }}/100
        </strong>
    </p>

    <p class="mb-2">
        Jawaban Benar:
        <strong>
            {{ session('correct') }}/{{ session('total_questions') }}
        </strong>
    </p>

        {{-- @if(session('new_best'))
            <div class="mt-4 p-3 bg-green-100 text-green-700 rounded">
                🎉 Selamat! Kamu mendapatkan skor terbaik baru.
            </div>
        @endif --}}

        @if(session('passed'))
            <div class="mt-4 p-3 bg-green-100 text-green-700 rounded">
                ✅ Kamu LULUS quiz ini.
            </div>
        @else
            <div class="mt-4 p-3 bg-red-100 text-red-700 rounded">
                ❌ Kamu belum mencapai passing score.
            </div>
        @endif

        <div class="mt-6">
            <a href="{{ route('quizzes.take', $quiz->quiz_id) }}"
               class="bg-blue-600 text-white px-4 py-2 rounded">
                Coba Lagi
            </a>

            <a href="{{ route('lessons.show', $quiz->lesson_id) }}"
               class="bg-gray-600 text-white px-4 py-2 rounded">
                Kembali ke Lesson
            </a>
        </div>

    </div>

</div>

</x-app-layout>
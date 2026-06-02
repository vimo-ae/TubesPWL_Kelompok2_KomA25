<x-app-layout>

<div class="max-w-2xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-4">
        Hasil Quiz: {{ $quiz->title }}
    </h1>

    <div class="bg-white p-5 rounded shadow">

        <p class="text-lg">
            Skor kamu: <strong>{{ $result->score }}</strong>
        </p>

        <p class="text-lg mt-2">
            Jawaban benar: <strong>{{ $result->total_correct }}</strong>
        </p>

        @if(session('passed') ?? ($result->score >= $quiz->passing_score))
            <p class="text-green-600 font-bold mt-4">LULUS 🎉</p>
        @else
            <p class="text-red-600 font-bold mt-4">BELUM LULUS ❌</p>
        @endif

    </div>

    <a href="{{ route('quizzes.show', $quiz->lesson_id) }}"
       class="inline-block mt-5 text-blue-600">
        ← Kembali ke Lesson
    </a>

</div>

</x-app-layout>
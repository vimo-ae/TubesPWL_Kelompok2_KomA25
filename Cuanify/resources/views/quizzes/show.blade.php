<x-app-layout>

<div class="max-w-3xl mx-auto p-6">

    <!-- HEADER QUIZ -->
    <div class="bg-white rounded-xl shadow p-6 mb-6 text-center">

    <a href="{{ url()->previous() }}"class="inline-block mb-4 text-indigo-600 hover:text-indigo-800">

    ← Kembali ke Lesson

</a>

    <div class="p-6">

        <h1 class="text-2xl font-bold">
            🧠 Quiz
        </h1>

        <p class="text-gray-500 mt-2">
            Jawab pertanyaan dengan benar
        </p>

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

    <!-- QUIZ CARD -->
    <div class="bg-white rounded-xl shadow p-6">

        <!-- SOAL -->
        <h2 class="text-lg font-semibold mb-6">
            {{ $quiz->question ?? 'Pertanyaan tidak tersedia' }}
        </h2>

        <!-- FORM JAWABAN -->
        <form method="POST" action="#">
            @csrf

            <div class="space-y-3">

                <!-- OPTION A -->
                <label class="flex items-center p-3 border rounded-lg hover:bg-gray-50 cursor-pointer">
                    <input type="radio" name="answer" value="A" class="mr-3">
                    {{ $quiz->option_a ?? 'Option A' }}
                </label>

                <!-- OPTION B -->
                <label class="flex items-center p-3 border rounded-lg hover:bg-gray-50 cursor-pointer">
                    <input type="radio" name="answer" value="B" class="mr-3">
                    {{ $quiz->option_b ?? 'Option B' }}
                </label>

                <!-- OPTION C -->
                <label class="flex items-center p-3 border rounded-lg hover:bg-gray-50 cursor-pointer">
                    <input type="radio" name="answer" value="C" class="mr-3">
                    {{ $quiz->option_c ?? 'Option C' }}
                </label>

                <!-- OPTION D -->
                <label class="flex items-center p-3 border rounded-lg hover:bg-gray-50 cursor-pointer">
                    <input type="radio" name="answer" value="D" class="mr-3">
                    {{ $quiz->option_d ?? 'Option D' }}
                </label>

            </div>

            <!-- SUBMIT -->
            <button type="submit"
                class="mt-6 w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-lg">
                Submit Jawaban
            </button>

        </form>

    </div>

</div>

</x-app-layout>
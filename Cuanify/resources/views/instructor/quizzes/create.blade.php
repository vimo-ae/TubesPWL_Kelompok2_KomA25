<x-app-layout>

<div class="max-w-5xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-6">
        Buat Quiz
    </h1>

    <form method="POST"
          action="{{ route('instructor.quizzes.store', $lesson->lesson_id) }}">

        @csrf

        <div class="mb-6">
            <label class="block mb-2">
                Judul Quiz
            </label>

            <input
                type="text"
                name="title"
                class="w-full border rounded p-3"
                required>
        </div>

        <div class="mb-6">
            <label class="block mb-2">
                Passing Score
            </label>

            <input
                type="number"
                name="passing_score"
                value="70"
                class="w-full border rounded p-3">
        </div>

        <div class="mb-6">
            <label class="block mb-2">
                Time Limit (menit)
            </label>

            <input
                type="number"
                name="time_limit"
                class="w-full border rounded p-3">
        </div>

        <hr class="my-6">

        <div id="questions-container">

        </div>

        <button
            type="button"
            onclick="addQuestion()"
            class="bg-blue-600 text-white px-4 py-2 rounded">

            + Tambah Soal
        </button>

        <button
            type="submit"
            class="bg-green-600 text-white px-4 py-2 rounded ml-2">

            Simpan Quiz
        </button>

    </form>

</div>

<script>

let questionIndex = 0;

function addQuestion() {

    let html = `
    <div class="border p-4 rounded mt-4 question-box">

        <h3 class="font-bold mb-3">
            Soal ${questionIndex + 1}
        </h3>

        <input
            type="text"
            name="questions[${questionIndex}][question_text]"
            placeholder="Pertanyaan"
            class="w-full border p-2 rounded mb-3"
            required>

        <select
            name="questions[${questionIndex}][question_type]"
            class="question-type w-full border p-2 rounded mb-3"
            onchange="changeQuestionType(this, ${questionIndex})">

            <option value="multiple_choice">
                Multiple Choice
            </option>

            <option value="true_false">
                True / False
            </option>

        </select>

        <div class="multiple-choice-section">

            <input
                type="text"
                name="questions[${questionIndex}][options][]"
                placeholder="Opsi A"
                class="w-full border p-2 rounded mb-2">

            <input
                type="text"
                name="questions[${questionIndex}][options][]"
                placeholder="Opsi B"
                class="w-full border p-2 rounded mb-2">

            <input
                type="text"
                name="questions[${questionIndex}][options][]"
                placeholder="Opsi C"
                class="w-full border p-2 rounded mb-2">

            <input
                type="text"
                name="questions[${questionIndex}][options][]"
                placeholder="Opsi D"
                class="w-full border p-2 rounded mb-2">

            <label class="block mt-3">
                Jawaban Benar
            </label>

            <select
                name="questions[${questionIndex}][correct_answer]"
                class="w-full border p-2 rounded">

                <option value="0">Opsi A</option>
                <option value="1">Opsi B</option>
                <option value="2">Opsi C</option>
                <option value="3">Opsi D</option>

            </select>

        </div>

        <div
            class="true-false-section"
            style="display:none;">

            <label class="block mt-3">
                Jawaban Benar
            </label>

            <select
                name="questions[${questionIndex}][correct_answer]"
                class="w-full border p-2 rounded">

                <option value="True">True</option>
                <option value="False">False</option>

            </select>

        </div>

    </div>
    `;

    document
        .getElementById('questions-container')
        .insertAdjacentHTML('beforeend', html);

    questionIndex++;
}

function changeQuestionType(selectElement) {

    let questionBox =
        selectElement.closest('.question-box');

    let mcSection =
        questionBox.querySelector('.multiple-choice-section');

    let tfSection =
        questionBox.querySelector('.true-false-section');

    if (selectElement.value === 'true_false') {

        mcSection.style.display = 'none';
        tfSection.style.display = 'block';

    } else {

        mcSection.style.display = 'block';
        tfSection.style.display = 'none';
    }
}

addQuestion();

</script>

</x-app-layout>
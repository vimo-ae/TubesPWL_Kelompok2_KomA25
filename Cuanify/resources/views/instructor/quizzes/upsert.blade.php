<x-app-layout>

<div class="max-w-5xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-6">
        {{ $quiz ? 'Kelola Quiz' : 'Buat Quiz' }}
    </h1>

    <form method="POST"
          action="{{ route('instructor.quizzes.storeOrUpdate', $lesson->lesson_id) }}">

        @csrf

        <input type="text"
               name="title"
               value="{{ $quiz->title ?? '' }}"
               class="w-full border p-2 mb-3"
               placeholder="Judul Quiz">

        <input type="number"
               name="passing_score"
               value="{{ $quiz->passing_score ?? 70 }}"
               class="w-full border p-2 mb-3"
               placeholder="Passing Score">

        <input type="number"
               name="time_limit"
               value="{{ $quiz->time_limit ?? '' }}"
               class="w-full border p-2 mb-5"
               placeholder="Time Limit (menit)">

        <hr class="mb-6">

        <div id="questions-container">

            @if($quiz)

                @foreach($quiz->questions as $qIndex => $question)

                    <div class="border p-4 mb-5 rounded">

                        <input type="text"
                               name="questions[{{ $qIndex }}][question_text]"
                               value="{{ $question->question_text }}"
                               class="w-full border p-2 mb-2">

                        <select name="questions[{{ $qIndex }}][question_type]"
                                class="w-full border p-2 mb-3">

                            <option value="multiple_choice"
                                {{ $question->question_type == 'multiple_choice' ? 'selected' : '' }}>
                                Multiple Choice
                            </option>

                            <option value="true_false"
                                {{ $question->question_type == 'true_false' ? 'selected' : '' }}>
                                True / False
                            </option>

                        </select>

                        @if($question->question_type === 'multiple_choice')

                            @foreach($question->options as $oIndex => $option)

                                <div class="flex items-center mb-2">

                                    <input type="text"
                                           name="questions[{{ $qIndex }}][options][{{ $oIndex }}][text]"
                                           value="{{ $option->option_text }}"
                                           class="w-full border p-2">

                                    <input type="radio"
                                           name="questions[{{ $qIndex }}][correct_answer]"
                                           value="{{ $oIndex }}"
                                           class="ml-2"
                                           {{ $option->is_correct ? 'checked' : '' }}>
                                </div>

                            @endforeach

                        @else

                            <select name="questions[{{ $qIndex }}][correct_answer]"
                                    class="w-full border p-2">

                                <option value="True"
                                    {{ $question->options->firstWhere('is_correct',1)?->option_text == 'True' ? 'selected' : '' }}>
                                    True
                                </option>

                                <option value="False"
                                    {{ $question->options->firstWhere('is_correct',1)?->option_text == 'False' ? 'selected' : '' }}>
                                    False
                                </option>

                            </select>

                        @endif

                    </div>

                @endforeach

            @endif

        </div>

        <button type="button"
                onclick="addQuestion()"
                class="bg-blue-600 text-white px-4 py-2 rounded">
            + Tambah Soal
        </button>

        <button type="submit"
                class="bg-green-600 text-white px-4 py-2 rounded ml-2">
            Simpan Quiz
        </button>

    </form>

</div>

<script>
    let index = {{ $quiz ? count($quiz->questions) : 0 }};

    function addQuestion() {

        let html = `
        <div class="border p-4 mb-5 rounded question-box">

            <input type="text"
                   name="questions[${index}][question_text]"
                   class="w-full border p-2 mb-2"
                   placeholder="Pertanyaan">

            <select name="questions[${index}][question_type]"
                    class="w-full border p-2 mb-2">

                <option value="multiple_choice">Multiple Choice</option>
                <option value="true_false">True / False</option>

            </select>

            <div class="options">

                <input type="text"
                       name="questions[${index}][options][0]"
                       class="w-full border p-2 mb-1"
                       placeholder="Opsi A">

                <input type="text"
                       name="questions[${index}][options][1]"
                       class="w-full border p-2 mb-1"
                       placeholder="Opsi B">

                <input type="text"
                       name="questions[${index}][options][2]"
                       class="w-full border p-2 mb-1"
                       placeholder="Opsi C">

                <input type="text"
                       name="questions[${index}][options][3]"
                       class="w-full border p-2 mb-2"
                       placeholder="Opsi D">

            </div>

            <label class="text-sm font-semibold">Jawaban Benar (index)</label>

            <select name="questions[${index}][correct_answer]"
                    class="w-full border p-2">

                <option value="0">A</option>
                <option value="1">B</option>
                <option value="2">C</option>
                <option value="3">D</option>

            </select>

        </div>
        `;

        document.getElementById('questions-container')
            .insertAdjacentHTML('beforeend', html);

        index++;
    }

    function addOption(qIndex) {
        alert("Untuk versi ini, tambah opsi dilakukan lewat refresh form (rebuild system)");
    }
</script>

</x-app-layout>
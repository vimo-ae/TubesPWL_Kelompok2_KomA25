<x-app-layout>

<div class="max-w-4xl mx-auto p-6">

    <h1 class="text-3xl font-bold mb-6">
        {{ $quiz->title }}
    </h1>

    <div class="mb-4">
        Sisa Waktu:
        <span id="timer"></span>
    </div>

    <form id="quizForm" method="POST" action="{{ route('quizzes.submit', $quiz->quiz_id) }}">
        @csrf

        @foreach($quiz->questions as $question)

            <div class="bg-white shadow rounded-lg p-5 mb-5">

                <h3 class="font-semibold text-lg mb-4">
                    {{ $loop->iteration }}.
                    {{ $question->question_text }}
                </h3>

                @if($question->options->count())

                    <div class="space-y-2">

                        @foreach($question->options as $option)

                            <label class="flex items-center gap-2 cursor-pointer">

                                <input
                                    type="radio"
                                    name="question_{{ $question->question_id }}"
                                    value="{{ $option->option_id }}"
                                >

                                <span>
                                    {{ $option->option_text }}
                                </span>

                            </label>

                        @endforeach

                    </div>

                @else
                    <p class="text-red-500 text-sm">
                        Tidak ada pilihan jawaban untuk soal ini
                    </p>
                @endif

            </div>

        @endforeach

        <button
            type="submit"
            class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded">

            Submit Quiz
        </button>

    </form>

</div>

<script>
    let timeLeft = {{ $quiz->time_limit * 60 }};

    const timer = setInterval(function () {

        let minutes = Math.floor(timeLeft / 60);
        let seconds = timeLeft % 60;

        document.getElementById('timer').innerText =
            minutes + ':' + String(seconds).padStart(2, '0');

        if (timeLeft <= 0) {
            clearInterval(timer);

            alert('Waktu habis! Quiz akan otomatis dikumpulkan.');

            document.getElementById('quizForm').submit();
        }

        timeLeft--;

    }, 1000);
</script>

</x-app-layout>
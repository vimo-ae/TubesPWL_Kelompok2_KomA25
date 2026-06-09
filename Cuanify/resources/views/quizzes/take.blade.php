<x-app-layout>

<div class="min-h-screen bg-[#f7eef7] -mx-4 sm:-mx-6 lg:-mx-8 -mt-6 p-6">

    <div class="max-w-5xl mx-auto">

        {{-- Header --}}
        <div class="relative overflow-hidden rounded-[35px] bg-gradient-to-r from-fuchsia-600 via-purple-600 to-indigo-700 p-8 shadow-xl mb-8">

            <div class="absolute top-0 right-0 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>

            <div class="relative z-10 flex items-center justify-between">

                <div>
                    <span class="bg-white/20 text-white text-xs px-3 py-1 rounded-full font-bold uppercase">
                        Quiz
                    </span>

                    <h1 class="text-3xl font-extrabold text-white mt-3">
                        {{ $quiz->title }}
                    </h1>

                    <p class="text-purple-100 mt-2">
                        Jawab semua pertanyaan sebelum waktu habis.
                    </p>
                </div>

                <div class="hidden md:flex opacity-20">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-28 h-28 text-white"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="1.5"
                              d="M9 12h6m-6 4h6M7 8h10M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>

                    </svg>
                
                </div>

            </div>

        </div>

        {{-- Timer --}}
        <div class="bg-red-50 border border-red-200 rounded-3xl p-5 mb-8 shadow-sm">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-xs uppercase font-bold tracking-wider text-red-500">
                        Sisa Waktu
                    </p>

                    <h2 id="timer"
                        class="text-3xl font-extrabold text-red-600">
                    </h2>
                </div>

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-12 h-12 text-red-500"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>

                </svg>

            </div>

        </div>

        <form id="quizForm"
              method="POST"
              action="{{ route('quizzes.submit', $quiz->quiz_id) }}">

            @csrf

            @foreach($quiz->questions as $question)

                <div class="bg-white rounded-[30px] shadow-lg border border-purple-100 p-7 mb-6">

                    <div class="flex items-start gap-4 mb-5">

                        <div class="w-10 h-10 rounded-xl bg-gradient-to-r from-fuchsia-500 to-purple-600 text-white flex items-center justify-center font-bold">
                            {{ $loop->iteration }}
                        </div>

                        <h3 class="text-lg font-bold text-gray-800">
                            {{ $question->question_text }}
                        </h3>

                    </div>

                    @if($question->options->count())

                        <div class="space-y-3">

                            @foreach($question->options as $option)

                                <label
                                    class="flex items-center gap-3 p-4 rounded-2xl border border-gray-200 hover:border-purple-400 hover:bg-purple-50 transition cursor-pointer">

                                    <input
                                        type="radio"
                                        name="question_{{ $question->question_id }}"
                                        value="{{ $option->option_id }}"
                                        class="w-5 h-5 text-purple-600">

                                    <span class="font-medium text-gray-700">
                                        {{ $option->option_text }}
                                    </span>

                                </label>

                            @endforeach

                        </div>

                    @else

                        <div class="bg-red-50 text-red-600 p-4 rounded-xl">
                            Tidak ada pilihan jawaban untuk soal ini.
                        </div>

                    @endif

                </div>

            @endforeach

            {{-- Submit --}}
            <div class="sticky bottom-6">

                <div class="flex justify-end">

                    <button type="submit"class="w-full bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white py-4 rounded-3xl font-bold shadow-xl transition-all duration-300 hover:-translate-y-1">

                        <span class="flex items-center justify-center gap-2">
                        
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-5 h-5"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">
                        
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5 13l4 4L19 7"/>
                        
                            </svg>
                        
                            Submit Quiz
                        
                        </span>
                    
                    </button>

                </button>

            </div>

        </form>

    </div>

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
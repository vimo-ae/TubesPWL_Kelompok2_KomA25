<x-app-layout>

<div class="min-h-screen bg-[#f7eef7] -mx-4 sm:-mx-6 lg:-mx-8 -mt-6 p-6">

    <div class="max-w-5xl mx-auto">

        <a href="{{ url()->previous() }}"
           class="inline-flex items-center gap-2 text-sm font-semibold text-purple-600 hover:text-purple-800 mb-6 transition">
            ← Kembali ke Lesson
        </a>

<<<<<<< HEAD
        <!-- Header -->
        <div class="relative overflow-hidden rounded-[32px] bg-gradient-to-r from-fuchsia-600 via-purple-600 to-indigo-600 p-8 shadow-xl mb-8">

    <h1 class="text-2xl font-bold mb-4">
        Quiz {{ $lesson->title }}
    </h1>

    @if ($lesson->quiz)

        @php $quiz = $lesson->quiz; @endphp
=======
        <div class="relative overflow-hidden rounded-[32px] bg-gradient-to-r from-fuchsia-600 via-purple-600 to-indigo-600 p-8 shadow-xl mb-8">

            <div class="absolute -top-20 -right-16 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>

            <div class="relative z-10">
                <span class="bg-white/20 text-white text-xs font-bold px-4 py-1 rounded-full tracking-wider uppercase">
                    Quiz Center
                </span>

                {{-- Title Lesson --}}
                <h1 class="text-3xl md:text-4xl font-extrabold text-white mt-4">
                    Quiz {{ $lesson->title }}
                </h1>

                <p class="text-purple-100 mt-2 max-w-xl">
                    Uji pemahamanmu terhadap materi yang telah dipelajari dan raih skor terbaikmu.
                </p>
            </div>

        </div>

        {{-- Logika Pengecekan Kuis Tunggal dari branch `main` --}}
        @if ($lesson->quiz)
            @php $quiz = $lesson->quiz; @endphp
>>>>>>> 8f19681954a25e08801f1da0c5c3f84dbc4a7f28

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
                            {{-- Title Spesifik Kuis --}}
                            <h2 class="text-xl font-extrabold text-gray-800">
                                {{ $quiz->title ?? 'Mulai Evaluasi' }}
                            </h2>

                            <div class="flex flex-wrap gap-2 mt-3">
                                <span class="bg-purple-100 text-purple-700 text-xs font-bold px-3 py-1 rounded-full">
                                    Passing Score: {{ $quiz->passing_score ?? '70' }}
                                </span>

                                <span class="bg-indigo-100 text-indigo-700 text-xs font-bold px-3 py-1 rounded-full">
                                    {{ $quiz->time_limit ?? '15' }} Menit
                                </span>
                            </div>

                            <div class="mt-4">
<<<<<<< HEAD

            @if($quiz->best_score !== null)
                <p class="text-green-600 font-semibold">
                    Skor Terbaik: {{ $quiz->best_score }}/100
                </p>
            @else
=======
                                {{-- Logika Skor Terbaik dari branch `main` --}}
                                @if($quiz->best_score !== null)
                                    <div class="inline-flex items-center gap-2 bg-green-100 text-green-700 px-4 py-2 rounded-xl font-bold">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-5 h-5"
                                             fill="currentColor"
                                             viewBox="0 0 20 20">
                                            <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                        </svg>
                                        Skor Terbaik: {{ $quiz->best_score }}/100
                                    </div>
                                @else
                                    <div class="inline-flex items-center gap-2 bg-gray-100 text-gray-600 px-4 py-2 rounded-xl font-medium">
                                        Belum pernah mengerjakan quiz
                                    </div>
                                @endif
                            </div>

                        </div>

                    </div>

                    <div>
                        {{-- Tombol Mulai Quiz dari branch `main` dengan style premium --}}
                        <a href="{{ route('quizzes.take', $quiz->quiz_id) }}"
                           class="inline-flex items-center gap-2 bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white px-6 py-3 rounded-2xl font-bold shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-5 h-5"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M14.752 11.168l-6.518-3.75A1 1 0 007 8.285v7.43a1 1 0 001.234.97l6.518-1.68A1 1 0 0015.5 14V12a1 1 0 00-.748-.832z"/>
                            </svg>
                            Mulai Quiz
                        </a>
                    </div>

                </div>

            </div>

        @else

            <div class="bg-white rounded-[28px] p-10 text-center border border-yellow-200 shadow-sm">
                <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-yellow-100 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-8 h-8 text-yellow-600"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M13 16h-1v-4h-1m1-4h.01"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">
                    Belum Ada Quiz
                </h3>
>>>>>>> 8f19681954a25e08801f1da0c5c3f84dbc4a7f28
                <p class="text-gray-500">
                    Belum pernah mengerjakan quiz
                </p>
<<<<<<< HEAD
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
=======
            </div>

        @endif
>>>>>>> 8f19681954a25e08801f1da0c5c3f84dbc4a7f28

    </div>

</div>

</x-app-layout>
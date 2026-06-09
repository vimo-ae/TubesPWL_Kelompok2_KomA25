<x-app-layout>

<div class="min-h-screen bg-[#f7eef7] -mx-4 sm:-mx-6 lg:-mx-8 -mt-6 p-6">

    <div class="max-w-3xl mx-auto">

        {{-- HEADER --}}
        <div class="bg-white rounded-[35px] shadow-xl border border-purple-100 overflow-hidden">

            <div class="bg-gradient-to-r from-fuchsia-600 via-purple-600 to-indigo-600 p-6 md:p-8">

                <div class="flex items-center justify-between">

                    <div>

                        <span class="inline-flex items-center px-4 py-2 rounded-full bg-white/20 text-white text-xs font-bold tracking-wider uppercase">
                            Quiz Selesai
                        </span>

                        <h1 class="text-3xl md:text-4xl font-extrabold text-white mt-4">
                            Hasil Quiz
                        </h1>

                        <p class="text-purple-100 mt-2">
                            Lihat performa dan pencapaianmu setelah menyelesaikan quiz.
                        </p>

                    </div>

                    <div class="hidden md:flex w-24 h-24 rounded-3xl bg-white/10 items-center justify-center">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-12 h-12 text-white"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M9 12h6m-6 4h6M7 8h10M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>

                        </svg>

                    </div>

                </div>

            </div>

            <div class="p-8">

                @if($result->score >= $quiz->passing_score)

                    <div class="bg-green-50 border border-green-200 rounded-2xl p-4 mb-6">

                        <div class="flex items-center gap-4">

                            <div class="w-12 h-12 rounded-2xl bg-green-100 flex items-center justify-center">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-7 h-7 text-green-600"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M5 13l4 4L19 7"/>

                                </svg>

                            </div>

                            <div>

                                <h3 class="font-bold text-green-700 text-lg">
                                    Kamu Lulus Quiz
                                </h3>

                                <p class="text-green-600">
                                    Selamat! Nilaimu berhasil memenuhi passing score.
                                </p>

                            </div>

                        </div>

                    </div>

                @else

                    <div class="bg-red-50 border border-red-200 rounded-3xl p-6 mb-8">

                        <div class="flex items-center gap-4">

                            <div class="w-14 h-14 rounded-2xl bg-red-100 flex items-center justify-center">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-7 h-7 text-red-600"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M6 18L18 6M6 6l12 12"/>

                                </svg>

                            </div>

                            <div>

                                <h3 class="font-bold text-red-700 text-lg">
                                    Belum Lulus
                                </h3>

                                <p class="text-red-600">
                                    Nilaimu belum mencapai passing score. Kamu masih bisa mencoba lagi.
                                </p>

                            </div>

                        </div>

                    </div>

                @endif

                <div class="grid md:grid-cols-3 gap-4 mb-8">

                    <div class="bg-purple-50 border border-purple-100 rounded-2xl p-5">
                        <p class="text-xs uppercase font-bold text-gray-500 mb-1">
                            Skor Saat Ini
                        </p>
                    
                        <div class="flex items-end gap-2">
                            <h2 class="text-4xl font-black text-purple-600">
                                {{ $result->score }}
                            </h2>
                            <span class="text-gray-400 text-sm mb-1">/100</span>
                        </div>
                    </div>
                
                    <div class="bg-indigo-50 border border-indigo-100 rounded-2xl p-5">
                        <p class="text-xs uppercase font-bold text-gray-500 mb-1">
                            Passing Score
                        </p>

                        <h2 class="text-4xl font-black text-indigo-600">
                            {{ $quiz->passing_score }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-500">
                            nilai minimum
                        </p>
                    </div>
                
                    <div class="bg-amber-50 border border-amber-100 rounded-2xl p-5">

                        <div class="flex items-center justify-between">
                        
                            <div>
                            
                                <p class="text-xs uppercase font-bold text-gray-500 mb-2">
                                    Jawaban Benar
                                </p>
                            
                                <div class="flex items-end gap-2">
                                
                                    <h2 class="text-4xl font-black text-amber-600">
                                        {{ $result->correct_answers }}
                                    </h2>
                                
                                    <span class="text-gray-400 text-lg mb-1">
                                        / {{ $quiz->questions->count() }}
                                    </span>
                                
                                </div>
                            
                                <p class="mt-1 text-sm text-gray-500">
                                    soal berhasil dijawab
                                </p>
                            
                            </div>
                        
                            <div class="w-14 h-14 rounded-2xl bg-amber-100 flex items-center justify-center">
                            
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-7 h-7 text-amber-600"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor">
                            
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M5 13l4 4L19 7"/>
                            
                                </svg>
                            
                            </div>
                        
                        </div>
                    
                    </div>
                
                </div>

                <div class="flex flex-wrap justify-center gap-4 mt-8">

                    <a href="{{ route('quizzes.take', $quiz->quiz_id) }}"
                       class="inline-flex items-center justify-center px-6 py-3 rounded-2xl font-bold text-white bg-gradient-to-r from-fuchsia-600 via-purple-600 to-indigo-600 shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300">

                        Coba Lagi

                    </a>

                    <a href="{{ route('lessons.show', $quiz->lesson_id) }}"
                       class="inline-flex items-center justify-center px-6 py-3 rounded-2xl font-bold text-gray-700 bg-gray-100 hover:bg-gray-200 border border-gray-200 transition">

                        Kembali ke Lesson

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</x-app-layout>
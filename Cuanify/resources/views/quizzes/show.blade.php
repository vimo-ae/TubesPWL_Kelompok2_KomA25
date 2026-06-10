<x-app-layout>

    @section('title', 'Quiz Center - Cuanify')

    <div class="min-h-screen -mx-4 sm:-mx-6 lg:-mx-8 -mt-6 p-6">
        <div class="max-w-7xl mx-auto">

            <a href="{{ url()->previous() }}"
               class="inline-flex items-center gap-2 text-sm font-semibold text-purple-600 hover:text-purple-800 mb-6 transition">
                ← Kembali ke Lesson
            </a>

            <div class="relative overflow-hidden rounded-[35px] bg-gradient-to-r from-fuchsia-600 via-purple-600 to-indigo-600 p-8 md:p-10 shadow-xl mb-8">
                <div class="absolute -top-20 -right-16 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-20 -left-16 w-72 h-72 bg-purple-500/20 rounded-full blur-3xl"></div>

                <div class="relative z-10">
                    <span class="bg-white/20 text-white text-xs font-bold px-4 py-1.5 rounded-full tracking-wider uppercase backdrop-blur-sm">
                        Quiz Center
                    </span>

                    <h1 class="text-3xl md:text-5xl font-extrabold text-white mt-4 tracking-tight leading-tight">
                        Quiz: {{ $lesson->title }}
                    </h1>

                    <p class="text-purple-100 mt-2 max-w-2xl text-sm md:text-base font-medium">
                        Uji pemahamanmu terhadap materi yang telah dipelajari, kumpulkan exp, dan raih skor terbaikmu untuk membuka modul berikutnya.
                    </p>
                </div>
            </div>

            {{-- LOGIKAL VALIDASI PEMERIKSAAN KUIS --}}
            @if ($lesson->quiz)
                @php $quiz = $lesson->quiz; @endphp

                <div class="bg-white rounded-[32px] border border-purple-100 shadow-xl p-6 md:p-8 mb-6 hover:shadow-2xl hover:border-purple-200/80 transition duration-300">
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                        <div class="flex flex-col sm:flex-row items-start gap-4 flex-1">
                            <div class="w-14 h-14 shrink-0 rounded-2xl bg-gradient-to-br from-purple-500 to-indigo-600 flex items-center justify-center text-white shadow-lg shadow-purple-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                            </div>

                            <div class="space-y-1">
                                <h2 class="text-xl md:text-2xl font-black text-gray-800 tracking-tight">
                                    {{ $quiz->title ?? 'Mulai Evaluasi Pemahaman' }}
                                </h2>
                                
                                <div class="flex flex-wrap gap-2 pt-1">
                                    <span class="bg-purple-50 border border-purple-100 text-purple-700 text-xs font-bold px-3 py-1 rounded-xl flex items-center gap-1.5">
                                        <span class="w-1.5 h-1.5 rounded-full bg-purple-500"></span>
                                        Passing Score: {{ $quiz->passing_score ?? '70' }}%
                                    </span>

                                    <span class="bg-indigo-50 border border-indigo-100 text-indigo-700 text-xs font-bold px-3 py-1 rounded-xl flex items-center gap-1.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        Durasi: {{ $quiz->time_limit ?? '15' }} Menit
                                    </span>
                                </div>

                                <div class="pt-3">
                                    @if(isset($quiz->best_score) && $quiz->best_score !== null)
                                        <div class="inline-flex items-center gap-2 bg-emerald-50 border border-emerald-100 text-emerald-700 px-4 py-2 rounded-xl text-xs font-bold shadow-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0Z" />
                                            </svg>
                                            Skor Tertinggi Anda: <span class="text-sm font-black">{{ $quiz->best_score }}</span> / 100
                                        </div>
                                    @else
                                        <div class="inline-flex items-center gap-2 bg-gray-50 border border-gray-100 text-gray-500 px-4 py-2 rounded-xl text-xs font-semibold">
                                            <span class="w-1.5 h-1.5 rounded-full bg-gray-400 animate-pulse"></span>
                                            Belum ada riwayat pengerjaan kuis ini
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="shrink-0">
                            <a href="{{ route('quizzes.take', $quiz->quiz_id) }}"
                               class="w-full lg:w-auto inline-flex items-center justify-center gap-2 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white px-8 py-4 rounded-2xl font-bold text-sm shadow-md shadow-purple-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-0.5 group">
                                <span>{{ isset($quiz->best_score) ? 'Ulangi Ujian Quiz' : 'Mulai Kerjakan Sekarang' }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 transition duration-300 group-hover:translate-x-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                </svg>
                            </a>
                        </div>

                    </div>
                </div>

            @else
                {{-- Tampilan Placeholder Kosong Jika Instruktur Belum Menaruh Butir Soal --}}
                <div class="bg-white rounded-[35px] p-12 text-center border border-dashed border-purple-200 shadow-inner max-w-2xl mx-auto mt-12">
                    <div class="w-20 h-20 mx-auto mb-5 rounded-3xl bg-amber-50 border border-amber-100 flex items-center justify-center text-amber-500 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-extrabold text-gray-800 tracking-tight mb-2">
                        Lembar Kuis Belum Tersedia
                    </h3>
                    <p class="text-gray-400 text-sm max-w-sm mx-auto leading-relaxed">
                        Instruktur kelas belum mengonfigurasi atau memublikasikan butir pertanyaan evaluasi untuk modul materi ini.
                    </p>
                </div>
            @endif

        </div>
    </div>

</x-app-layout>
<x-app-layout>

    @section('title', 'Mengerjakan Quiz - Cuanify')

    <div class="min-h-screen bg-[#f7eef7] -mx-4 sm:-mx-6 lg:-mx-8 -mt-6 p-6">
        <div class="max-w-7xl mx-auto">

            {{-- Jumbotron Header Banner --}}
            <div class="relative overflow-hidden rounded-[35px] bg-gradient-to-r from-fuchsia-600 via-purple-600 to-indigo-700 p-8 shadow-xl mb-8">
                <div class="absolute top-0 right-0 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>

                <div class="relative z-10 flex items-center justify-between">
                    <div>
                        <span class="bg-white/20 text-white text-xs px-3 py-1 rounded-full font-bold uppercase tracking-wider">
                            Quiz Active Mode
                        </span>
                        <h1 class="text-3xl font-extrabold text-white mt-3 tracking-tight">
                            {{ $quiz->title }}
                        </h1>
                        <p class="text-purple-100 text-sm mt-1">
                            Baca pertanyaan dengan teliti. Jawab semua pertanyaan sebelum waktu Anda habis.
                        </p>
                    </div>

                    <div class="hidden md:block opacity-20 shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6M7 8h10M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Sticky Panel: Timer countdown (Sengaja dibuat sticky agar siswa selalu awas dengan sisa waktu) --}}
            <div class="sticky top-6 z-30 bg-red-50/95 backdrop-blur-md border border-red-200 rounded-2xl p-4 mb-8 shadow-md flex items-center justify-between transition-all">
                <div>
                    <p class="text-[10px] uppercase font-black tracking-widest text-red-500">
                        Sisa Waktu Pengerjaan
                    </p>
                    <h2 id="timer" class="text-3xl font-black text-red-600 tracking-tight leading-none mt-1">
                        --:--
                    </h2>
                </div>
                <div class="w-10 h-10 rounded-xl bg-red-100 flex items-center justify-center text-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 animate-pulse">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>
            </div>

            {{-- FORM LEMBAR JAWABAN --}}
            <form id="quizForm" method="POST" action="{{ route('quizzes.submit', $quiz->quiz_id) }}">
                @csrf

                <div class="space-y-6">
                    @foreach($quiz->questions as $question)
                        <div class="bg-white rounded-[30px] shadow-sm border border-purple-100 p-6 md:p-8 hover:shadow-md transition">

                            {{-- Baris Pertanyaan --}}
                            <div class="flex items-start gap-4 mb-6">
                                <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-fuchsia-500 to-purple-600 text-white flex items-center justify-center font-bold text-sm shrink-0 shadow-sm">
                                    {{ $loop->iteration }}
                                </div>
                                <h3 class="text-lg font-bold text-gray-800 tracking-tight pt-1">
                                    {{ $question->question_text }}
                                </h3>
                            </div>

                            {{-- KONDISI PERTANYAAN PILIHAN GANDA --}}
                            @if($question->question_type === 'multiple_choice' && $question->options->count())
                                <div class="grid grid-cols-1 gap-3">
                                    @foreach($question->options as $option)
                                        <label class="flex items-center gap-3 p-4 rounded-2xl border border-gray-100 bg-gray-50/50 hover:border-purple-400 hover:bg-purple-50/60 transition cursor-pointer group">
                                            <input type="radio"
                                                   name="questions[{{ $question->question_id }}][answer]"
                                                   value="{{ $option->option_id }}"
                                                   class="w-5 h-5 text-purple-600 border-gray-300 focus:ring-purple-400">
                                            <span class="font-semibold text-sm text-gray-600 group-hover:text-purple-900 transition">
                                                {{ $option->option_text }}
                                            </span>
                                        </label>
                                    @endforeach
                                </div>

                            {{-- KONDISI PERTANYAAN TRUE / FALSE --}}
                            @elseif($question->question_type === 'true_false')
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <label class="flex items-center gap-3 p-4 rounded-2xl border border-gray-100 bg-gray-50/50 hover:border-emerald-400 hover:bg-emerald-50/40 transition cursor-pointer group">
                                        <input type="radio"
                                               name="questions[{{ $question->question_id }}][answer]"
                                               value="True"
                                               class="w-5 h-5 text-emerald-600 border-gray-300 focus:ring-emerald-400">
                                        <span class="font-bold text-sm text-gray-600 group-hover:text-emerald-800">True (Benar)</span>
                                    </label>

                                    <label class="flex items-center gap-3 p-4 rounded-2xl border border-gray-100 bg-gray-50/50 hover:border-rose-400 hover:bg-rose-50/40 transition cursor-pointer group">
                                        <input type="radio"
                                               name="questions[{{ $question->question_id }}][answer]"
                                               value="False"
                                               class="w-5 h-5 text-rose-600 border-gray-300 focus:ring-rose-400">
                                        <span class="font-bold text-sm text-gray-600 group-hover:text-rose-800">False (Salah)</span>
                                    </label>
                                </div>

                            @else
                                {{-- Penanganan Fallback Jika Data Rusak --}}
                                <div class="bg-amber-50 text-amber-700 p-4 rounded-xl border border-amber-200 text-sm font-medium flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-8-5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-1.5 0v-4.5A.75.75 0 0 1 10 5Zm0 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
                                    </svg>
                                    Opsi jawaban tidak ditemukan. Hubungi instruktur untuk memperbaiki modul kuis ini.
                                </div>
                            @endif

                        </div>
                    @endforeach
                </div>

                {{-- AREA ACTION SUBMIT FORM --}}
                <div class="mt-8 mb-12">
                    <button type="submit" class="w-full bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white py-4 rounded-2xl font-bold shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-0.5 flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span>Selesaikan & Kirim Jawaban Quiz</span>
                    </button>
                </div>

            </form>
        </div>
    </div>

</x-app-layout>

{{-- TIMER COUNTDOWN ENGINE SCRIPT --}}
<script>
    let timeLeft = {{ ($quiz->time_limit ?? 15) * 60 }};
    const timerElement = document.getElementById('timer');

    const timer = setInterval(function () {
        let minutes = Math.floor(timeLeft / 60);
        let seconds = timeLeft % 60;

        timerElement.innerText = minutes + ':' + String(seconds).padStart(2, '0');

        // Mengubah warna teks timer menjadi berkedip merah terang saat kritis (< 1 menit)
        if (timeLeft <= 60) {
            timerElement.classList.add('animate-pulse');
        }

        if (timeLeft <= 0) {
            clearInterval(timer);
            alert('Waktu pengerjaan telah habis! Lembar ujian kuis akan otomatis disimpan.');
            document.getElementById('quizForm').submit();
        }

        timeLeft--;
    }, 1000);
</script>
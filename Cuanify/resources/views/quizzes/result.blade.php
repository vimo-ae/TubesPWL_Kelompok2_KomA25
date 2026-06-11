<x-app-layout>

    @section('title', 'Hasil Evaluasi Quiz - Cuanify')

    <div class="min-h-screen -mx-4 sm:-mx-6 lg:-mx-8 -mt-6 p-6">
        <div class="max-w-7xl mx-auto">
            <div class="max-w-4xl mx-auto">

                <div class="bg-white rounded-[35px] shadow-xl border border-purple-100 overflow-hidden mb-6">

                    <div class="bg-gradient-to-r from-fuchsia-600 via-purple-600 to-indigo-600 p-6 md:p-8 relative overflow-hidden">
                        <div class="absolute -top-12 -right-12 w-48 h-48 bg-white/10 rounded-full blur-2xl"></div>

                        <div class="relative z-10 flex items-center justify-between">
                            <div>
                                <span class="inline-flex items-center px-4 py-1.5 rounded-full bg-white/20 text-white text-xs font-bold tracking-wider uppercase backdrop-blur-sm">
                                    Quiz Selesai
                                </span>
                                <h1 class="text-3xl md:text-4xl font-black text-white mt-4 tracking-tight">
                                    Lembar Hasil Ujian
                                </h1>
                                <p class="text-purple-100 text-sm mt-1 max-w-md">
                                    Analisis performa pencapaian nilai kompetensi Anda setelah menyelesaikan sesi evaluasi kuis.
                                </p>
                            </div>

                            <div class="hidden md:flex w-20 h-20 rounded-2xl bg-white/10 items-center justify-center backdrop-blur-sm shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6M7 8h10M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 md:p-8">

                        @if($result->score >= $quiz->passing_score)
                            <div class="bg-emerald-50 border border-emerald-100 rounded-2xl p-5 mb-6 shadow-sm">
                                <div class="flex items-start gap-4">
                                    <div class="w-12 h-12 rounded-xl bg-emerald-500 flex items-center justify-center text-white shrink-0 shadow-md shadow-emerald-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0Z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-extrabold text-emerald-800 text-lg tracking-tight">
                                            Selamat, Anda Dinyatakan Lulus!
                                        </h3>
                                        <p class="text-emerald-600 text-sm mt-0.5 leading-relaxed">
                                            Nilai perolehan Anda berhasil melampaui standar passing score minimum materi ini. Kompetensi Anda siap untuk melanjutkan ke bab eksplorasi berikutnya.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="bg-rose-50 border border-rose-100 rounded-2xl p-5 mb-6 shadow-sm">
                                <div class="flex items-start gap-4">
                                    <div class="w-12 h-12 rounded-xl bg-rose-500 flex items-center justify-center text-white shrink-0 shadow-md shadow-rose-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3Z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-extrabold text-rose-800 text-lg tracking-tight">
                                            Maaf, Belum Mencapai Passing Score
                                        </h3>
                                        <p class="text-rose-600 text-sm mt-0.5 leading-relaxed">
                                            Nilai perolehan Anda saat ini masih berada di bawah batas ketuntasan minimum modul. Jangan berkecil hati, silakan tinjau kembali rangkuman materi lalu coba lagi.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">

                            <div class="bg-purple-50/60 border border-purple-100 rounded-2xl p-5 flex flex-col justify-between">
                                <p class="text-xs uppercase font-black text-purple-500 tracking-wider">
                                    Skor Anda
                                </p>
                                <div class="flex items-end gap-1.5 mt-3">
                                    <h2 class="text-4xl font-black text-purple-700 tracking-tight leading-none">
                                        {{ $result->score }}
                                    </h2>
                                    <span class="text-purple-400 text-sm font-bold">/ 100</span>
                                </div>
                                <p class="mt-2 text-xs text-purple-500 font-medium">Berdasarkan bobot kebenaran</p>
                            </div>

                            <div class="bg-indigo-50/60 border border-indigo-100 rounded-2xl p-5 flex flex-col justify-between">
                                <p class="text-xs uppercase font-black text-indigo-500 tracking-wider">
                                    Passing Score
                                </p>
                                <div class="flex items-end gap-1.5 mt-3">
                                    <h2 class="text-4xl font-black text-indigo-700 tracking-tight leading-none">
                                        {{ $quiz->passing_score }}
                                    </h2>
                                    <span class="text-indigo-400 text-sm font-bold">%</span>
                                </div>
                                <p class="mt-2 text-xs text-indigo-500 font-medium">Batas ambang batas aman kelulusan</p>
                            </div>

                            <div class="bg-amber-50/60 border border-amber-100 rounded-2xl p-5 flex flex-col justify-between">
                                <p class="text-xs uppercase font-black text-amber-500 tracking-wider">
                                    Akurasi Jawaban
                                </p>
                                <div class="flex items-end gap-1.5 mt-3">
                                    <h2 class="text-4xl font-black text-amber-700 tracking-tight leading-none">
                                        {{ $result->total_correct }}
                                    </h2>
                                    <span class="text-amber-400 text-sm font-bold">/ {{ $quiz->questions->count() }}</span>
                                </div>
                                <p class="mt-2 text-xs text-amber-600 font-medium">Butir pertanyaan terjawab benar</p>
                            </div>

                        </div>

                        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4 border-t border-gray-100">
                            <a href="{{ route('quizzes.take', $quiz->quiz_id) }}"
                               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-2xl font-bold text-sm text-white bg-gradient-to-r from-purple-600 to-indigo-600 shadow-lg shadow-purple-100 hover:shadow-xl hover:from-purple-700 hover:to-indigo-700 hover:-translate-y-0.5 transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                </svg>
                                <span>Coba Remedial Kembali</span>
                            </a>

                            <a href="{{ route('lessons.show', $quiz->lesson_id) }}"
                               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-2xl font-bold text-sm text-gray-700 bg-gray-100 hover:bg-gray-200 border border-gray-200/80 transition duration-200">
                                <span>Kembali ke Halaman Materi</span>
                            </a>
                        </div>

                    </div>
                </div>

                <div class="bg-purple-900 rounded-[28px] p-6 text-white shadow-md flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div class="space-y-1">
                        <h4 class="font-extrabold text-base tracking-tight text-fuchsia-300">Butuh Pendalaman Materi Instan?</h4>
                        <p class="text-purple-200 text-xs leading-relaxed max-w-xl">
                            Jika Anda merasa kesulitan pada beberapa butir soal di atas, kami menyarankan Anda membuka kembali forum diskusi kelas atau catatan rangkuman teks pelajaran.
                        </p>
                    </div>
                    <a href="{{ route('lessons.show', $quiz->lesson_id) }}" class="text-xs bg-white/10 hover:bg-white/20 border border-white/20 font-bold px-4 py-2.5 rounded-xl whitespace-nowrap text-center transition">
                        Buka Ruang Modul →
                    </a>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
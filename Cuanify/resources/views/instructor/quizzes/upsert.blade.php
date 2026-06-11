<x-app-layout>

    @section('title', 'Manage Quiz - Cuanify')

    <div class="min-h-screen -mx-4 sm:-mx-6 lg:-mx-8 -mt-6 p-6">
        <div class="max-w-7xl mx-auto">

            <a href="{{ route('instructor.courses.show', $lesson->course_id ?? $lesson->course->course_id) }}"
               class="inline-flex items-center gap-2 text-sm font-semibold text-purple-600 hover:text-purple-800 mb-6 transition">
                ← Kembali ke Detail Course
            </a>

            <div class="bg-white rounded-[35px] overflow-hidden shadow-xl border border-purple-100 p-8 md:p-10">

                <div class="mb-8">
                    <h1 class="text-3xl font-extrabold text-gray-800 tracking-tight">
                        {{ $quiz ? 'Kelola Struktur Quiz' : 'Buat Quiz Evaluasi' }}
                    </h1>
                    <p class="text-gray-500 text-sm mt-1">
                        Tentukan parameter kelulusan, durasi pengerjaan, dan susunan daftar pertanyaan evaluasi untuk siswa.
                    </p>
                </div>

                <form method="POST" action="{{ route('instructor.quizzes.storeOrUpdate', $lesson->lesson_id) }}" class="space-y-6">
                    @csrf

                    <div class="bg-purple-50/40 p-6 rounded-2xl border border-purple-100/70">
                        <h2 class="text-xs uppercase tracking-[2px] text-purple-700 font-bold mb-4">Konfigurasi Aturan Kuis</h2>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                            <div>
                                <label class="block text-xs font-bold text-gray-700 mb-2 uppercase">Judul Quiz</label>
                                <input type="text" name="title" value="{{ $quiz->title ?? '' }}" class="w-full bg-white border border-gray-200 text-gray-800 p-3 rounded-xl text-sm focus:border-purple-400 focus:ring-4 focus:ring-purple-100 transition outline-none" placeholder="Contoh: Kuis Valuasi Keuangan">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-700 mb-2 uppercase">Passing Score (%)</label>
                                <input type="number" name="passing_score" value="{{ $quiz->passing_score ?? 70 }}" class="w-full bg-white border border-gray-200 text-gray-800 p-3 rounded-xl text-sm focus:border-purple-400 focus:ring-4 focus:ring-purple-100 transition outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-700 mb-2 uppercase">Time Limit (Menit)</label>
                                <input type="number" name="time_limit" value="{{ $quiz->time_limit ?? '' }}" class="w-full bg-white border border-gray-200 text-gray-800 p-3 rounded-xl text-sm focus:border-purple-400 focus:ring-4 focus:ring-purple-100 transition outline-none" placeholder="Kosongkan jika tidak dibatasi">
                            </div>
                        </div>
                    </div>

                    <div class="pt-4">
                        <h2 class="text-lg font-bold text-gray-800 tracking-tight mb-1">Daftar Pertanyaan Kuis</h2>
                        <p class="text-xs text-gray-400">Pilihan input jawaban akan berubah dinamis berdasarkan tipe pertanyaan yang Anda tentukan.</p>
                        <hr class="border-gray-100 mt-3 mb-6">
                    </div>

                    <div id="questions-container" class="space-y-6">

                        @if($quiz)
                            @foreach($quiz->questions as $qIndex => $question)
                                <div class="bg-gray-50/60 border border-gray-200/80 p-6 rounded-2xl space-y-4 question-box">

                                    <input type="hidden" name="questions[{{ $qIndex }}][question_id]" value="{{ $question->question_id }}">

                                    <div>
                                        <label class="block text-sm font-bold text-gray-700 mb-2">Pertanyaan #{{ $qIndex + 1 }}</label>
                                        <input type="text" name="questions[{{ $qIndex }}][question_text]" value="{{ $question->question_text }}" class="w-full bg-white border border-gray-200 text-gray-800 p-3 rounded-xl text-sm focus:border-purple-400 focus:ring-4 focus:ring-purple-100 transition outline-none">
                                    </div>

                                    <div>
                                        <label class="block text-xs font-bold text-gray-500 mb-1.5 uppercase">Tipe Pertanyaan</label>
                                        <select name="questions[{{ $qIndex }}][question_type]" onchange="handleTypeChange(this)" class="w-full bg-white border border-gray-200 text-gray-800 p-3 rounded-xl text-sm focus:border-purple-400 focus:ring-4 focus:ring-purple-100 transition outline-none cursor-pointer">
                                            <option value="multiple_choice" {{ $question->question_type == 'multiple_choice' ? 'selected' : '' }}>Multiple Choice (Pilihan Ganda)</option>
                                            <option value="true_false" {{ $question->question_type == 'true_false' ? 'selected' : '' }}>True / False (Benar / Salah)</option>
                                        </select>
                                    </div>

<div class="mc-container {{ $question->question_type === 'multiple_choice' ? '' : 'hidden' }} pt-2">
    <label class="block text-xs font-bold text-gray-500 mb-2 uppercase">Isi Pilihan & Pilih Jawaban Benar</label>
    <div class="space-y-2.5">
        @php $mcIndex = 0; @endphp
        @foreach($question->options as $option)
            @if($option->option_text !== 'True' && $option->option_text !== 'False')
                <div class="flex items-center gap-3 bg-white p-2 rounded-xl border border-gray-100 shadow-sm">
                    <input type="hidden" name="questions[{{ $qIndex }}][options][{{ $mcIndex }}][option_id]" value="{{ $option->option_id }}">
                    <input type="text" name="questions[{{ $qIndex }}][options][{{ $mcIndex }}][text]" value="{{ $option->option_text }}" class="flex-1 border-0 bg-transparent p-1 text-sm text-gray-800 outline-none focus:ring-0">
                    <label class="flex items-center gap-1.5 px-3 py-1 bg-gray-50 rounded-lg border text-xs cursor-pointer hover:bg-purple-50 transition">
                        <input type="radio" name="questions[{{ $qIndex }}][correct_answer]" value="{{ $mcIndex }}" class="text-purple-600" {{ $option->is_correct ? 'checked' : '' }}>
                        <span>Kunci</span>
                    </label>
                </div>
                @php $mcIndex++; @endphp
            @endif
        @endforeach

        @if($mcIndex === 0)
            @for($i = 0; $i < 4; $i++)
                <div class="flex items-center gap-3 bg-white p-2 rounded-xl border border-gray-100 shadow-sm">
                    <input type="hidden" name="questions[{{ $qIndex }}][options][{{ $i }}][option_id]" value="">
                    <input type="text" name="questions[{{ $qIndex }}][options][{{ $i }}][text]" class="flex-1 border-0 bg-transparent p-1 text-sm text-gray-800 outline-none focus:ring-0" placeholder="Opsi {{ chr(65 + $i) }}">
                    <label class="flex items-center gap-1.5 px-3 py-1 bg-gray-50 rounded-lg border text-xs cursor-pointer hover:bg-purple-50 transition">
                        <input type="radio" name="questions[{{ $qIndex }}][correct_answer]" value="{{ $i }}" class="text-purple-600" {{ $i === 0 ? 'checked' : '' }}>
                        <span>Kunci</span>
                    </label>
                </div>
            @endfor
        @endif
    </div>
</div>
                            @endforeach
                        @endif

                    </div>

                    <hr class="border-gray-100 my-8">

                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                        <button type="button" onclick="addQuestion()" class="w-full sm:w-auto inline-flex items-center justify-center bg-white hover:bg-purple-50 text-purple-700 border border-purple-200 px-6 py-3 rounded-xl font-bold text-sm shadow-sm transition duration-300 gap-2">
                            <span class="text-lg font-black leading-none -mt-0.5">+</span>
                            <span>Tambah Butir Soal</span>
                        </button>

                        <div class="flex items-center gap-3 w-full sm:w-auto justify-end">
                            <a href="{{ route('instructor.courses.show', $lesson->course_id ?? $lesson->course->course_id) }}" class="w-full sm:w-auto text-center bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-3 rounded-xl font-bold text-sm transition duration-300">Batal</a>
                            <button type="submit" class="w-full sm:w-auto inline-flex items-center justify-center bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white px-6 py-3 rounded-xl font-bold text-sm shadow-md transition-all duration-300 hover:-translate-y-0.5 gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                                Simpan Struktur Quiz
                            </button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

</x-app-layout>

<script>
    let index = {{ $quiz ? $quiz->questions->max('question_id') + 1 : 0 }};

    function handleTypeChange(selectElement) {
        const parentBox = selectElement.closest('.question-box');
        const mcContainer = parentBox.querySelector('.mc-container');
        const tfContainer = parentBox.querySelector('.tf-container');

        if (selectElement.value === 'multiple_choice') {
            mcContainer.classList.remove('hidden');
            tfContainer.classList.add('hidden');
        } else {
            mcContainer.classList.add('hidden');
            tfContainer.classList.remove('hidden');
        }
    }

    function addQuestion() {
    let uniqueIndex = Date.now();
    let html = `
    <div class="bg-gray-50/60 border border-gray-200/80 p-6 rounded-2xl space-y-4 question-box">
        <input type="hidden" name="questions[${uniqueIndex}][question_id]" value="">
        
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Pertanyaan Baru</label>
            <input type="text" name="questions[${uniqueIndex}][question_text]" class="w-full p-3 rounded-xl border" placeholder="Tulis pertanyaan...">
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-500 mb-1.5 uppercase">Tipe Pertanyaan</label>
            <select name="questions[${uniqueIndex}][question_type]" onchange="handleTypeChange(this)" class="w-full p-3 rounded-xl border">
                <option value="multiple_choice">Multiple Choice</option>
                <option value="true_false">True / False</option>
            </select>
        </div>

        <div class="mc-container space-y-2.5">
            ${[0, 1, 2, 3].map(i => `
                <div class="flex items-center gap-3 bg-white p-2 rounded-xl border">
                    <input type="text" name="questions[${uniqueIndex}][options][${i}][text]" class="flex-1 border-0" placeholder="Opsi ${String.fromCharCode(65 + i)}">
                    <label class="flex items-center gap-1.5 px-3 py-1 bg-gray-50 rounded-lg border text-xs">
                        <input type="radio" name="questions[${uniqueIndex}][correct_answer]" value="${i}" ${i === 0 ? 'checked' : ''}> 
                        <span>Kunci</span>
                    </label>
                </div>
            `).join('')}
        </div>
        
        <div class="tf-container hidden pt-2">
            <select name="questions[${uniqueIndex}][correct_answer]" class="w-full p-3 border rounded-xl">
                <option value="True">True</option>
                <option value="False">False</option>
            </select>
        </div>
    </div>
    `;
    document.getElementById('questions-container').insertAdjacentHTML('beforeend', html);
    index++;
}
</script>
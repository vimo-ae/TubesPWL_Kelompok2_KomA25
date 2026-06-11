<div class="space-y-6">

    <div>
        <label class="block text-sm font-bold text-gray-700 mb-2">
            Judul Lesson
        </label>
        <input
            type="text"
            name="title"
            placeholder="Contoh: Pengenalan Konsep Compound Interest"
            value="{{ old('title', $lesson->title ?? '') }}"
            class="w-full bg-gray-50 border border-gray-200 text-gray-800 p-3 rounded-xl text-sm focus:bg-white focus:border-purple-400 focus:ring-4 focus:ring-purple-100 transition duration-200 outline-none @error('title') border-red-300 ring-4 ring-red-50 @enderror">
        @error('title')
            <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-bold text-gray-700 mb-2">
            Isi Materi Pembelajaran
        </label>
        <div class="ck-editor-wrapper rounded-xl overflow-hidden @error('content') border border-red-300 ring-4 ring-red-50 @enderror">
            <textarea
                id="editor"
                name="content"
                placeholder="Tuliskan materi pembelajaran secara mendalam di sini..."
                rows="10"
                class="w-full bg-gray-50 border border-gray-200 p-3 text-sm focus:bg-white outline-none">{{ old('content', $lesson->content ?? '') }}</textarea>
        </div>
        @error('content')
            <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-bold text-gray-700 mb-2">
            Link Video Pendukung (YouTube)
        </label>
        <div class="relative">
            <input
                type="url"
                name="video_url"
                placeholder="https://www.youtube.com/watch?v=..."
                value="{{ old('video_url', $lesson->video_url ?? '') }}"
                class="w-full bg-gray-50 border border-gray-200 text-gray-800 p-3 rounded-xl text-sm focus:bg-white focus:border-purple-400 focus:ring-4 focus:ring-purple-100 transition duration-200 outline-none @error('video_url') border-red-300 ring-4 ring-red-50 @enderror">
        </div>
        <p class="text-gray-400 text-[11px] mt-1">Opsional: Sisipkan tautan video YouTube jika modul membutuhkan visualisasi tambahan.</p>
        @error('video_url')
            <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-bold text-gray-700 mb-2">
            Reward Batas XP Siswa
        </label>
        <select
            name="xp_reward"
            class="w-full bg-gray-50 border border-gray-200 text-gray-800 p-3 rounded-xl text-sm focus:bg-white focus:border-purple-400 focus:ring-4 focus:ring-purple-100 transition duration-200 outline-none cursor-pointer">

            <option value="30"
                {{ old('xp_reward', $lesson->xp_reward ?? 30) == 30 ? 'selected' : '' }}>
                30 XP — Materi Ringkas / Dasar
            </option>

            <option value="50"
                {{ old('xp_reward', $lesson->xp_reward ?? 30) == 50 ? 'selected' : '' }}>
                50 XP — Materi Menengah
            </option>

            <option value="100"
                {{ old('xp_reward', $lesson->xp_reward ?? 30) == 100 ? 'selected' : '' }}>
                100 XP — Materi Kompleks & Penting
            </option>

        </select>
    </div>

    <div class="bg-purple-50/40 p-5 rounded-2xl border border-purple-100/70">

        <label class="flex items-center gap-3 cursor-pointer select-none">
            <input
                type="checkbox"
                id="hasQuiz"
                name="has_quiz"
                value="1"
                class="w-4 h-4 rounded text-purple-600 focus:ring-purple-500 border-gray-300 focus:ring-offset-0 cursor-pointer transition"
                {{ old('has_quiz', $lesson->has_quiz ?? false) ? 'checked' : '' }}>

            <div class="flex flex-col">
                <span class="font-bold text-gray-800 text-sm">Lampirkan Quiz Evaluasi</span>
                <span class="text-gray-400 text-xs font-medium">Siswa wajib menyelesaikan kuis untuk memvalidasi pemahaman materi ini.</span>
            </div>
        </label>

        {{-- Panel Quiz — muncul ketika checkbox dicentang --}}
        <div
            id="quizSection"
            class="mt-4 pt-4 border-t border-purple-100 {{ old('has_quiz', $lesson->has_quiz ?? false) ? '' : 'hidden' }}">

            @if(isset($lesson) && $lesson->exists)
                <a href="{{ route('instructor.quizzes.upsert', $lesson->lesson_id) }}"
                   class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-bold text-sm rounded-xl transition shadow-md shadow-purple-100 hover:-translate-y-0.5 duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5.586a1 1 0 0 1 .707.293l5.414 5.414a1 1 0 0 1 .293.707V19a2 2 0 0 1-2 2z" />
                    </svg>
                    {{ isset($lesson->quiz) || ($lesson->quiz ?? false) ? 'Kelola Pertanyaan Quiz' : 'Buat Struktur Quiz Perdana' }}
                </a>
            @else
                {{-- Peringatan jika lesson belum disimpan (lesson baru, belum ada ID) --}}
                <div class="text-xs text-amber-700 bg-amber-50 border border-amber-200 p-4 rounded-xl flex items-start gap-2.5 leading-relaxed">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 shrink-0 text-amber-500 mt-0.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M10.29 3.86l-8.1 14A1 1 0 003.05 19h17.9a1 1 0 00.86-1.5l-8.1-14a1 1 0 00-1.72 0z" />
                    </svg>
                    <span><b>Catatan Penting:</b> Silakan amankan draf atau buat data materi lesson ini terlebih dahulu agar sistem database memiliki token kunci untuk mengikat struktur data kuis dengan benar.</span>
                </div>
            @endif

        </div>

    </div>

</div>

<style>
    /* Mengatasi Tailwind CSS Reset di dalam ruang lingkup CKEditor 5 */
    .ck-editor__editable_inline h1 { font-size: 2.25rem !important; font-weight: 800 !important; display: block !important; margin-top: 1.5rem !important; margin-bottom: 0.5rem !important; }
    .ck-editor__editable_inline h2 { font-size: 1.875rem !important; font-weight: 700 !important; display: block !important; margin-top: 1.25rem !important; margin-bottom: 0.5rem !important; }
    .ck-editor__editable_inline h3 { font-size: 1.5rem !important; font-weight: 600 !important; display: block !important; margin-top: 1rem !important; margin-bottom: 0.5rem !important; }

    /* Mengatur tinggi minimal editor & dekorasi border radius */
    .ck-editor__editable_inline { min-height: 280px; border-bottom-left-radius: 12px !important; border-bottom-right-radius: 12px !important; background-color: #f9fafb !important; }
    .ck-toolbar { border-top-left-radius: 12px !important; border-top-right-radius: 12px !important; border-color: #e5e7eb !important; background-color: #ffffff !important; }
</style>
<div class="space-y-6">

    {{-- Judul --}}
    <div>
        <label class="block font-medium mb-2">
            Judul Lesson
        </label>

        <input
            type="text"
            name="title"
            value="{{ old('title', $lesson->title ?? '') }}"
            class="w-full border rounded-lg p-3">
    </div>

    {{-- Isi --}}
    <div>
        <label class="block font-medium mb-2">
            Isi Materi
        </label>

        <div class="ck-editor-wrapper">
            <textarea
                id="editor"
                name="content"
                rows="10"
                class="w-full border rounded-lg p-3">{{ old('content', $lesson->content ?? '') }}</textarea>
        </div>
    </div>

    {{-- Video --}}
    <div>
        <label class="block font-medium mb-2">
            Link Video Youtube
        </label>

        <input
            type="url"
            name="video_url"
            value="{{ old('video_url', $lesson->video_url ?? '') }}"
            class="w-full border rounded-lg p-3">
    </div>

    {{-- XP --}}
    <div>
        <label class="block font-medium mb-2">
            Reward XP
        </label>

        <select
            name="xp_reward"
            class="w-full border rounded-lg p-3">

            <option value="30"
                {{ old('xp_reward', $lesson->xp_reward ?? 30) == 30 ? 'selected' : '' }}>
                30 XP - Materi Dasar
            </option>

            <option value="50"
                {{ old('xp_reward', $lesson->xp_reward ?? 30) == 50 ? 'selected' : '' }}>
                50 XP - Materi Menengah
            </option>

            <option value="100"
                {{ old('xp_reward', $lesson->xp_reward ?? 30) == 100 ? 'selected' : '' }}>
                100 XP - Materi Penting
            </option>

        </select>
    </div>

    {{-- Quiz --}}
    <div>

        <label class="flex items-center gap-2">

            <input
                type="checkbox"
                id="hasQuiz"
                name="has_quiz"
                value="1"
                {{ old('has_quiz', $lesson->has_quiz ?? false) ? 'checked' : '' }}>

            <span>Tambahkan Quiz</span>

        </label>

        <div
            id="quizSection"
            class="mt-3 {{ old('has_quiz', $lesson->has_quiz ?? false) ? '' : 'hidden' }}">

            <a href="#"
               class="bg-yellow-500 text-white px-4 py-2 rounded">
                Buat Quiz
            </a>

        </div>

    </div>

</div>

<style>
    /* Mengatasi Tailwind Reset di dalam ruang lingkup CKEditor */
    .ck-editor__editable_inline h1 {
        font-size: 2.25rem !important;
        font-weight: 800 !important;
        display: block !important;
        margin-top: 1.5rem !important;
        margin-bottom: 0.5rem !important;
    }
    .ck-editor__editable_inline h2 {
        font-size: 1.875rem !important;
        font-weight: 700 !important;
        display: block !important;
        margin-top: 1.25rem !important;
        margin-bottom: 0.5rem !important;
    }
    .ck-editor__editable_inline h3 {
        font-size: 1.5rem !important;
        font-weight: 600 !important;
        display: block !important;
        margin-top: 1rem !important;
        margin-bottom: 0.5rem !important;
    }
    /* Mengatur tinggi minimal editor agar tidak ciut */
    .ck-editor__editable_inline {
        min-height: 250px;
    }
</style>
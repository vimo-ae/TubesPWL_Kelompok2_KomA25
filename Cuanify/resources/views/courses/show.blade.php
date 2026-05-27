<x-app-layout>

<div class="max-w-5xl mx-auto p-6">

    <!-- HEADER COURSE -->
    <div class="bg-white rounded-xl shadow p-6 mb-6">

        <h1 class="text-3xl font-bold mb-2">
            {{ $course->title }}
        </h1>

        <p class="text-gray-600 mb-4">
            {{ $course->description }}
        </p>

        <div class="flex flex-wrap gap-4 text-sm text-gray-500">

            <span>📂 Category: {{ $course->category->category_name }}</span>

            <span>📊 Level: {{ $course->difficulty_level }}</span>

        </div>

    </div>

    <!-- TITLE SECTION -->
    <h2 class="text-2xl font-bold mb-4">
        📚 Lessons
    </h2>

    <!-- LESSON LIST -->
    <div class="space-y-4">

        @foreach($course->lessons as $lesson)

        <div class="bg-white rounded-xl shadow p-5 flex justify-between items-center hover:shadow-md transition">

            <!-- LEFT CONTENT -->
            <div class="space-y-1">

                <h3 class="text-lg font-semibold">
                    {{ $lesson->title }}
                </h3>

                <p class="text-gray-600 text-sm">
                    {{ $lesson->content }}
                </p>

                <div class="text-sm text-gray-500 space-y-1">

                    <p>🎥 Video:
                        <a href="{{ $lesson->video_url }}" target="_blank"
                           class="text-blue-600 hover:underline">
                            Tonton
                        </a>
                    </p>

                    <p>📄 PDF:
                        <a href="{{ asset('storage/' . $lesson->pdf_file) }}" target="_blank"
                           class="text-blue-600 hover:underline">
                            Download
                        </a>
                    </p>

                    <p>⭐ XP: {{ $lesson->xp_reward }}</p>

                </div>

            </div>

            <!-- RIGHT BUTTON -->
            <a href="{{ route('quizzes.show', $lesson->lesson_id) }}"
               class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm">
                Lihat Quiz
            </a>

        </div>

        @endforeach

    </div>

</div>

</x-app-layout>
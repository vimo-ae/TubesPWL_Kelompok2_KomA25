<x-app-layout>

    <a href="{{ url()->previous() }}"class="inline-block mb-4 text-indigo-600 hover:text-indigo-800">

    ← Kembali ke Course

</a>

    <div class="p-6">

        <h1 class="text-2xl font-bold">
            {{ $lesson->title }}
        </h1>

        <div class="bg-white p-4 rounded mt-4">

            <p>{{ $lesson->content }}</p>

            <p class="mt-4">
                Video:
                {{ $lesson->video_url }}
            </p>

            <p>
                PDF:
                {{ $lesson->pdf_file }}
            </p>

            <p>
                XP Reward:
                {{ $lesson->xp_reward }}
            </p>

        </div>

        <div class="mt-4">

            <a href="{{ route('quizzes.show', $lesson->lesson_id) }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg">

                Lihat Quiz

            </a>

        </div>

    </div>

</x-app-layout>
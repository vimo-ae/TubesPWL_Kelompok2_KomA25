<x-app-layout>

    <a href="{{ url()->previous() }}"class="inline-block mb-4 text-indigo-600 hover:text-indigo-800">

    ← Kembali ke Course

</a>

    <div class="p-6">

        <h1 class="text-2xl font-bold">
            {{ $lesson->title }}
        </h1>

        <div class="bg-white p-4 rounded mt-4">

            <div class="max-w-none
    [&_h2]:text-2xl
    [&_h2]:font-bold
    [&_h2]:mt-6
    [&_h2]:mb-3
    [&_p]:mb-4
    [&_ul]:list-disc
    [&_ul]:pl-6
    [&_ul]:mb-4
    [&_li]:mb-2">
    {!! $lesson->content !!}
</div>

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

        @if($completed)
    <p class="text-green-600 font-semibold">
        ✔ Materi ini sudah selesai
    </p>
@else
    <form method="POST" action="/lessons/{{ $lesson->lesson_id }}/complete">
        @csrf
        <button type="submit" style="padding:10px 16px; border:none; border-radius:6px; background:#16a34a; color:white; font-weight:600; cursor:pointer;">
    Tandai Selesai
</button>
    </form>
@endif

        <div class="mt-4">

            <a href="{{ route('quizzes.show', $lesson->lesson_id) }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg">

                Lihat Quiz

            </a>

        </div>

    </div>

</x-app-layout>
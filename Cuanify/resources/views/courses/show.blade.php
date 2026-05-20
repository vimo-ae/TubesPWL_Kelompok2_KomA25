<x-app-layout>

    <div class="p-6">
        <h1 class="text-2xl font-bold">
            {{ $course->title }}
        </h1>

        @foreach($course->lessons as $lesson)

    <div class="bg-white p-4 rounded mt-4 flex justify-between items-center">

        <div>
            <h2>Judul: {{ $lesson->title }}</h2>

            <p>{{ $lesson->content }}</p>

            <p>Link video: {{ $lesson->video_url}}</p>
            
            <p>File PDF: {{ $lesson->pdf_file}}</p>

            <p>Total Xp: {{ $lesson->xp_reward}}</p>
        </div>

    </div>

@endforeach
    </div>

</x-app-layout>
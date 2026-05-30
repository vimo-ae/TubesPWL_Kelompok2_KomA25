<x-app-layout>

    <div class="p-6">
        <h1 class="text-2xl font-bold">
            {{ $course->title }}
        </h1>

        @foreach($course->lessons as $lesson)

            <div class="bg-white p-4 rounded mt-4 flex justify-between items-center">

                <div>
                    <h2 class="font-semibold text-lg">Judul: {{ $lesson->title }}</h2>

                    <p class="mt-1 text-gray-600">{{ $lesson->content }}</p>

                    {{-- Link Video YouTube --}}
                    @if($lesson->video_url)
                        <p class="mt-2">
                            Video: 
                            <a href="{{ $lesson->video_url }}" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="text-indigo-600 hover:underline">
                                Tonton Video
                            </a>
                        </p>
                    @endif

                    {{-- Link PDF --}}
                    @if($lesson->pdf_file)
                        <p class="mt-1">
                            PDF: 
                            <a href="{{ asset('storage/' . $lesson->pdf_file) }}" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="text-red-600 hover:underline">
                                Buka PDF
                            </a>
                        </p>
                    @endif

                    <p class="mt-1 text-sm text-gray-500">Total XP: {{ $lesson->xp_reward }}</p>
                </div>

                <a href="{{ route('quizzes.show', $lesson->lesson_id) }}" 
                   class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition duration-300">
                    Lihat Quiz
                </a>

            </div>

        @endforeach

    </div>

</x-app-layout>
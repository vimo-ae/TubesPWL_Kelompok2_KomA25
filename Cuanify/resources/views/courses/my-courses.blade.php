<x-app-layout>

    <div class="p-6">

        <h1 class="text-2xl font-bold mb-4">
            Course Saya
        </h1>

        @forelse($courses as $course)

    <div class="bg-white p-4 rounded mt-4 flex justify-between items-center">

        <div>
            <h2 class="font-bold text-lg">
                {{ $course->title }}
            </h2>

            <p>{{ $course->description }}</p>

            <p>
                Tingkat: {{ $course->difficulty_level }}
            </p>
        </div>

        <div>
            
            <a href="{{ route('courses.show', $course->course_id) }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition duration-300">
                
                Lihat Lesson

            </a>

        </div>

    </div>

@empty

            <p>Kamu belum enroll course!</p>

        @endforelse

    </div>

</x-app-layout>
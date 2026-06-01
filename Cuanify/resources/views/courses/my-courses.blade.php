<x-app-layout>

    <div class="p-6">

        <h1 class="text-2xl font-bold mb-4">
            Course Saya
        </h1>

        <div class="flex gap-2 flex-wrap mb-6">

    <a href="{{ route('my-courses.index') }}" class="bg-gray-300 px-4 py-2 rounded-lg transition duration-300 hover:scale-[1.02] hover:shadow-lg cursor-pointer">
        Semua
    </a>

    @foreach($categories as $category)

        <a href="{{ route('my-courses.index', ['category' => $category->category_id]) }}" class="bg-indigo-500 text-white px-4 py-2 rounded-lg hover:scale-[1.02] transition duration-300 hover:shadow-lg cursor-pointer">

            {{ $category->category_name }}

        </a>

    @endforeach

</div>

        @forelse($courses as $course)

    <a href="{{ route('courses.show', $course->course_id) }}">

        <div class="bg-white p-4 rounded mt-4 flex justify-between items-center 
                    transition duration-300 hover:scale-[1.02] hover:shadow-lg cursor-pointer">

            <div>
                <h2 class="font-bold text-lg">
                    {{ $course->title }}
                </h2>

                <p>{{ $course->description }}</p>

                <p>
                    Tingkat: {{ $course->difficulty_level }}
                </p>
            </div>

        </div>

    </a>

@empty

    <p>Kamu belum enroll course!</p>

@endforelse

    </div>

</x-app-layout>
<x-app-layout>

<div class="p-6 max-w-6xl mx-auto">

    <h1 class="text-3xl font-bold mb-6">
        📚 Daftar Courses
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach($courses as $course)

        <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">

            <!-- Thumbnail -->
            <img src="{{ asset('storage/' . $course->thumbnail) }}"
                 class="w-full h-40 object-cover">

            <div class="p-4">

                <!-- Title -->
                <h2 class="text-lg font-bold mb-1">
                    {{ $course->title }}
                </h2>

                <!-- Description -->
                <p class="text-gray-600 text-sm mb-3 line-clamp-2">
                    {{ $course->description }}
                </p>

                <!-- Info -->
                <div class="text-sm text-gray-500 space-y-1 mb-3">

                    <p>📂 Category: {{ $course->category->category_name }}</p>

                    <p>📊 Level: {{ $course->difficulty_level }}</p>

                    <p>👨‍🏫 Instructor: -</p>

                </div>

                <!-- Button Area -->
                <div class="flex justify-between items-center">

                    @if(auth()->check() && auth()->user()->courses->contains('course_id', $course->course_id))

                        <span class="text-green-600 font-semibold text-sm">
                            ✔ Enrolled
                        </span>

                        <button type="button" onclick="window.location.href='{{ route('courses.show', $course->course_id) }}'
                            "class="bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-1 rounded-lg text-sm">
                                Lihat
                        </button>

                    @else

                        <form action="{{ route('enroll.course', $course->course_id) }}" method="POST">
                            @csrf

                            <button class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded-lg text-sm">
                                Enroll
                            </button>
                        </form>

                    @endif

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

</x-app-layout>
<x-app-layout>

    <div class="container">
        <h1 class="mb-4 text-2xl font-bold">My Courses</h1>

        @if($enrollments->count() > 0)

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                @foreach($enrollments as $enrollment)

                    <div class="bg-white p-4 rounded-xl shadow">

                        <h3 class="text-lg font-semibold">
                            {{ $enrollment->course->title }}
                        </h3>

                        <p class="text-gray-600 mt-2">
                            {{ $enrollment->course->description }}
                        </p>

                        <a href="{{ route('courses.show', $enrollment->course->course_id) }}"
                           class="inline-block mt-4 px-4 py-2 bg-pink-500 text-white rounded-lg">
                            Lihat Course
                        </a>

                    </div>

                @endforeach

            </div>

        @else

            <div class="bg-blue-100 text-blue-700 p-4 rounded-lg">
                Kamu belum enroll course.
            </div>

        @endif
    </div>

</x-app-layout>
<x-app-layout>

    <div class="p-6">
        <h1 class="text-2xl font-bold">
            Daftar Courses
        </h1>

        @foreach($courses as $course)

    <div class="bg-white p-4 rounded mt-4 flex justify-between items-center">

    <div>
        <img src="{{ asset('storage/' . $course->thumbnail) }}" width="200">

        <h2>{{ $course->title }}</h2>

        <p>{{ $course->description }}</p>

        {{-- <p>Instructor: {{ $course->instructor->name }}</p> --}}
        <p>Instructor: </p>

        <p>Category: {{ $course->category->category_name }}</p>

        <p>Level: {{ $course->difficulty_level }}</p>
    </div>

        @if(auth()->user()->courses->contains('course_id', $course->course_id))
            
            <div>
                <a href="{{ route('courses.show', $course->course_id) }}"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition duration-300">
                
                    Lihat Lesson
                
                </a>
            </div>
        
        @else
        
            <form action="{{ route('enroll.course', $course->course_id) }}" method="POST">
                @csrf
            
                <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg">
            
                    Enroll
            
                </button>
            </form>
        
        @endif
    </div>

@endforeach
    </div>

</x-app-layout>

<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold">
            Daftar Courses
        </h1>

        <div class="flex gap-2 flex-wrap mb-6 mt-4">
            <a href="{{ route('courses.index') }}" class="bg-gray-300 px-4 py-2 rounded-lg">
                Semua
            </a>

            @foreach($categories as $category)
                <a href="{{ route('courses.index', ['category' => $category->category_id]) }}" class="bg-indigo-500 text-white px-4 py-2 rounded-lg">
                    {{ $category->category_name }}
                </a>
            @endforeach
        </div>

        @foreach($courses as $course)
            <a href="{{ route('courses.show', $course->course_id) }}">
                <div class="bg-white p-4 rounded mt-4 flex justify-between items-center transition duration-300 hover:scale-[1.02] hover:shadow-lg cursor-pointer">
                    
                    <div>
                        <img src="{{ asset('storage/' . $course->thumbnail) }}" width="200">
                        
                        <h2 class="font-bold text-lg mt-2">
                            {{ $course->title }}
                        </h2>
                        
                        <p>{{ $course->description }}</p>
                        <p>Instructor:</p>
                        <p>Category: {{ $course->category->category_name }}</p>
                        <p>Level: {{ $course->difficulty_level }}</p>
                    </div>

                    <div>
                        @if(auth()->user()->role === 'student')
                            @if(auth()->user()->courses->contains('course_id', $course->course_id))
                                <span class="text-green-600 font-semibold">
                                    Sudah Enroll
                                </span>
                            @else
                                <span class="text-indigo-600 font-semibold">
                                    Belum Enroll
                                </span>
                            @endif
                        @endif
                    </div>

                </div>
            </a>
        @endforeach
    </div>
</x-app-layout>
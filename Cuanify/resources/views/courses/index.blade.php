@foreach ($courses as $course)
    <div>
        <img src="{{ asset('storage/' . $course->thumbnail) }}" width="200">

        <h2>{{ $course->title }}</h2>

        <p>{{ $course->description }}</p>

        <p>Instructor: {{ $course->instructor->name }}</p>

        <p>Category: {{ $course->category->category_name }}</p>

        <p>Level: {{ $course->difficulty_level }}</p>
    </div>
@endforeach
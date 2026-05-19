<x-app-layout>

    <div class="p-6">
        <h1 class="text-2xl font-bold">
            Daftar Courses
        </h1>

        @foreach($courses as $course)
            <div class="bg-white p-4 rounded mt-4">
                <h2>Judul: {{ $course->title }}</h2>
                <p>Deskripsi: {{ $course->description }}</p>
                <p>Tingkat Kesulitan: {{ $course->difficulty_level }}</p>
                <p>Estimasi Waktu: {{ $course->estimated_duration }} menit</p>
            </div>
        @endforeach
    </div>

</x-app-layout>
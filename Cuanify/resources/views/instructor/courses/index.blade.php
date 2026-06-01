<x-app-layout>

    <div class="p-6">

        <div class="flex justify-between items-center mb-6">

            <h1 class="text-2xl font-bold">
                Kelola Course
            </h1>

            <a href="{{ route('instructor.courses.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg">

                + Tambah Course

            </a>

        </div>

        @forelse($courses as $course)

<div class="bg-white p-4 rounded-lg mt-4 flex justify-between items-center">

    <div>
        <h2 class="font-bold">
            {{ $course->title }}
        </h2>

        <p>
            Status: {{ $course->status }}
        </p>
    </div>

    <div class="flex gap-2">

        <a href="{{ route('instructor.courses.show', $course->course_id) }}"
           class="bg-indigo-600 text-white px-4 py-2 rounded-lg">

            Kelola

        </a>

        <a href="{{ route('instructor.courses.edit', $course->course_id) }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-lg">

            Edit

        </a>

        <form action="{{ route('instructor.courses.destroy', $course->course_id) }}"
              method="POST">

            @csrf
            @method('DELETE')

            <button
                type="submit"
                onclick="return confirm('Yakin hapus course ini?')"
                class="bg-red-600 text-white px-4 py-2 rounded-lg">

                Hapus

            </button>

        </form>

    </div>

</div>

@empty

    <p>Belum ada course.</p>

@endforelse

    </div>

</x-app-layout>
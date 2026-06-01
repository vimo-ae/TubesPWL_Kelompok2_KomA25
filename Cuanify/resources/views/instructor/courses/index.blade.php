<x-app-layout>

    <div class="p-6">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">
                Kelola Course
            </h1>

            <a href="{{ route('instructor.courses.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition-all">
                + Tambah Course
            </a>
        </div>

        @forelse($courses as $course)
            <div class="bg-white p-4 rounded-lg mt-4 flex justify-between items-center shadow-sm">
                <div>
                    <h2 class="font-bold text-lg text-gray-800">
                        {{ $course->title }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        Status: 
                        @if($course->status == 'draft')
                            <span class="px-2 py-0.5 bg-gray-100 text-gray-800 text-xs font-semibold rounded">Draft</span>
                        @elseif($course->status == 'pending')
                            <span class="px-2 py-0.5 bg-amber-100 text-amber-800 text-xs font-semibold rounded">Menunggu Verifikasi</span>
                        @else
                            <span class="px-2 py-0.5 bg-green-100 text-green-800 text-xs font-semibold rounded">Published</span>
                        @endif
                    </p>
                </div>

                <div class="flex gap-2">
                    <a href="{{ route('instructor.courses.show', $course->course_id) }}"
                       class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition-all">
                        Kelola
                    </a>

                    @if($course->status == 'draft')
                        <a href="{{ route('instructor.courses.edit', $course->course_id) }}"
                           class="bg-blue-600 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-all">
                            Edit
                        </a>

                        <form action="{{ route('instructor.courses.destroy', $course->course_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button
                                type="submit"
                                onclick="return confirm('Yakin hapus course ini?')"
                                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition-all">
                                Hapus
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        @empty
            <p class="text-gray-500 mt-4">Belum ada course.</p>
        @endforelse

    </div>

</x-app-layout>
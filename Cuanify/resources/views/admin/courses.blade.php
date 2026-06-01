<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="p-6 " x-data="{ showRejectModal: false, selectedCourseId: null, selectedCourseTitle: '' }">
        
        <div class="flex gap-6 mb-8 border-b border-gray-200">
            <a href="{{ route('admin.instructors') }}" class="font-bold text-lg text-gray-500 hover:text-indigo-500 transition pb-2">
                Verifikasi Instruktur
            </a>
            <a href="{{ route('admin.courses') }}" class="font-bold text-lg text-indigo-600 border-b-2 border-indigo-600 pb-2">
                Verifikasi Course
            </a>
        </div>

        <h1 class="text-2xl font-bold mb-6 text-indigo-700">
            Verifikasi Course Baru
        </h1>

        <table class="w-full border mb-10">
            <thead class="bg-indigo-50">
                <tr>
                    <th class="p-3 border text-left">Judul Course</th>
                    <th class="p-3 border text-left">Instruktur</th>
                    <th class="p-3 border">Jumlah Lesson</th>
                    <th class="p-3 border">Status</th>
                    <th class="p-3 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pendingCourses as $course)
                    <tr>
                        <td class="p-3 border font-semibold">
                            {{ $course->title }}
                        </td>
                        <td class="p-3 border">
                            {{ $course->instructor->username ?? 'Tidak diketahui' }}
                        </td>
                        <td class="p-3 border text-center">
                            {{ $course->lessons->count() }}
                        </td>
                        <td class="p-3 border text-center">
                            <span class="bg-amber-100 text-amber-700 px-2 py-1 rounded text-xs font-bold">
                                Menunggu Review
                            </span>
                        </td>
                        <td class="p-3 border flex gap-2 justify-center">
                            <a href="{{ route('admin.courses.show', $course->course_id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded transition text-sm">
                                Detail
                            </a>

                            <form action="{{ route('admin.courses.approve', $course->course_id) }}" method="POST" onsubmit="return confirm('Yakin publish course ini?');">
                                @csrf
                                <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded transition text-sm">
                                    Approve
                                </button>
                            </form>

                            <form action="{{ route('admin.courses.reject', $course->course_id) }}" method="POST" onsubmit="return confirm('Yakin kembalikan course ini ke draft?');">
                                @csrf
                                <button type="button" 
    @click="showRejectModal = true; selectedCourseId = {{ $course->course_id }}; selectedCourseTitle = '{{ $course->title }}'"
    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded transition text-sm">
    Reject
</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-4 text-center text-gray-500">
                            Tidak ada course yang menunggu verifikasi.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <h1 class="text-2xl font-bold mb-6 text-green-600">
            Course Ter-Publish
        </h1>

        <table class="w-full border">
            <thead class="bg-green-50">
                <tr>
                    <th class="p-3 border text-left">Judul Course</th>
                    <th class="p-3 border text-left">Instruktur</th>
                    <th class="p-3 border text-center">Status</th>
                    <th class="p-3 border text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($publishedCourses as $course)
                    <tr>
                        <td class="p-3 border font-semibold">
                            {{ $course->title }}
                        </td>
                        <td class="p-3 border">
                            {{ $course->instructor->username ?? 'Tidak diketahui' }}
                        </td>
                        <td class="p-3 border text-center">
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-bold flex items-center justify-center gap-1 w-max mx-auto">
                                <i class="fas fa-check"></i> Published
                            </span>
                        </td>
                        <td class="p-3 border flex justify-center">
                            <a href="{{ route('admin.courses.show', $course->course_id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded transition text-sm">
                                Lihat Detail
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-4 text-center text-gray-500">
                            Belum ada course yang dipublish.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div x-show="showRejectModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50" x-cloak>
    <div class="bg-white p-6 rounded-2xl w-96 shadow-xl" @click.away="showRejectModal = false">
        <h2 class="text-lg font-bold mb-2">Reject Course</h2>
        <p class="text-sm text-gray-600 mb-4">Berikan alasan penolakan untuk: <br><strong x-text="selectedCourseTitle"></strong></p>
        
        <form :action="'/admin/course/' + selectedCourseId + '/reject'" method="POST">
            @csrf
            <textarea name="reason" class="w-full border-gray-300 rounded-lg mb-4" rows="4" placeholder="Masukkan alasan penolakan..." required></textarea>
            
            <div class="flex justify-end gap-2">
                <button type="button" @click="showRejectModal = false" class="px-4 py-2 bg-gray-200 rounded-lg">Batal</button>
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg">Kirim Penolakan</button>
            </div>
        </form>
    </div>
</div>

    </div>
</x-app-layout>
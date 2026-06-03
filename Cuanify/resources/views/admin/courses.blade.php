<x-app-layout>
    <div class="flex min-h-screen bg-[#fcf9fe] -mx-4 sm:-mx-6 lg:-mx-8 -mt-6" x-data="{ showRejectModal: false, selectedCourseId: null, selectedCourseTitle: '' }">
        
        @include('admin.partials.sidebar')
        
        <div class="flex-1 p-6 lg:p-10">
            
            <h1 class="text-3xl font-extrabold mb-6 text-indigo-700">
                Verifikasi Course Baru
            </h1>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-10">
                <table class="w-full">
                    <thead class="bg-indigo-50 border-b border-indigo-100">
                        <tr>
                            <th class="p-4 text-left text-sm font-bold text-indigo-800">Judul Course</th>
                            <th class="p-4 text-left text-sm font-bold text-indigo-800">Instruktur</th>
                            <th class="p-4 text-center text-sm font-bold text-indigo-800">Jumlah Lesson</th>
                            <th class="p-4 text-center text-sm font-bold text-indigo-800">Status</th>
                            <th class="p-4 text-center text-sm font-bold text-indigo-800">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($pendingCourses as $course)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-4 font-bold text-gray-800">
                                    {{ $course->title }}
                                </td>
                                <td class="p-4 text-sm text-gray-600">
                                    {{ $course->instructor->username ?? 'Tidak diketahui' }}
                                </td>
                                <td class="p-4 text-center font-bold text-gray-700">
                                    {{ $course->lessons->count() }}
                                </td>
                                <td class="p-4 text-center">
                                    <span class="bg-amber-50 border border-amber-200 text-amber-600 px-3 py-1 rounded-full text-xs font-bold">
                                        Menunggu Review
                                    </span>
                                </td>
                                <td class="p-4 flex gap-2 justify-center">
                                    <a href="{{ route('admin.courses.show', $course->course_id) }}" class="bg-blue-100 text-blue-700 hover:bg-blue-600 hover:text-white px-3 py-1.5 rounded-lg text-sm font-bold transition">
                                        Detail
                                    </a>

                                    <form action="{{ route('admin.courses.approve', $course->course_id) }}" method="POST" onsubmit="return confirm('Yakin publish course ini?');">
                                        @csrf
                                        <button class="bg-green-100 text-green-700 hover:bg-green-600 hover:text-white px-3 py-1.5 rounded-lg text-sm font-bold transition">
                                            Approve
                                        </button>
                                    </form>

                                    <form action="{{ route('admin.courses.reject', $course->course_id) }}" method="POST" onsubmit="return confirm('Yakin kembalikan course ini ke draft?');">
                                        @csrf
                                        <button type="button" 
                                            @click="showRejectModal = true; selectedCourseId = {{ $course->course_id }}; selectedCourseTitle = '{{ $course->title }}'"
                                            class="bg-red-100 text-red-700 hover:bg-red-600 hover:text-white px-3 py-1.5 rounded-lg text-sm font-bold transition">
                                            Reject
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-8 text-center text-gray-500 font-medium">
                                    Tidak ada course yang menunggu verifikasi.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <h1 class="text-3xl font-extrabold mb-6 text-emerald-600">
                Course Ter-Publish
            </h1>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <table class="w-full">
                    <thead class="bg-emerald-50 border-b border-emerald-100">
                        <tr>
                            <th class="p-4 text-left text-sm font-bold text-emerald-800">Judul Course</th>
                            <th class="p-4 text-left text-sm font-bold text-emerald-800">Instruktur</th>
                            <th class="p-4 text-center text-sm font-bold text-emerald-800">Status</th>
                            <th class="p-4 text-center text-sm font-bold text-emerald-800">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($publishedCourses as $course)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-4 font-bold text-gray-800">
                                    {{ $course->title }}
                                </td>
                                <td class="p-4 text-sm text-gray-600">
                                    {{ $course->instructor->username ?? 'Tidak diketahui' }}
                                </td>
                                <td class="p-4 text-center">
                                    <span class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-3 py-1 rounded-full text-xs font-bold inline-flex items-center gap-1">
                                        <i class="fas fa-check"></i> Published
                                    </span>
                                </td>
                                <td class="p-4 flex justify-center">
                                    <a href="{{ route('admin.courses.show', $course->course_id) }}" class="bg-blue-100 text-blue-700 hover:bg-blue-600 hover:text-white px-3 py-1.5 rounded-lg text-sm font-bold transition">
                                        Lihat Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="p-8 text-center text-gray-500 font-medium">
                                    Belum ada course yang dipublish.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div x-show="showRejectModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm" x-cloak>
                <div class="bg-white p-6 rounded-2xl w-full max-w-md shadow-xl" @click.away="showRejectModal = false">
                    <h2 class="text-xl font-bold mb-2 text-gray-800">Reject Course</h2>
                    <p class="text-sm text-gray-600 mb-4">Berikan alasan penolakan untuk: <br><strong x-text="selectedCourseTitle" class="text-indigo-600"></strong></p>
                    
                    <form :action="'/admin/course/' + selectedCourseId + '/reject'" method="POST">
                        @csrf
                        <textarea name="reason" class="w-full border-gray-300 rounded-xl focus:ring-indigo-500 focus:border-indigo-500 mb-4" rows="4" placeholder="Masukkan alasan penolakan..." required></textarea>
                        
                        <div class="flex justify-end gap-3">
                            <button type="button" @click="showRejectModal = false" class="px-5 py-2 text-gray-600 hover:bg-gray-100 rounded-xl font-bold transition">Batal</button>
                            <button type="submit" class="px-5 py-2 bg-red-600 hover:bg-red-700 text-white rounded-xl font-bold transition shadow-sm">Kirim Penolakan</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
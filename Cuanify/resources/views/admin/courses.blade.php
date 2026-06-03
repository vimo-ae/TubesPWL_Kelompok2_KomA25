<x-app-layout>
    <div class="flex min-h-screen bg-[#fcf9fe] -mx-4 sm:-mx-6 lg:-mx-8 -mt-6" x-data="{ showRejectModal: false, selectedCourseId: null, selectedCourseTitle: '' }">
        
        @include('admin.partials.sidebar')
        
        <div class="flex-1 p-4 sm:p-6 lg:p-10 min-w-0">
            
            <h1 class="text-2xl sm:text-3xl font-extrabold mb-6 text-indigo-700">
                Verifikasi Course Baru
            </h1>

            <div class="grid grid-cols-1 gap-4 sm:hidden mb-10">
                @forelse ($pendingCourses as $course)
                    <div class="bg-white p-5 rounded-2xl shadow-sm border border-indigo-100 flex flex-col gap-3">
                        <div class="flex justify-between items-start gap-3">
                            <div class="font-bold text-gray-800 text-base line-clamp-2">
                                {{ $course->title }}
                            </div>
                            <span class="bg-amber-50 border border-amber-200 text-amber-600 px-2 py-1 rounded-md text-[10px] font-extrabold uppercase tracking-wider shrink-0 mt-0.5 text-center">
                                Menunggu
                            </span>
                        </div>
                        
                        <div class="text-sm text-gray-600 flex flex-col gap-1">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-user-tie text-indigo-400 w-4"></i> 
                                <span>{{ $course->instructor->username ?? 'Tidak diketahui' }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fas fa-book-open text-indigo-400 w-4"></i> 
                                <span>{{ $course->lessons->count() }} Lesson</span>
                            </div>
                        </div>

                        <div class="flex flex-wrap items-center gap-2 border-t border-gray-50 pt-3 mt-1">
                            <a href="{{ route('admin.courses.show', $course->course_id) }}" class="flex-1 text-center bg-blue-50 text-blue-700 hover:bg-blue-600 hover:text-white px-3 py-2 rounded-lg text-xs font-bold transition">
                                Detail
                            </a>

                            <form action="{{ route('admin.courses.approve', $course->course_id) }}" method="POST" onsubmit="return confirm('Yakin publish course ini?');" class="flex-1">
                                @csrf
                                <button class="w-full bg-green-50 text-green-700 hover:bg-green-600 hover:text-white px-3 py-2 rounded-lg text-xs font-bold transition">
                                    Approve
                                </button>
                            </form>

                            <button type="button" 
                                @click="showRejectModal = true; selectedCourseId = {{ $course->course_id }}; selectedCourseTitle = '{{ addslashes($course->title) }}'"
                                class="flex-1 bg-red-50 text-red-700 hover:bg-red-600 hover:text-white px-3 py-2 rounded-lg text-xs font-bold transition">
                                Reject
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="bg-white p-8 text-center rounded-2xl border border-gray-100 text-gray-500 font-medium text-sm">
                        Tidak ada course yang menunggu verifikasi.
                    </div>
                @endforelse
            </div>

            <div class="hidden sm:block bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-10">
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
                                <td class="p-4 font-bold text-gray-800">{{ $course->title }}</td>
                                <td class="p-4 text-sm text-gray-600">{{ $course->instructor->username ?? 'Tidak diketahui' }}</td>
                                <td class="p-4 text-center font-bold text-gray-700">{{ $course->lessons->count() }}</td>
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
                                    <button type="button" 
                                        @click="showRejectModal = true; selectedCourseId = {{ $course->course_id }}; selectedCourseTitle = '{{ addslashes($course->title) }}'"
                                        class="bg-red-100 text-red-700 hover:bg-red-600 hover:text-white px-3 py-1.5 rounded-lg text-sm font-bold transition">
                                        Reject
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-8 text-center text-gray-500 font-medium">Tidak ada course yang menunggu verifikasi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <h1 class="text-2xl sm:text-3xl font-extrabold mb-6 text-emerald-600">
                Course Ter-Publish
            </h1>

            <div class="grid grid-cols-1 gap-4 sm:hidden mb-6">
                @forelse ($publishedCourses as $course)
                    <div class="bg-white p-5 rounded-2xl shadow-sm border border-emerald-100 flex flex-col gap-3">
                        <div class="flex justify-between items-start gap-3">
                            <div class="font-bold text-gray-800 text-base line-clamp-2">
                                {{ $course->title }}
                            </div>
                            <span class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-2 py-1 rounded-md text-[10px] font-extrabold uppercase tracking-wider shrink-0 mt-0.5 text-center flex items-center gap-1">
                                <i class="fas fa-check"></i> Pub
                            </span>
                        </div>
                        
                        <div class="text-sm text-gray-600 flex items-center gap-2">
                            <i class="fas fa-user-tie text-emerald-400 w-4"></i> 
                            <span>{{ $course->instructor->username ?? 'Tidak diketahui' }}</span>
                        </div>

                        <div class="border-t border-gray-50 pt-3 mt-1">
                            <a href="{{ route('admin.courses.show', $course->course_id) }}" class="block w-full text-center bg-blue-50 text-blue-700 hover:bg-blue-600 hover:text-white px-3 py-2 rounded-lg text-xs font-bold transition">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="bg-white p-8 text-center rounded-2xl border border-gray-100 text-gray-500 font-medium text-sm">
                        Belum ada course yang dipublish.
                    </div>
                @endforelse
            </div>

            <div class="hidden sm:block bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
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
                                <td class="p-4 font-bold text-gray-800">{{ $course->title }}</td>
                                <td class="p-4 text-sm text-gray-600">{{ $course->instructor->username ?? 'Tidak diketahui' }}</td>
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
                                <td colspan="4" class="p-8 text-center text-gray-500 font-medium">Belum ada course yang dipublish.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div x-show="showRejectModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50 backdrop-blur-sm" x-cloak>
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
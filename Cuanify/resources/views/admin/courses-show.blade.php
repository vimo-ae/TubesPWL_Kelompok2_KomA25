<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Review Course
        </h2>
    </x-slot>

    <div class="p-6 max-w-5xl mx-auto" x-data="{ showRejectModal: false }">
        
        <a href="{{ route('admin.courses') }}" class="inline-block mb-6 text-indigo-600 hover:text-indigo-800 font-medium transition-all">
            ← Kembali ke Verifikasi Course
        </a>

        <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-200 mb-8 flex flex-col md:flex-row justify-between items-start gap-6">
            <div>
                <div class="flex items-center gap-3 mb-3">
                    <h1 class="text-3xl font-extrabold text-gray-800">{{ $course->title }}</h1>
                    @if($course->status == 'pending')
                        <span class="bg-amber-100 text-amber-700 px-3 py-1 rounded-full text-xs font-bold">Menunggu Review</span>
                    @elseif($course->status == 'published')
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">Published</span>
                    @else
                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-xs font-bold">Draft</span>
                    @endif
                </div>
                
                <p class="text-gray-600 mb-6 leading-relaxed">{{ $course->description }}</p>
                
                <div class="flex flex-wrap items-center gap-4 text-sm font-medium text-gray-600 bg-gray-50 p-4 rounded-xl">
                    <span class="flex items-center gap-2"><i class="fas fa-user-tie text-indigo-500"></i> Instruktur: {{ $course->instructor->username }}</span>
                    <span class="text-gray-300">|</span>
                    <span class="flex items-center gap-2"><i class="fas fa-layer-group text-indigo-500"></i> Level: <span class="capitalize">{{ $course->difficulty_level }}</span></span>
                    <span class="text-gray-300">|</span>
                    <span class="flex items-center gap-2"><i class="fas fa-clock text-indigo-500"></i> Estimasi: {{ $course->estimated_duration }} Jam</span>
                </div>
            </div>

            @if($course->status == 'pending')
            <div class="flex flex-col gap-3 min-w-[150px]">
                <form action="{{ route('admin.courses.approve', $course->course_id) }}" method="POST" onsubmit="return confirm('Yakin publish course ini?');">
                    @csrf
                    <button class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-3 rounded-xl font-bold transition shadow-sm flex items-center justify-center gap-2">
                        <i class="fas fa-check"></i> Approve
                    </button>
                </form>
                
                <button type="button" @click="showRejectModal = true" class="w-full bg-red-500 hover:bg-red-600 text-white px-4 py-3 rounded-xl font-bold transition shadow-sm flex items-center justify-center gap-2">
                    <i class="fas fa-times"></i> Reject
                </button>
            </div>
            @endif
        </div>

        <div x-show="showRejectModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50" x-cloak>
            <div class="bg-white p-6 rounded-2xl w-96 shadow-xl" @click.away="showRejectModal = false">
                <h2 class="text-lg font-bold mb-2">Reject Course</h2>
                <p class="text-sm text-gray-600 mb-4">Berikan alasan penolakan untuk course <strong>{{ $course->title }}</strong></p>
                
                <form action="{{ route('admin.courses.reject', $course->course_id) }}" method="POST">
                    @csrf
                    <textarea name="reason" class="w-full border-gray-300 rounded-lg mb-4" rows="4" placeholder="Masukkan alasan penolakan..." required></textarea>
                    
                    <div class="flex justify-end gap-2">
                        <button type="button" @click="showRejectModal = false" class="px-4 py-2 bg-gray-200 rounded-lg">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg">Kirim Penolakan</button>
                    </div>
                </form>
            </div>
        </div>

        <h2 class="text-2xl font-bold mb-6 text-gray-800 flex items-center gap-2">
            <i class="fas fa-book-open text-indigo-600"></i> Konten Lesson ({{ $course->lessons->count() }})
        </h2>
        
        <div class="space-y-6">
            @forelse($course->lessons as $lesson)
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <h3 class="font-bold text-lg text-gray-800 mb-4 border-b border-gray-100 pb-3">
                        <span class="text-indigo-600 mr-1">Lesson {{ $loop->iteration }}:</span> {{ $lesson->title }}
                    </h3>
                    <div class="text-gray-700 text-sm whitespace-pre-line bg-gray-50 p-5 rounded-xl border border-gray-100 leading-relaxed">
                        {!! $lesson->content !!}
                    </div>
                </div>
            @empty
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 text-center text-gray-500 font-medium">
                    <i class="fas fa-folder-open text-3xl mb-3 text-gray-300"></i><br>
                    Belum ada materi lesson yang dimasukkan oleh instruktur.
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
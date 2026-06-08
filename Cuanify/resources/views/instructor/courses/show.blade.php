<x-app-layout>

    <div class="p-6">

        <a href="{{ route('instructor.courses.index') }}" class="inline-block mb-4 text-indigo-600 hover:text-indigo-800 font-medium transition-all">
            ← Kembali ke Daftar Course
        </a>

        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-gradient-to-r from-purple-600 to-indigo-600 rounded-3xl p-8 text-white shadow-lg">

        <div class="flex justify-between items-start">
        
            <div>
                <p class="uppercase text-xs tracking-widest opacity-80">
                    Course Management
                </p>
            
                <h1 class="text-3xl font-bold mt-2">
                    {{ $course->title }}
                </h1>
            
                <p class="mt-3 text-indigo-100">
                    {{ $course->description ?? 'Belum ada deskripsi course.' }}
                </p>
            </div>
        
            <div>
            @if($course->status == 'draft')
                <span class="bg-white/20 px-4 py-2 rounded-full text-sm">
                    Draft
                </span>
            @elseif($course->status == 'pending')
                <span class="bg-yellow-500 px-4 py-2 rounded-full text-sm">
                    Pending
                </span>
            @else
                <span class="bg-green-500 px-4 py-2 rounded-full text-sm">
                    Published
                </span>
            @endif
        </div>

    </div>

    <div class="grid grid-cols-3 gap-4 mt-6">

        <div class="bg-white/10 rounded-xl p-4">
            <p class="text-sm opacity-80">Jumlah Lesson</p>
            <h3 class="text-2xl font-bold">
                {{ $course->lessons->count() }}
            </h3>
        </div>

        <div class="bg-white/10 rounded-xl p-4">
            <p class="text-sm opacity-80">Level</p>
            <h3 class="text-2xl font-bold">
                {{ ucfirst($course->difficulty_level) }}
            </h3>
        </div>

        <div class="bg-white/10 rounded-xl p-4">
            <p class="text-sm opacity-80">Durasi</p>
            <h3 class="text-2xl font-bold">
                {{ $course->estimated_duration ?? '-' }}
            </h3>
        </div>

    </div>

</div>

        @if($course->status == 'draft')
            @if($course->lessons->count() < 3)
                <p class="text-sm text-amber-600 mt-1 font-medium">
                    ⚠️ Minimal memasukkan 3 lesson sebelum mengajukan verifikasi.
                </p>
            @else
                <p class="text-sm text-green-600 mt-1 font-medium">
                    ✅ Syarat minimum terpenuhi. Anda sudah bisa mengajukan verifikasi.
                </p>
            @endif
        @endif

        <div class="flex items-center gap-3 mt-4">

            @if($course->status == 'draft' || $course->status == 'published')
                <a href="{{ route('instructor.lessons.create', $course->course_id) }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition-all">
                    + Tambah Lesson
                </a>
            @endif

            @if($course->status == 'draft')
                <form action="{{ route('instructor.courses.submit', $course->course_id) }}" 
                      method="POST"
                      onsubmit="return confirm('Yakin ingin mengajukan verifikasi? Setelah diajukan, detail course dan seluruh materi lesson tidak dapat diedit atau dihapus lagi.');">
                    @csrf
                    <button
                        type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition-all disabled:opacity-50 disabled:cursor-not-allowed"
                        {{ $course->lessons->count() < 3 ? 'disabled' : '' }}>
                        Ajukan Verifikasi
                    </button>
                </form>
            @elseif($course->status == 'pending')
                <div class="bg-amber-500 text-white px-4 py-2 rounded-lg font-medium flex items-center gap-1.5 text-sm shadow-sm animate-pulse">
                    <i class="fas fa-clock"></i> Sudah Diajukan & Menunggu Verifikasi Admin
                </div>
            @endif

        </div>

        @foreach($course->lessons as $lesson)
            <div class="bg-white rounded-2xl shadow-sm hover:shadow-md transition-all mt-4 p-5 flex justify-between items-center">
                
                <div class="font-semibold text-gray-800">
                    {{ $lesson->title }}
                </div>

                <div class="flex gap-2">

                    @if(!$lesson->is_published)
        <form action="{{ route('instructor.lessons.publish', ['course' => $course->course_id, 'lesson' => $lesson->lesson_id]) }}" method="POST" class="inline m-0">
            @csrf
            @method('PATCH')
            <button type="submit" onclick="return confirm('Yakin ingin menerbitkan materi ini ke siswa?')" class="bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-2 rounded-xl text-xs font-bold shadow-sm transition duration-200 cursor-pointer">
                🚀 Publish
            </button>
        </form>
    @else
        <span class="text-emerald-700 text-xs font-bold bg-emerald-50 px-3 py-2 rounded-xl border border-emerald-100 flex items-center gap-1">
            ✅ Published
        </span>
    @endif

                    @if($course->status == 'draft' || $course->status == 'published')
                        <a href="{{ route('instructor.lessons.edit', ['course' => $course->course_id, 'lesson' => $lesson->lesson_id]) }}" 
                           class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md text-sm transition-all">
                            Edit
                        </a>

                        <form action="{{ route('instructor.lessons.destroy', ['course' => $course->course_id, 'lesson' => $lesson->lesson_id]) }}" 
                              method="POST" 
                              onsubmit="return confirm('Yakin mau hapus lesson ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-sm transition-all">
                                Delete
                            </button>
                        </form>

                        <a href="{{ route('instructor.lessons.preview', ['course' => $course->course_id,'lesson' => $lesson->lesson_id]) }}" 
                           class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md text-sm transition-all" target="_blank"> 
                            Preview
                        </a>

                    @else
                        <span class="text-gray-400 text-sm font-medium bg-gray-100 px-2.5 py-1 rounded flex items-center gap-1">
                            <i class="fas fa-lock text-xs"></i> Terkunci (Sedang Direview)
                        </span>
                    @endif
                </div>
            </div>
        @endforeach

        <div class="mt-12 bg-gray-50 p-6 rounded-[30px] border border-gray-100">
            <h3 class="text-2xl font-extrabold text-gray-800 mb-6">⭐ Ulasan dari Siswa</h3>
            
            <div class="space-y-4">
                @forelse($course->reviews as $review)
                                    @php
                                        $reviewerProfile = $review->user->profile;
                                        
                                        $reviewerName = $reviewerProfile->full_name ?? $review->user->name ?? 'Anonim';
                                        
                                        $photoUrl = $reviewerProfile && $reviewerProfile->profile_photo 
                                                    ? asset('storage/' . $reviewerProfile->profile_photo) 
                                                    : null;
                                    @endphp

                                    <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm flex gap-4">

                                        <div class="w-12 h-12 rounded-full overflow-hidden shrink-0 bg-purple-100 flex items-center justify-center border border-purple-200 shadow-sm">
                                            @if($photoUrl)
                                                <img src="{{ $photoUrl }}" alt="{{ $reviewerName }}" class="w-full h-full object-cover">
                                            @else
                                                <span class="font-bold text-purple-600 text-lg">
                                                    {{ strtoupper(substr($reviewerName, 0, 1)) }}
                                                </span>
                                            @endif
                                        </div>

                                        <div class="flex-1">
                                            <div class="flex items-center justify-between mb-1">
                                                <span class="font-bold text-gray-800">{{ $reviewerName }}</span>
                                                <span class="text-yellow-400 font-bold bg-yellow-50 px-2 py-0.5 rounded-lg text-sm">
                                                    {{ $review->rating }} ★
                                                </span>
                                            </div>
                                            <p class="text-gray-600 text-sm leading-relaxed">{{ $review->comment }}</p>
                                            <span class="text-[10px] text-gray-400 mt-2 block font-medium">
                                                {{ $review->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                    </div>
                @empty
                    <div class="text-center py-6 text-gray-500 italic">
                        Belum ada ulasan untuk kursus ini.
                    </div>
                @endforelse
            </div>
        </div>

    </div>

</x-app-layout>
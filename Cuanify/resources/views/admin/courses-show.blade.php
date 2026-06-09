<x-app-layout>

    @section('title', 'Course Detail - Cuanify')

    <div class="min-h-screen bg-[#f7eef7] -mx-4 sm:-mx-6 lg:-mx-8 -mt-6 p-6" x-data="{ showRejectModal: false }">
        <div class="max-w-6xl mx-auto">

            <a href="{{ route('admin.courses') }}"
               class="inline-flex items-center gap-2 text-sm font-semibold text-purple-600 hover:text-purple-800 mb-6 transition">
                ← Kembali ke Verifikasi Course
            </a>

            <div class="bg-white rounded-[35px] overflow-hidden shadow-xl border border-purple-100">

                <div class="relative h-[320px] overflow-hidden">
                    @if($course->thumbnail)
                        <img src="{{ asset('storage/' . $course->thumbnail) }}" class="w-full h-full object-cover">
                    @else
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=1200" class="w-full h-full object-cover">
                    @endif

                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>

                    <div class="absolute top-5 left-5 flex items-center gap-2">
                        <span class="bg-white/90 px-4 py-1 rounded-full text-xs font-bold text-purple-700 capitalize shadow-sm">
                            🛡️ Level: {{ $course->difficulty_level }}
                        </span>
                        @if($course->status == 'pending')
                            <span class="bg-amber-500 text-white px-4 py-1 rounded-full text-xs font-bold shadow-sm">Menunggu Review</span>
                        @elseif($course->status == 'published')
                            <span class="bg-green-500 text-white px-4 py-1 rounded-full text-xs font-bold shadow-sm">Published</span>
                        @else
                            <span class="bg-gray-500 text-white px-4 py-1 rounded-full text-xs font-bold shadow-sm">Draft</span>
                        @endif
                    </div>

                    <div class="absolute bottom-8 left-8 text-white">
                        <p class="text-sm mb-2 opacity-90">
                            {{ $course->category->category_name ?? 'No Category' }}
                        </p>

                        <h1 class="text-4xl font-extrabold mb-3">
                            {{ $course->title }}
                        </h1>

                        <div class="flex flex-wrap items-center gap-6 text-sm text-purple-100">
                            <span>⏱️ {{ $course->estimated_duration }} Jam</span>
                            <span>📚 {{ $course->lessons->count() }} Lessons</span>
                            <span>👨‍🏫 Instruktur: <b>{{ $course->instructor->username ?? $course->instructor->name }}</b></span>
                        </div>
                    </div>
                </div>
                <div class="p-8 grid lg:grid-cols-3 gap-8">

                    <div class="lg:col-span-2">
                        <h2 class="text-2xl font-extrabold text-gray-800 mb-4">
                            Tentang Course
                        </h2>
                        <p class="text-gray-600 leading-relaxed mb-8">
                            {{ $course->description }}
                        </p>

                        <div>
                            <h3 class="text-xl font-extrabold text-gray-800 mb-4 flex items-center gap-2">
                                📑 Konten Materi ({{ $course->lessons->count() }})
                            </h3>

                            <div class="space-y-4" x-data="{ activeLesson: null }">
                                @forelse($course->lessons as $lesson)
                                    <div class="bg-[#faf5ff] border border-purple-100 rounded-2xl overflow-hidden transition hover:shadow-md">
                                        
                                        <button @click="activeLesson = (activeLesson === {{ $lesson->lesson_id }} ? null : {{ $lesson->lesson_id }})"
                                                class="w-full text-left p-5 flex items-center justify-between focus:outline-none">
                                            <div>
                                                <h4 class="font-bold text-gray-800">
                                                    {{ $lesson->title }}
                                                </h4>
                                                <p class="text-xs text-purple-600 font-bold mt-1">
                                                    ✨ Lesson {{ $loop->iteration }}
                                                </p>
                                            </div>
                                            <div class="text-purple-500 font-bold text-sm flex items-center gap-1 bg-white px-3 py-1 rounded-xl border border-purple-100 shadow-sm">
                                                <span x-text="activeLesson === {{ $lesson->lesson_id }} ? '👀 Tutup' : '📖 Baca Isi'"></span>
                                            </div>
                                        </button>

                                        <div x-show="activeLesson === {{ $lesson->lesson_id }}" 
                                             x-transition:enter="transition ease-out duration-200"
                                             x-transition:enter-start="opacity-0 transform scale-95"
                                             x-transition:enter-end="opacity-100 transform scale-100"
                                             class="p-5 bg-white border-t border-purple-100 text-gray-700 text-sm leading-relaxed shadow-inner">
                                                <div class="[&_h2]:text-xl [&_h2]:font-bold [&_h2]:mt-4 [&_h2]:mb-2 
                                                            [&_p]:mb-3 [&_p]:leading-relaxed 
                                                            [&_ul]:list-disc [&_ul]:ml-5 [&_ol]:list-decimal [&_ol]:ml-5">
                                                    {!! $lesson->content !!}
                                                </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="bg-gray-50 rounded-2xl p-6 text-gray-400 text-center border border-dashed border-gray-200">
                                         Belum ada materi lesson yang dimasukkan oleh instruktur.
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="bg-[#faf5ff] border border-purple-100 rounded-3xl p-6 sticky top-6 shadow-sm">
                            <h3 class="text-2xl font-extrabold text-gray-800 mb-2">
                                Panel Verifikasi
                            </h3>
                            <p class="text-sm text-gray-500 mb-6">
                                Silakan periksa kelayakan konten course sebelum mengambil tindakan di bawah ini.
                            </p>

                            @if($course->status == 'pending')
                                <div class="space-y-3">
                                    <form action="{{ route('admin.courses.approve', $course->course_id) }}" method="POST" onsubmit="return confirm('Yakin publish course ini?');">
                                        @csrf
                                        <button type="submit" class="w-full bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white py-3 rounded-2xl font-bold shadow-lg transition-all duration-300 hover:-translate-y-1 flex items-center justify-center gap-2 cursor-pointer">
                                            ✅ Approve & Publish
                                        </button>
                                    </form>form>
                                    
                                    <button type="button" @click="showRejectModal = true" class="w-full bg-gradient-to-r from-red-500 to-rose-600 hover:from-red-600 hover:to-rose-700 text-white py-3 rounded-2xl font-bold shadow-lg transition-all duration-300 hover:-translate-y-1 flex items-center justify-center gap-2 cursor-pointer">
                                        ❌ Reject Course
                                    </button>
                                </div>
                            @else
                                <div class="text-center bg-white text-gray-600 py-4 px-3 rounded-2xl font-bold text-sm border border-purple-100 shadow-inner">
                                    🔒 Course ini sudah diproses dan berstatus <span class="text-purple-700 uppercase">{{ $course->status }}</span>.
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>

            <div x-show="showRejectModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/60" x-cloak>
                <div class="bg-white p-6 rounded-[25px] w-full max-w-md shadow-2xl border border-purple-100 m-4 animate-fade-in" @click.away="showRejectModal = false">
                    <h2 class="text-xl font-extrabold text-gray-800 mb-2">Reject Course</h2>
                    <p class="text-sm text-gray-600 mb-4">Berikan alasan penolakan untuk course <strong>{{ $course->title }}</strong></p>
                    
                    <form action="{{ route('admin.courses.reject', $course->course_id) }}" method="POST">
                        @csrf
                        <textarea name="reason" class="w-full border-gray-200 rounded-xl mb-4 p-3 focus:ring-purple-500 focus:border-purple-500 text-sm" rows="4" placeholder="Masukkan alasan penolakan..." required></textarea>
                        
                        <div class="flex justify-end gap-2 text-sm font-bold">
                            <button type="button" @click="showRejectModal = false" class="px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition">Batal</button>
                            <button type="submit" class="px-4 py-2.5 bg-red-600 hover:bg-red-700 text-white rounded-xl shadow-md transition">Kirim Penolakan</button>
                        </div>
                    </form>
                </div>
    <div class="p-6 max-w-5xl mx-auto" x-data="{ showRejectModal: false }">
        
        {{-- Back Link --}}
        <a href="{{ route('admin.courses') }}" class="inline-flex items-center gap-2 mb-6 text-purple-600 hover:text-purple-800 font-semibold text-sm transition-all group">
            <svg class="w-4 h-4 transition-transform group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/>
            </svg>
            Kembali ke Verifikasi Course
        </a>

        {{-- Course Header Card --}}
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 mb-8 overflow-hidden">

                    {{-- Top accent bar --}}
                    <div class="h-1.5 w-full bg-gradient-to-r from-[#b55fe6] via-[#df49a6] to-[#e84393]"></div>

                    <div class="p-8 flex flex-col md:flex-row justify-between items-start gap-6">
                        <div class="flex-1 min-w-0">
                            {{-- Title + Badge --}}
                            <div class="flex flex-wrap items-center gap-3 mb-3">
                                <h1 class="text-2xl font-extrabold text-gray-800">{{ $course->title }}</h1>
                                @if($course->status == 'pending')
                                    <span class="bg-amber-50 border border-amber-200 text-amber-600 px-3 py-1 rounded-full text-xs font-bold">Menunggu Review</span>
                                @elseif($course->status == 'published')
                                    <span class="bg-gradient-to-r from-[#b55fe6]/10 to-[#e84393]/10 border border-purple-200 text-purple-700 px-3 py-1 rounded-full text-xs font-bold inline-flex items-center gap-1.5">
                                        <span class="w-1.5 h-1.5 rounded-full bg-purple-500 animate-pulse"></span> Published
                                    </span>
                                @else
                                    <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-bold">Draft</span>
                                @endif
                            </div>

                            {{-- Description --}}
                            <p class="text-gray-500 text-sm leading-relaxed mb-6">{{ $course->description }}</p>

                            {{-- Meta Info --}}
                            <div class="flex flex-wrap items-center gap-3 text-sm">
                                <div class="flex items-center gap-2 bg-purple-50 border border-purple-100 px-3 py-2 rounded-xl text-purple-700 font-medium">
                                    <i class="fas fa-user-tie text-purple-400 text-xs"></i>
                                    {{-- Menggunakan null-coalescing dari branch main agar tidak crash jika relasi kosong --}}
                                    {{ $course->instructor->username ?? 'No Instructor' }}
                                </div>
                                <div class="flex items-center gap-2 bg-purple-50 border border-purple-100 px-3 py-2 rounded-xl text-purple-700 font-medium">
                                    <i class="fas fa-layer-group text-purple-400 text-xs"></i>
                                    <span class="capitalize">{{ $course->difficulty_level }}</span>
                                </div>
                                <div class="flex items-center gap-2 bg-purple-50 border border-purple-100 px-3 py-2 rounded-xl text-purple-700 font-medium">
                                    <i class="fas fa-clock text-purple-400 text-xs"></i>
                                    {{ $course->estimated_duration }} Jam
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Action Buttons --}}
                @if($course->status == 'pending')
                <div class="flex flex-col gap-3 min-w-[160px]">
                    <form action="{{ route('admin.courses.approve', $course->course_id) }}" method="POST" onsubmit="return confirm('Yakin publish course ini?');">
                        @csrf
                        <button class="w-full bg-gradient-to-r from-green-500 to-emerald-500 hover:from-green-600 hover:to-emerald-600 text-white px-4 py-3 rounded-xl font-bold text-sm transition shadow-sm flex items-center justify-center gap-2">
                            <i class="fas fa-check"></i> Approve
                        </button>
                    </form>
                    <button type="button" @click="showRejectModal = true"
                        class="w-full bg-red-50 border border-red-200 text-red-600 hover:bg-red-500 hover:text-white px-4 py-3 rounded-xl font-bold text-sm transition flex items-center justify-center gap-2">
                        <i class="fas fa-times"></i> Reject
                    </button>
                </div>
                @endif
            </div>
        </div>

        {{-- Reject Modal --}}
        <div x-show="showRejectModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm" x-cloak>
            <div class="bg-white p-6 rounded-2xl w-full max-w-md shadow-2xl border border-purple-100" @click.away="showRejectModal = false">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-red-50 flex items-center justify-center shrink-0">
                        <i class="fas fa-times text-red-500"></i>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-gray-800">Reject Course</h2>
                        <p class="text-xs text-gray-400">Berikan alasan penolakan yang jelas</p>
                    </div>
                </div>
                <div class="bg-purple-50 border border-purple-100 rounded-xl px-4 py-2.5 mb-4 text-sm text-purple-700 font-semibold">
                    {{ $course->title }}
                </div>
                <form action="{{ route('admin.courses.reject', $course->course_id) }}" method="POST">
                    @csrf
                    <textarea name="reason" rows="4" required
                        placeholder="Masukkan alasan penolakan..."
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-700 focus:ring-2 focus:ring-purple-300 focus:border-purple-400 outline-none mb-4 resize-none transition placeholder:text-gray-300">
                    </textarea>
                    <div class="flex justify-end gap-3">
                        <button type="button" @click="showRejectModal = false"
                            class="px-5 py-2 text-sm text-gray-500 hover:bg-gray-100 rounded-xl font-semibold transition">Batal</button>
                        <button type="submit"
                            class="px-5 py-2 text-sm bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white rounded-xl font-bold transition shadow-sm">
                            Kirim Penolakan
                        </button>
                    </div>
                </form>
            </div>
        {{-- Lessons Section --}}
        <div class="flex items-center gap-3 mb-6">
            <div class="w-1 h-7 rounded-full bg-gradient-to-b from-[#b55fe6] to-[#e84393]"></div>
            <h2 class="text-xl font-extrabold text-gray-800">
                Konten Lesson
                <span class="ml-2 bg-purple-100 text-purple-600 text-sm font-bold px-2.5 py-0.5 rounded-full">{{ $course->lessons->count() }}</span>
            </h2>
        </div>

        <div class="space-y-4">
            @forelse($course->lessons as $lesson)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden group hover:border-purple-200 transition-colors">
                    {{-- Lesson Header --}}
                    <div class="flex items-center gap-4 px-6 py-4 border-b border-gray-50 bg-gradient-to-r from-[#b55fe6]/5 to-transparent">
                        <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-[#b55fe6] to-[#e84393] flex items-center justify-center text-white text-xs font-extrabold shrink-0 shadow-sm">
                            {{ $loop->iteration }}
                        </div>
                        <h3 class="font-bold text-gray-800 group-hover:text-purple-700 transition-colors">{{ $lesson->title }}</h3>
                    </div>
                    {{-- Lesson Content --}}
                    <div class="px-6 py-5 text-gray-600 text-sm leading-relaxed whitespace-pre-line">
                        {!! $lesson->content !!}
                    </div>
                </div>
            @empty
                <div class="bg-white p-12 rounded-2xl border border-gray-100 text-center">
                    <svg class="w-12 h-12 text-purple-100 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <p class="text-gray-400 font-medium text-sm">Belum ada materi lesson yang dimasukkan oleh instruktur.</p>
                </div>
            @endforelse

        </div>
    </div>
</x-app-layout>
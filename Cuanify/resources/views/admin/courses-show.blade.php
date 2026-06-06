<x-app-layout>
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
                                             class="p-5 bg-white border-t border-purple-100 text-gray-700 text-sm whitespace-pre-line leading-relaxed shadow-inner">
                                            {{ $lesson->content }}
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
            </div>

        </div>
    </div>
</x-app-layout>
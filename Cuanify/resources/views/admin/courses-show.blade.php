<x-app-layout>

    @section('title', 'Course Detail - Cuanify')

    <div class="min-h-screen bg-[#f7eef7] -mx-4 sm:-mx-6 lg:-mx-8 -mt-6 p-4 sm:p-6" x-data="{ showRejectModal: false }">
        <div class="max-w-6xl mx-auto">

            <a href="{{ route('admin.courses') }}"
               class="inline-flex items-center gap-2 text-sm font-semibold text-purple-600 hover:text-purple-800 mb-6 transition">
                ← Kembali ke Verifikasi Course
            </a>

            <div class="bg-white rounded-[24px] sm:rounded-[35px] overflow-hidden shadow-xl border border-purple-100">

                <div class="relative h-[220px] sm:h-[280px] lg:h-[320px] overflow-hidden">
                    @if($course->thumbnail)
                        <img src="{{ asset('storage/' . $course->thumbnail) }}" class="w-full h-full object-cover">
                    @else
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=1200" class="w-full h-full object-cover">
                    @endif

                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>

                    <div class="absolute top-3 left-3 sm:top-5 sm:left-5 flex flex-wrap gap-2 max-w-[90%]">
                        <span class="bg-white/90 px-4 py-1 rounded-full text-xs font-bold text-purple-700 capitalize shadow-sm">
                            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 3l7 4v5c0 5-3.5 8.5-7 9-3.5-.5-7-4-7-9V7l7-4z"/>
                        </svg>
                        Level:{{ $course->difficulty_level }}
                        </span>
                        @if($course->status == 'pending')
                            <span class="bg-amber-500 text-white px-4 py-1 rounded-full text-xs font-bold shadow-sm flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Menunggu Review
                            </span>
                        @elseif($course->status == 'published')
                            <span class="bg-green-500 text-white px-4 py-1 rounded-full text-xs font-bold shadow-sm flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"/>
                                </svg>
                                Published
                            </span>
                        @else
                            <span class="bg-gray-500 text-white px-4 py-1 rounded-full text-xs font-bold shadow-sm flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                </svg>
                                Draft
                            </span>
                        @endif
                    </div>

                    <div class="absolute bottom-4 left-4 right-4 sm:bottom-8 sm:left-8 sm:right-auto text-white">
                        <p class="text-sm mb-2 opacity-90">
                            {{ $course->category->category_name ?? 'No Category' }}
                        </p>

                        <h1 class="text-xl sm:text-3xl lg:text-4xl font-extrabold mb-3 break-words leading-tight">
                            {{ $course->title }}
                        </h1>

                        <div class="flex flex-wrap items-center gap-3 sm:gap-6 text-xs sm:text-sm text-purple-100">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="9" stroke-width="2"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 7v5l3 2"/>
                                </svg>
                                {{ $course->estimated_duration }} Jam
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13"
                                    />
                                </svg>
                                {{ $course->lessons->count() }} Lessons
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 14c4 0 7 2 7 4.5V21H5v-2.5C5 16 8 14 12 14zm0-2a4 4 0 100-8 4 4 0 000 8z"/>
                                </svg>
                                <b>{{ $course->instructor->username ?? $course->instructor->name }}</b>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="p-4 sm:p-6 lg:p-8 grid lg:grid-cols-3 gap-6 lg:gap-8">

                    <div class="lg:col-span-2">
                        <h2 class="text-2xl font-extrabold text-gray-800 mb-4">
                            Tentang Course
                        </h2>
                        <p class="text-gray-600 leading-relaxed mb-8">
                            {{ $course->description }}
                        </p>

                        <div>
                            <h3 class="text-xl font-extrabold text-gray-800 mb-4 flex items-center gap-2">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z"/>
                                </svg>
                                Konten Materi({{ $course->lessons->count() }})
                            </h3>

                            <div class="space-y-4" x-data="{ activeLesson: null }">
                                @forelse($course->lessons as $lesson)
                                
                                    <div class="bg-[#faf5ff] border border-purple-100 rounded-2xl overflow-hidden transition hover:shadow-md">
                                        
                                        <button @click="activeLesson = (activeLesson === {{ $lesson->lesson_id }} ? null : {{ $lesson->lesson_id }})"
                                                class="w-full text-left p-4 sm:p-5 flex flex-col sm:flex-row gap-3 sm:gap-0 items-start sm:items-center justify-between focus:outline-none">
                                            <div>
                                                <h4 class="font-bold text-gray-800">
                                                    {{ $lesson->title }}
                                                </h4>
                                                <p class="text-xs text-purple-600 font-bold mt-1 flex items-center gap-1">
                                                    <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M10 1l2.4 6.6L19 10l-6.6 2.4L10 19l-2.4-6.6L1 10l6.6-2.4L10 1z"/>
                                                    </svg>
                                                    Lesson {{ $loop->iteration }}
                                                </p>
                                            </div>
                                            <div class="text-purple-500 font-bold text-sm flex items-center gap-2 bg-white px-3 py-1 rounded-xl border border-purple-100 shadow-sm">

                                                <svg class="w-4 h-4 transition-transform duration-300"
                                                     :class="activeLesson === {{ $lesson->lesson_id }} ? 'rotate-180' : ''"
                                                     fill="none"
                                                     stroke="currentColor"
                                                     viewBox="0 0 24 24">
                                                    <path stroke-linecap="round"
                                                          stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M19 9l-7 7-7-7"/>
                                                </svg>
                                            
                                                <span x-text="activeLesson === {{ $lesson->lesson_id }} ? 'Tutup' : 'Baca Isi'"></span>
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
                                                    <div class="
                                                        [&_img]:max-w-full
                                                        [&_img]:h-auto
                                                        [&_img]:rounded-xl
                                                        [&_img]:my-4
                                                        [&_table]:block
                                                        [&_table]:overflow-x-auto
                                                        [&_iframe]:w-full
                                                        [&_iframe]:aspect-video
                                                        [&_iframe]:rounded-xl
                                                        [&_pre]:overflow-x-auto
                                                        [&_code]:break-words
                                                        [&_h2]:text-xl
                                                        [&_h2]:font-bold
                                                        [&_h2]:mt-4
                                                        [&_h2]:mb-2
                                                        [&_p]:mb-3
                                                        [&_ul]:list-disc
                                                        [&_ul]:ml-5
                                                        [&_ol]:list-decimal
                                                        [&_ol]:ml-5
                                                        ">
                                                        {!! $lesson->content !!}

                                                    </div>
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
                        <div class="bg-[#faf5ff] border border-purple-100 rounded-3xl p-5 sm:p-6 lg:sticky lg:top-6 shadow-sm">
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
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"/>
                                            </svg>
                                            Approve & Publish
                                        </button>
                                    </form>
                                    
                                    <button type="button" @click="showRejectModal = true" class="w-full bg-gradient-to-r from-red-500 to-rose-600 hover:from-red-600 hover:to-rose-700 text-white py-3 rounded-2xl font-bold shadow-lg transition-all duration-300 hover:-translate-y-1 flex items-center justify-center gap-2 cursor-pointer">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                        Reject Course
                                    </button>
                                </div>
                            @else
                                <div class="text-center bg-white text-gray-600 py-4 px-3 rounded-2xl font-bold text-sm border border-purple-100 shadow-inner">
                                    <svg class="w-5 h-5 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <rect x="5" y="11" width="14" height="10" rx="2" stroke-width="2"/>
                                        <path stroke-linecap="round" stroke-width="2" d="M8 11V8a4 4 0 118 0v3"/>
                                    </svg>Course ini sudah diproses dan berstatus <span class="text-purple-700 uppercase">{{ $course->status }}</span>.
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>

            <div x-show="showRejectModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/60" x-cloak>
                <div class="bg-white p-4 sm:p-6 rounded-[20px] sm:rounded-[25px] w-full max-w-md max-h-[90vh] overflow-y-auto shadow-2xl border border-purple-100 m-4 animate-fade-in" @click.away="showRejectModal = false">
                    <h2 class="text-xl font-extrabold text-gray-800 mb-2">Reject Course</h2>
                    <p class="text-sm text-gray-600 mb-4">Berikan alasan penolakan untuk course <strong>{{ $course->title }}</strong></p>
                    
                    <form action="{{ route('admin.courses.reject', $course->course_id) }}" method="POST">
                        @csrf
                        <textarea name="reason" class="w-full border-gray-200 rounded-xl mb-4 p-3 focus:ring-purple-500 focus:border-purple-500 text-sm" rows="4" placeholder="Masukkan alasan penolakan..." required></textarea>
                        
                        <div class="flex flex-col sm:flex-row justify-end gap-2 text-sm font-bold">
                            <button type="button" @click="showRejectModal = false" class="w-full sm:w-auto px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition">Batal</button>
                            <button type="submit" class="w-full sm:w-auto px-4 py-2.5 bg-red-600 hover:bg-red-700 text-white rounded-xl shadow-md transition">Kirim Penolakan</button>
                        </div>
                    </form>
                </div>
            </div>  
        </div>
    </div>
</x-app-layout>
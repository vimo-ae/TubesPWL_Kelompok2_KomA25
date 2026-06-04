<x-app-layout>
    <div class="min-h-screen -mx-4 sm:-mx-6 lg:-mx-8 -mt-6 p-6">
        <div class="max-w-6xl mx-auto">
            @php
            $isOwner = auth()->check() && auth()->user()->role === 'instructor' && $course->user_id === auth()->id();
            $isStudentEnrolled = auth()->check() && auth()->user()->role === 'student' && auth()->user()->courses->contains('course_id', $course->course_id);
            $canViewLessons = $isOwner || $isStudentEnrolled;
            $firstLesson = $course->lessons->first();
            
            $isCompleted = false;
            if (auth()->check() && auth()->user()->role === 'student') {
                $myEnrollment = auth()->user()->courses()
                                ->withPivot('status')
                                ->where('courses.course_id', $course->course_id)
                                ->first();
                $isCompleted = $myEnrollment && $myEnrollment->pivot->status === 'completed';
            }
        @endphp

            <a href="{{ route('courses.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-purple-600 hover:text-purple-800 mb-6 transition">
                ← Kembali ke Daftar Course
            </a>

            <div class="bg-white rounded-[35px] overflow-hidden shadow-xl border border-purple-100">
                <!-- Thumbnail Section -->
                <div class="relative h-[320px] overflow-hidden">
                    @if($course->thumbnail)
                        <img src="{{ asset('storage/' . $course->thumbnail) }}" class="w-full h-full object-cover">
                    @else
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=1200" class="w-full h-full object-cover">
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                    <span class="absolute top-5 left-5 bg-white/90 px-4 py-1 rounded-full text-xs font-bold text-purple-700 capitalize">
                        {{ $course->difficulty_level }}
                    </span>
                    <div class="absolute bottom-8 left-8 text-white">
                        <p class="text-sm mb-2 opacity-90">{{ $course->category->category_name ?? 'No Category' }}</p>
                        <h1 class="text-4xl font-extrabold mb-3">{{ $course->title }}</h1>
                        <div class="flex items-center gap-6 text-sm text-purple-100">
                            <span>⭐ 4.8 Rating</span>
                            <span>⏱ {{ $course->estimated_duration }} Jam</span>
                            <span>📚 {{ $course->lessons->count() }} Lessons</span>
                        </div>
                    </div>
                </div>

                @if(session('success'))
                    <div class="m-6 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-2xl">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="p-8 grid lg:grid-cols-3 gap-8">
                    <!-- KOLOM KIRI (Konten) -->
                    <div class="lg:col-span-2">
                        <h2 class="text-2xl font-extrabold text-gray-800 mb-4">Tentang Course</h2>
                        <p class="text-gray-600 leading-relaxed mb-8">{{ $course->description }}</p>

                        <!-- Daftar Lesson -->
                        <div>
                            <h3 class="text-xl font-extrabold text-gray-800 mb-4">Daftar Lesson</h3>
                            <div class="space-y-4">
                                @forelse($course->lessons as $lesson)
                                    @if($canViewLessons)
                                        <a href="{{ route('lessons.show', $lesson->lesson_id) }}">
                                            <div class="bg-[#faf5ff] border border-purple-100 rounded-2xl p-5 flex items-center justify-between hover:shadow-md transition">
                                                <div>
                                                    <h4 class="font-bold text-gray-800">{{ $lesson->title }}</h4>
                                                    <p class="text-sm text-gray-500 mt-1">Lesson {{ $loop->iteration }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    @else
                                        <div class="bg-gray-100 border rounded-2xl p-5 opacity-75">
                                            <h4 class="font-bold text-gray-500">{{ $lesson->title }}</h4>
                                            @if(auth()->check() && auth()->user()->role === 'student')
                                                <p class="text-red-500 text-sm mt-2">Enroll course terlebih dahulu untuk membuka lesson.</p>
                                            @else
                                                <p class="text-amber-600 text-sm mt-2 font-medium">🔒 Hanya dapat diakses oleh siswa yang terdaftar.</p>
                                            @endif
                                        </div>
                                    @endif
                                @empty
                                    <div class="bg-gray-50 rounded-2xl p-6 text-gray-400 text-center">Belum ada lesson.</div>
                                @endforelse
                            </div>
                        </div>

                        <!-- BAGIAN ULASAN (Review Section) -->
                        <div class="mt-12">
                            <h3 class="text-2xl font-extrabold text-gray-800 mb-6">Apa kata mereka?</h3>
                            <div class="space-y-4">
                                @forelse($course->reviews as $review)
                                    <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm flex gap-4">
                                        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center font-bold text-purple-600 shrink-0">
                                            {{ substr($review->user->name, 0, 1) }}
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex items-center justify-between mb-1">
                                                <span class="font-bold text-gray-800">{{ $review->user->name }}</span>
                                                <span class="text-yellow-400 font-bold">{{ $review->rating }} ★</span>
                                            </div>
                                            <p class="text-gray-600 text-sm">{{ $review->comment }}</p>
                                            <span class="text-[10px] text-gray-400 mt-2 block">{{ $review->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-gray-500 italic">Belum ada ulasan untuk kursus ini.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <!-- KOLOM KANAN (Sidebar Mulai Belajar) -->
                    <div>
                        <div class="bg-[#faf5ff] border border-purple-100 rounded-3xl p-6 sticky top-6">
                            <h3 class="text-2xl font-extrabold text-gray-800 mb-2">Mulai Belajar</h3>
                            <p class="text-sm text-gray-500 mb-6">Tingkatkan skill dan mulai perjalanan belajarmu sekarang.</p>
                            
                            <!-- Statistik -->
                            <div class="space-y-4 mb-6">
                                <div class="flex justify-between text-sm"><span class="text-gray-500">Level</span><span class="font-bold capitalize">{{ $course->difficulty_level }}</span></div>
                                <div class="flex justify-between text-sm"><span class="text-gray-500">Durasi</span><span class="font-bold">{{ $course->estimated_duration }} Jam</span></div>
                                <div class="flex justify-between text-sm"><span class="text-gray-500">Lessons</span><span class="font-bold">{{ $course->lessons->count() }}</span></div>
                            </div>

                            <!-- Tombol Aksi -->
                            @if(auth()->check())
                                @if(auth()->user()->role === 'student')
                                    @if($isStudentEnrolled)
                                        @if($firstLesson)
                                            <a href="{{ route('lessons.show', $firstLesson->lesson_id) }}" class="block text-center bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white py-3 rounded-2xl font-bold shadow-lg transition-all duration-300 hover:-translate-y-1">Mulai Belajar</a>
                                        @endif
                                    @else
                                        <form action="{{ route('enroll.course', $course->course_id) }}" method="POST">
                                            @csrf
                                            <button class="w-full bg-gradient-to-r from-pink-500 via-fuchsia-500 to-purple-600 hover:from-pink-600 hover:to-purple-700 text-white py-3 rounded-2xl font-bold shadow-lg transition-all duration-300 hover:-translate-y-1">Enroll Sekarang</button>
                                        </form>
                                    @endif
                                @elseif(auth()->user()->role === 'instructor')
                                    @if($isOwner)
                                        <a href="{{ route('instructor.courses.show', $course->course_id) }}" class="block text-center bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white py-3 rounded-2xl font-bold shadow-lg transition-all duration-300 hover:-translate-y-1">Kelola Course (Pemilik)</a>
                                    @else
                                        <div class="text-center bg-gray-100 text-gray-500 py-3 rounded-2xl font-bold text-sm border border-gray-200">🔒 Mode Pratinjau Instruktur</div>
                                    @endif
                                @endif
                            @endif

                            <!-- Form Review -->
                            @auth
                                @if($isStudentEnrolled && $isCompleted)
                                    <div class="mt-6 pt-6 border-t border-purple-200">
                                        <h4 class="font-bold text-gray-800 mb-3">Beri Ulasan</h4>
                                        <form action="{{ url('/courses/' . $course->course_id . '/review') }}" method="POST" class="space-y-4">
                                            @csrf
                                            <select name="rating" class="w-full border-gray-200 rounded-xl p-3 text-sm">
                                                <option value="5">⭐⭐⭐⭐⭐ (5/5) Luar Biasa!</option>
                                                <option value="4">⭐⭐⭐⭐ (4/5) Bagus</option>
                                                <option value="3">⭐⭐⭐ (3/5) Lumayan</option>
                                            </select>
                                            <textarea name="comment" rows="3" class="w-full border-gray-200 rounded-xl p-3 text-sm" placeholder="Komentar..."></textarea>
                                            <button type="submit" class="w-full bg-purple-600 text-white py-2 rounded-xl font-bold">Kirim Ulasan</button>
                                        </form>
                                    </div>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
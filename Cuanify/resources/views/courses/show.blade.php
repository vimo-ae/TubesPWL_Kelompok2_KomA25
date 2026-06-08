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
                
                    @php
                        $defaultBanner = match($course->category_id) {
                            1 => asset('images/courses/literasi-keuangan.jpg'),
                            2 => asset('images/courses/umkm-kewirausahaan.jpg'),
                            3 => asset('images/courses/digital-marketing.jpg'),
                            4 => asset('images/courses/pengembangan-diri.jpg'),
                            5 => asset('images/courses/ekonomi-berkelanjutan.jpg'),
                            default => asset('images/courses/default.jpg'),
                        };
                    
                        $imageSrc = $course->thumbnail
                            ? asset('storage/' . $course->thumbnail)
                            : $defaultBanner;
                    @endphp

                    <img
                        src="{{ $imageSrc }}"
                        alt="{{ $course->title }}"
                        class="w-full h-full object-cover">

                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>

                    <span class="absolute top-5 left-5 bg-white/90 px-4 py-1 rounded-full text-xs font-bold text-purple-700 capitalize">
                        {{ $course->difficulty_level }}
                    </span>
                    
                    <div class="absolute bottom-8 left-8 text-white">
                        <p class="text-sm mb-2 opacity-90">{{ $course->category->category_name ?? 'No Category' }}</p>
                        <h1 class="text-4xl font-extrabold mb-3">{{ $course->title }}</h1>
                        <div class="flex items-center gap-6 text-sm text-purple-100">

                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                     viewBox="0 0 20 20" class="w-4 h-4">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1
                                    1 0 00.95.69h3.462c.969 0 1.371 1.24.588
                                    1.81l-2.8 2.034a1 1 0 00-.364
                                    1.118l1.07 3.292c.3.921-.755
                                    1.688-1.54 1.118l-2.8-2.034a1
                                    1 0 00-1.176 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1
                                    1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1
                                    1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <span>4.8 Rating</span>
                            </div>
                        
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor"
                                     class="w-4 h-4">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M12 8v4l3 3m6-3a9 9 0
                                          11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>{{ $course->estimated_duration }} Jam</span>
                            </div>
                        
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor"
                                     class="w-4 h-4">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M12 6.253v13m0-13C10.832
                                          5.483 9.246 5 7.5 5S4.168
                                          5.483 3 6.253v13C4.168
                                          18.483 5.754 18 7.5 18s3.332.483
                                          4.5 1.253m0-13C13.168 5.483
                                          14.754 5 16.5 5s3.332.483
                                          4.5 1.253v13C19.832 18.483
                                          18.246 18 16.5 18s-3.332.483-4.5 1.253"/>
                                </svg>
                                <span>{{ $course->lessons->count() }} Lessons</span>
                            </div>
                        
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
                            <div class="flex items-center justify-between mb-5">
                                <div>
                                    <h3 class="text-2xl font-extrabold text-gray-800">
                                        Daftar Lesson
                                    </h3>

                                    <p class="text-gray-500 text-sm mt-1">
                                        {{ $course->lessons->count() }} materi tersedia
                                    </p>
                                </div>

                                <div class="px-4 py-2 rounded-full bg-purple-100 text-purple-700 text-sm font-semibold">
                                    {{ $course->lessons->count() }} Lessons
                                </div>
                            </div>
                            <div class="space-y-3">
                                @forelse($course->lessons as $lesson)
                                    @if($canViewLessons)
                                        <a href="{{ route('lessons.show', $lesson->lesson_id) }}"
                                           class="block group">
                                            <div class="bg-white border border-purple-100 rounded-2xl p-5
                                                        flex items-center justify-between
                                                        hover:shadow-xl hover:border-purple-300
                                                        hover:-translate-y-1
                                                        transition-all duration-300">
                                                                                
                                                <div class="flex items-center gap-4">
                                                    <div class="w-12 h-12 rounded-xl bg-gradient-to-r from-fuchsia-500 to-purple-600
                                                                text-white flex items-center justify-center font-bold">
                                                        {{ $loop->iteration }}
                                                    </div>
                                                
                                                    <div>
                                                        <h4 class="font-bold text-gray-800">
                                                            {{ $lesson->title }}
                                                        </h4>
                                                    
                                                        <p class="text-sm text-gray-500">
                                                            Lesson {{ $loop->iteration }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @else
                                        <div class="bg-gray-100 border rounded-2xl p-5 opacity-75">
                                            <h4 class="font-bold text-gray-500">{{ $lesson->title }}</h4>
                                            @if(auth()->check() && auth()->user()->role === 'student')
                                                <p class="text-red-500 text-sm mt-2">Enroll course terlebih dahulu untuk membuka lesson.</p>
                                            @else
                                                <div class="flex items-center gap-2 text-amber-600 text-sm font-medium">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke="currentColor"
                                                        class="w-4 h-4">
                                                    <path stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 11c1.657 0 3-1.343
                                                        3-3s-1.343-3-3-3-3 1.343-3
                                                        3 1.343 3 3 3zm0 0v2m-6
                                                        8h12a2 2 0 002-2v-3a6 6 0
                                                        00-12 0v3a2 2 0 002 2z"/>
                                                    </svg>
                                                
                                                    <span>Hanya dapat diakses oleh siswa yang terdaftar.</span>
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                @empty
                                    <div class="bg-gray-50 rounded-2xl p-6 text-gray-400 text-center">Belum ada lesson.</div>
                                @endforelse
                            </div>
                        </div>

                        <!-- BAGIAN ULASAN (Review Section) -->
                        <div class="mt-12 bg-purple-50 rounded-3xl p-6">
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
                                                <div class="flex items-center gap-1 text-yellow-500">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         fill="currentColor"
                                                         viewBox="0 0 24 24"
                                                         class="w-4 h-4">
                                                        <path fill-rule="evenodd"
                                                              d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006
                                                                 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527
                                                                 1.258 5.273c.271 1.136-.964 2.033-1.96 1.425L12
                                                                 18.354l-4.628 2.826c-.996.608-2.231-.29-1.96-1.425
                                                                 l1.258-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305
                                                                 l5.404-.434 2.082-5.005z"
                                                              clip-rule="evenodd"/>
                                                    </svg>
                                                
                                                    <span class="font-bold">
                                                        {{ $review->rating }}
                                                    </span>
                                                </div>
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
                        <div class="bg-white/90 backdrop-blur-sm border border-purple-100 rounded-3xl p-6 sticky top-6 shadow-xl">
                            <h3 class="text-2xl font-extrabold text-gray-800 mb-2">Mulai Belajar</h3>
                            <p class="text-sm text-gray-500 mb-6">Tingkatkan skill dan mulai perjalanan belajarmu sekarang.</p>
                            
                            <!-- Statistik -->
                            <div class="mb-4">
                                <span class="inline-flex items-center px-4 py-2 rounded-full
                                             bg-purple-100 text-purple-700 font-semibold text-sm">
                                    {{ ucfirst($course->difficulty_level) }}
                                </span>
                            </div>

                            <div class="grid grid-cols-2 gap-3 mb-6">
                            
                                <div class="bg-gradient-to-br from-purple-50 to-white rounded-2xl p-4 text-center border border-purple-200">
                                    <p class="text-xs text-gray-500">Durasi</p>
                                    <p class="font-bold text-purple-600 text-lg">
                                        {{ $course->estimated_duration }}j
                                    </p>
                                </div>
                            
                                <div class="bg-gradient-to-br from-purple-50 to-white rounded-2xl p-4 text-center border border-purple-200">
                                    <p class="text-xs text-gray-500">Lesson</p>
                                    <p class="font-bold text-purple-600 text-lg">
                                        {{ $course->lessons->count() }}
                                    </p>
                                </div>
                            
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
                                                <option value="5">5/5 - Luar Biasa</option>
                                                <option value="4">4/5 - Bagus</option>
                                                <option value="3">3/5 - Lumayan</option>
                                                <option value="2">2/5 - Kurang</option>
                                                <option value="1">1/5 - Buruk</option>
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
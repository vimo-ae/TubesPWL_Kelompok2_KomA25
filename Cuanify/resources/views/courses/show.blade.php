<x-app-layout>

<div class="min-h-screen bg-[#f7eef7] -mx-4 sm:-mx-6 lg:-mx-8 -mt-6 p-6">

    <div class="max-w-6xl mx-auto">

        <!-- Back -->
        <a href="{{ route('courses.index') }}"
           class="inline-flex items-center gap-2 text-sm font-semibold text-purple-600 hover:text-purple-800 mb-6 transition">
            Kembali ke Courses
        </a>

        <!-- Hero -->
        <div class="bg-white rounded-[35px] overflow-hidden shadow-xl border border-purple-100">

            <!-- Thumbnail -->
            <div class="relative h-[320px] overflow-hidden">

                @if($course->thumbnail)
                    <img src="{{ asset('storage/' . $course->thumbnail) }}"
                         class="w-full h-full object-cover">
                @else
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=1200"
                         class="w-full h-full object-cover">
                @endif

                <!-- Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>

                <!-- Badge -->
                <span class="absolute top-5 left-5 bg-white/90 px-4 py-1 rounded-full text-xs font-bold text-purple-700 shadow-sm capitalize">
                    {{ $course->difficulty_level }}
                </span>

                <!-- Title -->
                <div class="absolute bottom-8 left-8 text-white">

                    <p class="text-sm mb-2 opacity-90">
                        {{ $course->category->category_name ?? 'No Category' }}
                    </p>

                    <h1 class="text-4xl font-extrabold mb-3">
                        {{ $course->title }}
                    </h1>

                    <div class="flex items-center gap-6 text-sm text-purple-100">

                        <span>⭐ 4.8 Rating</span>

                        <span>
                            ⏱ {{ $course->estimated_duration }} Jam
                        </span>

                        <span>
                            📚 {{ $course->lessons->count() }} Lessons
                        </span>

                    </div>

                </div>

            </div>

            @if(session('success'))

                <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-2xl">
                    {{ session('success') }}
                </div>
            
            @endif

            <!-- Content -->
            <div class="p-8 grid lg:grid-cols-3 gap-8">

                <!-- Left -->
                <div class="lg:col-span-2">

                    <h2 class="text-2xl font-extrabold text-gray-800 mb-4">
                        Tentang Course
                    </h2>

                    <p class="text-gray-600 leading-relaxed mb-8">
                        {{ $course->description }}
                    </p>

                    <!-- Lesson Preview -->
                    <div>

                        <h3 class="text-xl font-extrabold text-gray-800 mb-4">
                            Daftar Lesson
                        </h3>

                        <div class="space-y-4">

                            @forelse($course->lessons as $lesson)

                            <div class="bg-[#faf5ff] border border-purple-100 rounded-2xl p-5 flex items-center justify-between">

                                <div>
                                    <h4 class="font-bold text-gray-800">
                                        {{ $lesson->title }}
                                    </h4>

                                    <p class="text-sm text-gray-500 mt-1">
                                        Lesson {{ $loop->iteration }}
                                    </p>
                                </div>

                            </div>

                            @empty

                            <div class="bg-gray-50 rounded-2xl p-6 text-gray-400 text-center">
                                Belum ada lesson.
                            </div>

                            @endforelse

                        </div>

                    </div>

                </div>

                <!-- Right -->
                <div>

                    <div class="bg-[#faf5ff] border border-purple-100 rounded-3xl p-6 sticky top-6">

                        <h3 class="text-2xl font-extrabold text-gray-800 mb-2">
                            Mulai Belajar 
                        </h3>

                        <p class="text-sm text-gray-500 mb-6">
                            Tingkatkan skill dan mulai perjalanan belajarmu sekarang.
                        </p>

                        <!-- Info -->
                        <div class="space-y-4 mb-6">

                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">Level</span>
                                <span class="font-bold capitalize">
                                    {{ $course->difficulty_level }}
                                </span>
                            </div>

                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">Durasi</span>
                                <span class="font-bold">
                                    {{ $course->estimated_duration }} Jam
                                </span>
                            </div>

                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">Lessons</span>
                                <span class="font-bold">
                                    {{ $course->lessons->count() }}
                                </span>
                            </div>

                        </div>

                        <!-- Button -->
                        @if(auth()->check() && auth()->user()->courses->contains('course_id', $course->course_id))

                            <a href="{{ route('lessons.index', $course->course_id) }}"
                               class="block text-center bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white py-3 rounded-2xl font-bold shadow-lg transition-all duration-300 hover:-translate-y-1">
                                Lihat Lesson
                            </a>

                        @else

                            <form action="{{ route('enroll.course', $course->course_id) }}" method="POST">
                                @csrf

                                <button class="w-full bg-gradient-to-r from-pink-500 via-fuchsia-500 to-purple-600 hover:from-pink-600 hover:to-purple-700 text-white py-3 rounded-2xl font-bold shadow-lg transition-all duration-300 hover:-translate-y-1">
                                    Enroll Sekarang
                                </button>
                            </form>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</x-app-layout>
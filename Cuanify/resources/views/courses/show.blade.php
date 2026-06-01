<x-app-layout>

<div class="min-h-screen bg-[#f7eef7] -mx-4 sm:-mx-6 lg:-mx-8 -mt-6 p-6">

    <div class="max-w-6xl mx-auto">

        @php
            $isEnrolled = auth()->check()
                ? auth()->user()->courses->contains('course_id', $course->course_id)
                : false;
        @endphp

        <!-- BACK -->
        <a href="{{ route('courses.index') }}"
           class="inline-flex items-center gap-2 text-sm font-semibold text-purple-600 hover:text-purple-800 mb-6 transition">
            ← Kembali ke Daftar Course
        </a>

        <!-- HERO -->
        <div class="bg-white rounded-[35px] overflow-hidden shadow-xl border border-purple-100">

            <!-- THUMBNAIL -->
            <div class="relative h-[320px] overflow-hidden">

                @if($course->thumbnail)
                    <img src="{{ asset('storage/' . $course->thumbnail) }}"
                         class="w-full h-full object-cover">
                @else
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=1200"
                         class="w-full h-full object-cover">
                @endif

                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>

                <span class="absolute top-5 left-5 bg-white/90 px-4 py-1 rounded-full text-xs font-bold text-purple-700 capitalize">
                    {{ $course->difficulty_level }}
                </span>

                <div class="absolute bottom-8 left-8 text-white">

                    <p class="text-sm mb-2 opacity-90">
                        {{ $course->category->category_name ?? 'No Category' }}
                    </p>

                    <h1 class="text-4xl font-extrabold mb-3">
                        {{ $course->title }}
                    </h1>

                    <div class="flex items-center gap-6 text-sm text-purple-100">
                        <span>⭐ 4.8 Rating</span>
                        <span>⏱ {{ $course->estimated_duration }} Jam</span>
                        <span>📚 {{ $course->lessons->count() }} Lessons</span>
                    </div>

                </div>
            </div>

            <!-- SUCCESS MESSAGE -->
            @if(session('success'))
                <div class="m-6 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-2xl">
                    {{ session('success') }}
                </div>
            @endif

            <!-- CONTENT -->
            <div class="p-8 grid lg:grid-cols-3 gap-8">

                <!-- LEFT -->
                <div class="lg:col-span-2">

                    <h2 class="text-2xl font-extrabold text-gray-800 mb-4">
                        Tentang Course
                    </h2>

                    <p class="text-gray-600 leading-relaxed mb-8">
                        {{ $course->description }}
                    </p>

                    <!-- LESSON LIST -->
                    <div>
                        <h3 class="text-xl font-extrabold text-gray-800 mb-4">
                            Daftar Lesson
                        </h3>

                        <div class="space-y-4">

                            @php
                                $isEnrolled = auth()->check()
                                    && auth()->user()->courses->contains('course_id', $course->course_id);

                                $firstLesson = $course->lessons->first();
                            @endphp

                            @forelse($course->lessons as $lesson)

                                @if($isEnrolled)

                                    <a href="{{ route('lessons.show', $lesson->lesson_id) }}">
                                        <div class="bg-[#faf5ff] border border-purple-100 rounded-2xl p-5 flex items-center justify-between hover:shadow-md transition">

                                            <div>
                                                <h4 class="font-bold text-gray-800">
                                                    {{ $lesson->title }}
                                                </h4>

                                                <p class="text-sm text-gray-500 mt-1">
                                                    Lesson {{ $loop->iteration }}
                                                </p>
                                            </div>

                                        </div>
                                    </a>

                                @else

                                    <div class="bg-gray-100 border rounded-2xl p-5 opacity-75">

                                        <h4 class="font-bold text-gray-800">
                                            {{ $lesson->title }}
                                        </h4>

                                        <p class="text-red-500 text-sm mt-2">
                                            Enroll course terlebih dahulu untuk membuka lesson.
                                        </p>

                                    </div>

                                @endif

                            @empty

                                <div class="bg-gray-50 rounded-2xl p-6 text-gray-400 text-center">
                                    Belum ada lesson.
                                </div>

                            @endforelse

                        </div>
                    </div>

                </div>

                <!-- RIGHT -->
                <div>

                    <div class="bg-[#faf5ff] border border-purple-100 rounded-3xl p-6 sticky top-6">

                        <h3 class="text-2xl font-extrabold text-gray-800 mb-2">
                            Mulai Belajar
                        </h3>

                        <p class="text-sm text-gray-500 mb-6">
                            Tingkatkan skill dan mulai perjalanan belajarmu sekarang.
                        </p>

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

                        @if($isEnrolled)

                            @if($firstLesson)
                                <a href="{{ route('lessons.show', $firstLesson->lesson_id) }}"
                                   class="block text-center bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white py-3 rounded-2xl font-bold shadow-lg transition-all duration-300 hover:-translate-y-1">
                                    Mulai Belajar
                                </a>
                            @else
                                <div class="text-center text-gray-400 py-3">
                                    Belum ada lesson
                                </div>
                            @endif

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

        @foreach($course->lessons as $lesson)
            @if($isEnrolled)
                <a href="{{ route('lessons.show', $lesson->lesson_id) }}">
                    <div class="bg-white p-4 rounded mt-4 transition duration-300 hover:scale-[1.02] hover:shadow-lg cursor-pointer">
                        <h2 class="font-bold text-lg">
                            {{ $lesson->title }}
                        </h2>
                        <p class="text-gray-600 mt-1">
                            {{ Str::limit($lesson->content, 100) }}
                        </p>
                    </div>
                </a>
            @else
                <div class="bg-gray-100 p-4 rounded mt-4 opacity-75 cursor-not-allowed">
                    <h2 class="font-bold text-lg text-gray-500">
                        {{ $lesson->title }}
                    </h2>
                    <p class="text-gray-500 mt-1">
                        {{ Str::limit($lesson->content, 100) }}
                    </p>
                    <p class="text-red-600 mt-2 text-sm font-medium">
                        Enroll course terlebih dahulu untuk membuka materi lesson ini.
                    </p>
                </div>
            @endif
        @endforeach
    </div>

</div>

</x-app-layout>
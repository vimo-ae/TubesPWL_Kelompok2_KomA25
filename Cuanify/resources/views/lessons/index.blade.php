<x-app-layout>
            
<div class="min-h-screen bg-[#f7eef7] -mx-4 sm:-mx-6 lg:-mx-8 -mt-6 p-6">           

    <div class="max-w-6xl mx-auto">

        <!-- Back -->
        <a href="{{ route('courses.show', $course->course_id) }}"
           class="inline-flex items-center gap-2 text-sm font-semibold text-purple-600 hover:text-purple-800 mb-6 transition">
            Kembali ke Course
        </a>

        <!-- Hero -->
        <div class="relative overflow-hidden rounded-[35px] bg-gradient-to-br from-fuchsia-600 via-purple-600 to-indigo-700 shadow-2xl p-8 md:p-10 mb-8">

            <div class="absolute top-[-50px] right-[-50px] w-72 h-72 bg-white/10 blur-[80px] rounded-full"></div>
            <div class="absolute bottom-[-30px] left-[20%] w-44 h-44 border-[18px] border-white/10 rounded-full"></div>

            <div class="relative z-10">

                <p class="text-sm text-purple-100 mb-2">
                    {{ $course->category->category_name ?? 'No Category' }}
                </p>

                <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4 leading-tight">
                    {{ $course->title }}
                </h1>

                <p class="text-purple-100 max-w-3xl leading-relaxed mb-6">
                    {{ $course->description }}
                </p>

                <div class="flex flex-wrap gap-4 text-sm">

                    <div class="bg-white/15 backdrop-blur-md px-4 py-2 rounded-2xl text-white font-semibold border border-white/10">
                        📚 {{ $course->lessons->count() }} Lessons
                    </div>

                    <div class="bg-white/15 backdrop-blur-md px-4 py-2 rounded-2xl text-white font-semibold border border-white/10">
                        ⏱ {{ $course->estimated_duration }} Jam
                    </div>

                    <div class="bg-white/15 backdrop-blur-md px-4 py-2 rounded-2xl text-white font-semibold border border-white/10 capitalize">
                        🎯 {{ $course->difficulty_level }}
                    </div>

                </div>

            </div>

        </div>

        <!-- Lessons -->
        <div class="space-y-6">

            @forelse($course->lessons as $lesson)

            <div class="group bg-white rounded-[30px] p-6 shadow-sm border border-purple-100 hover:shadow-xl transition duration-300">

                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                    <!-- Left -->
                    <div class="flex gap-5 items-start">

                        <!-- Number -->
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-pink-500 via-fuchsia-500 to-purple-600 text-white flex items-center justify-center font-extrabold text-lg shadow-lg flex-shrink-0">
                            {{ $loop->iteration }}
                        </div>

                        <!-- Info -->
                        <div>

                            <p class="text-xs font-bold tracking-widest uppercase text-purple-500 mb-2">
                                Lesson {{ $loop->iteration }}
                            </p>

                            <h2 class="text-2xl font-extrabold text-gray-800 mb-2 leading-tight">
                                {{ $lesson->title }}
                            </h2>

                            <p class="text-gray-500 leading-relaxed text-sm max-w-2xl">
                                Materi pembelajaran tersedia dalam bentuk video pembelajaran dan file PDF yang bisa dipelajari kapan saja.
                            </p>

                            <!-- Tags -->
                            <div class="flex flex-wrap gap-2 mt-4">

                                @if($lesson->video)
                                <span class="bg-pink-100 text-pink-700 text-xs font-bold px-3 py-1 rounded-full">
                                    🎥 Video
                                </span>
                                @endif

                                @if($lesson->pdf)
                                <span class="bg-purple-100 text-purple-700 text-xs font-bold px-3 py-1 rounded-full">
                                    📄 PDF
                                </span>
                                @endif

                            </div>

                        </div>

                    </div>

                    <!-- Right -->
                    <div>           

                    <a href="{{ route('lessons.show', $lesson->lesson_id) }}"
                        class="whitespace-nowrap bg-gradient-to-r from-pink-500 via-fuchsia-500 to-purple-600 hover:from-pink-600 hover:to-purple-700 text-white px-6 py-3 rounded-2xl font-bold shadow-lg transition-all duration-300 hover:-translate-y-1 inline-block">
                        Buka Lesson
                    </a>

                    </div>          

                </div>

            </div>

            @empty

            <div class="bg-white rounded-[30px] p-12 text-center shadow-sm border border-purple-100">

                <div class="text-6xl mb-4">
                    📚
                </div>

                <h2 class="text-2xl font-extrabold text-gray-700 mb-2">
                    Belum Ada Lesson
                </h2>

                <p class="text-gray-400">
                    Lesson untuk course ini belum tersedia.
                </p>

            </div>

            @endforelse

        </div>

    </div>

</div>

</x-app-layout>
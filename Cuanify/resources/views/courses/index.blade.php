<x-app-layout>

<div class="min-h-screen w-full bg-[#f7eef7] -mx-4 sm:-mx-6 lg:-mx-8 -mt-6 p-6">
    <div class="max-w-7xl mx-auto">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-800">
                    Rekomendasi Kursus untuk Kamu
                </h1>
                <p class="text-gray-500 mt-1 text-sm">
                    Temukan course terbaik untuk meningkatkan skill kamu
                </p>
            </div>

            <a href="{{ route('my-courses.index') }}"
               class="text-sm font-medium text-purple-600 hover:text-purple-800">
                Lihat My Courses
            </a>
        </div>

        <!-- CATEGORY FILTER (dari file 2, disesuaikan style file 1) -->
        <div class="flex gap-2 flex-wrap mb-6">
            <a href="{{ route('courses.index') }}"
               class="px-4 py-2 rounded-lg bg-gray-300 text-gray-800">
                Semua
            </a>

            @foreach($categories as $category)
                <a href="{{ route('courses.index', ['category' => $category->category_id]) }}"
                   class="px-4 py-2 rounded-lg bg-indigo-500 text-white">
                    {{ $category->category_name }}
                </a>
            @endforeach
        </div>

        <!-- COURSE GRID -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach($courses as $course)

            <!-- CARD -->
            <a href="{{ route('courses.show', $course->course_id) }}"
               class="group bg-white dark:bg-gray-800 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-xl transition duration-300 block">

                <!-- THUMBNAIL -->
                <div class="h-40 overflow-hidden relative">
                    @if($course->thumbnail)
                        <img src="{{ asset('storage/' . $course->thumbnail) }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    @else
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=400"
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    @endif

                    <span class="absolute top-2 left-2 bg-white/90 px-2 py-0.5 rounded-full text-[10px] font-bold text-purple-700 capitalize">
                        {{ $course->difficulty_level }}
                    </span>
                </div>

                <!-- CONTENT -->
                <div class="p-4">

                    <h3 class="font-bold text-gray-800 dark:text-gray-200 text-sm line-clamp-2 mb-1">
                        {{ $course->title }}
                    </h3>

                    <p class="text-xs text-gray-400 mb-2">
                        {{ $course->category->category_name ?? 'No Category' }}
                    </p>

                    <div class="flex justify-between items-center text-xs mb-3">
                        <span class="text-yellow-500 font-bold">⭐ 4.8</span>
                        <span class="text-gray-400">
                            {{ $course->estimated_duration }} jam
                        </span>
                    </div>

                    <!-- STATUS ENROLL (SAFE AUTH CHECK) -->
                    @auth
                        @if(auth()->user()->courses->contains('course_id', $course->course_id))
                            <p class="text-green-600 text-xs font-semibold mb-2">
                                ✓ Sudah Enroll
                            </p>
                        @else
                            <p class="text-indigo-600 text-xs font-semibold mb-2">
                                Belum Enroll
                            </p>
                        @endif
                    @endauth

                    <!-- CTA -->
                    <div class="text-center text-sm font-bold text-purple-600 group-hover:text-purple-800">
                        Lihat Course →
                    </div>

                </div>
            </a>

            @endforeach

        </div>

    </div>
</div>

<style>
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>

</x-app-layout>
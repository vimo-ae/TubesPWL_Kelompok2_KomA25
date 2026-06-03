<x-app-layout>
<div class="min-h-screen bg-[#f8f1fb] -mx-4 sm:-mx-6 lg:-mx-8 -mt-6 px-6 py-8">

    <div class="max-w-7xl mx-auto">

        <!-- Header -->
        <div class="relative overflow-hidden rounded-[32px] bg-gradient-to-r from-fuchsia-600 via-purple-600 to-indigo-600 p-7 md:p-8 shadow-xl mb-8">

            <!-- Blur -->
            <div class="absolute -top-20 -right-16 w-80 h-80 bg-white/10 rounded-full blur-[90px]"></div>
            <div class="absolute bottom-[-40px] left-[20%] w-52 h-52 border-[18px] border-white/10 rounded-full"></div>

            <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-6">

                <!-- Left -->
                <div>

                    <div class="inline-flex items-center gap-2 bg-white/15 border border-white/10 backdrop-blur-md text-white text-[11px] uppercase tracking-[3px] font-bold px-4 py-2 rounded-full mb-4">
                        📚 Learning Space
                    </div>

                    <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-3">
                        My Courses
                    </h1>

                    <p class="text-sm md:text-base text-purple-100 leading-relaxed max-w-2xl">
                        Semua course yang sudah kamu enroll akan tampil di sini.
                        Yuk lanjutkan progress belajar kamu 🚀
                    </p>

                </div>

                <!-- Stats -->
                <div class="bg-white/10 border border-white/10 backdrop-blur-md rounded-3xl px-8 py-5 text-center min-w-[160px] shadow-lg">

                    <p class="text-xs uppercase tracking-[2px] text-purple-100 mb-1">
                        Total Course
                    </p>

                    <h2 class="text-4xl font-extrabold text-white">
                        {{ $courses->count() }}
                    </h2>

                </div>

            </div>

        </div>

        @if($courses->count() > 0)

        <!-- Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        
            @foreach($courses as $course)
    <a href="{{ route('courses.show', $course->course_id) }}" class="block group">
        <div class="bg-white rounded-2xl overflow-hidden border border-purple-100 hover:shadow-xl hover:-translate-y-1 transition duration-300">
            
            <div class="relative h-36 overflow-hidden">
                @if($course->thumbnail)
                    <img src="{{ asset('storage/' . $course->thumbnail) }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                @else
                    <div class="w-full h-full bg-gradient-to-br from-fuchsia-500 via-purple-500 to-indigo-600 flex items-center justify-center text-4xl">
                        📚
                    </div>
                @endif
                <div class="absolute top-3 left-3 bg-white/95 text-purple-700 text-[10px] font-bold px-3 py-1 rounded-full shadow">
                    {{ ucfirst($course->difficulty_level) }}
                </div>
            </div>

            <div class="p-4">
                <p class="text-[10px] uppercase tracking-[2px] font-bold text-purple-500 mb-2">
                    {{ $course->category->category_name ?? 'Course' }}
                </p>

                <h2 class="text-lg font-bold text-gray-800 leading-snug line-clamp-2 mb-2">
                    {{ $course->title }}
                </h2>

                <p class="text-sm text-gray-500 line-clamp-2 mb-4">
                    {{ $course->description }}
                </p>

                <div class="flex items-center justify-between text-xs mb-4">
                    <div class="text-purple-600 font-semibold">
                        📚 {{ $course->lessons->count() }} Lesson
                    </div>
                    <div class="text-gray-400">
                        ⏱ {{ $course->estimated_duration }} Jam
                    </div>
                </div>

                <div class="mt-2 border-t pt-3">
                    <div class="flex justify-between items-center text-[10px] font-bold text-gray-500 mb-1">
                        <span>Progress Belajar</span>
                        <span class="text-purple-600">{{ number_format($course->pivot->completion_percentage ?? 0, 0) }}%</span>
                    </div>
                    <div class="w-full bg-gray-100 h-2 rounded-full overflow-hidden shadow-inner">
                        <div class="bg-gradient-to-r from-purple-500 to-indigo-500 h-full rounded-full transition-all duration-500" 
                            style="width: {{ $course->pivot->completion_percentage ?? 0 }}%">
                        </div>
                    </div>
                </div>
                
            </div> </div> </a>
@endforeach
        
        </div>

        @else

        <!-- Empty State -->
        <div class="bg-white border border-purple-100 rounded-[35px] p-14 text-center shadow-sm">

            <div class="w-24 h-24 mx-auto rounded-full bg-gradient-to-br from-fuchsia-500 via-purple-500 to-indigo-600 flex items-center justify-center text-white text-5xl shadow-xl mb-6">
                📖
            </div>

            <h2 class="text-3xl font-extrabold text-gray-800 mb-3">
                Belum Ada Course
            </h2>

            <p class="text-gray-500 max-w-lg mx-auto leading-relaxed mb-8">
                Kamu belum enroll course apapun.
                Yuk mulai belajar sekarang 
            </p>

            <a href="{{ route('courses.index') }}"
               class="inline-block bg-gradient-to-r from-fuchsia-500 to-purple-600 hover:opacity-90 text-white px-8 py-3 rounded-2xl font-bold shadow-lg transition duration-300">

                Jelajahi Course

            </a>

        </div>

        @endif

    </div>

</div>

</x-app-layout>
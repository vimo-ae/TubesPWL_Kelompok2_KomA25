<x-app-layout>

<div class="min-h-screen w-full bg-[#f7eef7] -mx-4 sm:-mx-6 lg:-mx-8 -mt-6 p-6">
    <div class="max-w-7xl mx-auto">

        <!-- Header -->
        <div class="flex justify-between items-center mb-8">

            <div>
                <h1 class="text-3xl font-extrabold text-gray-800">
                    Rekomendasi Kursus untuk Kamu
                </h1>

                <p class="text-gray-500 mt-1 text-sm">
                    Temukan course terbaik untuk meningkatkan skill kamu 
                </p>
            </div>

            <a href="{{ route('my.courses') }}"
               class="text-sm font-medium text-purple-600 hover:text-purple-800">
                Lihat My Courses
            </a>

        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        
            @foreach($courses as $course)
        
            <div class="group bg-white dark:bg-gray-800 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-xl transition duration-300">
            <div class="flex gap-2 flex-wrap mb-6">
                <a href="{{ route('courses.index') }}"class="bg-white px-4 py-2 rounded-xl text-sm shadow">
                    Semua
                </a>

            @foreach($categories as $category)
                <a href="{{ route('courses.index', ['category' => $category->category_id]) }}"class="bg-purple-500 text-white px-4 py-2 rounded-xl text-sm">{{ $category->category_name }}
                </a>
            @endforeach
            </div>
                <!-- Thumbnail -->
                <div class="h-40 relative overflow-hidden">
                
                    @if($course->thumbnail)
                        <img src="{{ asset('storage/' . $course->thumbnail) }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    @else
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=400"
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    @endif
                
                    <!-- Badge -->
                    <span class="absolute top-2 left-2 bg-white/90 px-2 py-0.5 rounded-full text-[9px] font-bold text-purple-700 shadow-sm capitalize">
                        {{ $course->difficulty_level }}
                    </span>
                
                </div>
            
                <!-- Content -->
                <div class="p-4">
                
                    <!-- Title -->
                    <h3 class="font-bold text-gray-800 dark:text-gray-200 text-sm leading-tight mb-1 line-clamp-2">
                        {{ $course->title }}
                    </h3>
                
                    <!-- Category -->
                    <p class="text-xs text-gray-400 mb-2">
                        {{ $course->category->category_name ?? 'No Category' }}
                    </p>
                
                    <!-- Bottom -->
                        <div class="flex justify-between items-center text-xs mb-3">
                                        
                        <span class="text-yellow-500 font-bold">
                            ⭐ 4.8
                        </span>
                    
                        <span class="text-gray-400">
                            {{ $course->estimated_duration }} jam
                        </span>
                    
                    </div>

                    @if(auth()->check())
                        @if(auth()->user()->courses->contains('course_id', $course->course_id))
                            <p class="text-green-600 text-xs font-semibold mb-3">
                                ✓ Sudah Enroll
                            </p>
                        @else
                            <p class="text-indigo-600 text-xs font-semibold mb-3">
                                Belum Enroll
                            </p>
                        @endif
                    @endif
                
                    <!-- Button -->
                    <a href="{{ route('courses.show', $course->course_id) }}"
                       class="block text-center bg-gradient-to-r from-pink-500 via-fuchsia-500 to-purple-600 hover:from-pink-600 hover:to-purple-700 text-white py-2.5 rounded-2xl font-bold text-sm shadow-lg transition-all duration-300 hover:-translate-y-1">
                        Lihat Course
                    </a>
                
                </div>
            
            </div>
        
            @endforeach
        
        </div>
    </div>
        <div class="flex gap-2 flex-wrap mb-6 mt-4">

    <a href="{{ route('courses.index') }}" class="bg-gray-300 px-4 py-2 rounded-lg">

        Semua

    </a>

    @foreach($categories as $category)

        <a href="{{ route('courses.index', ['category' => $category->category_id]) }}" class="bg-indigo-500 text-white px-4 py-2 rounded-lg">

            {{ $category->category_name }}

        </a>

    @endforeach

</div>

        @foreach($courses as $course)

    <a href="{{ route('courses.show', $course->course_id) }}">

        <div class="bg-white p-4 rounded mt-4 flex justify-between items-center
                    transition duration-300 hover:scale-[1.02] hover:shadow-lg cursor-pointer">

            <div>
                <img src="{{ asset('storage/' . $course->thumbnail) }}" width="200">

                <h2 class="font-bold text-lg mt-2">
                    {{ $course->title }}
                </h2>

                <p>{{ $course->description }}</p>

                <p>Instructor:</p>

                <p>Category: {{ $course->category->category_name }}</p>

                <p>Level: {{ $course->difficulty_level }}</p>
            </div>

            <div>

                @if(auth()->user()->courses->contains('course_id', $course->course_id))

                    <span class="text-green-600 font-semibold">
                        Sudah Enroll
                    </span>

                @else

                    <span class="text-indigo-600 font-semibold">
                        Belum Enroll
                    </span>

                @endif

            </div>

        </div>

    </a>

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
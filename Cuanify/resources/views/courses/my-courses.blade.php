<x-app-layout>
<div class="min-h-screen bg-[#f7eef7] -mx-4 sm:-mx-6 lg:-mx-8 -mt-6 px-6 py-8">

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
                        Learning Space
                    </div>

                    <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-3">
                        Course Saya
                    </h1>

                    <p class="text-sm md:text-base text-purple-100 leading-relaxed max-w-2xl">
                        Semua course yang sudah kamu enroll akan tampil di sini.
                        Yuk lanjutkan progress belajar kamu 
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
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        
            @foreach($courses as $course)

            @php
                $defaultBanner = match($course->category_id) {
                    1 => 'images/courses/literasi-keuangan.jpg',
                    2 => 'images/courses/umkm-kewirausahaan.jpg',
                    3 => 'images/courses/digital-marketing.jpg',
                    4 => 'images/courses/pengembangan-diri.jpg',
                    5 => 'images/courses/ekonomi-berkelanjutan.jpg',
                    default => null,
                };
            
                if ($course->thumbnail) {
                    $imageSrc = asset('storage/' . $course->thumbnail);
                } elseif ($defaultBanner && file_exists(public_path($defaultBanner))) {
                    $imageSrc = asset($defaultBanner);
                } else {
                    $imageSrc = 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=400';
                }
            @endphp

            <a href="{{ route('courses.show', $course->course_id) }}"
               class="block group">
            
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition duration-300 flex flex-col">
                
                    <!-- Thumbnail -->
                    <div class="relative h-32 overflow-hidden">
                    
                        <img src="{{ $imageSrc }}"
                             alt="{{ $course->title }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                     
                        <span class="absolute top-3 left-3 flex items-center gap-1 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-[10px] font-bold text-purple-700 capitalize shadow-sm z-10">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-3 h-3"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M12 6.253v13m0-13C10.832 5.483 9.246 5 7.5 5S4.168 5.483 3 6.253v13C4.168 18.483 5.754 18 7.5 18s3.332.483 4.5 1.253m0-13C13.168 5.483 14.754 5 16.5 5S19.832 5.483 21 6.253v13C19.832 18.483 18.246 18 16.5 18s-3.332.483-4.5 1.253"/>
                            </svg>
                        
                            {{ $course->difficulty_level }}
                        
                        </span>

                        <span class="absolute bottom-3 right-3 flex items-center gap-1 bg-white/90 backdrop-blur-sm px-2 py-1 rounded-full text-[10px] font-semibold text-gray-700 shadow-sm z-10">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-3 h-3"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <circle cx="12" cy="12" r="9" stroke-width="2"/>
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M12 7v5l3 3"/>
                            </svg>
                        
                            {{ $course->estimated_duration }} jam
                        
                        </span>
                    
                    </div>
                
                    <!-- Content -->
                    <div class="p-5 flex flex-col h-40">

                            <h3 class="font-bold text-gray-800 text-base line-clamp-2 mb-1">
                                {{ $course->title }}
                            </h3>
                        
                            <p class="text-xs text-gray-500 mb-3 font-medium">
                                {{ $course->category->category_name ?? 'No Category' }}
                            </p>
                        
                            <div class="flex justify-between items-center text-xs mt-auto">
                            
                                <span class="flex items-center gap-1 text-yellow-500 font-bold bg-yellow-50 px-2 py-1 rounded-md">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="w-4 h-4"
                                         fill="currentColor"
                                         viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.719c-.783-.57-.38-1.81.588-1.81H7.03a1 1 0 00.95-.69l1.07-3.292z"/>
                                    </svg>
                                
                                    4.8
                                
                                </span>
                            
                                <span class="flex items-center gap-1 text-green-600 font-semibold">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="w-4 h-4"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="3"
                                              d="M5 13l4 4L19 7"/>

                                    </svg>
                                
                                    Sudah Enroll
                                
                                </span>

                            </div> 

                        </div> 

                    </div> 

                </a>
            
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
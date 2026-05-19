<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course - Cuanify</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'DM Sans', sans-serif;
        }

        .shadow-soft {
            box-shadow: 0 10px 30px rgba(0,0,0,.08);
        }
    </style>
</head>

<body class="bg-gradient-to-br from-[#f5f7fb] via-[#f9f5ff] to-[#eef2ff]">

<!-- WRAPPER -->
<div class="min-h-screen flex">

<!-- SIDEBAR -->
<aside class="w-[320px] bg-white/70 backdrop-blur-2xlborder-r border-white/60 shadow-2xl shadow-purple-100/40 p-6 hidden lg:flex flex-col">

    <!-- LOGO -->
    <div>

        <h2 class="text-3xl font-bold bg-slate-900 from-medium to-slate-900 bg-clip-text text-transparent">
            Cuanify
        </h2>

        <p class="text-sm text-gray-500 mt-1">
            Lesson Course
        </p>
        <div class="mt-6 h-px bg-gradient-to-r from-purple-200 via-pink-200 to-transparent"></div>

    </div>

@php
    $totalLesson = 12;
    $completedLesson = 5;

    $progress = ($completedLesson / $totalLesson) * 100;
@endphp

<!-- PROGRESS -->
<div class="mt-8 relative overflow-hidden bg-gradient-to-br from-purple-50 to-pink-50 rounded-3xl p-5 border border-white/60"> 
    <div class="absolute -right-8 -bottom-8 w-24 h-24 bg-pink-200/30 rounded-full blur-2xl"></div>

    <div class="flex items-center justify-between">

        <h3 class="font-semibold text-purple-900">
            Progress
        </h3>

        <span class="text-sm font-bold text-purple-700">
            {{ round($progress) }}%
        </span>

    </div>

    <!-- BAR -->
    <div class="w-full h-3 bg-white rounded-full mt-4 overflow-hidden">

        <div
            class="h-full bg-gradient-to-r from-purple-600 to-pink-500 rounded-full transition-all duration-500"
            style="width: {{ $progress }}%">
        </div>

    </div>

    <p class="text-xs text-gray-500 mt-3">
        {{ $completedLesson }} dari {{ $totalLesson }} lesson selesai
    </p>

</div>

@php
    $lessons = [
        [
            'id' => 1,
            'title' => 'Pengantar Ekonomi',
            'active' => true,
        ],
        [
            'id' => 2,
            'title' => 'Permintaan & Penawaran',
            'active' => false,
        ],
        [
            'id' => 3,
            'title' => 'Inflasi',
            'active' => false,
        ],
        [
            'id' => 4,
            'title' => 'UMKM Digital',
            'active' => false,
        ],
        [
            'id' => 5,
            'title' => 'Manajemen Keuangan',
            'active' => false,
        ],
    ];
@endphp

<!-- LIST LESSON -->
<div class="mt-8 space-y-4 overflow-y-auto pr-2">

    @foreach ($lessons as $lesson)

        @if ($lesson['active'])

            <!-- ACTIVE -->
            <div class= "group block p-5 rounded-3xl bg-white border border-gray-100
               hover:border-purple-200 hover:bg-purple-50/60
               hover:-translate-y-1 hover:shadow-lg
               transition duration-300">

                <div class="w-11 h-11 rounded-2xl bg-purple-100 text-purple-700 flex items-center justify-center mb-4 group-hover:bg-purple-200 transition">
                    📘
                </div>

                <p class="text-sm opacity-80">
                    Lesson {{ $lesson['id'] }}
                </p>

                <h3 class="font-semibold text-gray-800 mt-1 group-hover:text-purple-700 transition">
                    {{ $lesson['title'] }}
                </h3>

            </div>


        @else

            <!-- ITEM -->
            <a href="{{ route('lesson.show', $lesson['id']) }}"
               class="group block p-5 rounded-3xl bg-white border border-gray-100
               hover:border-purple-200 hover:bg-purple-50/60
               hover:-translate-y-1 hover:shadow-lg
               transition duration-300">

            <div class="w-11 h-11 rounded-2xl bg-purple-100 text-purple-700 flex items-center justify-center mb-4 group-hover:bg-purple-200 transition">
                📘
            </div>

                <p class="text-sm text-gray-500">
                    Lesson {{ $lesson['id'] }}
                </p>

                <h3 class="font-semibold text-gray-800 mt-1 group-hover:text-purple-700 transition">
                    {{ $lesson['title'] }}
                </h3>

            </a>

        @endif

    @endforeach

</div>
</aside>

    <!-- CONTENT -->
    <main class="flex-1 px-10 py-6">

        <!-- TOP NAVBAR -->
        <div class="flex items-center justify-between mb-8 bg-white/70 backdrop-blur-xl border border-white/50 rounded-[28px] px-6 py-4 shadow-xl shadow-purple-100/30">

    <!-- LEFT -->
    <div>

        <h1 class="text-3xl font-bold text-gray-900">
            Dashboard Course
        </h1>

        <p class="text-gray-500 mt-1">
            Selamat datang kembali di course ekonomi!
        </p>

    </div>

    <!-- RIGHT -->
    <div class="flex items-center gap-4">

        <!-- SEARCH -->
        <div class="hidden md:flex items-center bg-white/80 backdrop-blur-xl border border-gray-100 px-4 py-3 rounded-2xl shadow-soft w-[280px]">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-5 h-5 text-gray-400"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z"/>

            </svg>

            <input type="text"
                   placeholder="Cari lesson..."
                   class="bg-transparent outline-none ml-3 text-sm w-full">

        </div>

        <!-- NOTIFICATION -->
        <button class="w-12 h-12 rounded-2xl bg-white/80 backdrop-blur-xl border border-gray-100 shadow-soft flex items-center justify-center hover:scale-110 hover:bg-purple-50 transition duration-300">
            🔔
        </button>

        <!-- PROFILE -->
        <div class="flex items-center gap-3 bg-white/80 backdrop-blur-xl border border-gray-100 px-4 py-2 rounded-2xl shadow-soft">

            <img src="https://ui-avatars.com/api/?name=Cuanify"
                 class="w-10 h-10 rounded-xl">

            <div class="hidden md:block">

                <h3 class="font-semibold text-sm text-gray-900">
                    Princess
                </h3>

                <p class="text-xs text-gray-500">
                    Student
                </p>

            </div>

        </div>

    </div>

</div>
        <div class="relative overflow-hidden bg-white/90 backdrop-blur-xl rounded-[32px] p-8 border border-white/60 shadow-soft">
        <div class="absolute top-0 right-0 w-72 h-72 bg-purple-100 rounded-full blur-3xl opacity-40"></div>
        <div class="absolute bottom-0 left-0 w-60 h-60 bg-pink-100 rounded-full blur-3xl opacity-40"></div>

            <div class="flex flex-col lg:flex-row gap-8 items-center">

                <!-- TEXT -->
                <div class="flex-1">

                    <p class="text-purple-600 font-medium">
                        Course Ekonomi
                    </p>

                    <h1 class="text-5xl font-black text-gray-900 mt-2 leading-tight tracking-tight">
                        Belajar Dasar Ekonomi & UMKM
                    </h1>

                    <p class="text-gray-600 mt-4 leading-relaxed">
                        Pelajari konsep ekonomi modern, bisnis UMKM,
                        dan strategi keuangan dengan cara yang mudah dipahami.
                    </p>

                    <!-- INFO -->
                    <div class="flex gap-6 mt-6 flex-wrap">

                        <div>
                            <p class="text-sm text-gray-500">
                                Total Lesson
                            </p>

                            <h3 class="font-bold text-gray-900">
                                12 Pertemuan
                            </h3>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">
                                Level
                            </p>

                            <h3 class="font-bold text-gray-900">
                                Beginner
                            </h3>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">
                                Progress
                            </p>

                            <h3 class="font-bold text-green-600">
                                {{ round($progress) }}%
                            </h3>
                        </div>

                    </div>

                    <!-- BUTTON -->
                    <button class="relative overflow-hidden mt-8 group inline-flex items-center gap-3 px-7 py-3 rounded-2xl 
                    bg-gradient-to-r from-purple-600 to-pink-500 text-white font-medium
                    shadow-lg shadow-purple-200 hover:scale-105 hover:shadow-xl
                    transition duration-300">
                    Lanjut Belajar
                    <div class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition"></div>

                    </button>

                </div>

                <!-- IMAGE -->
                <div class="flex-1 flex justify-center">

                    <img src="{{ asset('images/materi ekonomi dasar.jpg') }}"
                        class="w-full max-w-md rounded-3xl drop-shadow-2xl hover:scale-105 transition duration-500">

                </div>

            </div>
        </div>

        <!-- BOTTOM CARD -->
        <div class="grid md:grid-cols-2 gap-6 mt-8">

            <div class="bg-white/90 backdrop-blur-xl border border-white/60 p-6 rounded-3xl shadow-soft hover:-translate-y-1 transition duration-300">

        <div class="flex items-center gap-3">
        
            <div class="w-11 h-11 rounded-2xl bg-pink-100 flex items-center justify-center">
                ✨
            </div>
        
            <h3 class="text-xl font-bold text-gray-900">
                Tentang Course
            </h3>
        
        </div>

                <p class="text-gray-600 mt-4 leading-relaxed">
                    Course ini membantu kamu memahami dasar ekonomi,
                    bisnis, dan pengelolaan UMKM secara modern.
                </p>

            </div>

            <div class="bg-white/90 backdrop-blur-xl border border-white/60 p-6 rounded-3xl shadow-soft hover:-translate-y-1 transition duration-300">

            <div class="flex items-center gap-3">
            
                <div class="w-11 h-11 rounded-2xl bg-purple-100 flex items-center justify-center">
                    📚
                </div>
            
                <h3 class="text-xl font-bold text-gray-900">
                    Target Pembelajaran
                </h3>
            
            </div>

                <ul class="mt-4 space-y-2 text-gray-600">

                    <li>• Memahami dasar ekonomi</li>
                    <li>• Belajar strategi UMKM</li>
                    <li>• Memahami manajemen keuangan</li>

                </ul>

            </div>

        </div>

    </main>
</div>

</body>
</html>
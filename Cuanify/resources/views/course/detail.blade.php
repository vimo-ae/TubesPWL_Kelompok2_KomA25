<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Course</title>

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

<body class="bg-gradient-to-br from-[#f5f7fb] via-[#f9f5ff] to-[#eef2ff] min-h-screen">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="hidden lg:flex flex-col w-[280px] bg-white/80 backdrop-blur-xl border-r border-gray-100 p-6">

        <!-- LOGO -->
        <div>

            <h1 class="text-3xl font-black text-purple-600">
                Cuanify
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Economic Learning Platform
            </p>

        </div>

        <!-- MENU -->
        <div class="mt-10 space-y-3">

            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-2xl hover:bg-gray-100 transition">

                📚 Dashboard

            </a>

            <a href="{{ route('courses.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-2xl bg-purple-100 text-purple-700 font-medium">

                📖 My Courses

            </a>

            <a href="{{ route('progress') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-2xl hover:bg-gray-100 transition">

                📈 Progress

            </a>

        </div>

        <!-- USER -->
        <div class="mt-auto">

            <div class="bg-gradient-to-r from-purple-500 to-pink-500 rounded-3xl p-5 text-white">

                <p class="text-sm opacity-80">
                    Logged in as
                </p>

                <h3 class="font-bold text-lg mt-1">
                    {{ auth()->user()->name ?? 'Guest' }}
                </h3>

            </div>

        </div>

    </aside>

    <!-- MAIN -->
    <main class="flex-1 p-8">

        <!-- HEADER -->
        <div class="bg-white rounded-3xl p-8 shadow-soft border border-gray-100">

            <p class="text-purple-600 font-medium">
                Course Ekonomi
            </p>

            <h1 class="text-5xl font-black text-gray-900 mt-2">
                Pengantar Ekonomi
            </h1>

            <p class="text-gray-500 mt-4 leading-relaxed max-w-3xl">
                Pelajari konsep dasar ekonomi, pasar, kebutuhan manusia,
                dan aktivitas ekonomi modern secara mudah dipahami.
            </p>

            <!-- BUTTON -->
            <a href="#"
               class="inline-block mt-8 px-7 py-3 rounded-2xl bg-gradient-to-r from-purple-600 to-pink-500 text-white font-medium hover:scale-105 transition">

                🚀 Gabung Kelas

            </a>

        </div>

        <!-- LESSON -->
        <div class="mt-8">

            <h2 class="text-2xl font-bold text-gray-900 mb-6">
                Daftar Materi
            </h2>

            <div class="space-y-5">

                <!-- LESSON 1 -->
                <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-soft hover:-translate-y-1 transition">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-purple-600 font-medium">
                                Lesson 1
                            </p>

                            <h3 class="text-xl font-bold text-gray-900 mt-1">
                                Pengertian Ekonomi
                            </h3>

                            <p class="text-gray-500 mt-2">
                                Memahami konsep dasar ekonomi dan kebutuhan manusia.
                            </p>

                        </div>

                        <a href="{{ route('lesson.show', 1) }}"
                           class="px-5 py-3 rounded-2xl bg-purple-100 text-purple-700 font-medium hover:bg-purple-200 transition inline-block">

                            Mulai

                        </a>

                    </div>

                </div>

                <!-- LESSON 2 -->
                <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-soft hover:-translate-y-1 transition">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-pink-500 font-medium">
                                Lesson 2
                            </p>

                            <h3 class="text-xl font-bold text-gray-900 mt-1">
                                Permintaan & Penawaran
                            </h3>

                            <p class="text-gray-500 mt-2">
                                Belajar mekanisme pasar dan interaksi ekonomi.
                            </p>

                        </div>

                        <a href="{{ route('lesson.show', 2) }}"
                           class="px-5 py-3 rounded-2xl bg-pink-100 text-pink-700 font-medium hover:bg-pink-200 transition inline-block">

                            Mulai

                        </a>

                    </div>

                </div>

                <!-- LESSON 3 -->
                <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-soft hover:-translate-y-1 transition">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-blue-500 font-medium">
                                Lesson 3
                            </p>

                            <h3 class="text-xl font-bold text-gray-900 mt-1">
                                Inflasi
                            </h3>

                            <p class="text-gray-500 mt-2">
                                Memahami kenaikan harga dan dampaknya terhadap ekonomi.
                            </p>

                        </div>

                        <a href="{{ route('lesson.show', 3) }}"
                           class="px-5 py-3 rounded-2xl bg-blue-100 text-blue-700 font-medium hover:bg-blue-200 transition inline-block">

                            Mulai

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </main>

</div>

</body>
</html>
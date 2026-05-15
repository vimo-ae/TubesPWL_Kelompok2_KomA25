<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuanify</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Fraunces:wght@600;700;900&display=swap" rel="stylesheet">

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'DM Sans', sans-serif;
        }

        .font-display {
            font-family: 'Fraunces', serif;
        }

        .shadow-soft {
            box-shadow: 0 10px 30px rgba(0,0,0,.08);
        }
    </style>
</head>

<body class="bg-gradient-to-b from-[#f5f7fb] to-white relative overflow-x-hidden">

    <!-- BACKGROUND BLUR -->
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute w-[420px] h-[420px] bg-purple-500/30 blur-[130px] rounded-full top-[-120px] right-[-120px]"></div>

        <div class="absolute w-[380px] h-[380px] bg-pink-500/30 blur-[130px] rounded-full bottom-[-120px] left-[-100px]"></div>

        <div class="absolute w-[300px] h-[300px] bg-purple-300/20 blur-[140px] rounded-full top-[40%] left-[50%] -translate-x-1/2"></div>
    </div>

    @php $isLoggedIn = auth()->check(); @endphp

    <!-- NAVBAR -->
    <nav class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center backdrop-blur-xl bg-white/30 rounded-b-3xl">

        <!-- LOGO -->
        <img src="{{ asset('images/logo1.png') }}"
             class="w-28 drop-shadow-lg">

        <!-- BUTTON -->
        <div class="flex gap-3 items-center">

            @if ($isLoggedIn)

                <a href="{{ route('dashboard') }}"
                   class="px-5 py-2 rounded-full bg-gradient-to-r from-purple-600 to-pink-500 text-white shadow-soft hover:scale-105 transition">
                    Dashboard
                </a>

            @else

                <a href="{{ route('login') }}"
                   class="px-5 py-2 rounded-full hover:bg-white transition">
                    Login
                </a>

                <a href="{{ route('register-student') }}"
                   class="px-5 py-2 rounded-full bg-gradient-to-r from-purple-600 to-pink-500 text-white shadow-soft hover:scale-105 transition">
                    Register
                </a>

            @endif

        </div>
    </nav>

    <!-- HERO -->
    <header class="max-w-7xl mx-auto px-6 py-16 flex flex-col lg:flex-row items-center gap-12 min-h-[80vh]">

        <!-- KIRI -->
        <div class="flex-1 flex flex-col justify-center">

            <h1 class="text-4xl md:text-5xl font-extrabold text-purple-900 leading-tight tracking-tight">
                Belajar Ekonomi & UMKM Jadi Lebih Mudah
            </h1>

            <p class="mt-5 text-gray-600 text-lg leading-relaxed max-w-xl">
                Cuanify membantu kamu belajar ekonomi, bisnis, dan keuangan
                dengan cara modern, interaktif, dan mudah dipahami.
            </p>

            <div class="mt-8 flex gap-4">

                @if (!$isLoggedIn)

                    <a href="{{ route('register-student') }}"
                       class="px-6 py-3 rounded-full bg-gradient-to-r from-purple-600 to-pink-500 text-white shadow-soft hover:scale-105 transition">
                        Mulai Belajar
                    </a>

                    <a href="#features"
                       class="group px-6 py-3 rounded-full border border-purple-500 text-purple-600 hover:bg-purple-600 hover:text-white transition duration-300 shadow-soft">
                        Lihat Fitur
                    </a>

                @endif

            </div>
        </div>

        <!-- KANAN -->
        <div class="flex-1 hidden lg:flex justify-center">

            <img src="{{ asset('images/welcome.png') }}"
                 class="rounded-3xl shadow-soft w-full max-w-[560px]">

        </div>

    </header>

    <!-- FEATURES -->
    <section id="features"
             class="max-w-7xl mx-auto px-6 py-20 scroll-mt-12">

        <!-- TITLE -->
        <h2 class="text-center text-3xl font-bold text-purple-900 tracking-tight">
            Kenapa Cuanify?
        </h2>

        <!-- GRID -->
        <div class="grid md:grid-cols-4 gap-6 mt-10">

            <!-- CARD 1 -->
            <div class="bg-white rounded-2xl shadow-soft overflow-hidden transition-all duration-300 will-change-transform group cursor-pointer hover:-translate-y-2 hover:shadow-xl h-full">

                <div class="h-44 overflow-hidden">
                    <img src="{{ asset('images/materi ekonomi dasar.jpg') }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                </div>

                <div class="p-6">

                    <h3 class="font-bold text-gray-900 text-lg group-hover:text-purple-700 transition">
                        Materi Ekonomi Dasar
                    </h3>

                    <p class="text-sm text-gray-600 mt-2 leading-relaxed">
                        Pelajari inflasi, permintaan & penawaran, dan dasar ekonomi dengan mudah.
                    </p>

                </div>
            </div>

            <!-- CARD 2 -->
            <div class="bg-white rounded-2xl shadow-soft overflow-hidden transition-all duration-300 will-change-transform group cursor-pointer hover:-translate-y-2 hover:shadow-xl h-full">

                <div class="h-44 overflow-hidden">
                    <img src="{{ asset('images/edukasi UMKM.jpg') }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                </div>

                <div class="p-6">

                    <h3 class="font-bold text-gray-900 text-lg group-hover:text-purple-700 transition">
                        Edukasi UMKM
                    </h3>

                    <p class="text-sm text-gray-600 mt-2 leading-relaxed">
                        Belajar bisnis kecil, strategi marketing, dan keuangan UMKM.
                    </p>

                </div>
            </div>

            <!-- CARD 3 -->
            <div class="bg-white rounded-2xl shadow-soft overflow-hidden transition-all duration-300 will-change-transform group cursor-pointer hover:-translate-y-2 hover:shadow-xl h-full">

                <div class="h-44 overflow-hidden">
                    <img src="{{ asset('images/konten interaktif.jpg') }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                </div>

                <div class="p-6">

                    <h3 class="font-bold text-gray-900 text-lg group-hover:text-purple-700 transition">
                        Konten Interaktif
                    </h3>

                    <p class="text-sm text-gray-600 mt-2 leading-relaxed">
                        Artikel, kuis, dan infografis biar belajar lebih seru.
                    </p>

                </div>
            </div>

            <!-- CARD 4 -->
            <div class="bg-white rounded-2xl shadow-soft overflow-hidden transition-all duration-300 will-change-transform group cursor-pointer hover:-translate-y-2 hover:shadow-xl h-full">

                <div class="h-44 overflow-hidden">
                    <img src="{{ asset('images/progress tracking.jpg') }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                </div>

                <div class="p-6">

                    <h3 class="font-bold text-gray-900 text-lg group-hover:text-purple-700 transition">
                        Progress Tracking
                    </h3>

                    <p class="text-sm text-gray-600 mt-2 leading-relaxed">
                        Pantau perkembangan belajar kamu secara realtime.
                    </p>

                </div>
            </div>

        </div>
    </section>

<!-- CTA -->
<section class="px-6 py-20">

    <div class="max-w-5xl mx-auto">

        <!-- TITLE -->
        <div class="text-center mb-20">

            <h2 class="text-4xl md:text-5xl font-bold text-purple-900 tracking-tight">
                Siap Mulai?
            </h2>

            <p class="mt-3 text-gray-600 leading-relaxed">
                Gabung sekarang dan mulai perjalanan cuan kamu.
            </p>

            @if (!$isLoggedIn)

                <a href="{{ route('register-student') }}"
                   class="inline-block mt-6 px-8 py-3 bg-gradient-to-r from-purple-600 to-pink-500 text-white rounded-full font-medium hover:scale-105 transition">
                    Daftar Sekarang
                </a>

            @endif

        </div>

        <!-- CARD INSTRUKTUR -->
        <div class="bg-gradient-to-r from-purple-700 to-pink-600 rounded-2xl shadow-soft p-5 md:p-6 flex flex-col md:flex-row items-center justify-between gap-5">

            <!-- KIRI -->
            <div class="flex flex-col md:flex-row items-center text-center md:text-left gap-4">

                <div class="w-14 h-14 rounded-2xl bg-white/20 flex items-center justify-center text-2xl text-white">
                    🎓
                </div>

                <div>

                    <h3 class="text-lg font-bold text-white">
                        Ingin Jadi Instruktur?
                    </h3>

                    <p class="text-sm text-purple-100 mt-1">
                        Bagikan pengalaman dan bantu generasi muda belajar ekonomi & bisnis.
                    </p>

                </div>
            </div>

            <!-- BUTTON -->
            <a href="{{ route('register-instructor') }}"
               class="px-6 py-3 rounded-full bg-white text-[#5b21b6] font-medium hover:bg-purple-100 hover:scale-105 transition whitespace-nowrap">
                Daftar Instruktur
            </a>

        </div>

    </div>
</section>

    @include('layouts.footer')
    
</body>
</html>
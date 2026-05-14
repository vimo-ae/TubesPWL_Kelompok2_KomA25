<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cuanify</title>

<script src="https://cdn.tailwindcss.com"></script>

<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Fraunces:wght@600;700;900&display=swap" rel="stylesheet">

<style>
    body { font-family: 'DM Sans', sans-serif; }
    .font-display { font-family: 'Fraunces', serif; }

    .shadow-soft {
        box-shadow: 0 10px 30px rgba(0,0,0,.08);
    }
</style>
</head>

<body class="bg-gradient-to-b from-[#f5f7fb] to-white relative overflow-x-hidden">

<!-- BACKGROUND BLUR -->
<div class="fixed inset-0 -z-10 overflow-hidden">
    <div class="absolute w-[420px] h-[420px] bg-purple-500/30 blur-[130px] rounded-full top-[-120px] left-[-120px]"></div>
    <div class="absolute w-[380px] h-[380px] bg-pink-500/30 blur-[130px] rounded-full bottom-[-120px] right-[-100px]"></div>
    <div class="absolute w-[300px] h-[300px] bg-purple-300/20 blur-[140px] rounded-full top-[40%] left-[50%] -translate-x-1/2"></div>
</div>

@php $isLoggedIn = auth()->check(); @endphp

<!-- NAV -->
<nav class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">

    <img src="{{ asset('images/logo1.png') }}" class="w-28 drop-shadow-lg">

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

            <a href="{{ route('register') }}"
               class="px-5 py-2 rounded-full bg-gradient-to-r from-purple-600 to-pink-500 text-white shadow-soft hover:scale-105 transition">
                Register
            </a>
        @endif

    </div>
</nav>

<!-- HERO -->
<header class="max-w-7xl mx-auto px-6 py-16 flex flex-col lg:flex-row items-center gap-12">

<div class="flex-1">
    <h1 class="font-display text-5xl font-bold text-gray-900 leading-tight">
        Belajar Ekonomi & UMKM Jadi Lebih Mudah
    </h1>

    <p class="mt-5 text-gray-600">
        Cuanify membantu kamu belajar ekonomi, bisnis, dan keuangan dengan cara modern.
    </p>

    <div class="mt-8 flex gap-4">

        @if (!$isLoggedIn)
            <a href="{{ route('register') }}"
               class="px-6 py-3 rounded-full bg-gradient-to-r from-purple-600 to-pink-500 text-white shadow-soft hover:scale-105 transition">
                Mulai Belajar
            </a>

            <a href="#features"
               class="group px-6 py-3 rounded-full border border-purple-500 text-purple-600
               hover:bg-purple-600 hover:text-white transition duration-300 shadow-soft">
                <span>Lihat Fitur</span>
            </a>
        @endif

    </div>
</div>

<div class="flex-1 hidden lg:block">
    <img src="{{ asset('images/welcome.png') }}"
         class="rounded-3xl shadow-soft">
</div>

</header>

<!-- FEATURES -->
<section id="features" class="max-w-7xl mx-auto px-6 py-20">

<h2 class="text-center font-display text-3xl font-bold text-gray-900">
    Kenapa Cuanify?
</h2>

<div class="grid md:grid-cols-4 gap-6 mt-10">

<!-- CARD 1 -->
<div class="bg-white p-6 rounded-2xl shadow-soft
    transition-all duration-300 group cursor-pointer
    hover:bg-purple-600 hover:shadow-xl hover:-translate-y-2">

    <div class="text-2xl">📚</div>

    <h3 class="font-bold mt-3 text-gray-900 group-hover:text-white transition">
        Materi Ekonomi Dasar
    </h3>

    <p class="text-sm text-gray-600 mt-2 group-hover:text-purple-100 transition">
        Pelajari inflasi, permintaan & penawaran, dan dasar ekonomi dengan mudah.
    </p>
</div>

<!-- CARD 2 -->
<div class="bg-white p-6 rounded-2xl shadow-soft
    transition-all duration-300 group cursor-pointer
    hover:bg-purple-600 hover:shadow-xl hover:-translate-y-2">

    <div class="text-2xl">💼</div>

    <h3 class="font-bold mt-3 text-gray-900 group-hover:text-white transition">
        Edukasi UMKM
    </h3>

    <p class="text-sm text-gray-600 mt-2 group-hover:text-purple-100 transition">
        Belajar bisnis kecil, strategi marketing, dan keuangan UMKM.
    </p>
</div>

<!-- CARD 3 -->
<div class="bg-white p-6 rounded-2xl shadow-soft
    transition-all duration-300 group cursor-pointer
    hover:bg-purple-600 hover:shadow-xl hover:-translate-y-2">

    <div class="text-2xl">🎓</div>

    <h3 class="font-bold mt-3 text-gray-900 group-hover:text-white transition">
        Konten Interaktif
    </h3>

    <p class="text-sm text-gray-600 mt-2 group-hover:text-purple-100 transition">
        Artikel, kuis, dan infografis biar belajar lebih seru.
    </p>
</div>

<!-- CARD 4 -->
<div class="bg-white p-6 rounded-2xl shadow-soft
    transition-all duration-300 group cursor-pointer
    hover:bg-purple-600 hover:shadow-xl hover:-translate-y-2">

    <div class="text-2xl">📊</div>

    <h3 class="font-bold mt-3 text-gray-900 group-hover:text-white transition">
        Progress Tracking
    </h3>

    <p class="text-sm text-gray-600 mt-2 group-hover:text-purple-100 transition">
        Pantau perkembangan belajar kamu secara realtime.
    </p>
</div>
</div>
</div>
</section>

<!-- CTA -->
<section class="px-6 py-20">

<div class="max-w-4xl mx-auto text-center bg-gradient-to-r from-purple-700 to-pink-600 text-white p-12 rounded-3xl shadow-soft">

<h2 class="font-display text-3xl font-bold">
    Siap Mulai?
</h2>

<p class="mt-3 text-purple-100">
    Gabung sekarang dan mulai perjalanan cuan kamu.
</p>

@if (!$isLoggedIn)
    <a href="{{ route('register') }}"
       class="inline-block mt-6 px-8 py-3 bg-yellow-400 text-black rounded-full hover:scale-105 transition">
        Daftar Sekarang
    </a>
@endif

</div>

</section>

<!-- FOOTER -->
<footer class="w-full py-6 px-6 bg-[#1e1b4b] text-white relative overflow-hidden">

    <!-- soft glow (lebih kecil + lebih subtle) -->
    <div class="absolute w-[140px] h-[140px] bg-purple-500/5 blur-[80px] rounded-full -top-16 -left-16"></div>
    <div class="absolute w-[120px] h-[120px] bg-pink-500/5 blur-[80px] rounded-full -bottom-16 -right-10"></div>

    <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-4 relative z-10">

        <!-- LOGO -->
        <div class="flex items-center gap-3">

            <img src="{{ asset('images/logo1.png') }}"
                class="w-14 h-14 md:w-16 md:h-16 object-contain drop-shadow-md">
        </div>

        <!-- TEXT -->
        <p class="text-sm text-purple-200 text-center md:text-right leading-relaxed">
            © 2026 Cuanify — Platform edukasi ekonomi untuk generasi muda Indonesia.
        </p>

    </div>
</footer>
</body>
</html>
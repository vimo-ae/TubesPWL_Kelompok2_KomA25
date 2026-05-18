<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

 <div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="relative overflow-hidden rounded-[35px] bg-gradient-to-br from-indigo-600 via-indigo-700 to-violet-800 shadow-2xl min-h-[260px] flex items-center">
            
            <div class="absolute top-[-50px] right-[-50px] w-80 h-80 bg-white/10 blur-[80px] rounded-full"></div>
            <div class="absolute bottom-[-20px] right-[10%] w-40 h-40 border-[20px] border-white/5 rounded-full"></div>

            <div class="relative z-10 w-full flex flex-col md:flex-row items-center justify-between px-10 md:px-20 py-10">
                
                <div class="w-full md:w-2/3 text-white">
                    <div class="inline-block bg-white/20 backdrop-blur-md px-3 py-1 rounded-full text-[10px] font-bold tracking-widest uppercase mb-4 border border-white/30">
                        🔥 Welcome Back
                    </div>
                    <h1 class="text-3xl md:text-5xl font-extrabold tracking-tight mb-3">
                        Selamat datang, <span class="text-yellow-300">{{ Auth::user()->name }}!</span>
                    </h1>
                    <p class="text-indigo-100 text-base md:text-lg max-w-lg leading-relaxed opacity-90">
                        Memahami ekonomi itu investasi berharga. Terus konsisten, jadikan ide sebagai peluang <span class="text-yellow-300 font-bold italic">cuan!</span>
                    </p>

                    <div class="flex flex-wrap gap-4 mt-8">
                        <button class="bg-yellow-400 hover:bg-yellow-500 text-indigo-900 px-8 py-3 rounded-2xl font-black text-sm shadow-xl transition-all duration-300 hover:-translate-y-1">
                            Lanjut Belajar
                        </button>
                        <button class="bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/30 text-white px-8 py-3 rounded-2xl font-bold text-sm transition-all">
                            Jelajahi Kursus
                        </button>
                    </div>
                </div>

                <div class="hidden md:flex flex-col items-center justify-center opacity-20">
                     <span class="text-[150px] rotate-12 drop-shadow-2xl">💰</span>
                </div>

            </div>
        </div>
    </div>
</div>

       <div class="mt-8">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-extrabold text-gray-800">Kategori Populer</h2>
        <a href="#" class="text-blue-600 text-sm font-bold hover:underline">Lihat Semua</a>
    </div>
    
    <div class="flex overflow-x-auto gap-3 pb-4 no-scrollbar">
        
        <div class="flex-none w-36 bg-orange-50 p-3 rounded-2xl border border-orange-100 flex flex-col items-center text-center shadow-sm hover:bg-orange-100 transition">
            <span class="text-2xl mb-1">💼</span>
            <p class="font-bold text-gray-800 text-[11px]">Kewirausahaan</p>
            <p class="text-[9px] text-gray-400">18 Kursus</p>
        </div>

        <div class="flex-none w-36 bg-blue-50 p-3 rounded-2xl border border-blue-100 flex flex-col items-center text-center shadow-sm hover:bg-blue-100 transition">
            <span class="text-2xl mb-1">📈</span>
            <p class="font-bold text-gray-800 text-[11px]">Marketing</p>
            <p class="text-[9px] text-gray-400">14 Kursus</p>
        </div>

        <div class="flex-none w-36 bg-emerald-50 p-3 rounded-2xl border border-emerald-100 flex flex-col items-center text-center shadow-sm hover:bg-emerald-100 transition">
            <span class="text-2xl mb-1">💰</span>
            <p class="font-bold text-gray-800 text-[11px]">Keuangan</p>
            <p class="text-[9px] text-gray-400">12 Kursus</p>
        </div>

        <div class="flex-none w-36 bg-purple-50 p-3 rounded-2xl border border-purple-100 flex flex-col items-center text-center shadow-sm hover:bg-purple-100 transition">
            <span class="text-2xl mb-1">👥</span>
            <p class="font-bold text-gray-800 text-[11px]">Manajemen</p>
            <p class="text-[9px] text-gray-400">9 Kursus</p>
        </div>

        <div class="flex-none w-36 bg-rose-50 p-3 rounded-2xl border border-rose-100 flex flex-col items-center text-center shadow-sm hover:bg-rose-100 transition">
            <span class="text-2xl mb-1">💡</span>
            <p class="font-bold text-gray-800 text-[11px]">Self Dev</p>
            <p class="text-[9px] text-gray-400">8 Kursus</p>
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


<div class="mt-12 mb-10">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-extrabold text-gray-800">Rekomendasi Kursus untuk Kamu</h2>
        <a href="#" class="text-blue-600 font-bold hover:underline">Lihat Semua</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4">
        
        <div class="group bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition duration-300">
            <div class="h-32 relative">
                <img src="https://images.unsplash.com/photo-1557804506-669a67965ba0?w=400" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                <span class="absolute top-2 left-2 bg-white/90 px-2 py-0.5 rounded-full text-[9px] font-bold text-purple-700 shadow-sm">Beginner</span>
            </div>
            <div class="p-3">
                <h3 class="font-bold text-gray-800 text-xs leading-tight mb-1">Strategi Marketing Digital</h3>
                <p class="text-[10px] text-gray-400 mb-2">by Aleesha Basyira</p>
                <div class="flex justify-between items-center text-[10px]">
                    <span class="text-yellow-500 font-bold">⭐ 4.8</span>
                    <span class="text-gray-400">2.1k siswa</span>
                </div>
            </div>
        </div>

        <div class="group bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition duration-300">
            <div class="h-32 relative">
                <img src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?w=400" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                <span class="absolute top-2 left-2 bg-white/90 px-2 py-0.5 rounded-full text-[9px] font-bold text-orange-700 shadow-sm">Beginner</span>
            </div>
            <div class="p-3">
                <h3 class="font-bold text-gray-800 text-xs leading-tight mb-1">Branding Bisnis Kecil</h3>
                <p class="text-[10px] text-gray-400 mb-2">by Davina Valerie</p>
                <div class="flex justify-between items-center text-[10px]">
                    <span class="text-yellow-500 font-bold">⭐ 4.9</span>
                    <span class="text-gray-400">2.3k siswa</span>
                </div>
            </div>
        </div>

        <div class="group bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition duration-300">
            <div class="h-32 relative">
                <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=400" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                <span class="absolute top-2 left-2 bg-white/90 px-2 py-0.5 rounded-full text-[9px] font-bold text-orange-700 shadow-sm">Intermediate</span>
            </div>
            <div class="p-3">
                <h3 class="font-bold text-gray-800 text-xs leading-tight mb-1">Keuangan UMKM</h3>
                <p class="text-[10px] text-gray-400 mb-2">by Vincent Tamimi</p>
                <div class="flex justify-between items-center text-[10px]">
                    <span class="text-yellow-500 font-bold">⭐ 4.9</span>
                    <span class="text-gray-400">2.3k siswa</span>
                </div>
            </div>
        </div>

        <div class="group bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition duration-300">
            <div class="h-32 relative">
                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=400" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                <span class="absolute top-2 left-2 bg-white/90 px-2 py-0.5 rounded-full text-[9px] font-bold text-purple-700 shadow-sm">Beginner</span>
            </div>
            <div class="p-3">
                <h3 class="font-bold text-gray-800 text-xs leading-tight mb-1">Mindset Wirausaha</h3>
                <p class="text-[10px] text-gray-400 mb-2">by Azzam Baskara</p>
                <div class="flex justify-between items-center text-[10px]">
                    <span class="text-yellow-500 font-bold">⭐ 4.6</span>
                    <span class="text-gray-400">1.5k siswa</span>
                </div>
            </div>
        </div>

        <div class="group bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition duration-300">
            <div class="h-32 relative">
                <img src="https://images.unsplash.com/photo-1512428559087-560fa5ceab42?w=400" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                <span class="absolute top-2 left-2 bg-white/90 px-2 py-0.5 rounded-full text-[9px] font-bold text-green-700 shadow-sm">Advanced</span>
            </div>
            <div class="p-3">
                <h3 class="font-bold text-gray-800 text-xs leading-tight mb-1">Ekspansi Pasar Global</h3>
                <p class="text-[10px] text-gray-400 mb-2">by Rayyan Fernando</p>
                <div class="flex justify-between items-center text-[10px]">
                    <span class="text-yellow-500 font-bold">⭐ 5.0</span>
                    <span class="text-gray-400">900 siswa</span>
                </div>
            </div>
        </div>

    </div>
</div>
</x-app-layout>

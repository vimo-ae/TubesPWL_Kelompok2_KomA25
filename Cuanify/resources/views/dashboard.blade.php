<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="bg-indigo-600 text-white rounded-2xl shadow-2xl mb-10 overflow-visible relative">

                        <div class="flex flex-col md:flex-row items-center p-8 gap-6">

                            <div class="w-full md:w-3/5 space-y-4">
                                <h1 class="text-3xl font-bold"> Selamat Datang ! 👋👋 </h1>
                                <p class="mt-2 text-indigo-100 text-lg"> Memahami ekonomi itu investasi berharga. Terus konsisten, jadikan ide sebagai peluang cuan!</p>

                        <div class="flex flex-col sm:flex-row gap-4 pt-4">
                            <button class="bg-yellow-100 hover:bg-yellow-200 text-indigo-900 px-6 py-3 rounded-xl font-bold transition duration-300"> Lanjut Belajar </button>
                            <button class="border border-white hover:bg-white hover:text-indigo-600 px-6 py-3 rounded-xl font-semibold transition duration-300"> Jelajahi Kursus </button>
                        </div>
                    </div>

                <div class="w-full md:w-2/5 flex justify-center items-end relative overflow-visible h-40 md:h-full">
                    <img src="{{ asset('images/banner-dashboard.png')}}" alt="Ilustrasi Cuan" class="w-64 md:w-72 -mb-16 md:-mb-24 transition duration-300 transform hover:scale-105"> 
                </div>

            </div>
        </div>

                <div class="mt-16 md:mt-24 grid grid-cols-2  md:grid-cols-5 gap-4">
        </div>
</x-app-layout>

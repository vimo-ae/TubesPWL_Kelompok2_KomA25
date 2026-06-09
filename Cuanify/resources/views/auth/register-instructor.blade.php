<x-guest-layout>

    @section('title', 'Register as Instructor - Cuanify')

    <div class="min-h-screen flex flex-col items-center justify-center
                bg-[#f6f7fb] relative overflow-hidden px-4 py-10">

        <div class="absolute top-1/2 left-1/2
                    -translate-x-1/2 -translate-y-1/2
                    w-[350px] h-[350px]
                    bg-purple-300/20 rounded-full blur-3xl">
        </div>

        <div class="absolute top-[-80px] right-[-80px]
                    w-72 h-72 bg-purple-200/40
                    rounded-full blur-3xl">
        </div>

        <div class="absolute bottom-[-80px] left-[-80px]
                    w-72 h-72 bg-yellow-200/40
                    rounded-full blur-3xl">
        </div>

        <div class="relative z-10 text-center mb-6">
            <img
                src="{{ asset('images/logo1.png') }}"
                alt="Logo Cuanify"
                class="w-28 sm:w-36 mx-auto drop-shadow-lg"
            >
        </div>

        @if (session('success'))
            <div class="relative z-10 w-full max-w-4xl bg-emerald-50 border border-emerald-200 text-emerald-800 px-5 py-4 rounded-2xl mb-6 shadow-sm flex items-start gap-3 animate-fade-in">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-emerald-600 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div>
                    <h3 class="font-bold text-sm sm:text-base">Pendaftaran Berhasil!</h3>
                    <p class="text-emerald-700 text-xs sm:text-sm mt-0.5">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <div class="relative z-10
                    w-full max-w-4xl
                    bg-white
                    rounded-[2rem]
                    shadow-xl
                    p-6 sm:p-8
                    border border-gray-100">

            <a href="{{ url('/') }}"
               class="absolute top-4 left-4 flex items-center gap-2
                      px-4 py-1.5 rounded-full
                      bg-gray-100 hover:bg-purple-100
                      text-gray-600 hover:text-purple-700
                      text-sm font-medium
                      transition-all duration-300 group">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-4 h-4 group-hover:-translate-x-1 transition"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>Back</span>
            </a>

            <div class="text-center mb-6 mt-8">
                <h1 class="text-2xl font-extrabold text-gray-800">
                    Register as Instructor
                </h1>
                <p class="text-gray-500 mt-1 text-sm">
                    Bagikan ilmu bermanfaat dan bangun ekosistem #BelajarJadiCuan 🚀
                </p>
            </div>

            <form method="POST" action="{{ route('register-instructor') }}" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    
                    <div class="space-y-4">
                        <h2 class="text-md font-bold text-purple-700 border-b pb-1">Informasi Kredensial Akun</h2>
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-700">Nama Lengkap</label>
                            <input
                                type="text" name="username" value="{{ old('username') }}"
                                placeholder="Masukkan nama lengkap" required autofocus
                                class="w-full mt-1 px-4 py-2.5 rounded-xl border border-gray-300 bg-white focus:border-[#7F00FF] focus:ring-4 focus:ring-purple-100 hover:border-yellow-400 transition duration-300"
                            >
                            <x-input-error :messages="$errors->get('username')" class="mt-1 text-red-500 text-xs" />
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700">Email</label>
                            <input
                                type="email" name="email" value="{{ old('email') }}"
                                placeholder="Masukkan email" required
                                class="w-full mt-1 px-4 py-2.5 rounded-xl border border-gray-300 bg-white focus:border-[#7F00FF] focus:ring-4 focus:ring-purple-100 hover:border-yellow-400 transition duration-300"
                            >
                            <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-500 text-xs" />
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700">Password</label>
                            <input
                                type="password" name="password" placeholder="Masukkan password" required
                                class="w-full mt-1 px-4 py-2.5 rounded-xl border border-gray-300 bg-white focus:border-[#7F00FF] focus:ring-4 focus:ring-purple-100 hover:border-yellow-400 transition duration-300"
                            >
                            <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-500 text-xs" />
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700">Konfirmasi Password</label>
                            <input
                                type="password" name="password_confirmation" placeholder="Konfirmasi password" required
                                class="w-full mt-1 px-4 py-2.5 rounded-xl border border-gray-300 bg-white focus:border-[#7F00FF] focus:ring-4 focus:ring-purple-100 hover:border-yellow-400 transition duration-300"
                            >
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-red-500 text-xs" />
                        </div>
                    </div>

                    <div class="space-y-4">
                        <h2 class="text-md font-bold text-purple-700 border-b pb-1">Detail Kompetensi Profesional</h2>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700">Deskripsi Singkat / Bio</label>
                            <textarea
                                name="deskripsi" rows="3" required
                                placeholder="Ceritakan latar belakang keahlian atau pengalaman mengajar Anda..."
                                class="w-full mt-1 px-4 py-2.5 rounded-xl border border-gray-300 bg-white focus:border-[#7F00FF] focus:ring-4 focus:ring-purple-100 hover:border-yellow-400 transition duration-300 resize-none"
                            >{{ old('deskripsi') }}</textarea>
                            <x-input-error :messages="$errors->get('deskripsi')" class="mt-1 text-red-500 text-xs" />
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700">Link LinkedIn</label>
                            <input
                                type="url" name="linkedin" value="{{ old('linkedin') }}"
                                placeholder="https://www.linkedin.com/in/username" required
                                class="w-full mt-1 px-4 py-2.5 rounded-xl border border-gray-300 bg-white focus:border-[#7F00FF] focus:ring-4 focus:ring-purple-100 hover:border-yellow-400 transition duration-300"
                            >
                            <x-input-error :messages="$errors->get('linkedin')" class="mt-1 text-red-500 text-xs" />
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700">Unggah Berkas CV (Format PDF, Maks 2MB)</label>
                            <input
                                type="file" name="cv" accept=".pdf" required
                                class="w-full mt-1 px-2 py-1.5 rounded-xl border border-gray-300 bg-white text-sm text-gray-500
                                       file:mr-4 file:py-1.5 file:px-4 file:rounded-xl file:border-0
                                       file:text-xs file:font-semibold file:bg-purple-50 file:text-purple-700
                                       hover:file:bg-purple-100 transition duration-300"
                            >
                            <x-input-error :messages="$errors->get('cv')" class="mt-1 text-red-500 text-xs" />
                        </div>
                    </div>

                </div>

                <div class="mt-8 border-t pt-4">
                    <button
                        type="submit"
                        class="w-full py-3 rounded-xl
                               bg-gradient-to-r from-[#7F00FF] to-[#A855F7]
                               hover:from-[#6D00E6] hover:to-[#9333EA]
                               text-white font-semibold
                               hover:scale-[1.01]
                               hover:shadow-[0_10px_30px_rgba(127,0,255,0.2)]
                               transition duration-300"
                    >
                        Kirim Berkas Pendaftaran Instruktur
                    </button>

                    <p class="text-center text-sm text-gray-800 mt-4">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="text-purple-700 font-semibold hover:underline">
                            Login
                        </a>
                    </p>
                </div>

            </form>

        </div>
    </div>
</x-guest-layout>
<x-guest-layout>

    @section('title', 'Register as Instructor - Cuanify')

    <div class="min-h-screen flex flex-col items-center justify-center bg-[#f6f7fb] relative overflow-hidden px-4 py-10">

        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[350px] h-[350px] bg-purple-300/20 rounded-full blur-3xl"></div>
        <div class="absolute top-[-80px] right-[-80px] w-72 h-72 bg-purple-200/40 rounded-full blur-3xl"></div>
        <div class="absolute bottom-[-80px] left-[-80px] w-72 h-72 bg-yellow-200/40 rounded-full blur-3xl"></div>

        <div class="relative z-10 text-center mb-6">
            <img src="{{ asset('images/logo1.png') }}" alt="Logo Cuanify" class="w-28 sm:w-36 mx-auto drop-shadow-lg">
        </div>

@if(session('success'))
    <div class="w-full max-w-4xl bg-green-100 text-green-800 border border-green-200 rounded-[10px] px-4 py-3 mb-4 text-[13px] font-semibold relative z-10">
        {{ session('success') }}
    </div>
@endif

        <div class="relative z-10 w-full max-w-4xl bg-white rounded-[2rem] shadow-xl p-6 sm:p-8 border border-gray-100">

            <a href="{{ url('/') }}" class="absolute top-4 left-4 flex items-center gap-2 px-4 py-1.5 rounded-full bg-gray-100 hover:bg-purple-100 text-gray-600 hover:text-purple-700 text-sm font-medium transition-all duration-300 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 group-hover:-translate-x-1 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>Back</span>
            </a>

            <div class="text-center mb-6 mt-8">
                <h1 class="text-2xl font-extrabold text-gray-800">Register as Instructor</h1>
                <p class="text-gray-500 mt-1 text-sm">Bagikan ilmu bermanfaat dan bangun ekosistem #BelajarJadiCuan 🚀</p>
            </div>

            <form method="POST" action="{{ route('register-instructor') }}" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    
                    <div class="space-y-4">
                        <h2 class="text-md font-bold text-purple-700 border-b pb-1">Informasi Akun</h2>
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-700">Nama Lengkap</label>
                            <input
                                type="text" name="username" value="{{ old('username') }}"
                                placeholder="Masukkan nama lengkap" required autofocus
                                class="w-full mt-2 px-4 py-2.5 rounded-xl border bg-white focus:ring-4 focus:ring-purple-100 transition duration-300
                                       {{ $errors->has('username') ? 'border-red-400 focus:border-red-500' : 'border-gray-300 focus:border-[#7F00FF] hover:border-yellow-400' }}"
                            >
                            <x-input-error :messages="$errors->get('username')" class="mt-1 text-red-500 text-xs" />
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700">Email</label>
                            <input
                                type="email" name="email" value="{{ old('email') }}"
                                placeholder="Masukkan email" required
                                class="w-full mt-2 px-4 py-2.5 rounded-xl border bg-white focus:ring-4 focus:ring-purple-100 transition duration-300
                                       {{ $errors->has('email') ? 'border-red-400 focus:border-red-500' : 'border-gray-300 focus:border-[#7F00FF] hover:border-yellow-400' }}"
                            >
                            <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-500 text-xs" />
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700">Password</label>
                            <div class="relative mt-2">
                                <input
                                    id="password" type="password" name="password" placeholder="Masukkan password" required
                                    class="w-full px-4 py-2.5 pr-12 rounded-xl border bg-white focus:ring-4 focus:ring-purple-100 transition duration-300
                                           {{ $errors->has('password') ? 'border-red-400 focus:border-red-500' : 'border-gray-300 focus:border-[#7F00FF] hover:border-yellow-400' }}"
                                >
                                <button type="button" onclick="togglePassword('password', this)" class="absolute inset-y-0 right-0 flex items-center px-4 text-gray-400 hover:text-purple-600">
                                    <svg class="w-5 h-5 eye-open" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    <svg class="w-5 h-5 eye-close hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 012.104-3.368"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6.228 6.228A9.956 9.956 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.96 9.96 0 01-4.293 5.226"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18"/>
                                    </svg>
                                </button>
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-500 text-xs" />
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700">Konfirmasi Password</label>
                            <div class="relative mt-2">
                                <input
                                    id="password_confirmation" type="password" name="password_confirmation" placeholder="Konfirmasi password" required
                                    class="w-full px-4 py-2.5 pr-12 rounded-xl border bg-white focus:ring-4 focus:ring-purple-100 transition duration-300
                                           {{ $errors->has('password_confirmation') ? 'border-red-400 focus:border-red-500' : 'border-gray-300 focus:border-[#7F00FF] hover:border-yellow-400' }}"
                                >
                                <button type="button" onclick="togglePassword('password_confirmation', this)" class="absolute inset-y-0 right-0 flex items-center px-4 text-gray-400 hover:text-purple-600">
                                    <svg class="w-5 h-5 eye-open" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    <svg class="w-5 h-5 eye-close hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 012.104-3.368"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6.228 6.228A9.956 9.956 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.96 9.96 0 01-4.293 5.226"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18"/>
                                    </svg>
                                </button>
                            </div>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-red-500 text-xs" />
                        </div>
                    </div>

                    <div class="space-y-4">
                        <h2 class="text-md font-bold text-purple-700 border-b pb-1">Detail Kompetensi </h2>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700">Deskripsi Singkat / Bio</label>
                            <textarea
                                name="deskripsi" rows="3" required
                                placeholder="Ceritakan latar belakang keahlian atau pengalaman mengajar Anda..."
                                class="w-full mt-2 px-4 py-2.5 rounded-xl border bg-white focus:ring-4 focus:ring-purple-100 transition duration-300 resize-none
                                       {{ $errors->has('deskripsi') ? 'border-red-400 focus:border-red-500' : 'border-gray-300 focus:border-[#7F00FF] hover:border-yellow-400' }}"
                            >{{ old('deskripsi') }}</textarea>
                            <x-input-error :messages="$errors->get('deskripsi')" class="mt-1 text-red-500 text-xs" />
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700">Link LinkedIn</label>
                            <input
                                type="url" name="linkedin" value="{{ old('linkedin') }}"
                                placeholder="https://www.linkedin.com/in/username" required
                                class="w-full mt-2 px-4 py-2.5 rounded-xl border bg-white focus:ring-4 focus:ring-purple-100 transition duration-300
                                       {{ $errors->has('linkedin') ? 'border-red-400 focus:border-red-500' : 'border-gray-300 focus:border-[#7F00FF] hover:border-yellow-400' }}"
                            >
                            <x-input-error :messages="$errors->get('linkedin')" class="mt-1 text-red-500 text-xs" />
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700">Unggah Berkas CV (Format PDF, Maks 2MB)</label>
                            <input
                                type="file" name="cv" accept=".pdf" required
                                class="w-full mt-2 px-2 py-1.5 rounded-xl border bg-white text-sm text-gray-500 transition duration-300
                                       file:mr-4 file:py-1.5 file:px-4 file:rounded-xl file:border-0
                                       file:text-xs file:font-semibold file:bg-purple-50 file:text-purple-700
                                       hover:file:bg-purple-100
                                       {{ $errors->has('cv') ? 'border-red-400 focus:border-red-500' : 'border-gray-300 focus:border-[#7F00FF]' }}"
                            >
                            <x-input-error :messages="$errors->get('cv')" class="mt-1 text-red-500 text-xs" />
                        </div>
                    </div>

                </div>

                <div class="mt-8 border-t pt-4">
                    <button
                        type="submit"
                        class="w-full py-3 rounded-xl bg-gradient-to-r from-[#7F00FF] to-[#A855F7] hover:from-[#6D00E6] hover:to-[#9333EA] text-white font-semibold hover:scale-[1.01] hover:shadow-[0_10px_30px_rgba(127,0,255,0.2)] transition duration-300"
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

    <script>
    function togglePassword(id, button) {
        const input = document.getElementById(id);
        const openEye = button.querySelector('.eye-open');
        const closeEye = button.querySelector('.eye-close');
    
        if (input.type === 'password') {
            input.type = 'text';
            openEye.classList.add('hidden');
            closeEye.classList.remove('hidden');
        } else {
            input.type = 'password';
            closeEye.classList.add('hidden');
            openEye.classList.remove('hidden');
        }
    }
    </script>
</x-guest-layout>
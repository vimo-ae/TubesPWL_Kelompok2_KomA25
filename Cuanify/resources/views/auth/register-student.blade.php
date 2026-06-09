<x-guest-layout>

    @section('title', 'Register - Cuanify')

    <div class="min-h-screen flex flex-col items-center justify-center
                bg-[#f6f7fb] relative overflow-hidden px-4 py-10">

        <!-- Blur Background -->
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

        <!-- LOGO DI LUAR FORM -->
        <div class="relative z-10 text-center mb-6">

            <img
                src="{{ asset('images/logo1.png') }}"
                alt="Logo Cuanify"
                class="w-28 sm:w-36 mx-auto drop-shadow-lg"
            >
        </div>

        <!-- CARD -->
        <div class="relative z-10
                    w-full max-w-[420px]
                    bg-white
                    rounded-[2rem]
                    shadow-xl
                    p-5 sm:p-6
                    border border-gray-100">

            <!-- BACK BUTTON -->
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

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>

                <span>Back</span>
            </a>

            <!-- TITLE -->
            <div class="text-center mb-4 mt-10">

                <h1 class="text-2xl font-extrabold text-gray-800">
                    Create Your Account
                </h1>

                <p class="text-gray-500 mt-2 text-sm sm:text-base">
                    Mulai perjalanan cuanmu bersama Cuanify
                </p>

                <p class="text-sm text-gray-500 mt-2">
                #BelajarJadiCuan 
                </p>

            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700">
                        Username
                    </label>

                    <input
                        type="text"
                        name="username"
                        value="{{ old('username') }}"
                        placeholder="Masukkan username"
                        required
                        autofocus
                        class="w-full mt-2 px-4 py-2.5 rounded-xl
                               border border-gray-300 bg-white
                               focus:border-[#7F00FF]
                               focus:ring-4 focus:ring-purple-100
                               hover:border-yellow-400
                               transition duration-300"
                    >

                    <x-input-error
                    :messages="$errors->get('username')"
                    class="mt-1 text-red-500 text-xs"
                    />
                </div>

                <!-- Email -->
                <div class="mt-3">
                    <label class="block text-sm font-semibold text-gray-700">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Masukkan email"
                        required
                        class="w-full mt-2 px-4 py-2.5 rounded-xl
                               border border-gray-300 bg-white
                               focus:border-[#7F00FF]
                               focus:ring-4 focus:ring-purple-100
                               hover:border-yellow-400
                               transition duration-300"
                    >

                    <x-input-error
                        :messages="$errors->get('email')"
                        class="mt-1 text-red-500 text-xs"
                    />
                </div>

                <!-- Password -->
                <div class="mt-3">
                    <label class="block text-sm font-semibold text-gray-700">
                        Password
                    </label>
                
                    <div class="relative mt-2">
                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="Masukkan password"
                            required
                            class="w-full px-4 py-2.5 pr-12 rounded-xl
                                   border border-gray-300 bg-white
                                   focus:border-[#7F00FF]
                                   focus:ring-4 focus:ring-purple-100
                                   hover:border-yellow-400
                                   transition duration-300"
                        >
                    
                        <button
                            type="button"
                            onclick="togglePassword('password', this)"
                            class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-purple-600"
                        >
                            <svg class="w-5 h-5 eye-open" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        
                            <svg class="w-5 h-5 eye-close hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 3l18 18"/>
                            </svg>
                        </button>
                    </div>
                
                    <x-input-error
                        :messages="$errors->get('password')"
                        class="mt-1 text-red-500 text-xs"
                    />
                </div>
                
                <!-- Confirm Password -->
                <div class="mt-3">
                    <label class="block text-sm font-semibold text-gray-700">
                        Confirm Password
                    </label>
                
                    <div class="relative mt-2">
                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            placeholder="Konfirmasi password"
                            required
                            class="w-full px-4 py-2.5 pr-12 rounded-xl
                                   border border-gray-300 bg-white
                                   focus:border-[#7F00FF]
                                   focus:ring-4 focus:ring-purple-100
                                   hover:border-yellow-400
                                   transition duration-300"
                        >
                    
                        <button
                            type="button"
                            onclick="togglePassword('password_confirmation', this)"
                            class="absolute right-4 top-1/2 -translate-y-1/2
                                   text-gray-400 hover:text-purple-600 transition"
                        >
                            <svg class="w-5 h-5 eye-open" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M2.458 12C3.732 7.943 7.523 5 12 5
                                         c4.478 0 8.268 2.943 9.542 7
                                         -1.274 4.057-5.064 7-9.542 7
                                         -4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        
                            <svg class="w-5 h-5 eye-close hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M13.875 18.825A10.05 10.05 0 0112 19
                                         c-4.478 0-8.268-2.943-9.542-7
                                         a9.97 9.97 0 012.104-3.368"/>
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M6.228 6.228A9.956 9.956 0 0112 5
                                         c4.478 0 8.268 2.943 9.542 7
                                         a9.96 9.96 0 01-4.293 5.226"/>
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M3 3l18 18"/>
                            </svg>
                        </button>
                    </div>
                </div>
            
                <!-- Button -->
                <button
                    type="submit"
                    class="w-full mt-7 py-2.5 rounded-xl
                           bg-gradient-to-r from-[#7F00FF] to-[#A855F7]
                           hover:from-[#6D00E6] hover:to-[#9333EA]
                           text-white font-semibold
                           hover:scale-[1.02]
                           hover:shadow-[0_10px_30px_rgba(0,0,0,0.08)]
                           transition duration-300"
                >
                    Register
                </button>

                <!-- Login -->
                <p class="text-center text-sm text-gray-800 mt-6">
                    Sudah punya akun?

                    <a
                        href="{{ route('login') }}"
                        class="text-purple-700 font-semibold hover:underline"
                    >
                        Login
                    </a>
                </p>

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
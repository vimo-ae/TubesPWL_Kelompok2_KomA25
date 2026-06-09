<x-guest-layout>

    @section('title', 'Login - Cuanify')
    
    <div class="min-h-screen flex flex-col items-center justify-center
    bg-[#f5f7fb]
    relative overflow-hidden px-4">
    
    <!-- LOGO DI LUAR FORM -->
    <div class="mb-6 relative z-10 text-center">

            <img
                src="{{ asset('images/logo1.png') }}"
                alt="Logo Cuanify"
                class="w-28 sm:w-36 mx-auto drop-shadow-lg"
            >
        </div>

        <!-- CARD LOGIN -->
        <div class="relative z-10
                w-full max-w-[420px]
                bg-white
                rounded-[2rem]
                shadow-[0_10px_30px_rgba(0,0,0,0.08)]
                p-6
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
            <div class="text-center mb-5 mt-10">

                <h1 class="text-2xl font-extrabold text-gray-800">
                    Welcome Back
                </h1>

                <p class="text-gray-500 mt-3">
                    Belajar UMKM & Bangun Bisnis Masa Depan
                </p>

                <p class="text-sm text-gray-500 mt-2">
                #BelajarJadiCuan 
                </p>

            </div>

            <!-- Session Status -->
            <x-auth-session-status
                class="mb-4"
                :status="session('status')"
            />
            @if ($errors->any())
                <div class="bg-red-500 text-white p-4 rounded mb-4">
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- FORM -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Masukkan email"
                        required
                        autofocus
                        class="w-full mt-2 px-4 py-2.5 rounded-xl
                               border border-gray-300
                               focus:border-[#7F00FF]
                               focus:ring-4 focus:ring-purple-100
                               hover:border-yellow-400
                               transition duration-300"
                    >
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
                        <x-input-error :messages="$errors->get('password')"class="mt-1 text-red-500 text-xs"/>
                    
                        <button
                            type="button"
                            onclick="togglePassword('password', this)"
                            class="absolute inset-y-0 right-0 flex items-center px-4 text-gray-400 hover:text-purple-600"
                        >
                            <svg id="eye-open"
                                 xmlns="http://www.w3.org/2000/svg"
                                 class="w-5 h-5"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M2.458 12C3.732 7.943 7.523 5 12 5
                                         c4.478 0 8.268 2.943 9.542 7
                                         -1.274 4.057-5.064 7-9.542 7
                                         -4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        
                            <svg id="eye-close"
                                 xmlns="http://www.w3.org/2000/svg"
                                 class="w-5 h-5 hidden"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M13.875 18.825A10.05 10.05 0 0112 19
                                         c-4.478 0-8.268-2.943-9.542-7
                                         a9.956 9.956 0 012.042-3.368M6.223 6.223
                                         A9.953 9.953 0 0112 5c4.478 0 8.268 2.943
                                         9.542 7a9.97 9.97 0 01-4.293 5.774M15 12
                                         a3 3 0 00-4.243-4.243M3 3l18 18" />
                            </svg>
                        </button>
                    </div>
                
                    <x-input-error
                        :messages="$errors->get('password')"
                        class="mt-1 text-red-500 text-xs"
                    />
                </div>

                <!-- Remember -->
                <div class="flex items-center justify-between mt-3">

                    <label class="flex items-center">
                        <input
                            type="checkbox"
                            name="remember"
                            class="rounded border-gray-300 text-purple-600"
                        >

                        <span class="ml-2 text-sm text-gray-600">
                            Remember me
                        </span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           class="text-sm text-purple-600 hover:underline">
                            Forgot Password?
                        </a>
                    @endif

                </div>
                
                
                <!-- BUTTON -->
                <button
                type="submit"
                class="w-full mt-7 py-3 rounded-xl
                        bg-gradient-to-r from-[#7F00FF] to-[#A855F7]
                        hover:from-[#6D00E6] hover:to-[#9333EA]
                        text-white font-semibold
                        hover:scale-[1.02]
                        transition duration-300">
                        
                        Login
                    </button>
                    
                    @if (session('warning'))
                        <div id="warning" class="mt-4 rounded bg-yellow-100 border border-yellow-400 text-yellow-700 transition-opacity duration-500 px-4 py-3">
                            {{ session('warning') }}
                        </div>
                    @endif
                
                    @if (session('error'))
                        <div id="error" class="mt-4 rounded bg-red-100 border border-red-400 text-red-700 transition-opacity duration-500 px-4 py-3">
                            {{ session('error') }}
                        </div>
                    @endif

                <!-- REGISTER -->
                <p class="text-center text-sm text-gray-500 mt-6">

                    Belum punya akun?

                    <a href="{{ route('register') }}"
                       class="text-purple-600 font-semibold hover:underline">
                       
                       Register
                    </a>
                    
                </p>

                
            </form>

        </div>

    </div>
    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const eyeOpen = document.getElementById('eye-open');
            const eyeClose = document.getElementById('eye-close');
        
            if (input.type === 'password') {
                input.type = 'text';
                eyeOpen.classList.add('hidden');
                eyeClose.classList.remove('hidden');
            } else {
                input.type = 'password';
                eyeOpen.classList.remove('hidden');
                eyeClose.classList.add('hidden');
            }
        }
    </script>
</x-guest-layout>
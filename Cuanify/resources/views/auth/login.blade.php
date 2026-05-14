<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center
            bg-[#f5f7fb]
            relative overflow-hidden px-4">

    <div class="relative z-10
            w-full max-w-[420px]
            bg-white
            rounded-[2rem]
            shadow-[0_10px_30px_rgba(0,0,0,0.08)]
            p-6
            border border-gray-100">

            <!-- BACK TO WELCOME (PILL BUTTON) -->
            <a href="{{ url('/') }}"
               class="absolute top-4 left-4 flex items-center gap-2
                      px-4 py-1.5 rounded-full
                      bg-gray-100 hover:bg-purple-100
                      text-gray-600 hover:text-purple-700
                      text-sm font-medium
                      transition-all duration-300 group">
            
                <!-- icon -->
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-4 h-4 group-hover:-translate-x-1 transition"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            
                <span>Back</span>
            </a>
    
            <!-- Logo -->
            <div class="text-center mb-5">

                <img
                    src="{{ asset('images/logo1.png') }}"
                    alt="Logo Cuanify"
                    class="w-24 sm:w-32 mx-auto drop-shadow-lg"
                >

                <h1 class="text-xl font-extrabold text-gray-800 mt-4">
                    Welcome Back
                </h1>

                <p class="text-gray-500 mt-3">
                    Belajar UMKM & Bangun Bisnis Masa Depan
                    
                </p>

                <p class="text-sm text-gray-400 mt-2">
                        #BelajarJadiCuan 🚀
                </p>

            </div>

            <!-- Session Status -->
            <x-auth-session-status
                class="mb-4"
                :status="session('status')"
            />

            <!-- Form -->
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

                    <input
                        type="password"
                        name="password"
                        placeholder="Masukkan password"
                        required
                        class="w-full mt-2 px-4 py-2.5 rounded-xl
                               border border-gray-300
                               focus:border-[#7F00FF]
                               focus:ring-4 focus:ring-purple-100
                               hover:border-yellow-400
                               transition duration-300"
                    >
                    
                    @if ($errors->has('email'))
                        <p class="mt-1 text-xs text-red-500">
                        {{ $errors->first('email') }}
                    </p>
                    @endif
                </div>

                <!-- Remember & Forgot -->
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
                        <a
                            href="{{ route('password.request') }}"
                            class="text-sm text-purple-600 hover:underline"
                        >
                            Forgot Password?
                        </a>
                    @endif

                </div>

                <!-- Button -->
                <button
                    type="submit"
                    class="w-full mt-7 py-3 rounded-xl
                        bg-gradient-to-r from-[#7F00FF] to-[#A855F7]
                        hover:from-[#6D00E6] hover:to-[#9333EA]
                        text-white font-semibold
                        hover:scale-[1.02] 
                        hover:shadow-[0_10px_30px_rgba(0,0,0,0.08)]
                        transition duration-300"
                >
                    Login
                </button>

                <!-- Register -->
                <p class="text-center text-sm text-gray-500 mt-6">
                    Belum punya akun?

                    <a
                        href="{{ route('register') }}"
                        class="text-purple-600 font-semibold hover:underline"
                    >
                        Register
                    </a>
                </p>

            </form>

        </div>

    </div>

</x-guest-layout>
<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center
            bg-gradient-to-br from-[#5B21B6] via-[#9333EA] to-[#FACC15]
            relative overflow-hidden p-4 sm:p-6">
            
        <div class="absolute top-0 left-0
            w-80 h-80 bg-fuchsia-300/20
            rounded-full blur-3xl">
        </div>

        <div class="absolute bottom-0 right-0
            w-80 h-80 bg-amber-300/20
            rounded-full blur-3xl">
        </div>

        <div class="absolute top-1/2 left-1/2
            -translate-x-1/2 -translate-y-1/2
            w-[500px] h-[500px]
            bg-violet-300/20 rounded-full blur-3xl">
        </div>

    <div class="relative z-10 w-full max-w-[360px] bg-white/80 backdrop-blur-xl rounded-3xl shadow-[0_20px_60px_rgba(0,0,0,0.25)] p-4 border border-white/30">
    
            <!-- Logo -->
            <div class="text-center mb-5">

                <img
                    src="{{ asset('images/logo1.png') }}"
                    alt="Logo Cuanify"
                    class="w-24 sm:w-32 mx-auto drop-shadow-lg"
                >

                <h1 class="text-xl font-extrabold text-gray-800 mt-4">
                    Welcome Back 👋
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
                        class="w-full mt-2 px-4 py-2 rounded-xl
                               border border-gray-300
                               focus:border-purple-500
                               focus:ring-purple-500
                               transition duration-300"
                    >

                    <x-input-error
                        :messages="$errors->get('email')"
                        class="mt-2"
                    />
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
                        class="w-full mt-2 px-4 py-2 rounded-xl
                               border border-gray-300
                               focus:border-purple-500
                               focus:ring-purple-500
                               transition duration-300"
                    >

                    <x-input-error
                        :messages="$errors->get('password')"
                        class="mt-2"
                    />
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
                    class="w-full mt-7 py-2 rounded-xl
                           bg-gradient-to-br from-[#7F00FF] via-[#E100FF] to-[#FFD000]
                           text-white font-bold shadow-lg
                           hover:scale-[1.02] hover:shadow-[0_20px_60px_rgba(0,0,0,0.15)] transition duration-300"
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
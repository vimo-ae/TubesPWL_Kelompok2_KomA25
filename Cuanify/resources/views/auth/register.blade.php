<x-guest-layout>

    <div class="h-screen flex items-center justify-center
                bg-gradient-to-br from-[#4B0082] via-[#7F00FF] to-[#FFD000]
                relative overflow-hidden p-4 sm:p-6">

        <!-- Background Blur -->
        <div class="absolute top-0 left-0
                    w-80 h-80 bg-pink-300/30
                    rounded-full blur-3xl">
        </div>

        <div class="absolute bottom-0 right-0
                    w-80 h-80 bg-yellow-300/30
                    rounded-full blur-3xl">
        </div>

        <div class="absolute top-1/2 left-1/2
                    -translate-x-1/2 -translate-y-1/2
                    w-[350px] h-[350px]
                    bg-purple-300/20 rounded-full blur-3xl">
        </div>

        <div class="absolute top-20 right-20
            w-40 h-40 bg-white/10
            rounded-full blur-3xl">
        </div>

        <div class="absolute bottom-20 left-20
            w-20 h-20 bg-pink-200/10
            rounded-full blur-2xl">
        </div>

        <!-- Card -->
        <div class="relative z-10
                    w-full max-w-[360px]
                    max-h-[95vh]
                    bg-white/70 backdrop-blur-xl
                    rounded-[2rem]
                    shadow-[0_20px_60px_rgba(0,0,0,0.25)]
                    p-4 
                    border border-white/30
                    transition duration-300 
                    hover:scale-[1.01]">

            <!-- Logo -->
            <div class="text-center mb-4">

                <img
                    src="{{ asset('images/logo1.png') }}"
                    alt="Logo Cuanify"
                    class="w-24 sm:w-32 mx-auto drop-shadow-lg"
                >

                <h1 class="text-lg font-extrabold text-gray-800 mt-3">
                    Create Account ✨
                </h1>

                <p class="text-gray-500 mt-2">
                    Mulai perjalanan cuanmu bersama Cuanify
                </p>

            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700">
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Masukkan nama lengkap"
                        required
                        autofocus
                        class="w-full mt-2 px-4 py-2 rounded-xl
                               border border-white/40 bg-white/70
                               focus:border-yellow-400
                               focus:ring-yellow-400
                               transition duration-300"
                    >

                    <x-input-error
                        :messages="$errors->get('name')"
                        class="mt-2"
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
                        class="w-full mt-2 px-4 py-2 rounded-xl
                               border border-white/40 bg-white/70
                               focus:border-yellow-400
                               focus:ring-yellow-400
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
                               border border-white/40 bg-white/70
                               focus:border-yellow-400
                               focus:ring-yellow-400
                               transition duration-300"
                    >

                    <x-input-error
                        :messages="$errors->get('password')"
                        class="mt-2"
                    />
                </div>

                <!-- Confirm Password -->
                <div class="mt-3">
                    <label class="block text-sm font-semibold text-gray-700">
                        Konfirmasi Password
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        placeholder="Konfirmasi password"
                        required
                        class="w-full mt-2 px-4 py-2 rounded-xl
                               border border-white/40 bg-white/70
                               focus:border-yellow-400
                               focus:ring-yellow-400
                               transition duration-300"
                    >

                </div>

                <!-- Button -->
                <button
                    type="submit"
                    class="w-full mt-7 py-2 rounded-xl
                           bg-gradient-to-r from-yellow-400 to-purple-700
                           text-white font-bold shadow-lg
                           hover:scale-[1.02]
                           hover:shadow-[0_10px_30px_rgba(255,255,255,0.25)]
                           transition duration-300"
                >
                    Register
                </button>

                <!-- Login -->
                <p class="text-center text-sm text-gray-500 mt-6">
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

</x-guest-layout>
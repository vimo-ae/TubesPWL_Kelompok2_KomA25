<x-guest-layout>

        <div class="min-h-screen flex items-center justify-center
                    bg-[#f6f7fb] relative overflow-hidden px-4">

        <!-- Blur Background -->
        <div class="absolute top-1/2 left-1/2
                    -translate-x-1/2 -translate-y-1/2
                    w-[350px] h-[350px]
                    bg-purple-300/20 rounded-full blur-3xl">
        </div>

        <!-- Blur -->
        <div class="absolute top-[-80px] right-[-80px]
                    w-72 h-72 bg-purple-200/40
                    rounded-full blur-3xl">
        </div>

        <div class="absolute bottom-[-80px] left-[-80px]
                    w-72 h-72 bg-yellow-200/40
                    rounded-full blur-3xl">
        </div> 

        <!-- Card -->
        <div class="relative z-10
                    w-full max-w-[420px]
                    bg-white
                    rounded-[2rem]
                    shadow-xl
                    p-5 sm:p-6
                    border border-gray-100">

            <!-- Logo -->
            <div class="text-center mb-4">

                <img
                    src="{{ asset('images/logo1.png') }}"
                    alt="Logo Cuanify"
                    class="w-24 sm:w-32 mx-auto drop-shadow-lg"
                >

                <h1 class="text-2xl font-extrabold text-gray-800 mt-3">
                    Create Account 
                </h1>

                <p class="text-gray-500 mt-2 text-sm sm:text-base">
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
                        class="w-full mt-2 px-4 py-2.5 rounded-xl
                               border border-gray-300 bg-white
                               focus:border-[#7F00FF]
                               focus:ring-4 focus:ring-purple-100
                               hover:border-yellow-400
                               transition duration-300"
                    >

                    <x-input-error
                    :messages="$errors->get('name')"
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

                    <input
                        type="password"
                        name="password"
                        placeholder="Masukkan password"
                        required
                        class="w-full mt-2 px-4 py-2.5 rounded-xl
                               border border-gray-300 bg-white
                               focus:border-[#7F00FF]
                               focus:ring-4 focus:ring-purple-100
                               hover:border-yellow-400
                               transition duration-300"
                    >

                    <x-input-error
                        :messages="$errors->get('password')"
                        class="mt-1 text-red-500 text-xs"
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
                        class="w-full mt-2 px-4 py-2.5 rounded-xl
                               border border-gray-300 bg-white
                               focus:border-[#7F00FF]
                               focus:ring-4 focus:ring-purple-100
                               hover:border-yellow-400
                               transition duration-300"
                    >

                    <x-input-error
                        :messages="$errors->get('password_confirmation')"
                        class="mt-1 text-red-500 text-xs"
                    />
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

</x-guest-layout>
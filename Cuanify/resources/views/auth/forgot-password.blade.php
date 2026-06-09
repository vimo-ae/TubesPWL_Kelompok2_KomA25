<x-guest-layout>
    <!-- Tambah font-sans di bawah ini biar font-nya kembar sama SS kamu -->
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#fcf9fe] font-sans">
        <div class="w-full sm:max-w-md mt-6 px-8 py-8 bg-white shadow-md overflow-hidden sm:rounded-[24px] border border-purple-50">
            
            <!-- Logo / Judul -->
            <div class="mb-6 text-center">
                <h2 class="text-2xl font-black text-gray-800 tracking-tight">Lupa <span class="text-[#df49a6]">Password?</span></h2>
                <p class="text-xs text-gray-500 mt-2 leading-relaxed">
                    Jangan panik! Masukkan email kamu di bawah ini, kami akan kirimkan link untuk mengatur ulang password-mu.
                </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-sm font-semibold text-emerald-600 bg-emerald-50 p-3 rounded-xl text-center" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Alamat Email</label>
                    <div class="relative">
                        <input id="email" class="block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-[#b55fe6] focus:bg-white transition" type="email" name="email" :value="old('email')" required autofocus />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs font-semibold text-pink-600" />
                </div>

                <!-- Tombol Submit -->
                <div>
                    <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-2 rounded-xl border border-transparent font-semibold bg-gradient-to-r from-[#b55fe6] to-[#df49a6] text-white hover:opacity-90 focus:outline-none transition text-sm shadow-sm">
                        Kirim Link Reset Password
                    </button>
                </div>
            </form>

            <!-- Tombol Kembali -->
            <div class="mt-6 text-center">
                <a href="{{ route('login') }}" class="text-xs font-bold text-[#b55fe6] hover:text-[#df49a6] transition uppercase tracking-wider">
                    Kembali ke Halaman Login
                </a>
            </div>

        </div>
    </div>
</x-guest-layout>
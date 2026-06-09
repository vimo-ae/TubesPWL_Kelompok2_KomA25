<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#fcf9fe] font-sans">
        <div class="w-full sm:max-w-md mt-6 px-8 py-8 bg-white shadow-md overflow-hidden sm:rounded-[24px] border border-purple-50">
            
            <!-- Judul Halaman -->
            <div class="mb-6 text-center">
                <h2 class="text-2xl font-black text-gray-800 tracking-tight">Atur Ulang <span class="text-[#df49a6]">Password</span></h2>
                <p class="text-xs text-gray-500 mt-2 leading-relaxed">
                    Silakan masukkan password baru kamu di bawah ini. Pastikan gampang diingat tapi susah ditebak ya!
                </p>
            </div>

            <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address (SUDAH FIX DAN BISA DIISI) -->
                <div>
                    <label for="email" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Alamat Email</label>
                    <!-- Titik dua dibuang, readonly dibuang, background jadi putih bersih -->
                    <input id="email" class="block w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-sm text-gray-800 focus:outline-none focus:border-[#b55fe6] focus:ring-1 focus:ring-[#b55fe6] transition" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs font-semibold text-pink-600" />
                </div>

                <!-- Password Baru -->
                <div>
                    <label for="password" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Password Baru</label>
                    <input id="password" class="block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-[#b55fe6] focus:bg-white transition" type="password" name="password" required autocomplete="new-password" placeholder="Minimal 8 karakter" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs font-semibold text-pink-600" />
                </div>

                <!-- Konfirmasi Password -->
                <div>
                    <label for="password_confirmation" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Ulangi Password Baru</label>
                    <input id="password_confirmation" class="block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-[#b55fe6] focus:bg-white transition" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Ketik ulang password baru" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-xs font-semibold text-pink-600" />
                </div>

                <!-- Tombol Submit -->
                <div class="pt-2">
                    <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-2 rounded-xl border border-transparent font-semibold bg-gradient-to-r from-[#b55fe6] to-[#df49a6] text-white hover:opacity-90 focus:outline-none transition text-sm shadow-sm">
                        Simpan Password Baru
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-guest-layout>
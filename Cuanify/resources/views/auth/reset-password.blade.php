<x-guest-layout>
    @section('title', 'Reset Password - Cuanify')
    
    <div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0 bg-[#f8f6ff] font-sans">
        
        <div class="mb-5 transition-transform hover:scale-105">
            <img src="{{ asset('images/logo1.png') }}"
                alt="Logo Cuanify"
                class="w-28 sm:w-36 mx-auto drop-shadow-lg">
        </div>

        <div class="w-full sm:max-w-md px-10 py-10 bg-white shadow-[0_10px_30px_rgba(0,0,0,0.04)] overflow-hidden sm:rounded-[32px] border border-gray-100">
            
            <div class="mb-6 text-center">
                <h2 class="text-[22px] font-extrabold text-[#1e1b4b] tracking-tight mb-2">Atur Ulang <span class="text-[#a855f7]">Password</span></h2>
                <p class="text-[13px] text-[#6b7280] font-normal leading-relaxed px-1">
                    Silakan masukkan password baru kamu di bawah ini. Pastikan gampang diingat tapi susah ditebak ya!
                </p>
            </div>

            <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div>
                    <label for="email" class="block text-sm font-bold text-[#1e1b4b] mb-2">Email</label>
                    <input id="email" 
                           class="block w-full px-4 py-3.5 bg-white border-2 border-[#a855f7] rounded-xl text-sm text-gray-800 focus:outline-none focus:border-[#a855f7] focus:ring-0 transition shadow-sm" 
                           type="email" 
                           name="email" 
                           value="{{ old('email', $request->email) }}" 
                           required 
                           autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs font-semibold text-red-500" />
                </div>

                <div>
                    <label for="password" class="block text-sm font-bold text-[#1e1b4b] mb-2">Password Baru</label>
                    <input id="password" 
                           class="block w-full px-4 py-3.5 bg-white border-2 border-[#a855f7] rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:border-[#a855f7] focus:ring-0 transition shadow-sm" 
                           type="password" 
                           name="password" 
                           required 
                           autocomplete="new-password" 
                           placeholder="Minimal 8 karakter" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs font-semibold text-red-500" />
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-bold text-[#1e1b4b] mb-2">Ulangi Password Baru</label>
                    <input id="password_confirmation" 
                           class="block w-full px-4 py-3.5 bg-white border-2 border-[#a855f7] rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:border-[#a855f7] focus:ring-0 transition shadow-sm" 
                           type="password" 
                           name="password_confirmation" 
                           required 
                           autocomplete="new-password" 
                           placeholder="Ketik ulang password baru" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-xs font-semibold text-red-500" />
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full py-3.5 px-4 inline-flex justify-center items-center font-bold bg-[#a855f7] text-white rounded-xl hover:bg-[#9333ea] focus:outline-none transition-all text-base shadow-sm">
                        Simpan Password Baru
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-guest-layout>
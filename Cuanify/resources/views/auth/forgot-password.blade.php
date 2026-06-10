<x-guest-layout>
    @section('title', 'Forgot Password - Cuanify')
    
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#fcf9fe] font-sans">
        
        <!-- Card Box Putih -->
        <div class="w-full sm:max-w-md mt-6 px-8 py-8 bg-white shadow-md overflow-hidden sm:rounded-[24px] border border-purple-50">
            
            <!-- Judul & Deskripsi -->
            <div class="mb-6 text-center">
                <h2 class="text-2xl font-black text-gray-800 tracking-tight mb-2">Lupa <span class="text-[#df49a6]">Password?</span></h2>
                <div class="text-xs text-gray-500 leading-relaxed">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>
            </div>

            <!-- Status Notifikasi Sukses -->
            <x-auth-session-status class="mb-4 text-xs font-semibold text-emerald-600 bg-emerald-50 p-3 rounded-xl text-center shadow-sm" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Bagian Input Email -->
                <div>
                    <label for="email" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Alamat Email</label>
                    
                    <!-- PAKAI INPUT BIASA: Dijamin 100% Gak Bakal Terkunci/Disabled! -->
                    <input id="email" 
                           type="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           class="block w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-sm text-gray-800 focus:outline-none focus:border-[#b55fe6] focus:ring-1 focus:ring-[#b55fe6] transition shadow-sm" 
                           required 
                           autofocus />
                    
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs font-semibold text-pink-600" />
                </div>

                <!-- Tombol Submit Gradasi -->
                <div class="flex items-center justify-end mt-5">
                    <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center font-semibold bg-gradient-to-r from-[#b55fe6] to-[#df49a6] text-white rounded-xl hover:opacity-90 focus:outline-none transition text-sm shadow-sm">
                        {{ __('Email Password Reset Link') }}
                    </button>
                </div>
            </form>

            <!-- Link Balik ke Login -->
            <div class="mt-6 text-center">
                <a href="{{ route('login') }}" class="text-xs font-bold text-[#b55fe6] hover:text-[#df49a6] transition uppercase tracking-wider">
                    Kembali ke Login
                </a>
            </div>

        </div>
    </div>
</x-guest-layout>
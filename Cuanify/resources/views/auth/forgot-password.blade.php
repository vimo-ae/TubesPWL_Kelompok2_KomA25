<x-guest-layout>
    @section('title', 'Forgot Password - Cuanify')
    
    <div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0 bg-[#f8f6ff] font-sans">
        
        <div class="mb-5 transition-transform hover:scale-105">
            <img src="{{ asset('images/logo1.png') }}"
                alt="Logo Cuanify"
                class="w-28 sm:w-36 mx-auto drop-shadow-lg">
        </div>

        <div class="w-full sm:max-w-md px-10 py-10 bg-white shadow-[0_10px_30px_rgba(0,0,0,0.04)] overflow-hidden sm:rounded-[32px] border border-gray-100">
            
            <div class="mb-6 text-center">
                <h2 class="text-[22px] font-extrabold text-[#1e1b4b] tracking-tight mb-2">Forgot Password?</h2>
                <div class="text-[13px] text-[#6b7280] font-normal leading-relaxed px-2">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>
            </div>

            @if (session('status'))
                <x-auth-session-status class="mb-4 text-xs font-semibold text-emerald-600 bg-emerald-50 p-3 rounded-xl text-center shadow-sm" :status="session('status')" />
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-bold text-[#1e1b4b] mb-2">Email</label>
                    
                    <input id="email" 
                           type="email" 
                           name="email" 
                           placeholder="Masukkan email"
                           value="{{ old('email') }}" 
                           class="block w-full px-4 py-3.5 bg-white border-2 border-[#a855f7] rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:border-[#a855f7] focus:ring-0 transition shadow-sm" 
                           required 
                           autofocus />
                    
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs font-semibold text-red-500" />
                </div>

                <div class="mt-6">
                    <button type="submit" class="w-full py-3.5 px-4 inline-flex justify-center items-center font-bold bg-[#a855f7] text-white rounded-xl hover:bg-[#9333ea] focus:outline-none transition-all text-base shadow-sm">
                        {{ __('Email Password Reset Link') }}
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm font-medium text-[#6b7280]">
                    Sudah ingat password? 
                    <a href="{{ route('login') }}" class="font-bold text-[#a855f7] hover:text-[#9333ea] transition-all ml-1">
                        Login
                    </a>
                </p>
            </div>

        </div>
    </div>
</x-guest-layout>
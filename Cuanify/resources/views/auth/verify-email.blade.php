<x-guest-layout>
    @section('title', 'Verify Email - Cuanify')
    
    <div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0 bg-[#f8f6ff] font-sans">
        
        <div class="mb-5 transition-transform hover:scale-105">
            <img src="{{ asset('images/logo1.png') }}"
                alt="Logo Cuanify"
                class="w-28 sm:w-36 mx-auto drop-shadow-lg">
        </div>

        <div class="w-full sm:max-w-md px-10 py-10 bg-white shadow-[0_10px_30px_rgba(0,0,0,0.04)] overflow-hidden sm:rounded-[32px] border border-gray-100 text-center">
            
            <div class="mb-6">
                <h2 class="text-[22px] font-extrabold text-[#1e1b4b] tracking-tight mb-2">Verifikasi <span class="text-[#a855f7]">Email-mu</span></h2>
                <p class="text-[13px] text-[#6b7280] font-normal leading-relaxed px-1">
                    Terima kasih sudah mendaftar di <span class="font-bold text-[#a855f7]">Cuanify</span>! Sebelum mulai, tolong verifikasi akunmu dengan mengklik link yang baru saja kami kirimkan ke email-mu ya.
                </p>
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-6 p-3 bg-emerald-50 border border-emerald-100 rounded-xl text-xs font-semibold text-emerald-600 leading-relaxed shadow-sm">
                    Link verifikasi baru telah berhasil dikirimkan ke alamat email yang kamu daftarkan saat registrasi!
                </div>
            @endif

            <div class="space-y-8">
                <form method="POST" action="{{ route('verification.send') }}" style="margin: 0;">
                    @csrf
                    <button type="submit" class="w-full py-3.5 px-4 inline-flex justify-center items-center font-bold bg-[#a855f7] text-white rounded-xl hover:bg-[#9333ea] focus:outline-none transition-all text-base shadow-sm">
                        Kirim Ulang Email Verifikasi
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}" style="margin: 0;" class="pt-2">
                    @csrf
                    <button type="submit" class="text-sm font-bold text-[#a855f7] hover:text-[#9333ea] transition-all uppercase tracking-wider mb-2">
                        Keluar / Logout
                    </button>
                </form>
            </div>

        </div>
    </div>
</x-guest-layout>
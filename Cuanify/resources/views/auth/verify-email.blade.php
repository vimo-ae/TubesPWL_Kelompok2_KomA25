<x-guest-layout>
    @section('title', 'Verify Email - Cuanify')
    
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#fcf9fe] font-sans">
        <div class="w-full sm:max-w-md mt-6 px-8 py-8 bg-white shadow-md overflow-hidden sm:rounded-[24px] border border-purple-50 text-center">
            
            <!-- Icon Animasi Gimmick -->
            <div class="w-16 h-16 bg-purple-50 text-[#b55fe6] rounded-2xl flex items-center justify-center text-2xl mx-auto mb-5">
                <i class="fas fa-envelope-open-text"></i>
            </div>

            <!-- Judul -->
            <h2 class="text-2xl font-black text-gray-800 tracking-tight mb-3">Verifikasi <span class="text-[#b55fe6]">Email-mu</span></h2>
            
            <p class="text-xs text-gray-500 leading-relaxed mb-6">
                Terima kasih sudah mendaftar di <span class="font-bold text-[#df49a6]">Cuanify</span>! Sebelum mulai, tolong verifikasi akunmu dengan mengklik link yang baru saja kami kirimkan ke email-mu ya.
            </p>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-6 p-3 bg-emerald-50 rounded-xl text-xs font-semibold text-emerald-600 leading-relaxed">
                    Link verifikasi baru telah berhasil dikirimkan ke alamat email yang kamu daftarkan saat registrasi!
                </div>
            @endif

            <div class="space-y-4">
                <!-- Tombol Kirim Ulang Email -->
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center font-semibold bg-gradient-to-r from-[#b55fe6] to-[#df49a6] text-white rounded-xl hover:opacity-90 transition text-sm shadow-sm">
                        Kirim Ulang Email Verifikasi
                    </button>
                </form>

                <!-- Tombol Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-xs font-bold text-gray-400 hover:text-gray-600 transition uppercase tracking-wider">
                        Keluar / Logout
                    </button>
                </form>
            </div>

        </div>
    </div>
</x-guest-layout>
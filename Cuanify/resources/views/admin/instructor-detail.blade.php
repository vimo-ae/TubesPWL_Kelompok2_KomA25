<x-app-layout>
    @section('title', 'Detail Profil Instruktur - Cuanify')

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap');
        .detail-wrap { font-family: 'DM Sans', sans-serif; padding-bottom: 32px; }
        .back-link { display: inline-flex; align-items: center; gap: 6px; color: #6b7280; font-size: 14px; font-weight: 500; text-decoration: none; margin-bottom: 20px; transition: color 0.15s; }
        .back-link:hover { color: #a855f7; }
        .profile-card { background: #fff; border: 1px solid #ede9fe; border-radius: 24px; padding: 32px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); }
    </style>

    <div class="flex min-h-screen -mx-4 sm:-mx-6 lg:-mx-8 -mt-6">
        <div class="flex-1 p-6 lg:p-10">
            <div class="detail-wrap">
                
                <a href="{{ url('/admin/instructors') }}" class="back-link">
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/></svg>
                    Kembali ke Daftar Verifikasi
                </a>

                <div class="profile-card">
                    <div class="flex flex-col md:flex-row gap-8 items-start">
                        
                        <!-- Perbaikan Foto Profil menggunakan Storage::url jika upload dinamis -->
                        <div class="w-32 h-32 rounded-2xl overflow-hidden bg-gray-100 border-2 border-purple-100 flex-shrink-0 mx-auto md:mx-0">
                            <img src="{{ !empty($instructor->instructorProfile->profile_photo) ? Storage::url($instructor->instructorProfile->profile_photo) : asset('images/profile-default.jpg') }}" alt="Foto Profil" class="w-full h-full object-cover">
                        </div>

                        <div class="flex-1 text-center md:text-left w-full">
                            <span class="inline-block px-3 py-1 bg-amber-100 text-amber-700 font-bold text-[10px] uppercase tracking-wider rounded-full mb-2">
                                Status: {{ $instructor->status_instructor }}
                            </span>
                            <h2 class="text-2xl font-800 text-gray-900 tracking-tight mb-1">{{ $instructor->username }}</h2>
                            <p class="text-sm text-gray-500 mb-6">{{ $instructor->email }}</p>

                            <hr class="border-gray-100 mb-6">

                            <div class="mb-6">
                                <h4 class="text-xs font-700 text-gray-400 uppercase tracking-wider mb-2">Deskripsi / Biografi</h4>
                                <p class="text-sm text-gray-700 leading-relaxed bg-gray-50 p-4 rounded-xl border border-gray-100 text-left">
                                    {{ $instructor->instructorProfile->deskripsi ?? 'Tidak ada deskripsi yang ditulis.' }}
                                </p>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="p-4 border border-gray-100 rounded-xl bg-purple-50/30 text-left">
                                    <h4 class="text-xs font-700 text-purple-400 uppercase tracking-wider mb-1">LinkedIn</h4>
                                    @if(!empty($instructor->instructorProfile->linkedin))
                                        <a href="{{ $instructor->instructorProfile->linkedin }}" target="_blank" class="text-sm font-600 text-purple-700 hover:underline inline-flex items-center gap-1">
                                            Kunjungi LinkedIn 
                                            <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" /></svg>
                                        </a>
                                    @else
                                        <p class="text-sm text-gray-400 italic">Tautan tidak dicantumkan</p>
                                    @endif
                                </div>

                                <div class="p-4 border border-gray-100 rounded-xl bg-pink-50/30 text-left">
                                    <h4 class="text-xs font-700 text-pink-400 uppercase tracking-wider mb-1">Curriculum Vitae (CV)</h4>
                                    @if(!empty($instructor->instructorProfile->cv))
                                        <!-- PERBAIKAN DI SINI: Menggunakan Storage::url -->
                                        <a href="{{ Storage::url($instructor->instructorProfile->cv) }}" target="_blank" class="text-sm font-600 text-pink-700 hover:underline inline-flex items-center gap-1">
                                            Buka / Unduh Berkas CV
                                            <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" /></svg>
                                        </a>
                                    @else
                                        <p class="text-sm text-gray-400 italic">Berkas tidak diunggah</p>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
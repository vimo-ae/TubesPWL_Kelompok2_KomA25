<x-app-layout>
    @section('title', 'Detail Profil Instruktur - Cuanify')

    <div class="p-6 sm:p-8 lg:p-10 max-w-5xl mx-auto space-y-8 relative overflow-hidden">
        
        {{-- Elemen Dekorasi Latar Belakang (Meriah & Estetik) --}}
        <div class="absolute top-0 left-1/4 w-72 h-72 bg-purple-200/30 rounded-full blur-3xl -z-10 pointer-events-none animate-pulse"></div>
        <div class="absolute bottom-10 right-10 w-60 h-60 bg-pink-200/20 rounded-full blur-3xl -z-10 pointer-events-none"></div>

        {{-- Tombol Kembali --}}
        <div>
            <a href="{{ url('/admin/instructors') }}" class="inline-flex items-center gap-2 text-gray-500 hover:text-purple-600 font-bold text-sm transition-all group bg-white px-4 py-2 rounded-full shadow-sm border border-purple-50/50">
                <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/>
                </svg>
                Kembali ke Daftar Verifikasi
            </a>
        </div>

        {{-- Main Wrapper Card --}}
        <div class="bg-white/80 backdrop-blur-md p-6 sm:p-10 rounded-[36px] shadow-md border border-purple-100/80 shadow-purple-900/[0.03] transition-all relative">
            
            <div class="flex flex-col md:flex-row gap-8 items-center md:items-start">
                
                {{-- SISI KIRI: Foto Profil Bersih dengan Bingkai Lingkaran Glow (Bulat Sempurna Tanpa Badge) --}}
                <div class="relative p-1.5 rounded-full bg-gradient-to-tr from-[#b55fe6] via-[#e84393] to-[#ff758c] shadow-lg shadow-purple-500/20 flex-shrink-0 group hover:scale-105 transition-transform duration-300">
                    <div class="w-36 h-36 rounded-full overflow-hidden bg-white p-1">
                        @if($instructor->instructorProfile && $instructor->instructorProfile->profile_photo && Storage::disk('public')->exists($instructor->instructorProfile->profile_photo))
                            <img src="{{ Storage::url($instructor->instructorProfile->profile_photo) }}" alt="Foto Profil" class="w-full h-full object-cover rounded-full">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-purple-50 to-pink-50 rounded-full flex items-center justify-center text-purple-500 font-black text-4xl">
                                {{ strtoupper(substr($instructor->username, 0, 1)) }}
                            </div>
                        @endif
                    </div>
                </div>

                {{-- SISI KANAN: Detail Konten & Info --}}
                <div class="flex-1 text-center md:text-left w-full space-y-6">
                    <div>
                        {{-- Badge Status Dinamis Berwarna Cerah --}}
                        @php
                            $status = strtolower($instructor->status_instructor ?? 'pending');
                            $statusClasses = [
                                'approved' => 'bg-green-500 text-white border-transparent shadow-green-500/20',
                                'rejected' => 'bg-red-500 text-white border-transparent shadow-red-500/20',
                                'pending' => 'bg-gradient-to-r from-amber-400 to-orange-500 text-white border-transparent shadow-orange-500/20'
                            ][$status] ?? 'bg-gray-500 text-white';
                        @endphp
                        
                        <span class="inline-flex items-center gap-1.5 px-4 py-1.5 {{ $statusClasses }} font-extrabold text-[11px] uppercase tracking-widest rounded-full mb-3 shadow-md">
                            <span class="w-2 h-2 rounded-full bg-white animate-ping"></span>
                            {{ $instructor->status_instructor ?? 'Pending' }}
                        </span>

                        {{-- Nama User dengan Efek Gradasi Berkilau --}}
                        <h2 class="text-4xl font-black tracking-tight mb-1 bg-gradient-to-r from-[#8e44ad] via-[#e84393] to-[#ff758c] bg-clip-text text-transparent">
                            {{ $instructor->username }}
                        </h2>
                        
                        <p class="text-sm text-gray-400 flex items-center justify-center md:justify-start gap-1.5 font-medium">
                            <svg class="w-4 h-4 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206" />
                            </svg>
                            {{ $instructor->email }}
                        </p>
                    </div>

                    <hr class="border-purple-50">

                    {{-- Section: Deskripsi Biografi --}}
                    <div class="space-y-2">
                        <h4 class="text-xs font-black text-purple-900/40 uppercase tracking-widest flex items-center justify-center md:justify-start gap-1.5">
                            🚀 Tentang Instruktur
                        </h4>
                        <div class="text-sm text-gray-600 leading-relaxed bg-gradient-to-b from-gray-50 to-white p-5 rounded-2xl border border-purple-100/40 text-left whitespace-pre-line shadow-inner">
                            {{ $instructor->instructorProfile->deskripsi ?? 'Instruktur belum menuliskan deskripsi profil hangat mereka.' }}
                        </div>
                    </div>

                    {{-- Section: Berkas Tautan Utama --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                        
                        {{-- LinkedIn Card --}}
                        <div class="p-4 border border-purple-100 bg-gradient-to-br from-purple-50/30 via-white to-transparent rounded-2xl text-left flex items-center gap-4 group hover:-translate-y-1 hover:shadow-md hover:border-purple-300 transition-all duration-300">
                            <div class="p-3 bg-purple-600 text-white rounded-2xl shadow-md shadow-purple-500/20">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.8v8.37h2.8v-4.67c0-.25.015-.51.09-.69a1.14 1.14 0 0 1 1-.74c.76 0 1 .52 1 1.3v4.8h2.8M6.5 8.37a1.37 1.37 0 1 0 0-2.75 1.37 1.37 0 0 0 0 2.75M8 18.5V10.13H5V18.5h3z"/>
                                </svg>
                            </div>
                            <div class="space-y-0.5">
                                <h4 class="text-[10px] font-black text-purple-400 uppercase tracking-widest">Koneksi Profesional</h4>
                                @if(!empty($instructor->instructorProfile->linkedin))
                                    <a href="{{ $instructor->instructorProfile->linkedin }}" target="_blank" class="text-sm font-bold text-purple-700 hover:text-purple-900 flex items-center gap-1 group">
                                        Profil LinkedIn
                                        <svg class="w-3.5 h-3.5 transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" /></svg>
                                    </a>
                                @else
                                    <p class="text-xs text-gray-400 italic">Belum menautkan link</p>
                                @endif
                            </div>
                        </div>

                        {{-- CV Card --}}
                        <div class="p-4 border border-pink-100 bg-gradient-to-br from-pink-50/30 via-white to-transparent rounded-2xl text-left flex items-center gap-4 group hover:-translate-y-1 hover:shadow-md hover:border-pink-300 transition-all duration-300">
                            <div class="p-3 bg-gradient-to-r from-[#e84393] to-[#ff758c] text-white rounded-2xl shadow-md shadow-pink-500/20">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div class="space-y-0.5">
                                <h4 class="text-[10px] font-black text-pink-400 uppercase tracking-widest">Portofolio & Pengalaman</h4>
                                @if(!empty($instructor->instructorProfile->cv))
                                    <a href="{{ Storage::url($instructor->instructorProfile->cv) }}" target="_blank" class="text-sm font-bold text-pink-700 hover:text-pink-900 flex items-center gap-1">
                                        Unduh Berkas CV
                                        <svg class="w-3.5 h-3.5 animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3" /></svg>
                                    </a>
                                @else
                                    <p class="text-xs text-gray-400 italic">Berkas belum diunggah</p>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
                
            </div>
        </div>

    </div>
</x-app-layout>
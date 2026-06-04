<x-app-layout>
    <div class="flex min-h-screen -mx-4 sm:-mx-6 lg:-mx-8 -mt-6">
        
        @include('admin.partials.sidebar')
        
        <div class="flex-1 p-4 sm:p-6 lg:p-10 min-w-0 w-full space-y-6 cat-wrap">
            
            <style>
            @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap');
            .cat-wrap { font-family:'DM Sans', sans-serif; }

            /* HERO BANNER UNIFORM STYLE */
            .admin-hero { 
                background: linear-gradient(135deg, #a855f7, #ec4899); 
                border-radius: 24px; 
                padding: 36px 40px; 
                margin-bottom: 24px; 
                position: relative; 
                overflow: hidden; 
                box-shadow: 0 10px 25px -5px rgba(168, 85, 247, 0.15);
            }
            .admin-hero::before { content:''; position:absolute; width:180px; height:180px; background:rgba(255,255,255,.08); border-radius:50%; top:-50px; right:40px; }
            .admin-hero::after  { content:''; position:absolute; width:100px; height:100px; background:rgba(255,255,255,.06); border-radius:50%; bottom:-20px; right:160px; }
            
            .hero-badge { 
                display: inline-flex; 
                align-items: center; 
                gap: 6px; 
                background: rgba(255,255,255,.18); 
                border: 1px solid rgba(255,255,255,.25); 
                backdrop-filter: blur(4px); 
                padding: 6px 14px; 
                border-radius: 99px; 
                font-size: 11px; 
                font-weight: 700; 
                color: #fff; 
                text-transform: uppercase; 
                letter-spacing: .06em; 
                margin-bottom: 14px; 
            }
            .hero-title { 
                font-family: 'DM Sans', sans-serif; 
                font-size: 32px; 
                font-weight: 800; 
                color: #fff; 
                margin: 0 0 8px; 
                position: relative; 
                z-index: 1; 
                letter-spacing: -0.02em;
            }
            .hero-title span { color:#fde68a; }
            .hero-desc { 
                font-size: 14px; 
                color: rgba(255,255,255,.85); 
                margin: 0; 
                position: relative; 
                z-index: 1; 
                font-weight: 400;
            }
            </style>

            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <a href="{{ route('admin.dashboard') }}" class="inline-block text-purple-600 hover:text-purple-800 font-medium transition-all text-sm sm:text-base">
                    ← Kembali ke Dashboard
                </a>
            </div>

            {{-- HERO BANNER --}}
            <div class="admin-hero">
                <div class="hero-badge">
                    <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" style="display:inline; margin-right:2px; vertical-align:text-top;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>
                    Kelola Pengguna
                </div>
                <h1 class="hero-title">Verifikasi Pengguna <span>Cuanify</span></h1>
                <p class="hero-desc">Pantau hak akses, kelola data akun murid, serta instruktur aktif yang terdaftar di dalam platform ekosistem digital.</p>
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-2 gap-8 w-full">

                {{-- DAFTAR MURID UTAMA --}}
                <div class="bg-white rounded-[24px] shadow-xl border border-purple-100/40 overflow-hidden flex flex-col h-full">
                    <div class="p-5 bg-gradient-to-r from-purple-700 to-indigo-700 flex items-center justify-between">
                        <div>
                            <h2 class="text-base font-extrabold text-white flex items-center gap-2">
                                <svg class="w-5 h-5 text-pink-200" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M12 21v-3.417m0 0a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5Z" />
                                </svg>
                                Daftar Murid Utama
                            </h2>
                            <p class="text-[11px] text-purple-100 mt-0.5">Siswa yang terdaftar dan memiliki akses belajar.</p>
                        </div>
                    </div>

                    <div class="overflow-x-auto flex-grow w-full">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-100 text-[10px] font-bold text-gray-500 uppercase tracking-wider">
                                    <th class="p-4 pl-6">Username / Nama</th>
                                    <th class="p-4">Email</th>
                                    <th class="p-4 text-center pr-6">Tindakan</th>
                                </tr>
                            </table>
                            <tbody class="divide-y divide-gray-50 text-xs text-gray-700">
                                @forelse ($students ?? [] as $student)
                                    <tr class="hover:bg-pink-50/20 transition">
                                        <td class="p-4 pl-6 font-semibold text-gray-800">
                                            {{ $student->username ?? $student->name }}
                                        </td>
                                        <td class="p-4 text-gray-500">
                                            {{ $student->email }}
                                        </td>
                                        <td class="p-4 text-center pr-6">
                                            <form action="/admin/users/delete/{{ $student->id }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menonaktifkan pengguna ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="px-3 py-1.5 bg-gray-50 hover:bg-rose-50 text-gray-500 hover:text-rose-600 rounded-lg text-[11px] font-bold transition">
                                                    Suspended
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="p-12 text-center">
                                            <div class="flex flex-col items-center justify-center py-6 text-gray-400">
                                                <div class="w-12 h-12 rounded-2xl bg-pink-50 flex items-center justify-center text-pink-500 mb-3">
                                                    <svg class="w-6 h-6 stroke-[1.5]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M12 21v-3.417m0 0a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5Z" />
                                                    </svg>
                                                </div>
                                                <p class="text-xs font-bold">Belum ada murid yang terdaftar</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- INSTRUKTUR TERVERIFIKASI --}}
                <div class="bg-white rounded-[24px] shadow-xl border border-purple-100/40 overflow-hidden flex flex-col h-full">
                    <div class="p-5 bg-gradient-to-r from-purple-700 to-indigo-700 flex items-center justify-between">
                        <div>
                            <h2 class="text-base font-extrabold text-white flex items-center gap-2">
                                <svg class="w-5 h-5 text-purple-200" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M12 21v-3.417m0 0a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5Z" />
                                </svg>
                                Instruktur Terverifikasi
                            </h2>
                            <p class="text-[11px] text-purple-100 mt-0.5">Daftar pengajar resmi di platform Anda.</p>
                        </div>
                    </div>

                    <div class="overflow-x-auto flex-grow w-full">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-100 text-[10px] font-bold text-gray-500 uppercase tracking-wider">
                                    <th class="p-4 pl-6">Username / Nama</th>
                                    <th class="p-4">Email</th>
                                    <th class="p-4 text-center pr-6">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50 text-xs text-gray-700">
                                @forelse ($allApprovedInstructors ?? [] as $inst)
                                    <tr class="hover:bg-purple-50/20 transition">
                                        <td class="p-4 pl-6 font-semibold text-gray-800">
                                            {{ $inst->username }}
                                        </td>
                                        <td class="p-4 text-gray-500">
                                            {{ $inst->email }}
                                        </td>
                                        <td class="p-4 text-center pr-6">
                                            <form action="/admin/instructors/revoke/{{ $inst->user_id }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin mencabut akses instruktur ini?')">
                                                @csrf
                                                <button class="px-3 py-1.5 bg-rose-50 hover:bg-rose-100 text-rose-600 rounded-lg text-[11px] font-bold transition">
                                                    Revoke Access
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="p-12 text-center">
                                            <div class="flex flex-col items-center justify-center py-6 text-gray-400">
                                                <div class="w-12 h-12 rounded-2xl bg-purple-50 flex items-center justify-center text-purple-500 mb-3">
                                                    <svg class="w-6 h-6 stroke-[1.5]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 .414-.336.75-.75.75H4.5a.75.75 0 0 1-.75-.75V14.15M20.25 14.15a15.02 15.02 0 0 0-3.303-1.879m3.303 1.879a2.25 2.25 0 0 1-1.913 2.417 10.516 10.516 0 0 1-12.268 0 2.25 2.25 0 0 1-1.913-2.417M20.25 14.15v-3.132c0-.735-.445-1.399-1.125-1.688a14.938 14.938 0 0 0-14.25 0c-.68.29-1.125.953-1.125 1.688v3.132M4.5 14.15a15.02 15.02 0 0 1 3.303-1.879m0 0A10.517 10.517 0 0 1 12 11.25c1.47 0 2.873.303 4.147.851M12 9a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5Z" />
                                                    </svg>
                                                </div>
                                                <p class="text-xs font-bold">Belum ada pengajar terverifikasi</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div> 
    </div>

    <style>
        aside a:hover, 
        nav a:hover,
        aside button:hover,
        nav button:hover {
            background: linear-gradient(to right, #ec4899, #d946ef, #a855f7) !important;
            color: #ffffff !important;
            box-shadow: 0 10px 15px -3px rgba(168, 85, 247, 0.4);
            transform: translateY(-1px);
            transition: all 0.3s ease;
        }
    </style>
</x-app-layout>
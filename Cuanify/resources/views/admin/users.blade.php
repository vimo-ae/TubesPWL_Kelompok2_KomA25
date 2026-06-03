<x-app-layout>
    <div class="flex min-h-screen bg-[#fcf9fe] -mx-4 sm:-mx-6 lg:-mx-8 -mt-6">
        
        @include('admin.partials.sidebar')
        
        <div class="flex-1 p-4 sm:p-6 lg:p-8 min-w-0 w-full space-y-8">
            
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 custom-header-spacing">
                <a href="{{ route('admin.dashboard') }}" class="inline-block text-indigo-600 hover:text-indigo-800 font-medium transition-all text-sm sm:text-base">
                    ← Kembali ke Dashboard
                </a>
            </div>

            <div class="relative overflow-hidden rounded-[35px] bg-gradient-to-br from-fuchsia-600 via-purple-600 to-indigo-700 shadow-2xl min-h-[180px] flex items-center w-full">
                <div class="absolute top-[-50px] right-[-50px] w-80 h-80 bg-white/10 blur-[80px] rounded-full"></div>
                <div class="absolute bottom-[-20px] right-[5%] w-32 h-32 border-[15px] border-white/5 rounded-full"></div>
                <div class="relative z-10 w-full flex flex-col md:flex-row items-center justify-between px-10 md:px-16 py-6">
                    <div class="w-full md:w-2/3 text-white">
                        <div class="inline-flex items-center gap-1.5 bg-white/20 backdrop-blur-md px-3 py-1 rounded-full text-[10px] font-bold tracking-widest uppercase mb-3 border border-white/30">
                            <svg class="w-3 h-3 text-purple-200" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                            </svg>
                            User Management
                        </div>
                        <h1 class="text-3xl font-extrabold tracking-tight mb-2">
                            Kelola Pengguna <span class="text-yellow-300">Cuanify</span>
                        </h1>
                        <p class="text-purple-100 text-xs max-w-md opacity-90 leading-relaxed">
                            Pantau hak akses, kelola data akun murid, serta instruktur aktif yang terdaftar di dalam platform ekosistem digital.
                        </p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-2 gap-8 w-full">

                <div class="bg-white rounded-[30px] shadow-xl border border-purple-100/30 overflow-hidden flex flex-col h-full">
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
                            </thead>
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

                <div class="bg-white rounded-[30px] shadow-xl border border-purple-100/30 overflow-hidden flex flex-col h-full">
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
<x-app-layout>
    <div class="flex min-h-screen -mx-4 sm:-mx-6 lg:-mx-8 -mt-6">
        
        <div class="flex-1 p-4 sm:p-6 lg:p-10 min-w-0 w-full space-y-6 cat-wrap">
            
            <style>
            @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap');
            .cat-wrap { font-family:'DM Sans', sans-serif; }
            </style>

            <div class="relative overflow-hidden rounded-[30px] bg-gradient-to-r from-[#b55fe6] via-[#df49a6] to-[#e84393] shadow-md min-h-[190px] flex items-center w-full">
                <div class="absolute right-0 top-0 bottom-0 w-1/2 overflow-hidden pointer-events-none">
                    <div class="absolute w-64 h-64 bg-white/10 rounded-full -right-10 -top-16 blur-sm"></div>
                    <div class="absolute w-40 h-40 bg-white/5 rounded-full right-16 -bottom-12 blur-sm"></div>
                </div>
                <div class="relative z-10 w-full flex flex-col justify-center px-10 py-8 text-white">
                    <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md px-4 py-1.5 rounded-full text-[10px] font-bold tracking-wider uppercase mb-4 border border-white/20 w-fit">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg>
                        Kelola Pengguna
                    </div>
                    <h1 class="text-3xl font-semibold tracking-normal mb-3 text-white">
                        Verifikasi Pengguna <span class="text-[#f7e06d] font-bold">Cuanify</span>
                    </h1>
                    <p class="text-white/90 text-[13px] max-w-4xl font-normal leading-relaxed">
                        Pantau hak akses, kelola data akun murid, serta instruktur aktif yang terdaftar di dalam platform ekosistem digital.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-2 gap-8 w-full">

                {{-- DAFTAR MURID UTAMA --}}
                <div class="bg-white rounded-[24px] shadow-xl border border-purple-100/40 overflow-hidden flex flex-col h-full">
                    <div class="p-5 bg-gradient-to-r from-[#b55fe6] to-[#e84393] flex items-center justify-between">
                        <div>
                            <h2 class="text-base font-extrabold text-white flex items-center gap-2">
                                <svg class="w-5 h-5 text-white/80" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M12 21v-3.417m0 0a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5Z" />
                                </svg>
                                Daftar Murid
                            </h2>
                            <p class="text-[11px] text-white/70 mt-0.5">Siswa yang terdaftar dan memiliki akses belajar.</p>
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
                                        <td class="p-4 text-gray-500">{{ $student->email }}</td>
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
                                        <td colspan="3" class="py-16 text-center text-sm font-medium text-gray-400">
                                            Belum ada murid yang terdaftar.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- INSTRUKTUR TERVERIFIKASI --}}
                <div class="bg-white rounded-[24px] shadow-xl border border-purple-100/40 overflow-hidden flex flex-col h-full">
                    <div class="p-5 bg-gradient-to-r from-[#b55fe6] to-[#e84393] flex items-center justify-between">
                        <div>
                            <h2 class="text-base font-extrabold text-white flex items-center gap-2">
                                <svg class="w-5 h-5 text-white/80" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M12 21v-3.417m0 0a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5Z" />
                                </svg>
                                Daftar Instruktur
                            </h2>
                            <p class="text-[11px] text-white/70 mt-0.5">Daftar pengajar resmi di platform Anda.</p>
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
                                        <td class="p-4 pl-6 font-semibold text-gray-800">{{ $inst->username }}</td>
                                        <td class="p-4 text-gray-500">{{ $inst->email }}</td>
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
                                        <td colspan="3" class="py-16 text-center text-sm font-medium text-gray-400">
                                            Belum ada pengajar terverifikasi.
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
</x-app-layout>
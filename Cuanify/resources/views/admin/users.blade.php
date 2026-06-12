<x-app-layout>

    @section('title', 'Users - Cuanify')

    <div class="flex min-h-screen">
        
        <div class="flex-1 p-4 sm:p-6 lg:p-10 min-w-0 w-full space-y-6 cat-wrap">
            
            <style>
                @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap');
                .cat-wrap { font-family:'DM Sans', sans-serif; }
            </style>

            <div class="relative overflow-hidden rounded-[35px] bg-gradient-to-r from-[#b55fe6] via-[#df49a6] to-[#e84393] shadow-md min-h-[190px] flex items-center w-full">

                <div class="absolute right-0 top-0 bottom-0 w-1/2 pointer-events-none">
                    <div class="absolute w-64 h-64 bg-white/10 rounded-full -right-10 -top-16 blur-sm"></div>
                    <div class="absolute w-40 h-40 bg-white/5 rounded-full right-16 -bottom-12 blur-sm"></div>
                </div>

                <div class="relative z-10 w-full flex flex-col justify-center px-6 sm:px-10 py-8 text-white">

                    <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md px-4 py-1.5 rounded-full text-[10px] font-bold tracking-wider uppercase mb-4 border border-white/20 w-fit">

                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg>

                        Kelola Pengguna
                    </div>

                    <h1 class="text-2xl sm:text-3xl font-semibold mb-3">
                        Verifikasi Pengguna <span class="text-[#f7e06d] font-bold">Cuanify</span>
                    </h1>

                    <p class="text-white/90 text-xs sm:text-[13px] max-w-3xl leading-relaxed">
                        Pantau hak akses, kelola akun murid dan instruktur dalam sistem platform.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 lg:gap-8 w-full">

                <div class="bg-white rounded-2xl shadow-xl border border-purple-100/40 overflow-hidden flex flex-col">

                    <div class="p-5 bg-gradient-to-r from-[#b55fe6] to-[#e84393] flex items-center gap-2 text-white">

                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3z"/>
                        </svg>

                        <div>
                            <h2 class="font-bold text-sm sm:text-base">Daftar Murid</h2>
                            <p class="text-[11px] text-white/70">Siswa terdaftar di platform</p>
                        </div>
                    </div>

                    <div class="overflow-x-auto w-full">
                        <table class="w-full text-left text-xs">

                            <thead class="bg-gray-50 text-[10px] text-gray-500 uppercase">
                                <tr>
                                    <th class="p-4 pl-6">Username</th>
                                    <th class="p-4">Email</th>
                                    <th class="p-4 text-center pr-6">Aksi</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-100">

                                @forelse ($students as $student)

                                    <tr class="hover:bg-pink-50/30 transition">

                                        <td class="p-4 pl-6 font-semibold text-gray-800">
                                            {{ $student->username ?? $student->name }}
                                        </td>

                                        <td class="p-4 text-gray-500">
                                            {{ $student->email }}
                                        </td>

                                        <td class="p-4 text-center pr-6">
                                            <div class="flex justify-center">
                                                <a href="{{ route('admin.users.show', $student->id ?? $student->user_id) }}"
                                                   class="inline-flex items-center gap-1 bg-indigo-50 text-indigo-600 hover:bg-indigo-600 hover:text-white px-3 py-1.5 rounded-lg text-[11px] font-bold transition">
                                                    Detail
                                                </a>
                                            </div>
                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="3" class="py-14 text-center text-gray-400 text-sm">
                                            Tidak ada data murid
                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-xl border border-purple-100/40 overflow-hidden flex flex-col">

                    <div class="p-5 bg-gradient-to-r from-[#b55fe6] to-[#e84393] flex items-center gap-2 text-white">

                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zM6 20v-2c0-2.21 3.58-4 6-4s6 1.79 6 4v2H6z"/>
                        </svg>

                        <div>
                            <h2 class="font-bold text-sm sm:text-base">Daftar Instruktur</h2>
                            <p class="text-[11px] text-white/70">Pengajar resmi platform</p>
                        </div>
                    </div>

                    <div class="overflow-x-auto w-full">

                        <table class="w-full text-left text-xs">

                            <thead class="bg-gray-50 text-[10px] text-gray-500 uppercase">
                                <tr>
                                    <th class="p-4 pl-6">Username</th>
                                    <th class="p-4">Email</th>
                                    <th class="p-4 text-center pr-6">Aksi</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-100">

                                @forelse ($allApprovedInstructors as $inst)

                                    <tr class="hover:bg-purple-50/30 transition">

                                        <td class="p-4 pl-6 font-semibold text-gray-800">
                                            {{ $inst->username ?? $inst->name }}
                                        </td>

                                        <td class="p-4 text-gray-500">
                                            {{ $inst->email }}
                                        </td>

                                        <td class="p-4 text-center pr-6">
                                            <div class="flex justify-center">
                                                <a href="{{ route('admin.users.show', $inst->id ?? $inst->user_id) }}"
                                                   class="inline-flex items-center gap-1 bg-indigo-50 text-indigo-600 hover:bg-indigo-600 hover:text-white px-3 py-1.5 rounded-lg text-[11px] font-bold transition">
                                                    Detail
                                                </a>
                                            </div>
                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="3" class="py-14 text-center text-gray-400 text-sm">
                                            Tidak ada instruktur terverifikasi
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
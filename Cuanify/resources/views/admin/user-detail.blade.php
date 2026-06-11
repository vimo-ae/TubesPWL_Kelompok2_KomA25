<x-app-layout>

    @section('title', 'User Detail - Cuanify')
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Pengguna
        </h2>
    </x-slot>

    <div class="p-6 sm:p-8 lg:p-10 max-w-5xl mx-auto space-y-6">

        <div>
            <a href="javascript:history.back()" class="inline-flex items-center gap-2 text-purple-600 hover:text-purple-800 font-semibold text-sm transition-all group">
                <span class="transform group-hover:-translate-x-1 transition-transform">←</span> Kembali ke Daftar
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-2xl text-sm flex items-center gap-3 shadow-sm animate-fade-in">
                <i class="fas fa-check-circle text-green-500 text-base"></i>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white p-6 sm:p-8 rounded-[30px] shadow-sm border border-purple-100/60 flex flex-col md:flex-row gap-8 items-start">
            
            <div class="flex-1 w-full">
                <div class="w-24 h-24 bg-gradient-to-br from-[#b55fe6]/20 to-[#e84393]/20 text-purple-700 rounded-3xl flex items-center justify-center text-4xl font-extrabold mb-5 shadow-inner">
                    {{ strtoupper(substr($userDetail->username, 0, 1)) }}
                </div>
                
                <h1 class="text-3xl font-extrabold text-gray-800 mb-1 tracking-tight">{{ $userDetail->username }}</h1>
                <p class="text-gray-400 text-sm mb-6 flex items-center gap-1.5">
                    <i class="fas fa-envelope text-purple-300"></i> {{ $userDetail->email }}
                </p>
                
                <div class="border-t border-gray-50 pt-5 space-y-3.5 text-sm text-gray-600">
                    <div class="flex justify-between sm:justify-start sm:gap-10 border-b border-gray-50 pb-2">
                        <span class="text-gray-400 w-28">Role Akun</span>
                        <span class="capitalize font-bold bg-purple-50 text-purple-700 px-2.5 py-0.5 rounded-lg text-xs border border-purple-100">{{ $userDetail->role }}</span>
                    </div>
                    <div class="flex justify-between sm:justify-start sm:gap-10 border-b border-gray-50 pb-2">
                        <span class="text-gray-400 w-28">Terdaftar</span>
                        <span class="font-semibold text-gray-700">{{ $userDetail->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="flex justify-between sm:justify-start sm:gap-10 pb-1">
                        <span class="text-gray-400 w-28">Terakhir Login</span>
                        <span class="font-semibold text-gray-700">
                            {{ $userDetail->last_login ? \Carbon\Carbon::parse($userDetail->last_login)->diffForHumans() : 'Belum pernah login' }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-[400px] bg-purple-50/40 p-6 rounded-2xl border border-purple-100/60" x-data="{ selectedStatus: '{{ $userDetail->status }}' }">
                <h3 class="text-base font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fas fa-user-shield text-purple-500"></i> Kontrol Akses Akun
                </h3>
                
                <form action="{{ route('admin.users.update_status', $userDetail->user_id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Pilih Status</label>
                        <select name="status" x-model="selectedStatus" 
                            class="w-full border-gray-200 rounded-xl bg-white px-4 py-2.5 text-sm text-gray-700 focus:ring-2 focus:ring-purple-300 focus:border-purple-400 outline-none transition shadow-sm">
                            <option value="active">🟢 Active (Aktif)</option>
                            <option value="inactive">⚪ Inactive (Non-Aktif)</option>
                            <option value="banned">🔴 Banned (Ditangguhkan)</option>
                        </select>
                    </div>

                    <div x-show="selectedStatus === 'banned'" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-y-2" class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Durasi Penangguhan</label>
                            <select name="ban_duration" 
                                class="w-full border-gray-200 rounded-xl bg-white px-4 py-2.5 text-sm text-gray-700 focus:ring-2 focus:ring-purple-300 focus:border-purple-400 outline-none transition shadow-sm">
                                <option value="1">1 Hari</option>
                                <option value="3">3 Hari</option>
                                <option value="7">1 Minggu</option>
                                <option value="30">1 Bulan</option>
                                <option value="9999">Permanen (Selamanya)</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Alasan Banned (Opsional)</label>
                            <textarea name="ban_reason" rows="3" 
                                class="w-full border-gray-200 rounded-xl bg-white px-4 py-3 text-sm text-gray-700 focus:ring-2 focus:ring-purple-300 focus:border-purple-400 outline-none transition resize-none shadow-sm placeholder:text-gray-300" 
                                placeholder="Tuliskan pelanggaran atau alasan pemblokiran akun..."></textarea>
                        </div>
                    </div>

                    @if($userDetail->banned_until && $userDetail->banned_until > now())
                        <div class="p-3.5 bg-red-50 border border-red-100 text-red-700 text-xs rounded-xl flex items-start gap-2.5">
                            <i class="fas fa-exclamation-triangle mt-0.5 shrink-0 text-red-500"></i>
                            <div>
                                <span class="font-bold block mb-0.5">Akun Sedang Ditangguhkan</span>
                                Terkunci hingga: {{ \Carbon\Carbon::parse($userDetail->banned_until)->format('d M Y (H:i)') }}
                            </div>
                        </div>
                    @endif

                    <div class="pt-2">
                        <button type="submit" 
                            class="w-full bg-gradient-to-r from-[#b55fe6] to-[#e84393] hover:from-[#a24cd3] hover:to-[#d63281] text-white px-4 py-3 rounded-xl font-bold text-sm transition shadow-md hover:shadow-lg active:scale-[0.99] transform">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</x-app-layout>
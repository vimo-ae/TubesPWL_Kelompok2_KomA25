<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Pengguna
        </h2>
    </x-slot>

    <div class="p-6 max-w-4xl mx-auto">
        <a href="javascript:history.back()" class="inline-block mb-6 text-indigo-600 hover:text-indigo-800 font-medium transition-all">
            ← Kembali
        </a>

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-r">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex flex-col md:flex-row gap-8">
            <div class="flex-1">
                <div class="w-24 h-24 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center text-4xl font-bold mb-4">
                    {{ strtoupper(substr($user->username, 0, 1)) }}
                </div>
                <h1 class="text-3xl font-extrabold text-gray-800 mb-2">{{ $user->username }}</h1>
                <p class="text-gray-500 mb-4">{{ $user->email }}</p>
                
                <div class="space-y-2 text-sm text-gray-600">
                    <p><strong>Role:</strong> <span class="capitalize">{{ $user->role }}</span></p>
                    <p><strong>Terdaftar:</strong> {{ $user->created_at->format('d M Y') }}</p>
                    <p><strong>Terakhir Login:</strong> {{ $user->last_login ? \Carbon\Carbon::parse($user->last_login)->diffForHumans() : 'Belum pernah' }}</p>
                </div>
            </div>

            <div class="flex-1 bg-gray-50 p-6 rounded-2xl border border-gray-200" x-data="{ selectedStatus: '{{ $user->status }}' }">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Ubah Status Akun</h3>
                
                <form action="{{ route('admin.users.update_status', $user->user_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Pilih Status</label>
                        <select name="status" x-model="selectedStatus" class="w-full border-gray-300 rounded-xl focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="banned">Banned</option>
                        </select>
                    </div>

                    <div class="mb-6" x-show="selectedStatus === 'banned'" x-cloak>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Durasi Banned</label>
                        <select name="ban_duration" class="w-full border-gray-300 rounded-xl focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="1">1 Hari</option>
                            <option value="3">3 Hari</option>
                            <option value="7">1 Minggu</option>
                            <option value="30">1 Bulan</option>
                            <option value="9999">Permanen</option>
                        </select>
                    </div>

                    <div class="mb-6" x-show="selectedStatus === 'banned'" x-cloak>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Alasan Banned (Opsional)</label>
                            <textarea name="ban_reason" rows="3" class="w-full border-gray-300 rounded-xl focus:ring-indigo-500 focus:border-indigo-500" placeholder="Tulis alasan pelanggaran di sini..."></textarea>
                    </div>

                    @if($user->banned_until && $user->banned_until > now())
                        <div class="mb-4 p-3 bg-red-100 text-red-700 text-sm rounded-xl">
                            <strong>Status:</strong> Sedang dibanned sampai {{ \Carbon\Carbon::parse($user->banned_until)->format('d M Y H:i') }}
                        </div>
                    @endif

                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-3 rounded-xl font-bold transition shadow-sm">
                        Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
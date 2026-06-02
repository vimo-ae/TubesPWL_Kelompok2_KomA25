<x-app-layout>
    <div class="flex min-h-screen bg-[#fcf9fe] -mx-4 sm:-mx-6 lg:-mx-8 -mt-6">
        
        @include('admin.partials.sidebar')
        
        <div class="flex-1 p-6 lg:p-10">

            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-extrabold text-gray-800">{{ $title }}</h1>
                <span class="bg-indigo-100 text-indigo-800 px-4 py-2 rounded-xl font-bold">
                    Total: {{ $users->count() }} Pengguna
                </span>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th class="p-4 text-left text-sm font-bold text-gray-600">Username</th>
                            <th class="p-4 text-left text-sm font-bold text-gray-600">Email</th>
                            <th class="p-4 text-center text-sm font-bold text-gray-600">Terakhir Login</th>
                            <th class="p-4 text-center text-sm font-bold text-gray-600">Status</th>
                            <th class="p-4 text-center text-sm font-bold text-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($users as $user)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-4">
                                    <div class="font-bold text-gray-800">{{ $user->username }}</div>
                                    @if($user->is_verified)
                                        <span class="text-[10px] text-blue-500 font-bold flex items-center gap-1">
                                            <i class="fas fa-check-circle"></i> Terverifikasi
                                        </span>
                                    @endif
                                </td>
                                <td class="p-4 text-sm text-gray-600">
                                    {{ $user->email }}
                                </td>
                                <td class="p-4 text-center text-sm text-gray-500">
                                    {{ $user->last_login ? \Carbon\Carbon::parse($user->last_login)->diffForHumans() : 'Belum pernah' }}
                                </td>
                                <td class="p-4 text-center">
                                    @if($user->status === 'active')
                                        <span class="bg-green-100 text-green-700 border border-green-200 px-3 py-1 rounded-full text-xs font-bold capitalize">Active</span>
                                    @elseif($user->status === 'inactive')
                                        <span class="bg-gray-100 text-gray-700 border border-gray-200 px-3 py-1 rounded-full text-xs font-bold capitalize">Inactive</span>
                                    @else
                                        <span class="bg-red-100 text-red-700 border border-red-200 px-3 py-1 rounded-full text-xs font-bold capitalize">Banned</span>
                                    @endif
                                </td>
                                <td class="p-4 text-center">
                                    <a href="{{ route('admin.users.show', $user->user_id) }}">
                                        <button class="bg-indigo-50 text-indigo-600 hover:bg-indigo-600 hover:text-white px-3 py-1.5 rounded-lg text-sm font-bold transition">
                                            Detail
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-8 text-center text-gray-500 font-medium">
                                    Belum ada data pengguna.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
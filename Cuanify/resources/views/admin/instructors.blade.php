<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="p-6">
        
        <div class="flex gap-6 mb-8 border-b border-gray-200">
            <a href="{{ route('admin.instructors') }}" class="font-bold text-lg text-indigo-600 border-b-2 border-indigo-600 pb-2">
                Verifikasi Instruktur
            </a>
            <a href="{{ route('admin.courses') }}" class="font-bold text-lg text-gray-500 hover:text-indigo-500 transition pb-2">
                Verifikasi Course
            </a>
            <a href="{{ route('admin.categories.index') }}" class="font-bold text-lg text-gray-500 hover:text-indigo-500 transition pb-2">
                Kelola Kategori
            </a>
        </div>

        <h1 class="text-2xl font-bold mb-6 text-gray-800">
            Instruktur Pending
        </h1>

        <table class="w-full border mb-10">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 border">Nama</th>
                    <th class="p-3 border">Email</th>
                    <th class="p-3 border">Status</th>
                    <th class="p-3 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($instructors as $instructor)
                    @if($instructor->status_instructor == 'pending')
                    <tr>
                        <td class="p-3 border">{{ $instructor->username }}</td>
                        <td class="p-3 border">{{ $instructor->email }}</td>
                        <td class="p-3 border">
                            <span class="text-yellow-500 font-semibold bg-yellow-50 px-2 py-1 rounded text-sm">
                                Pending
                            </span>
                        </td>
                        <td class="p-3 border flex gap-2 justify-center">
                            <form action="/admin/approve/{{ $instructor->user_id }}" method="POST">
                                @csrf
                                <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded transition">
                                    Approve
                                </button>
                            </form>

                            <form action="/admin/reject/{{ $instructor->user_id }}" method="POST">
                                @csrf
                                <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded transition">
                                    Reject
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endif
                @empty
                    <tr>
                        <td colspan="4" class="p-4 text-center text-gray-500">
                            Tidak ada instruktur pending
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="grid md:grid-cols-2 gap-8">
            <div>
                <h1 class="text-xl font-bold mb-4 text-green-600">
                    Instruktur Approved
                </h1>
                <table class="w-full border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3 border">Nama</th>
                            <th class="p-3 border">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($approvedInstructors as $instructor)
                            <tr>
                                <td class="p-3 border">{{ $instructor->username }}</td>
                                <td class="p-3 border">{{ $instructor->email }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="p-4 text-center text-gray-500">
                                    Belum ada instruktur approved
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div>
                <h1 class="text-xl font-bold mb-4 text-red-600">
                    Instruktur Rejected
                </h1>
                <table class="w-full border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3 border">Nama</th>
                            <th class="p-3 border">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rejectedInstructors as $instructor)
                            <tr>
                                <td class="p-3 border">{{ $instructor->username }}</td>
                                <td class="p-3 border">{{ $instructor->email }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="p-4 text-center text-gray-500">
                                    Belum ada instruktur rejected
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-app-layout>
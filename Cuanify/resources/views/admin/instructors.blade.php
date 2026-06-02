<x-app-layout>
    <div class="flex min-h-screen bg-[#fcf9fe] -mx-4 sm:-mx-6 lg:-mx-8 -mt-6">
        
        @include('admin.partials.sidebar')
        
        <div class="flex-1 p-6 lg:p-10">
            
            <h1 class="text-3xl font-extrabold mb-6 text-gray-800">
                Instruktur Pending
            </h1>

            <table class="w-full border mb-10 rounded-xl overflow-hidden bg-white shadow-sm">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="p-4 text-left text-sm font-bold text-gray-600">Nama</th>
                        <th class="p-4 text-left text-sm font-bold text-gray-600">Email</th>
                        <th class="p-4 text-center text-sm font-bold text-gray-600">Status</th>
                        <th class="p-4 text-center text-sm font-bold text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($instructors as $instructor)
                        @if($instructor->status_instructor == 'pending')
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-4 font-bold text-gray-800">{{ $instructor->username }}</td>
                            <td class="p-4 text-sm text-gray-600">{{ $instructor->email }}</td>
                            <td class="p-4 text-center">
                                <span class="text-amber-600 font-bold bg-amber-50 border border-amber-200 px-3 py-1 rounded-full text-xs">
                                    Pending
                                </span>
                            </td>
                            <td class="p-4 flex gap-2 justify-center">
                                <form action="/admin/approve/{{ $instructor->user_id }}" method="POST">
                                    @csrf
                                    <button class="bg-green-100 text-green-700 hover:bg-green-600 hover:text-white px-3 py-1.5 rounded-lg text-sm font-bold transition">
                                        Approve
                                    </button>
                                </form>

                                <form action="/admin/reject/{{ $instructor->user_id }}" method="POST">
                                    @csrf
                                    <button class="bg-red-100 text-red-700 hover:bg-red-600 hover:text-white px-3 py-1.5 rounded-lg text-sm font-bold transition">
                                        Reject
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="4" class="p-8 text-center text-gray-500 font-medium">
                                Tidak ada instruktur pending
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="grid md:grid-cols-2 gap-8">
                <div>
                    <h2 class="text-xl font-bold mb-4 text-emerald-600">
                        Instruktur Approved
                    </h2>
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                        <table class="w-full">
                            <thead class="bg-emerald-50 border-b border-emerald-100">
                                <tr>
                                    <th class="p-4 text-left text-sm font-bold text-emerald-800">Nama</th>
                                    <th class="p-4 text-left text-sm font-bold text-emerald-800">Email</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse ($approvedInstructors as $instructor)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="p-4 font-bold text-gray-800">{{ $instructor->username }}</td>
                                        <td class="p-4 text-sm text-gray-600">{{ $instructor->email }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="p-8 text-center text-gray-500 font-medium">
                                            Belum ada instruktur approved
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div>
                    <h2 class="text-xl font-bold mb-4 text-red-600">
                        Instruktur Rejected
                    </h2>
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                        <table class="w-full">
                            <thead class="bg-red-50 border-b border-red-100">
                                <tr>
                                    <th class="p-4 text-left text-sm font-bold text-red-800">Nama</th>
                                    <th class="p-4 text-left text-sm font-bold text-red-800">Email</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse ($rejectedInstructors as $instructor)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="p-4 font-bold text-gray-800">{{ $instructor->username }}</td>
                                        <td class="p-4 text-sm text-gray-600">{{ $instructor->email }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="p-8 text-center text-gray-500 font-medium">
                                            Belum ada instruktur rejected
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
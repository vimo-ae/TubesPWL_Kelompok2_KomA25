<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="p-6">
        <h1 class="text-2xl font-bold mb-6">
            Verifikasi Instruktur
        </h1>

        <table class="w-full border">

            <thead class="bg-gray-200">
                <tr>
                    <th class="p-3 border">Nama</th>
                    <th class="p-3 border">Email</th>
                    <th class="p-3 border">Status</th>
                    <th class="p-3 border">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($instructors as $instructor)
                    <tr>
                        <td class="p-3 border">
                            {{ $instructor->username }}
                        </td>
                        <td class="p-3 border">
                            {{ $instructor->email }}
                        </td>
                        <td class="p-3 border">
                            @if ($instructor->status_instructor == 'pending')
                                <span class="text-yellow-500 font-semibold">
                                    Pending
                                </span>

                            @elseif ($instructor->status_instructor == 'approved')
                                <span class="text-green-500 font-semibold">
                                    Approved
                                </span>

                            @else
                                <span class="text-red-500 font-semibold">
                                    Rejected
                                </span>

                            @endif
                        </td>
                        <td class="p-3 border flex gap-2">
                            <form action="/admin/approve/{{ $instructor->user_id }}" method="POST">
                                @csrf
                                <button
                                    class="bg-green-500 text-white px-3 py-1 rounded">
                                    Approve
                                </button>
                            </form>

                            <form action="/admin/reject/{{ $instructor->user_id }}" method="POST">
                                @csrf
                                <button
                                    class="bg-red-500 text-white px-3 py-1 rounded">
                                    Reject
                                </button>
                            </form>

                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="4" class="p-4 text-center">
                            Tidak ada instructor pending
                        </td>
                    </tr>

                @endforelse

            </tbody>
        </table>

        <h1 class="text-2xl font-bold mt-10 mb-6">
            Instruktur Approved
        </h1>

        <table class="w-full border">

            <thead class="bg-gray-200">
                <tr>
                    <th class="p-3 border">Nama</th>
                    <th class="p-3 border">Email</th>
                    <th class="p-3 border">Status</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($approvedInstructors as $instructor)

                    <tr>

                        <td class="p-3 border">
                            {{ $instructor->username }}
                        </td>

                        <td class="p-3 border">
                            {{ $instructor->email }}
                        </td>

                        <td class="p-3 border text-green-500 font-semibold">
                            Approved
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="3" class="p-4 text-center">
                            Belum ada instructor approved
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

        <h1 class="text-2xl font-bold mt-10 mb-6">
            Instruktur Rejected
        </h1>

        <table class="w-full border">

            <thead class="bg-gray-200">
                <tr>
                    <th class="p-3 border">Nama</th>
                    <th class="p-3 border">Email</th>
                    <th class="p-3 border">Status</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($rejectedInstructors as $instructor)

                    <tr>

                        <td class="p-3 border">
                            {{ $instructor->username }}
                        </td>

                        <td class="p-3 border">
                            {{ $instructor->email }}
                        </td>

                        <td class="p-3 border text-red-500 font-semibold">
                            Rejected
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="3" class="p-4 text-center">
                            Belum ada instructor rejected
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>
    </div>

</x-app-layout>

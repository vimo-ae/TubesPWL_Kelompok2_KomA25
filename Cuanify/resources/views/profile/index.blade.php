<x-app-layout>

<div class="p-6">

    <h1 class="text-2xl font-bold mb-6">
        Profil Saya
    </h1>

    {{-- Profil --}}
    <div class="border p-4 rounded mb-6">

        <img
            src="{{ $profile->profile_photo ?? 'https://via.placeholder.com/120' }}"
            width="120"
            class="mb-3"
        >

        <h2 class="text-xl font-bold">
            {{ $profile->full_name }}
        </h2>

        <p>
            {{ '@' . auth()->user()->username }}
        </p>

        <p class="mt-2">
            {{ $profile->bio }}
        </p>

    </div>

    {{-- Level --}}
    <div class="border p-4 rounded mb-6">

        <h2 class="font-bold mb-2">
            Progress Belajar
        </h2>

        <p>Level : {{ $profile->level }}</p>
        <p>Total XP : {{ $profile->xp_points }}</p>

    </div>

    {{-- Streak --}}
    <div class="border p-4 rounded mb-6">

        <h2 class="font-bold mb-2">
            Streak Belajar
        </h2>

        <p>
            {{ $profile->streak_days }}
            hari berturut-turut
        </p>

    </div>

    {{-- History XP --}}
    <div class="border p-4 rounded mb-6">

        <h2 class="font-bold mb-4">
            History XP
        </h2>

        <table class="w-full">

            <thead>
                <tr>
                    <th>Lesson</th>
                    <th>XP</th>
                    <th>Tanggal</th>
                </tr>
            </thead>

            <tbody>

                @foreach($progresses as $progress)

                    <tr>
                        <td>
                            {{ $progress->lesson->title }}
                        </td>

                        <td>
                            +{{ $progress->xp_earned }}
                        </td>

                        <td>
                            {{ $progress->completed_at }}
                        </td>
                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    {{-- Kelas --}}
    <div class="border p-4 rounded">

        <h2 class="font-bold mb-4">
            Kelas yang Sedang Diikuti
        </h2>

        <p>
            (Nanti ambil dari tabel enrollment)
        </p>

    </div>

</div>

</x-app-layout>
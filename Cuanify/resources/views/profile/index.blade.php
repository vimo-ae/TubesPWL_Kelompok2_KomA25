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
            {{ $profile->full_name ?? 'Full Name..' }}
        </h2>

        <p>
            {{ '@' . auth()->user()->username }}
        </p>

        <p class="my-2">
            "{{ $profile->bio ?? 'Bio..'}}"
        </p>

        <button class="px-4 py-2 bg-blue-600 text-white rounded"
                onclick="document.getElementById('editProfileModal').classList.remove('hidden')">
            Edit Profile
        </button>
        @include('profile.edit')

        <p>Level : {{ $profile->level }}</p>
        <p>Total XP : {{ $profile->xp_points }}</p>
    </div>

    {{-- Progress --}}

    <div class="w-full max-w-2xl bg-[#111] border border-dashed border-gray-700 p-6 rounded-2xl shadow-xl text-gray-200 font-sans">
    
        <h3 class="text-xs font-bold tracking-widest text-purple-400 uppercase mb-6">
            PROGRESS BELAJAR
        </h3>

        <div class="flex flex-col sm:flex-row items-center gap-8">
            
            <div class="relative flex items-center justify-center w-32 h-32">
                <svg class="w-full h-full transform -rotate-90" viewBox="0 0 100 100">
                    <circle cx="50" cy="50" r="40" stroke="#262626" stroke-width="8" fill="transparent" />
                    <circle cx="50" cy="50" r="40" stroke="#a855f7" stroke-width="8" fill="transparent"
                            stroke-dasharray="251.2"
                            stroke-dashoffset="{{ 251.2 - (251.2 * $persentaseTotal) / 100 }}"
                            stroke-linecap="round"
                            class="transition-all duration-1000 ease-out" />
                </svg>
                <span class="absolute text-3xl font-black text-white tracking-tighter">
                    {{ $persentaseTotal }}%
                </span>
            </div>

            <div class="flex-1 w-full space-y-5">
                
                <div>
                    <div class="flex justify-between text-sm font-medium mb-1.5 text-gray-300 font-mono">
                        <span>Materi: {{ $materiSelesai }} / {{ $totalMateri }}</span>
                    </div>
                    <div class="w-full bg-[#222] h-2.5 rounded-full overflow-hidden">
                        <div class="bg-purple-500 h-full rounded-full transition-all duration-1000" 
                            style="width: {{ $totalMateri > 0 ? ($materiSelesai / $totalMateri) * 100 : 0 }}%">
                        </div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between text-sm font-medium mb-1.5 text-gray-300 font-mono">
                        <span>Kuis: {{ $kuisSelesai }} / {{ $totalKuis }}</span>
                    </div>
                    <div class="w-full bg-[#222] h-2.5 rounded-full overflow-hidden">
                        <div class="bg-blue-500 h-full rounded-full transition-all duration-1000" 
                            style="width: {{ $totalKuis > 0 ? ($kuisSelesai / $totalKuis) * 100 : 0 }}%">
                        </div>
                    </div>
                </div>

                <p class="text-xs text-gray-500 font-mono pt-1">
                    Terus tingkatkan progresmu!
                </p>
            </div>

        </div>
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

                @foreach($progress as $progress)

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
    <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl p-6 rounded-3xl shadow-sm border border-pink-100/50 dark:border-gray-700">
        <h2 class="font-black text-gray-800 dark:text-gray-100 mb-4 flex items-center gap-2">
            Kelas yang Sedang Diikuti
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @forelse($enrolledCourses as $course)
                <div class="p-4 rounded-2xl border border-purple-100/50 dark:border-gray-700 bg-gradient-to-r from-pink-50/30 to-purple-50/30 dark:from-gray-900/40 dark:to-gray-900/20 flex flex-col justify-between space-y-3">
                    
                    <div>
                        <h3 class="font-bold text-gray-800 dark:text-gray-200 text-sm line-clamp-2">
                            {{ $course->title }}
                        </h3>
                        
                        <span class="inline-block mt-2 text-[10px] font-extrabold tracking-wider uppercase px-2.5 py-1 rounded-full 
                            {{ $course->pivot->status === 'completed' ? 'bg-green-100 text-green-700 dark:bg-green-950/50 dark:text-green-400' : '' }}
                            {{ $course->pivot->status === 'active' ? 'bg-indigo-100 text-indigo-700 dark:bg-indigo-950/50 dark:text-indigo-400' : '' }}
                            {{ $course->pivot->status === 'dropped' ? 'bg-red-100 text-red-700 dark:bg-red-950/50 dark:text-red-400' : '' }}
                        ">
                            {{ $course->pivot->status }}
                        </span>
                    </div>

                    <div>
                        <div class="flex justify-between items-center text-xs font-bold text-gray-500 dark:text-gray-400 mb-1">
                            <span>Progress</span>
                            <span>{{ number_format($course->pivot->completion_percentage, 0) }}%</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2 overflow-hidden">
                            <div class="bg-gradient-to-r from-purple-500 to-pink-500 h-2 rounded-full transition-all duration-500" 
                                style="width: {{ $course->pivot->completion_percentage }}%"></div>
                        </div>
                    </div>

                </div>
            @empty
                <div class="sm:col-span-2 p-8 text-center rounded-2xl border border-dashed border-gray-200 dark:border-gray-700 text-sm font-medium text-gray-400 italic">
                    Kamu belum mendaftar di kelas mana pun. Yuk cari kelas seru di <a href="{{ route('courses.index') }}" class="text-purple-600 font-bold">Daftar Course</a>! 
                </div>
            @endforelse
        </div>
    </div>

</div>

</x-app-layout>
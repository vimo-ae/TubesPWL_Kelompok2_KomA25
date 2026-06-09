<x-app-layout>

    @section('title', 'Profile - Cuanify')

<div class="p-6 max-w-5xl mx-auto space-y-6">

    <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">
        Profil Instruktur
    </h1>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-700 flex flex-col md:flex-row items-center gap-6">
        
        <img src="{{ $user->$profile->photo_url }}" class="w-32 h-32 rounded-full object-cover border-4 border-purple-100 shadow-sm">

        <div class="flex-1 text-center md:text-left">
            <h2 class="text-2xl font-black text-gray-800 dark:text-white">
                {{ $profile->full_name ?? 'Nama Belum Diatur' }}
            </h2>
            <p class="text-purple-600 font-bold text-sm mb-2">
                {{ '@' . auth()->user()->username }} • <span class="bg-purple-100 text-purple-700 px-2 py-0.5 rounded-full text-[10px] uppercase tracking-wider">Instruktur</span>
            </p>
            <p class="text-gray-500 text-sm mb-4 italic">
                "{{ $profile->bio ?? 'Belum ada bio. Tulis sedikit tentang keahlianmu!'}}"
            </p>

            <a href="{{ route('profile.edit') }}" 
               class="inline-block px-5 py-2 bg-purple-600 hover:bg-purple-700 text-white text-sm font-bold rounded-xl shadow-md transition-all mt-2">
                ✏️ Edit Profile
            </a>
            
        </div>
    </div>

    <div class="bg-white/80 dark:bg-gray-800/80 p-6 rounded-3xl shadow-sm border border-purple-100/50 dark:border-gray-700">
        <h2 class="font-black text-gray-800 dark:text-gray-100 mb-4 flex items-center gap-2">
            📚 Kursus yang Saya Buat
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse($createdCourses as $course)
                <div class="p-5 rounded-2xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 flex flex-col justify-between space-y-3 hover:shadow-md transition">
                    <div>
                        <h3 class="font-bold text-gray-800 dark:text-gray-200 text-sm line-clamp-2">
                            {{ $course->title }}
                        </h3>
                        <span class="inline-block mt-2 text-[10px] font-extrabold tracking-wider uppercase px-2.5 py-1 rounded-full bg-purple-100 text-purple-700 dark:bg-purple-950/50 dark:text-purple-400">
                            {{ $course->difficulty_level }}
                        </span>
                    </div>

                    <div class="pt-3 border-t border-gray-200 dark:border-gray-700 flex justify-between items-center text-xs font-bold text-gray-500 dark:text-gray-400">
                        <span class="flex items-center gap-1">
                            👥 {{ $course->enrollments_count ?? 0 }} Siswa
                        </span>
                        <a href="{{ route('courses.show', $course->course_id) }}" class="text-purple-600 hover:text-purple-800 transition">
                            Lihat →
                        </a>
                    </div>
                </div>
            @empty
                <div class="sm:col-span-2 lg:col-span-3 p-8 text-center rounded-2xl border border-dashed border-gray-300 dark:border-gray-700 text-sm font-medium text-gray-400 italic">
                    Kamu belum membuat kursus apapun. Saatnya bagikan ilmumu ke dunia! 🌍
                </div>
            @endforelse
        </div>
    </div>

</div>

</x-app-layout>
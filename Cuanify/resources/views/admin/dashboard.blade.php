<x-app-layout>
    <div class="min-h-screen w-full p-8">
        <div class="max-w-7xl mx-auto space-y-10">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-[25px] shadow-sm border border-gray-100 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 14l9-5-9-5-9 5 9 5z"/><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                    </div>
                    <div><p class="text-xs text-gray-400 font-bold uppercase">Total Student</p>
                        <h4 class="text-2xl font-extrabold text-gray-800">{{ $totalStudents }}</h4></div>
                </div>
                <div class="bg-white p-6 rounded-[25px] shadow-sm border border-gray-100 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-purple-100 text-purple-600 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </div>
                    <div><p class="text-xs text-gray-400 font-bold uppercase">Total Instructor</p>
                        <h4 class="text-2xl font-extrabold text-gray-800">{{ $totalInstructors }}</h4></div>
                </div>
                <div class="bg-white p-6 rounded-[25px] shadow-sm border border-gray-100 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-600 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <div><p class="text-xs text-gray-400 font-bold uppercase">Total Course</p>
                        <h4 class="text-2xl font-extrabold text-gray-800">{{ $totalCourses }}</h4></div>
                </div>
                <div class="bg-white p-6 rounded-[25px] shadow-sm border border-gray-100 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div><p class="text-xs text-gray-400 font-bold uppercase">Pending Verifikasi</p>
                        <h4 class="text-2xl font-extrabold text-gray-800">{{ $pendingInstructors }}</h4></div>
                </div>
            </div>

            <div class="relative overflow-hidden rounded-[35px] bg-gradient-to-br from-fuchsia-600 via-purple-600 to-indigo-700 shadow-2xl p-8 text-white">
                <h1 class="text-3xl font-extrabold">Selamat datang, {{ Auth::user()->name }}!</h1>
                <p class="text-purple-100 text-sm">Halaman kendali Cuanify.</p>
            </div>
        </div>
    </div>
</x-app-layout>
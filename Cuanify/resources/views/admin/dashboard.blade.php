<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Overview Dashboard
        </h2>
    </x-slot>

    <div class="p-6 max-w-7xl mx-auto">
        <h1 class="text-3xl font-extrabold text-gray-800 mb-8">Statistik Platform</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            
    <a href="{{ route('admin.students') }}" class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 flex items-center gap-4 transition hover:shadow-lg hover:-translate-y-1 group cursor-pointer">
        <div class="w-14 h-14 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center text-2xl group-hover:bg-blue-600 group-hover:text-white transition">
            👨‍🎓
        </div>
        <div>
            <p class="text-sm font-bold text-gray-500 mb-1 group-hover:text-blue-600 transition">Total Student</p>
            <h3 class="text-2xl font-extrabold text-gray-800">{{ $totalStudents }}</h3>
        </div>
    </a>

    <a href="{{ route('admin.all_instructors') }}" class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 flex items-center gap-4 transition hover:shadow-lg hover:-translate-y-1 group cursor-pointer">
        <div class="w-14 h-14 rounded-2xl bg-purple-100 text-purple-600 flex items-center justify-center text-2xl group-hover:bg-purple-600 group-hover:text-white transition">
            👨‍🏫
        </div>
        <div>
            <p class="text-sm font-bold text-gray-500 mb-1 group-hover:text-purple-600 transition">Total Instructor</p>
            <h3 class="text-2xl font-extrabold text-gray-800">{{ $totalInstructors }}</h3>
        </div>
    </a>

    <a href="{{ route('admin.courses') }}" class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 flex items-center gap-4 transition hover:shadow-lg hover:-translate-y-1 group cursor-pointer">
        <div class="w-14 h-14 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center text-2xl group-hover:bg-green-600 group-hover:text-white transition">
            📚
        </div>
        <div>
            <p class="text-sm font-bold text-gray-500 mb-1 group-hover:text-green-600 transition">Total Course</p>
            <h3 class="text-2xl font-extrabold text-gray-800">{{ $totalCourses }}</h3>
        </div>
    </a>

    <a href="{{ route('admin.instructors') }}" class="bg-white rounded-3xl p-6 shadow-sm border border-amber-200 flex items-center gap-4 transition hover:shadow-lg hover:-translate-y-1 group cursor-pointer relative overflow-hidden">
        <div class="absolute top-0 right-0 w-2 h-full bg-amber-400 group-hover:w-full transition-all opacity-10 group-hover:opacity-20"></div>
        <div class="w-14 h-14 rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center text-2xl group-hover:bg-amber-600 group-hover:text-white transition z-10">
            ⏳
        </div>
        <div class="z-10">
            <p class="text-sm font-bold text-gray-500 mb-1 group-hover:text-amber-700 transition">Pending Instruktur</p>
            <h3 class="text-2xl font-extrabold text-gray-800">{{ $pendingInstructors }}</h3>
        </div>
    </a>

</div>

        <h2 class="text-xl font-bold text-gray-800 mb-6">Akses Cepat Menu Admin</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <a href="{{ route('admin.instructors') }}" class="bg-gradient-to-br from-indigo-500 to-purple-600 text-white rounded-3xl p-6 shadow-lg hover:scale-[1.02] transition-transform duration-300">
                <h3 class="text-lg font-bold mb-2 flex items-center gap-2">🛡️ Verifikasi Instruktur</h3>
                <p class="text-sm text-indigo-100">Review dan kelola pendaftaran instruktur baru yang masuk.</p>
            </a>

            <a href="{{ route('admin.courses') }}" class="bg-gradient-to-br from-emerald-500 to-teal-600 text-white rounded-3xl p-6 shadow-lg hover:scale-[1.02] transition-transform duration-300">
                <h3 class="text-lg font-bold mb-2 flex items-center gap-2">✅ Verifikasi Course</h3>
                <p class="text-sm text-emerald-100">Cek dan setujui materi course yang diajukan instruktur.</p>
            </a>

            <a href="{{ route('admin.categories.index') }}" class="bg-gradient-to-br from-rose-500 to-pink-600 text-white rounded-3xl p-6 shadow-lg hover:scale-[1.02] transition-transform duration-300">
                <h3 class="text-lg font-bold mb-2 flex items-center gap-2">📁 Kelola Kategori</h3>
                <p class="text-sm text-rose-100">Tambah, edit, dan hapus daftar kategori pembelajaran yang tersedia.</p>
            </a>
        </div>
    </div>
</x-app-layout>
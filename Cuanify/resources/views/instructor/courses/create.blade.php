<x-app-layout>

    @section('title', 'Create Course - Cuanify')

    <div class="min-h-screen -mx-4 sm:-mx-6 lg:-mx-8 -mt-6 p-6">
        <div class="max-w-7xl mx-auto">

            <a href="{{ route('instructor.courses.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-purple-600 hover:text-purple-800 mb-6 transition">
                ← Kembali ke Daftar Course
            </a>

            <div class="bg-white rounded-[35px] overflow-hidden shadow-xl border border-purple-100 p-8 md:p-10">
                
                <div class="mb-8">
                    <h1 class="text-3xl font-extrabold text-gray-800 tracking-tight">Tambah Course Baru</h1>
                    <p class="text-gray-500 text-sm mt-1">Rancang materi pembelajaran baru untuk siswa-siswi hebat di platform Cuanify.</p>
                </div>

                @if ($errors->any())
                    <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-2xl text-sm flex flex-col gap-1">
                        <div class="flex items-center gap-2 font-bold mb-1">
                            <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
                            Gagal Menyimpan! Harap periksa kembali isian form Anda:
                        </div>
                        <ul class="list-disc pl-5 space-y-0.5 text-xs text-red-600 opacity-90">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('instructor.courses.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <div class="space-y-5">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Judul Course</label>
                                <input
                                    type="text"
                                    name="title"
                                    placeholder="Contoh: Dasar Literasi Keuangan untuk UMKM"
                                    value="{{ old('title') }}"
                                    class="w-full bg-gray-50 border border-gray-200 text-gray-800 p-3 rounded-xl text-sm focus:bg-white focus:border-purple-400 focus:ring-4 focus:ring-purple-100 transition duration-200 @error('title') border-red-300 ring-4 ring-red-50 @enderror">
                                @error('title')
                                    <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Kursus</label>
                                <textarea
                                    name="description"
                                    placeholder="Jelaskan secara singkat dan menarik mengenai apa saja yang akan dipelajari siswa di course ini..."
                                    rows="6"
                                    class="w-full bg-gray-50 border border-gray-200 text-gray-800 p-3 rounded-xl text-sm focus:bg-white focus:border-purple-400 focus:ring-4 focus:ring-purple-100 transition duration-200 @error('description') border-red-300 ring-4 ring-red-50 @enderror">{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="space-y-5">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Kategori Course</label>
                                <select
                                    name="category_id"
                                    class="w-full bg-gray-50 border border-gray-200 text-gray-800 p-3 rounded-xl text-sm focus:bg-white focus:border-purple-400 focus:ring-4 focus:ring-purple-100 transition duration-200 @error('category_id') border-red-300 ring-4 ring-red-50 @enderror">
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->category_id }}" {{ old('category_id') == $category->category_id ? 'selected' : '' }}>
                                            {{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Tingkat Kesulitan</label>
                                <select
                                    name="difficulty_level"
                                    class="w-full bg-gray-50 border border-gray-200 text-gray-800 p-3 rounded-xl text-sm focus:bg-white focus:border-purple-400 focus:ring-4 focus:ring-purple-100 transition duration-200 @error('difficulty_level') border-red-300 ring-4 ring-red-50 @enderror">
                                    <option value="beginner" {{ old('difficulty_level') == 'beginner' ? 'selected' : '' }}>Beginner (Pemula)</option>
                                    <option value="intermediate" {{ old('difficulty_level') == 'intermediate' ? 'selected' : '' }}>Intermediate (Menengah)</option>
                                    <option value="advanced" {{ old('difficulty_level') == 'advanced' ? 'selected' : '' }}>Advanced (Mahir)</option>
                                </select>
                                @error('difficulty_level')
                                    <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Estimasi Durasi (dalam Menit)</label>
                                <div class="relative">
                                    <input
                                        type="number"
                                        name="estimated_duration"
                                        placeholder="Contoh: 180"
                                        value="{{ old('estimated_duration') }}"
                                        class="w-full bg-gray-50 border border-gray-200 text-gray-800 p-3 rounded-xl text-sm focus:bg-white focus:border-purple-400 focus:ring-4 focus:ring-purple-100 transition duration-200 pr-16 @error('estimated_duration') border-red-300 ring-4 ring-red-50 @enderror">
                                    <span class="absolute right-4 top-1/2 -translate-y-1/2 text-xs font-bold text-gray-400 pointer-events-none">
                                        Menit
                                    </span>
                                </div>
                                @error('estimated_duration')
                                    <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <hr class="border-gray-100 my-6">

                    <div class="flex items-center gap-3 justify-end">
                        <a href="{{ route('instructor.courses.index') }}" 
                           class="inline-flex items-center bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-3 rounded-xl font-bold text-sm transition duration-300">
                            Batal
                        </a>
                        <button
                            type="submit"
                            class="inline-flex items-center bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white px-6 py-3 rounded-xl font-bold text-sm shadow-md transition-all duration-300 hover:-translate-y-0.5 gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Simpan data Course
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
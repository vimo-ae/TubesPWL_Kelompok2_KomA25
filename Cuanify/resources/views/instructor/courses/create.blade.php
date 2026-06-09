<x-app-layout>
    <div class="min-h-screen -mx-4 sm:-mx-6 lg:-mx-8 -mt-6 p-6">

    <div class="max-w-7xl mx-auto">

        <div class="relative overflow-hidden rounded-[35px] bg-gradient-to-r from-indigo-700 via-purple-700 to-fuchsia-700 p-10 mb-8 shadow-xl">

            <div class="absolute right-0 top-0 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>

            <div class="relative z-10">

                <span class="bg-white/20 backdrop-blur px-3 py-1 rounded-full text-xs text-white font-semibold">
                    Instructor Panel
                </span>

                <h1 class="text-4xl font-black text-white mt-4">
                    Tambah Course Baru
                </h1>

                <p class="text-purple-100 mt-2 max-w-2xl">
                    Buat pengalaman belajar terbaik untuk para siswa dengan course yang menarik dan terstruktur.
                </p>

            </div>

        </div>

        <form action="{{ route('instructor.courses.store') }}" method="POST">
            @csrf

        <div class="grid lg:grid-cols-3 gap-8">

            <div class="lg:col-span-2">

                <div class="bg-white dark:bg-gray-800 rounded-3xl p-8 shadow-sm border border-gray-100 dark:border-gray-700">
            

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Judul Course</label>
                        <input
                            type="text"
                            name="title"
                            placeholder="Judul Course"
                            value="{{ old('title') }}"
                            class="border p-2 w-full rounded-md">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                        <textarea
                            name="description"
                            placeholder="Deskripsi"
                            rows="4"
                            class="border p-2 w-full rounded-md">{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                        <select
                            name="category_id"
                            class="border p-2 w-full rounded-md">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->category_id }}" {{ old('category_id') == $category->category_id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tingkat Kesulitan</label>
                        <select
                            name="difficulty_level"
                            class="border p-2 w-full rounded-md">
                            <option value="beginner" {{ old('difficulty_level') == 'beginner' ? 'selected' : '' }}>Beginner</option>
                            <option value="intermediate" {{ old('difficulty_level') == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                            <option value="advanced" {{ old('difficulty_level') == 'advanced' ? 'selected' : '' }}>Advanced</option>
                        </select>
                    </div>
                
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Durasi (menit)</label>
                        <input
                            type="number"
                            name="estimated_duration"
                            placeholder="Durasi (menit)"
                            value="{{ old('estimated_duration') }}"
                            class="border p-2 w-full rounded-md">
                    </div>
                </div>
            </div>
            

            <div class="flex items-center gap-2">
                <button
                    type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition-all">
                    Simpan Course
                </button>
                <a href="{{ route('instructor.courses.index') }}" 
                   class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-all">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
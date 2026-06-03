<x-app-layout>
    <div class="flex min-h-screen bg-[#fcf9fe] -mx-4 sm:-mx-6 lg:-mx-8 -mt-6" x-data="{ 
        showAddModal: false, 
        showEditModal: false, 
        editId: '', 
        editName: '', 
        editIcon: '', 
        editDesc: '' 
    }">
        
        @include('admin.partials.sidebar')
        
        <div class="flex-1 p-6 lg:p-10">
            
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-extrabold text-gray-800">Daftar Kategori</h1>
                <button @click="showAddModal = true" class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-xl font-bold transition flex items-center gap-2 shadow-sm">
                    <span>+</span> Tambah Kategori
                </button>
            </div>

            @if(session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-r">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-r">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-6">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th class="p-4 text-left text-sm font-bold text-gray-600">Icon</th>
                            <th class="p-4 text-left text-sm font-bold text-gray-600">Nama Kategori</th>
                            <th class="p-4 text-left text-sm font-bold text-gray-600">Deskripsi</th>
                            <th class="p-4 text-center text-sm font-bold text-gray-600">Jumlah Course</th>
                            <th class="p-4 text-center text-sm font-bold text-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($categories as $category)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-4 text-2xl text-center w-16">
                                    {{ $category->icon ?? '📁' }}
                                </td>
                                <td class="p-4 font-bold text-gray-800">
                                    {{ $category->category_name }}
                                </td>
                                <td class="p-4 text-sm text-gray-500 max-w-xs truncate">
                                    {{ $category->description ?? '-' }}
                                </td>
                                <td class="p-4 text-center">
                                    <span class="bg-indigo-50 text-indigo-700 px-3 py-1 rounded-full text-xs font-bold">
                                        {{ $category->courses_count }} Course
                                    </span>
                                </td>
                                <td class="p-4 flex gap-2 justify-center">
                                    <button type="button" 
                                        @click="showEditModal = true; editId = '{{ $category->category_id }}'; editName = '{{ $category->category_name }}'; editIcon = '{{ $category->icon }}'; editDesc = '{{ $category->description }}'"
                                        class="bg-blue-100 text-blue-700 hover:bg-blue-600 hover:text-white px-3 py-1.5 rounded-lg text-sm font-bold transition">
                                        Edit
                                    </button>

                                    <form action="{{ route('admin.categories.destroy', $category->category_id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-100 text-red-700 hover:bg-red-600 hover:text-white px-3 py-1.5 rounded-lg text-sm font-bold transition">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-8 text-center text-gray-500 font-medium">
                                    Belum ada kategori yang ditambahkan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div x-show="showAddModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm" x-cloak>
                <div class="bg-white p-6 rounded-2xl w-full max-w-md shadow-xl" @click.away="showAddModal = false">
                    <h2 class="text-xl font-bold mb-4 text-gray-800">Tambah Kategori Baru</h2>
                    
                    <form action="{{ route('admin.categories.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-sm font-bold text-gray-700 mb-1">Nama Kategori</label>
                            <input type="text" name="category_name" class="w-full border-gray-300 rounded-xl focus:ring-indigo-500 focus:border-indigo-500" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-bold text-gray-700 mb-1">Icon (Emoji)</label>
                            <input type="text" name="icon" class="w-full border-gray-300 rounded-xl focus:ring-indigo-500 focus:border-indigo-500" placeholder="Misal: 💻">
                        </div>
                        <div class="mb-6">
                            <label class="block text-sm font-bold text-gray-700 mb-1">Deskripsi</label>
                            <textarea name="description" rows="3" class="w-full border-gray-300 rounded-xl focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                        </div>
                        
                        <div class="flex justify-end gap-3">
                            <button type="button" @click="showAddModal = false" class="px-5 py-2 text-gray-600 hover:bg-gray-100 rounded-xl font-bold transition">Batal</button>
                            <button type="submit" class="px-5 py-2 bg-indigo-600 text-white rounded-xl font-bold hover:bg-indigo-700 transition shadow-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>

            <div x-show="showEditModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm" x-cloak>
                <div class="bg-white p-6 rounded-2xl w-full max-w-md shadow-xl" @click.away="showEditModal = false">
                    <h2 class="text-xl font-bold mb-4 text-gray-800">Edit Kategori</h2>
                    
                    <form :action="'/admin/categories/' + editId" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="block text-sm font-bold text-gray-700 mb-1">Nama Kategori</label>
                            <input type="text" name="category_name" x-model="editName" class="w-full border-gray-300 rounded-xl focus:ring-indigo-500 focus:border-indigo-500" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-bold text-gray-700 mb-1">Icon (Emoji)</label>
                            <input type="text" name="icon" x-model="editIcon" class="w-full border-gray-300 rounded-xl focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div class="mb-6">
                            <label class="block text-sm font-bold text-gray-700 mb-1">Deskripsi</label>
                            <textarea name="description" x-model="editDesc" rows="3" class="w-full border-gray-300 rounded-xl focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                        </div>
                        
                        <div class="flex justify-end gap-3">
                            <button type="button" @click="showEditModal = false" class="px-5 py-2 text-gray-600 hover:bg-gray-100 rounded-xl font-bold transition">Batal</button>
                            <button type="submit" class="px-5 py-2 bg-indigo-600 text-white rounded-xl font-bold hover:bg-indigo-700 transition shadow-sm">Update</button>
                        </div>
                    </form>
                </div>
            </div>

        </div> </div> </x-app-layout>
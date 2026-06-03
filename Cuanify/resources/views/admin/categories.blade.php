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
        
        <div class="flex-1 p-4 sm:p-6 lg:p-10 min-w-0">
            
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6">
                <div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-800">Daftar Kategori</h1>
                    <p class="text-xs text-gray-400 mt-0.5">Kelola kategori course yang tersedia di platform</p>
                </div>
                <button @click="showAddModal = true" class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-xl font-bold transition flex items-center justify-center gap-2 shadow-sm text-sm sm:text-base w-full sm:w-auto">
                    <span>+</span> Tambah Kategori
                </button>
            </div>

            @if(session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-r text-sm">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-r text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 gap-4 sm:hidden mb-6">
                @forelse($categories as $category)
                    <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between gap-4">
                        <div class="flex items-start gap-4">
                            <div class="text-2xl bg-purple-50 w-12 h-12 rounded-xl flex items-center justify-center shrink-0 border border-purple-100">
                                {{ $category->icon ?? '📁' }}
                            </div>
                            <div class="min-w-0 flex-1">
                                <h3 class="font-extrabold text-gray-800 text-base truncate">{{ $category->category_name }}</h3>
                                <p class="text-xs text-gray-500 mt-1 leading-relaxed line-clamp-2">{{ $category->description ?? '-' }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-between border-t border-gray-50 pt-3 mt-1">
                            <span class="bg-indigo-50 text-indigo-700 px-3 py-1 rounded-full text-xs font-bold">
                                {{ $category->courses_count }} Course
                            </span>
                            <div class="flex gap-2">
                                <button type="button" 
                                    @click="showEditModal = true; editId = '{{ $category->category_id }}'; editName = '{{ $category->category_name }}'; editIcon = '{{ $category->icon }}'; editDesc = '{{ $category->description }}'"
                                    class="bg-blue-100 text-blue-700 hover:bg-blue-600 hover:text-white px-3 py-1.5 rounded-lg text-xs font-bold transition">
                                    Edit
                                </button>
                                <form action="{{ route('admin.categories.destroy', $category->category_id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-100 text-red-700 hover:bg-red-600 hover:text-white px-3 py-1.5 rounded-lg text-xs font-bold transition">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="bg-white p-8 text-center rounded-2xl border border-gray-100 text-gray-500 font-medium text-sm">
                        Belum ada kategori yang ditambahkan.
                    </div>
                @endforelse
            </div>


            <div class="hidden sm:block bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-6">
                <table class="w-full table-auto">
                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th class="p-4 text-left text-sm font-bold text-gray-600 w-20">Icon</th>
                            <th class="p-4 text-left text-sm font-bold text-gray-600 w-48">Nama Kategori</th>
                            <th class="p-4 text-left text-sm font-bold text-gray-600">Deskripsi</th>
                            <th class="p-4 text-center text-sm font-bold text-gray-600 w-36">Jumlah Course</th>
                            <th class="p-4 text-center text-sm font-bold text-gray-600 w-40">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($categories as $category)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-4 text-2xl text-center">
                                    {{ $category->icon ?? '📁' }}
                                </td>
                                <td class="p-4 font-bold text-gray-800 text-sm sm:text-base">
                                    {{ $category->category_name }}
                                </td>
                                <td class="p-4 text-sm text-gray-500 max-w-xs truncate">
                                    {{ $category->description ?? '-' }}
                                </td>
                                <td class="p-4 text-center">
                                    <span class="bg-indigo-50 text-indigo-700 px-3 py-1 rounded-full text-xs font-bold whitespace-nowrap">
                                        {{ $category->courses_count }} Course
                                    </span>
                                </td>
                                <td class="p-4">
                                    <div class="flex gap-2 justify-center">
                                        <button type="button" 
                                            @click="showEditModal = true; editId = '{{ $category->category_id }}'; editName = '{{ $category->category_name }}'; editIcon = '{{ $category->icon }}'; editDesc = '{{ $category->description }}'"
                                            class="bg-blue-100 text-blue-700 hover:bg-blue-600 hover:text-white px-3 py-1.5 rounded-lg text-xs font-bold transition">
                                            Edit
                                        </button>

                                        <form action="{{ route('admin.categories.destroy', $category->category_id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="bg-red-100 text-red-700 hover:bg-red-600 hover:text-white px-3 py-1.5 rounded-lg text-xs font-bold transition">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
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

            <div x-show="showAddModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50 backdrop-blur-sm" x-cloak>
                <div class="bg-white p-6 rounded-2xl w-full max-w-md shadow-xl max-h-[90vh] overflow-y-auto" @click.away="showAddModal = false">
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
                            <button type="button" @click="showAddModal = false" class="px-5 py-2 text-sm text-gray-600 hover:bg-gray-100 rounded-xl font-bold transition">Batal</button>
                            <button type="submit" class="px-5 py-2 text-sm bg-indigo-600 text-white rounded-xl font-bold hover:bg-indigo-700 transition shadow-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>

            <div x-show="showEditModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50 backdrop-blur-sm" x-cloak>
                <div class="bg-white p-6 rounded-2xl w-full max-w-md shadow-xl max-h-[90vh] overflow-y-auto" @click.away="showEditModal = false">
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
                            <button type="button" @click="showEditModal = false" class="px-5 py-2 text-sm text-gray-600 hover:bg-gray-100 rounded-xl font-bold transition">Batal</button>
                            <button type="submit" class="px-5 py-2 text-sm bg-indigo-600 text-white rounded-xl font-bold hover:bg-indigo-700 transition shadow-sm">Update</button>
                        </div>
                    </form>
                </div>
            </div>

        </div> </div> </x-app-layout>
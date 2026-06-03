<div id="editProfileModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-[100] transition-all">

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data"
          class="bg-white dark:bg-gray-800 p-6 rounded-2xl w-[400px] shadow-2xl relative">

        @csrf
        @method('PUT')

        <h2 class="text-xl font-extrabold mb-4 text-gray-800 dark:text-white">Edit Profil</h2>

        <div class="mb-4">
            <label class="block text-xs font-bold text-gray-500 mb-1">Nama Lengkap</label>
            <input type="text" name="full_name"
                   value="{{ $profile->full_name }}"
                   class="w-full border border-gray-200 rounded-xl p-3 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition text-sm"
                   placeholder="Masukkan nama lengkap">
        </div>

        <div class="mb-4">
            <label class="block text-xs font-bold text-gray-500 mb-1">Bio</label>
            <textarea name="bio"
                      class="w-full border border-gray-200 rounded-xl p-3 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition text-sm min-h-[100px]"
                      placeholder="Ceritakan sedikit tentang dirimu...">{{ $profile->bio }}</textarea>
        </div>

        <div class="mb-6">
            <label class="block text-xs font-bold text-gray-500 mb-1">Foto Profil</label>
            <input type="file" name="profile_photo" 
                   class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100 transition cursor-pointer">
        </div>

        <div class="flex justify-end gap-3 mt-2">
            <button type="button"
                    class="px-5 py-2 rounded-xl text-sm font-bold text-gray-600 bg-gray-100 hover:bg-gray-200 transition"
                    onclick="document.getElementById('editProfileModal').classList.add('hidden')">
                Batal
            </button>

            <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white px-5 py-2 rounded-xl text-sm font-bold shadow-md transition">
                Simpan
            </button>
        </div>

    </form>

</div>
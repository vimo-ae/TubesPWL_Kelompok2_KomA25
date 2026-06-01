<div id="editProfileModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center">

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data"
          class="bg-white p-6 rounded w-[400px]">

        @csrf
        @method('PUT')

        <h2 class="text-lg font-bold mb-4">Edit Profil</h2>

        <input type="text" name="full_name"
               value="{{ $profile->full_name }}"
               class="w-full border p-2 mb-3"
               placeholder="Nama lengkap">

        <textarea name="bio"
                  class="w-full border p-2 mb-3"
                  placeholder="Bio">{{ $profile->bio }}</textarea>

        <input type="file" name="profile_photo" class="mb-3">

        <div class="flex justify-end gap-2">
            <button type="button"
                    onclick="document.getElementById('editProfileModal').classList.add('hidden')">
                Cancel
            </button>

            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Save
            </button>
        </div>

    </form>

</div>
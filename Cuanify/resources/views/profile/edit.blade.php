<x-app-layout>

<style>
/* Menggunakan font sistem ui-sans-serif bawaan agar seragam dan ringan */
.edit-wrap { 
    font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; 
    max-width: 560px; 
    margin: 0 auto; 
    padding: 8px 0; 
}
.edit-card {
    background: #fff; 
    border: 1px solid #ede9fe;
    border-radius: 20px; 
    overflow: hidden;
}
.edit-header {
    background: linear-gradient(135deg, #ec4899, #d946ef, #a855f7);
    padding: 24px 28px;
}
.edit-header h1 {
    font-family: inherit; 
    font-size: 20px;
    font-weight: 600; 
    color: #fff; 
    margin: 0 0 4px;
}
.edit-header p { 
    font-size: 12px; 
    color: rgba(255,255,255,.75); 
    margin: 0; 
}
.edit-body { 
    padding: 28px; 
}

.avatar-row { 
    display: flex; 
    align-items: center; 
    gap: 16px; 
    margin-bottom: 24px; 
}
.avatar-img {
    width: 80px; 
    height: 80px; 
    border-radius: 50%; 
    object-fit: cover;
    border: 3px solid transparent;
    background: linear-gradient(#fff,#fff) padding-box,
                linear-gradient(135deg,#ec4899,#a855f7) border-box;
}
.upload-btn {
    display: inline-flex; 
    align-items: center; 
    gap: 6px; 
    cursor: pointer;
    background: #ede9fe; 
    color: #7c3aed;
    padding: 8px 16px; 
    border-radius: 9px;
    font-size: 12px; 
    font-weight: 600;
    transition: background .15s;
}
.upload-btn:hover { 
    background: #ddd6fe; 
}

.field { 
    margin-bottom: 18px; 
}
.field label {
    display: block; 
    font-size: 11px; 
    font-weight: 600; /* Diturunkan sedikit dari 700 agar lebih clean */
    color: #6b7280; 
    text-transform: uppercase;
    letter-spacing: .05em; 
    margin-bottom: 7px;
}
.field input, .field textarea {
    width: 100%; 
    padding: 11px 14px;
    border: 1.5px solid #ede9fe; 
    border-radius: 10px;
    font-size: 13px; 
    color: #1e1b4b; 
    outline: none;
    transition: border-color .2s; 
    box-sizing: border-box;
    font-family: inherit;
}
.field input:focus, .field textarea:focus { 
    border-color: #a855f7; 
}
.field textarea { 
    resize: none; 
}

.btn-row { 
    display: flex; 
    justify-content: flex-end; 
    gap: 10px; 
    margin-top: 8px; 
}
.btn-cancel {
    padding: 10px 20px; 
    border-radius: 10px;
    font-size: 13px; 
    font-weight: 600;
    background: #f3f4f6; 
    color: #6b7280;
    border: none; 
    cursor: pointer; 
    text-decoration: none;
    display: inline-flex; 
    align-items: center;
    transition: background .15s;
}
.btn-cancel:hover { 
    background: #e5e7eb; 
}
.btn-save {
    padding: 10px 22px; 
    border-radius: 10px;
    font-size: 13px; 
    font-weight: 600; /* Menggunakan ketebalan medium-semibold standard Tailwind */
    background: linear-gradient(135deg,#ec4899,#a855f7);
    color: #fff; 
    border: none; 
    cursor: pointer;
    transition: opacity .2s, transform .2s;
}
.btn-save:hover { 
    opacity: .88; 
    transform: translateY(-1px); 
}
</style>

<div class="edit-wrap">
    <div class="edit-card">

        <div class="edit-header">
            <h1>Edit Profil</h1>
            <p>Perbarui informasi profil kamu</p>
        </div>

        <div class="edit-body">
            @if($errors->any())
            <div style="background:#fee2e2;color:#991b1b;border:1px solid #fecaca;border-radius:10px;padding:12px 16px;margin-bottom:18px;font-size:13px;">
                @foreach($errors->all() as $e) <div>{{ $e }}</div> @endforeach
            </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Foto --}}
                <div class="avatar-row">
                    <img id="photoPreview" src="{{ $profile->photo_url }}" class="avatar-img" alt="Foto">
                    <div>
                        <label class="upload-btn">
                            <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                <polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/>
                            </svg>
                            Ganti Foto
                            <input type="file" name="profile_photo" accept="image/*" class="hidden"
                                   onchange="previewPhoto(event)">
                        </label>
                        <p style="font-size:10px;color:#9ca3af;margin:6px 0 0;">JPG, PNG maks 2MB</p>
                    </div>
                </div>

                {{-- Nama --}}
                <div class="field">
                    <label>Nama Lengkap</label>
                    <input type="text" name="full_name"
                           value="{{ old('full_name', $profile->full_name) }}"
                           placeholder="Masukkan nama lengkap">
                </div>

                {{-- Bio --}}
                <div class="field">
                    <label>Bio</label>
                    <textarea name="bio" rows="4"
                              placeholder="Ceritakan sedikit tentang dirimu...">{{ old('bio', $profile->bio) }}</textarea>
                </div>

                <div class="btn-row">
                    <a href="{{ route('profile') }}" class="btn-cancel">Batal</a>
                    <button type="submit" class="btn-save">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function previewPhoto(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = e => document.getElementById('photoPreview').src = e.target.result;
        reader.readAsDataURL(file);
    }
}
</script>

</x-app-layout>
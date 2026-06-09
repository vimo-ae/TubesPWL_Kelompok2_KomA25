<x-app-layout>

<style>
/* SET GLOBAL FONT MENGGUNAKAN UI-SANS-SERIF & SISTEM FONT */
.st-wrap, 
.modal-overlay { 
    font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; 
}

/* Pastikan elemen form mewarisi font utama */
.st-wrap input, 
.st-wrap textarea, 
.st-wrap button, 
.st-wrap label,
.modal-box input,
.modal-box button {
    font-family: inherit;
}

.st-wrap { max-width:700px; margin:0 auto; padding:0 0 32px; }
.st-title { font-size:22px; font-weight:600; color:#1e1b4b; margin:0 0 4px; } /* Diubah ke 600 agar tidak terlalu bold */
.st-subtitle { font-size:13px; color:#9ca3af; margin:0 0 24px; }

.st-card {
    background:#fff; border:1px solid #ede9fe;
    border-radius:18px; overflow:hidden; margin-bottom:16px;
}
.st-card-header {
    padding:18px 24px 0;
    border-bottom:1px solid #f5f3ff;
    padding-bottom:16px;
    display:flex; align-items:center; gap:10px;
}
.st-card-icon {
    width:36px; height:36px; border-radius:9px;
    display:flex; align-items:center; justify-content:center;
    flex-shrink:0;
}
.ic-violet { background:#ede9fe; }
.ic-amber  { background:#fef3c7; }
.ic-red    { background:#fee2e2; }
.st-card-title { font-size:14px; font-weight:600; color:#1e1b4b; margin:0 0 2px; } /* Diubah ke 600 */
.st-card-sub { font-size:11px; color:#9ca3af; margin:0; }
.st-card-body { padding:20px 24px; }

/* FIELDS */
.field { margin-bottom:16px; }
.field label {
    display:block; font-size:11px; font-weight:600; /* Diubah ke 600 agar lebih clean */
    color:#6b7280; text-transform:uppercase;
    letter-spacing:.05em; margin-bottom:7px;
}
.field input, .field textarea {
    width:100%; padding:10px 14px;
    border:1.5px solid #ede9fe; border-radius:10px;
    font-size:13px; color:#1e1b4b; outline:none;
    transition:border-color .2s; box-sizing:border-box;
    background:#fff;
}
.field input:focus { border-color:#a855f7; }
.field input[type="password"]:focus { border-color:#a855f7; }

.field-error { font-size:11px; color:#dc2626; margin-top:4px; }

/* BUTTONS */
.btn-save {
    padding:9px 22px; border-radius:10px;
    font-size:13px; font-weight:600; /* Diubah ke 600 sesuai standard Tailwind semibold */
    background:linear-gradient(135deg,#ec4899,#a855f7);
    color:#fff; border:none; cursor:pointer;
    transition:opacity .2s, transform .2s;
}
.btn-save:hover { opacity:.88; transform:translateY(-1px); }

.btn-danger {
    padding:9px 18px; border-radius:10px;
    font-size:13px; font-weight:600; /* Diubah ke 600 agar seimbang */
    background:#fee2e2; color:#dc2626;
    border:1.5px solid #fecaca; cursor:pointer;
    transition:background .15s;
}
.btn-danger:hover { background:#fecaca; }

.saved-msg {
    font-size:12px; color:#166534; font-weight:600;
    background:#dcfce7; padding:4px 12px;
    border-radius:99px; display:inline-block;
}

/* MODAL OVERLAY */
.modal-overlay {
    display:none; position:fixed; inset:0; z-index:50;
    background:rgba(0,0,0,.4); backdrop-filter:blur(4px);
    align-items:center; justify-content:center;
}
.modal-overlay.active { display:flex; }
.modal-box {
    background:#fff; border-radius:18px;
    width:100%; max-width:440px; margin:16px;
    overflow:hidden;
}
.modal-header {
    background:linear-gradient(135deg,#dc2626,#ef4444);
    padding:18px 22px;
}
.modal-header h3 { font-size:16px; font-weight:600; color:#fff; margin:0 0 3px; } /* Diubah ke 600 */
.modal-header p  { font-size:12px; color:rgba(255,255,255,.8); margin:0; }
.modal-body { padding:22px; }
.modal-footer { display:flex; justify-content:flex-end; gap:10px; margin-top:20px; }
.btn-cancel-modal {
    padding:9px 18px; border-radius:10px;
    font-size:13px; font-weight:600;
    background:#f3f4f6; color:#6b7280;
    border:none; cursor:pointer;
}
.btn-cancel-modal:hover { background:#e5e7eb; }
</style>

<div class="st-wrap">

    <h1 class="st-title">Pengaturan Akun</h1>
    <p class="st-subtitle">Kelola informasi akun dan keamanan kamu.</p>

    {{-- ACCOUNT INFORMATION --}}
    <div class="st-card">
        <div class="st-card-header">
            <div class="st-card-icon ic-violet">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#7c3aed" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            </div>
            <div>
                <p class="st-card-title">Informasi Akun</p>
                <p class="st-card-sub">Perbarui username dan alamat email kamu</p>
            </div>
        </div>
        <div class="st-card-body">

            <form id="send-verification" method="post" action="{{ route('verification.send') }}">@csrf</form>

            <form method="post" action="{{ route('settings.update') }}">
                @csrf
                @method('patch')

                <div class="field">
                    <label>Username</label>
                    <input type="text" name="username" value="{{ old('username', $user->username) }}" required autofocus autocomplete="name">
                    @error('username')<p class="field-error">{{ $message }}</p>@enderror
                </div>

                <div class="field">
    <label>Email</label>
    
    <input type="email" 
           name="email" 
           value="{{ old('email', $user->email) }}" 
           style="background: #f9fafb; color: #9ca3af; cursor: not-allowed;" 
           readonly 
           required 
           autocomplete="username">
    
    @error('email')<p class="field-error">{{ $message }}</p>@enderror

    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
    <div style="margin-top:8px;background:#fef3c7;border-radius:8px;padding:8px 12px;font-size:12px;color:#92400e;">
        Email belum terverifikasi.
        <button form="send-verification" style="font-weight:600;text-decoration:underline;background:none;border:none;cursor:pointer;color:#d97706;">
            Kirim ulang verifikasi
        </button>
        @if (session('status') === 'verification-link-sent')
        <span style="color:#166534;font-weight:600;display:block;margin-top:4px;">Link verifikasi telah dikirim!</span>
        @endif
    </div>
    @endif
</div>

                <div style="display:flex;align-items:center;gap:12px;">
                    <button type="submit" class="btn-save">Simpan Perubahan</button>
                    @if (session('status') === 'settings-updated')
                    <span class="saved-msg" x-data="{show:true}" x-show="show" x-init="setTimeout(()=>show=false,3000)">Tersimpan!</span>
                    @endif
                </div>
            </form>
        </div>
    </div>

    {{-- UPDATE PASSWORD --}}
    <div class="st-card">
        <div class="st-card-header">
            <div class="st-card-icon ic-amber">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#d97706" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
            </div>
            <div>
                <p class="st-card-title">Ubah Password</p>
                <p class="st-card-sub">Gunakan password yang kuat dan tidak mudah ditebak</p>
            </div>
        </div>
        <div class="st-card-body">
            <form method="post" action="{{ route('password.update') }}">
                @csrf
                @method('put')

                <div class="field">
                    <label>Password Saat Ini</label>
                    <input type="password" name="current_password" autocomplete="current-password">
                    @error('current_password', 'updatePassword')<p class="field-error">{{ $message }}</p>@enderror
                </div>
                <div class="field">
                    <label>Password Baru</label>
                    <input type="password" name="password" autocomplete="new-password">
                    @error('password', 'updatePassword')<p class="field-error">{{ $message }}</p>@enderror
                </div>
                <div class="field">
                    <label>Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" autocomplete="new-password">
                    @error('password_confirmation', 'updatePassword')<p class="field-error">{{ $message }}</p>@enderror
                </div>

                <div style="display:flex;align-items:center;gap:12px;">
                    <button type="submit" class="btn-save">Simpan Password</button>
                    @if (session('status') === 'password-updated')
                    <span class="saved-msg" x-data="{show:true}" x-show="show" x-init="setTimeout(()=>show=false,3000>Password diperbarui!</span>
                    @endif
                </div>
            </form>
        </div>
    </div>

    {{-- DELETE ACCOUNT --}}
    <div class="st-card" style="border-color:#fecaca;">
        <div class="st-card-header" style="border-bottom-color:#fff1f2;">
            <div class="st-card-icon ic-red">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#dc2626" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
            </div>
            <div>
                <p class="st-card-title" style="color:#dc2626;">Hapus Akun</p>
                <p class="st-card-sub">Tindakan ini tidak dapat dibatalkan</p>
            </div>
        </div>
        <div class="st-card-body">
            <p style="font-size:13px;color:#6b7280;margin:0 0 16px;">Setelah akun dihapus, semua data akan hilang permanen. Pastikan kamu sudah menyimpan data penting.</p>
            <button type="button" class="btn-danger" onclick="document.getElementById('deleteModal').classList.add('active')">
                Hapus Akun Saya
            </button>
        </div>
    </div>

</div>

{{-- DELETE MODAL --}}
<div id="deleteModal" class="modal-overlay" onclick="if(event.target===this)this.classList.remove('active')">
    <div class="modal-box">
        <div class="modal-header">
            <h3>Hapus Akun?</h3>
            <p>Semua data akan dihapus permanen dan tidak bisa dipulihkan.</p>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('settings.destroy') }}" id="deleteForm">
                @csrf
                @method('delete')
                <div class="field">
                    <label>Masukkan Password untuk Konfirmasi</label>
                    <input type="password" name="password" placeholder="Password kamu">
                    @error('password', 'userDeletion')<p class="field-error">{{ $message }}</p>@enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel-modal" onclick="document.getElementById('deleteModal').classList.remove('active')">Batal</button>
                    <button type="submit" class="btn-danger">Ya, Hapus Akun</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if($errors->userDeletion->isNotEmpty())
<script>document.getElementById('deleteModal').classList.add('active');</script>
@endif

</x-app-layout>
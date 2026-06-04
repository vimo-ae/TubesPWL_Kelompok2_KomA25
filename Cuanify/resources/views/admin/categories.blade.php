<x-app-layout>
<div class="flex min-h-screen -mx-4 sm:-mx-6 lg:-mx-8 -mt-6"
     x-data="{ showAddModal: false, showEditModal: false, editId: '', editName: '', editIcon: '', editDesc: '' }">

    @include('admin.partials.sidebar')

    <div class="flex-1 p-4 sm:p-6 lg:p-10 min-w-0">

        <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap');
        .cat-wrap { font-family:'DM Sans', sans-serif; }

        /* HERO */
        .admin-hero { 
            background: linear-gradient(135deg, #a855f7, #ec4899); 
            border-radius: 24px; 
            padding: 36px 40px; 
            margin-bottom: 24px; 
            position: relative; 
            overflow: hidden; 
            box-shadow: 0 10px 25px -5px rgba(168, 85, 247, 0.15);
        }
        .admin-hero::before { content:''; position:absolute; width:180px; height:180px; background:rgba(255,255,255,.08); border-radius:50%; top:-50px; right:40px; }
        .admin-hero::after  { content:''; position:absolute; width:100px; height:100px; background:rgba(255,255,255,.06); border-radius:50%; bottom:-20px; right:160px; }
        
        .hero-badge { 
            display: inline-flex; 
            align-items: center; 
            gap: 6px; 
            background: rgba(255,255,255,.18); 
            border: 1px solid rgba(255,255,255,.25); 
            backdrop-filter: blur(4px); 
            padding: 6px 14px; 
            border-radius: 99px; 
            font-size: 11px; 
            font-weight: 700; 
            color: #fff; 
            text-transform: uppercase; 
            letter-spacing: .06em; 
            margin-bottom: 14px; 
        }
        .hero-title { 
            font-family: 'DM Sans', sans-serif; 
            font-size: 32px; 
            font-weight: 800; 
            color: #fff; 
            margin: 0 0 8px; 
            position: relative; 
            z-index: 1; 
            letter-spacing: -0.02em;
        }
        .hero-title span { color:#fde68a; }
        .hero-desc { 
            font-size: 14px; 
            color: rgba(255,255,255,.85); 
            margin: 0; 
            position: relative; 
            z-index: 1; 
            font-weight: 400;
        }

        /* TABLES & COMPONENTS */
        .btn-add { display:inline-flex; align-items:center; gap:6px; padding:10px 20px; border-radius:11px; background:linear-gradient(135deg,#ec4899,#a855f7); color:#fff; font-size:13px; font-weight:700; border:none; cursor:pointer; transition:opacity .2s, transform .2s; }
        .btn-add:hover { opacity:.88; transform:translateY(-1px); }
        .alert-success { background:#dcfce7; color:#166534; border:1px solid #bbf7d0; border-radius:10px; padding:10px 16px; margin-bottom:16px; font-size:13px; font-weight:600; }
        .alert-error   { background:#fee2e2; color:#991b1b; border:1px solid #fecaca; border-radius:10px; padding:10px 16px; margin-bottom:16px; font-size:13px; font-weight:600; }
        .tbl-card { background:#fff; border:1px solid #ede9fe; border-radius:18px; overflow:hidden; margin-bottom:20px; }
        .tbl-head { display:flex; align-items:center; justify-content:space-between; padding:16px 22px; border-bottom:1px solid #f5f3ff; }
        .tbl-head-left { display:flex; align-items:center; gap:10px; }
        .tbl-icon { width:34px; height:34px; border-radius:9px; background:#ede9fe; display:flex; align-items:center; justify-content:center; }
        .cat-table { width:100%; border-collapse:collapse; font-size:13px; }
        .cat-table th { text-align:left; padding:10px 20px; font-size:10px; font-weight:700; text-transform:uppercase; letter-spacing:.05em; color:#9ca3af; border-bottom:1px solid #f5f3ff; }
        .cat-table th.center { text-align:center; }
        .cat-table td { padding:13px 20px; border-bottom:1px solid #f5f3ff; color:#374151; vertical-align:middle; }
        .cat-table tr:last-child td { border-bottom:none; }
        .cat-table tr:hover td { background:#faf5ff; }
        .cat-table td.center { text-align:center; }
        .cat-icon-cell { width:40px; height:40px; border-radius:10px; background:#fef3c7; display:flex; align-items:center; justify-content:center; font-size:18px; }
        .cat-name { font-weight:600; color:#1e1b4b; } .cat-desc { color:#6b7280; }
        .course-pill { background:#ede9fe; color:#7c3aed; font-weight:700; font-size:11px; padding:3px 10px; border-radius:99px; display:inline-block; white-space:nowrap; }
        .btn-edit { padding:5px 14px; border-radius:8px; background:#ede9fe; color:#7c3aed; border:1px solid #ddd6fe; font-size:11px; font-weight:700; cursor:pointer; transition:background .15s, transform .15s; }
        .btn-edit:hover { background:#7c3aed; color:#fff; transform:translateY(-1px); }
        .btn-hapus { padding:5px 14px; border-radius:8px; background:#fee2e2; color:#991b1b; border:1px solid #fecaca; font-size:11px; font-weight:700; cursor:pointer; transition:background .15s, transform .15s; }
        .btn-hapus:hover { background:#dc2626; color:#fff; transform:translateY(-1px); }
        .action-wrap { display:flex; gap:6px; justify-content:center; }
        .empty-row td { text-align:center; padding:32px; color:#9ca3af; font-size:13px; }
        
        /* MODALS */
        .modal-header { background:linear-gradient(135deg,#ec4899,#a855f7); padding:18px 22px; }
        .modal-header h3 { font-family:'DM Sans',sans-serif; font-size:16px; font-weight:800; color:#fff; margin:0 0 3px; }
        .modal-header p  { font-size:11px; color:rgba(255,255,255,.75); margin:0; }
        .modal-body { padding:22px; }
        .mfield { margin-bottom:16px; }
        .mfield label { display:block; font-size:11px; font-weight:700; color:#6b7280; text-transform:uppercase; letter-spacing:.05em; margin-bottom:6px; }
        .mfield input, .mfield textarea { width:100%; padding:10px 14px; border:1.5px solid #ede9fe; border-radius:10px; font-size:13px; color:#1e1b4b; outline:none; transition:border-color .2s; box-sizing:border-box; font-family:inherit; }
        .mfield input:focus, .mfield textarea:focus { border-color:#a855f7; }
        .mfield textarea { resize:none; }
        .modal-footer { display:flex; justify-content:flex-end; gap:10px; margin-top:4px; }
        .btn-batal { padding:9px 18px; border-radius:10px; font-size:13px; font-weight:600; background:#f3f4f6; color:#6b7280; border:none; cursor:pointer; }
        .btn-batal:hover { background:#e5e7eb; }
        .btn-simpan { padding:9px 20px; border-radius:10px; font-size:13px; font-weight:700; background:linear-gradient(135deg,#ec4899,#a855f7); color:#fff; border:none; cursor:pointer; transition:opacity .2s; }
        .btn-simpan:hover { opacity:.88; }
        </style>

        <div class="cat-wrap">

            {{-- HERO --}}
            <div class="admin-hero">
                <div class="hero-badge">
                    <svg width="11" height="11" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" style="display:inline; margin-right:4px; vertical-align:text-top;"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
                    Kelola Kategori
                </div>
                <h1 class="hero-title">Kategori Course <span>Cuanify</span></h1>
                <p class="hero-desc">Kelola dan organisir kategori course yang tersedia di platform pembelajaran.</p>
            </div>

            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;flex-wrap:wrap;gap:12px;">
                <div></div>
                <button @click="showAddModal = true" class="btn-add">
                    <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    Tambah Kategori
                </button>
            </div>

            @if(session('success'))<div class="alert-success">{{ session('success') }}</div>@endif
            @if(session('error'))<div class="alert-error">{{ session('error') }}</div>@endif

            <div class="tbl-card">
                <div class="tbl-head">
                    <div class="tbl-head-left">
                        <div class="tbl-icon"><svg width="17" height="17" fill="none" viewBox="0 0 24 24" stroke="#7c3aed" stroke-width="2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg></div>
                        <div>
                            <p style="font-family:'DM Sans',sans-serif;font-size:14px;font-weight:700;color:#1e1b4b;margin:0 0 2px;">Semua Kategori</p>
                            <p style="font-size:11px;color:#9ca3af;margin:0;">{{ $categories->count() }} kategori tersedia</p>
                        </div>
                    </div>
                </div>
                <table class="cat-table">
                    <thead><tr><th>Icon</th><th>Nama Kategori</th><th>Deskripsi</th><th class="center">Jumlah Course</th><th class="center">Aksi</th></tr></thead>
                    <tbody>
                        @forelse($categories as $category)
                        <tr>
                            <td><div class="cat-icon-cell">{{ $category->icon ?? '📁' }}</div></td>
                            <td class="cat-name">{{ $category->category_name }}</td>
                            <td class="cat-desc" style="max-width:260px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">{{ $category->description ?? '-' }}</td>
                            <td class="center"><span class="course-pill">{{ $category->courses_count }} Course</span></td>
                            <td class="center">
                                <div class="action-wrap">
                                    <button type="button" class="btn-edit"
                                        @click="showEditModal=true; editId='{{ $category->category_id }}'; editName='{{ $category->category_name }}'; editIcon='{{ $category->icon }}'; editDesc='{{ $category->description }}'">Edit</button>
                                    <form action="{{ route('admin.categories.destroy', $category->category_id) }}" method="POST" onsubmit="return confirm('Yakin hapus kategori ini?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn-hapus">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr class="empty-row"><td colspan="5">
                            <svg width="36" height="36" fill="none" viewBox="0 0 24 24" stroke="#ddd6fe" stroke-width="1.5" style="margin:0 auto 8px;display:block"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
                            Belum ada kategori.
                        </td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- MODAL TAMBAH --}}
        <div x-show="showAddModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/40 backdrop-blur-sm">
            <div class="bg-white rounded-2xl w-full max-w-md shadow-2xl overflow-hidden" @click.away="showAddModal=false">
                <div class="modal-header"><h3>Tambah Kategori Baru</h3><p>Isi informasi kategori yang ingin ditambahkan</p></div>
                <div class="modal-body">
                    <form action="{{ route('admin.categories.store') }}" method="POST">@csrf
                        <div class="mfield"><label>Nama Kategori</label><input type="text" name="category_name" placeholder="Contoh: Literasi Keuangan" required></div>
                        <div class="mfield"><label>Icon (Emoji)</label><input type="text" name="icon" placeholder="Contoh: 💰"></div>
                        <div class="mfield"><label>Deskripsi</label><textarea name="description" rows="3" placeholder="Deskripsi singkat kategori..."></textarea></div>
                        <div class="modal-footer">
                            <button type="button" class="btn-batal" @click="showAddModal=false">Batal</button>
                            <button type="submit" class="btn-simpan">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- MODAL EDIT --}}
        <div x-show="showEditModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/40 backdrop-blur-sm">
            <div class="bg-white rounded-2xl w-full max-w-md shadow-2xl overflow-hidden" @click.away="showEditModal=false">
                <div class="modal-header"><h3>Edit Kategori</h3><p>Perbarui informasi kategori</p></div>
                <div class="modal-body">
                    <form :action="'/admin/categories/' + editId" method="POST">@csrf @method('PUT')
                        <div class="mfield"><label>Nama Kategori</label><input type="text" name="category_name" x-model="editName" required></div>
                        <div class="mfield"><label>Icon (Emoji)</label><input type="text" name="icon" x-model="editIcon"></div>
                        <div class="mfield"><label>Deskripsi</label><textarea name="description" x-model="editDesc" rows="3"></textarea></div>
                        <div class="modal-footer">
                            <button type="button" class="btn-batal" @click="showEditModal=false">Batal</button>
                            <button type="submit" class="btn-simpan">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
</x-app-layout>
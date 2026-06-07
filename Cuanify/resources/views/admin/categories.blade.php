<x-app-layout>
<div class="flex min-h-screen bg-[#fcf9fe] -mx-4 sm:-mx-6 lg:-mx-8 -mt-6"
     x-data="{ showAddModal: false, showEditModal: false, editId: '', editName: '', editIcon: '', editDesc: '' }">

    @include('admin.partials.sidebar')

    <div class="flex-1 p-4 sm:p-6 lg:p-10 min-w-0">

        <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap');
        .cat-wrap { font-family:'DM Sans', sans-serif; }
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
        .cat-name { font-weight:600; color:#1e1b4b; } .cat-desc { color:#6b7280; }
        .course-pill { background:#ede9fe; color:#7c3aed; font-weight:700; font-size:11px; padding:3px 10px; border-radius:99px; display:inline-block; white-space:nowrap; }
        .btn-edit { padding:5px 14px; border-radius:8px; background:#ede9fe; color:#7c3aed; border:1px solid #ddd6fe; font-size:11px; font-weight:700; cursor:pointer; transition:background .15s, transform .15s; }
        .btn-edit:hover { background:#7c3aed; color:#fff; transform:translateY(-1px); }
        .btn-hapus { padding:5px 14px; border-radius:8px; background:#fee2e2; color:#991b1b; border:1px solid #fecaca; font-size:11px; font-weight:700; cursor:pointer; transition:background .15s, transform .15s; }
        .btn-hapus:hover { background:#dc2626; color:#fff; transform:translateY(-1px); }
        .action-wrap { display:flex; gap:6px; justify-content:center; }
        .empty-row td { text-align:center; padding:32px; color:#9ca3af; font-size:13px; }
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

            {{-- HERO BANNER --}}
            <div class="relative overflow-hidden rounded-[30px] bg-gradient-to-r from-[#b55fe6] via-[#df49a6] to-[#e84393] shadow-md min-h-[190px] flex items-center w-full mb-6">
                <div class="absolute right-0 top-0 bottom-0 w-1/2 overflow-hidden pointer-events-none">
                    <div class="absolute w-64 h-64 bg-white/10 rounded-full -right-10 -top-16 blur-sm"></div>
                    <div class="absolute w-40 h-40 bg-white/5 rounded-full right-16 -bottom-12 blur-sm"></div>
                </div>
                <div class="relative z-10 w-full flex flex-col justify-center px-10 py-8 text-white">
                    <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md px-4 py-1.5 rounded-full text-[10px] font-bold tracking-wider uppercase mb-4 border border-white/20 w-fit">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v8.25" />
                        </svg>
                        Kelola Kategori
                    </div>
                    <h1 class="text-3xl font-semibold tracking-normal mb-3 text-white">
                        Kategori Course <span class="text-[#f7e06d] font-bold">Cuanify</span>
                    </h1>
                    <p class="text-white/90 text-[13px] max-w-4xl font-normal leading-relaxed">
                        Kelola dan organisir kategori course yang tersedia di platform pembelajaran.
                    </p>
                </div>
            </div>

            <div style="display:flex;align-items:center;justify-content:flex-end;margin-bottom:20px;">
                <button @click="showAddModal = true" class="btn-add">
                    <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    Tambah Kategori
                </button>
            </div>

            @if(session('success'))<div class="alert-success">{{ session('success') }}</div>@endif
            @if(session('error'))<div class="alert-error">{{ session('error') }}</div>@endif

            <div class="tbl-card">
                <div class="tbl-head">
                    <div>
                        <p style="font-family:'DM Sans',sans-serif;font-size:14px;font-weight:700;color:#1e1b4b;margin:0 0 2px;">Semua Kategori</p>
                        <p style="font-size:11px;color:#9ca3af;margin:0;">{{ $categories->count() }} kategori tersedia</p>
                    </div>
                </div>
                <table class="cat-table">
                    <thead>
                        <tr>
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th class="center">Jumlah Course</th>
                            <th class="center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                        <tr>
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
                        <tr class="empty-row">
                            <td colspan="4">Belum ada kategori.</td>
                        </tr>
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
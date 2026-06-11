<x-app-layout>

    @section('title', 'Instructors - Cuanify')

<style>
@import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght=400;500;600;700;800&display=swap');

.iv-wrap { 
    font-family: 'DM Sans', sans-serif; 
    padding: 0 0 32px; 
}

/* HERO */
.admin-hero {
    background: linear-gradient(135deg, #a855f7, #ec4899);
    border-radius: 35px; 
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
.hero-title span { color: #fde68a; }
.hero-desc { 
    font-size: 14px; 
    color: rgba(255,255,255,.85); 
    margin: 0; 
    position: relative; 
    z-index: 1; 
    font-weight: 400;
}

/* CARDS & TABLES */
.iv-card { background:#fff; border:1px solid #ede9fe; border-radius:18px; overflow:hidden; margin-bottom:20px; }
.iv-card-header { padding:16px 22px; border-bottom:1px solid #f5f3ff; display:flex; align-items:center; gap:10px; }
.iv-card-icon { width:34px; height:34px; border-radius:9px; display:flex; align-items:center; justify-content:center; flex-shrink:0; }
.ic-amber { background:#fef3c7; } .ic-green { background:#dcfce7; } .ic-red { background:#fee2e2; }
.iv-card-title { font-family:'DM Sans',sans-serif; font-size:14px; font-weight:700; color:#1e1b4b; margin:0 0 2px; }
.iv-card-sub    { font-size:11px; color:#9ca3af; margin:0; }

.iv-table { width:100%; border-collapse:collapse; font-size:13px; }
.iv-table th { text-align:left; padding:10px 20px; font-size:10px; font-weight:700; text-transform:uppercase; letter-spacing:.05em; color:#9ca3af; border-bottom:1px solid #f5f3ff; }
.iv-table th.center { text-align:center; }
.iv-table td { padding:13px 20px; border-bottom:1px solid #f5f3ff; color:#374151; vertical-align:middle; }
.iv-table tr:last-child td { border-bottom:none; }
.iv-table tr:hover td { background:#faf5ff; }
.iv-table td.center { text-align:center; }
.name-bold { font-weight:600; color:#1e1b4b; } .email-muted { color:#6b7280; }
.pill { display:inline-block; padding:3px 10px; border-radius:99px; font-size:10px; font-weight:700; }
.pill-pending { background:#fef3c7; color:#d97706; }

/* MODIFIKASI: Ditengahkan lewat selector class utama action-wrap agar lebih konsisten */
.action-wrap { display:flex; flex-direction: column; gap:8px; justify-content:center; align-items: center; }

/* Menyamakan padding/font tombol aksi */
.btn-detail { padding:5px 14px; border-radius:8px; background:#f3e8ff; color:#6b21a8; border:1px solid #e9d5ff; font-size:11px; font-weight:700; cursor:pointer; transition:background .15s, transform .15s; }
.btn-detail:hover { background:#7e22ce; color:#fff; transform:translateY(-1px); }

.btn-approve { padding:5px 14px; border-radius:8px; background:#dcfce7; color:#166534; border:1px solid #bbf7d0; font-size:11px; font-weight:700; cursor:pointer; transition:background .15s, transform .15s; }
.btn-approve:hover { background:#16a34a; color:#fff; transform:translateY(-1px); }

.btn-reject  { padding:5px 14px; border-radius:8px; background:#fee2e2; color:#991b1b; border:1px solid #fecaca; font-size:11px; font-weight:700; cursor:pointer; transition:background .15s, transform .15s; }
.btn-reject:hover { background:#dc2626; color:#fff; transform:translateY(-1px); }

.empty-row td { text-align:center; padding:28px; color:#9ca3af; font-size:13px; }
.two-col { display:grid; grid-template-columns:1fr 1fr; gap:16px; }
@media(max-width:700px){ .two-col { grid-template-columns:1fr; } }
</style>

<div class="flex min-h-screen">

    <div class="flex-1 p-6 sm:p-8 lg:p-10">
        <div class="iv-wrap">

            <div class="relative overflow-hidden rounded-[35px] bg-gradient-to-r from-[#b55fe6] via-[#df49a6] to-[#e84393] shadow-md min-h-[190px] flex items-center w-full">
                <div class="absolute right-0 top-0 bottom-0 w-1/2 overflow-hidden pointer-events-none">
                    <div class="absolute w-64 h-64 bg-white/10 rounded-full -right-10 -top-16 blur-sm"></div>
                    <div class="absolute w-40 h-40 bg-white/5 rounded-full right-16 -bottom-12 blur-sm"></div>
                </div>
                <div class="relative z-10 w-full flex flex-col justify-center px-10 py-8 text-white">
                    <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md px-4 py-1.5 rounded-full text-[10px] font-bold tracking-wider uppercase mb-4 border border-white/20 w-fit">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>
                        Verifikasi Instruktur
                    </div>
                    <h1 class="text-3xl font-semibold tracking-normal mb-3 text-white">
                        Kelola Instruktur <span class="text-[#f7e06d] font-bold">Cuanify</span>
                    </h1>
                    <p class="text-white/90 text-[13px] max-w-4xl font-normal leading-relaxed">
                        Tinjau dan kelola status verifikasi akun instruktur yang mendaftar di platform untuk menjaga kualitas pengajar.
                    </p>
                </div>
            </div>

            <div class="iv-card mt-8">
                <div class="iv-card-header">
                    <div class="iv-card-icon ic-amber">
                        <svg width="17" height="17" fill="none" viewBox="0 0 24 24" stroke="#d97706" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    </div>
                    <div>
                        <p class="iv-card-title">Instruktur Pending</p>
                        <p class="iv-card-sub">Menunggu persetujuan admin</p>
                    </div>
                </div>
                <table class="iv-table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th class="center">Status</th>
                            <th class="center">Profil</th> 
                            <th class="center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $hasPending = false; @endphp
                        @foreach($instructors as $instructor)
                            @if($instructor->status_instructor == 'pending')
                            @php $hasPending = true; @endphp
                            <tr>
                                <td class="name-bold">{{ $instructor->username }}</td>
                                <td class="email-muted">{{ $instructor->email }}</td>
                                <td class="center"><span class="pill pill-pending">Pending</span></td>

                                <td class="center">
                                    <a href="{{ url('/admin/instructor/' . $instructor->user_id) }}" class="inline-block btn-detail">
                                        Detail
                                    </a>
                                </td>

                                <td class="center">
                                    <div class="action-wrap">
                                        
                                        <div style="display: flex; gap: 8px; align-items: center; justify-content: center;">
                                            <form action="{{ url('/admin/approve/' . $instructor->user_id) }}" method="POST" style="margin: 0;">
                                                @csrf
                                                <button type="submit" class="btn-approve">Setujui</button>
                                            </form>
                                            
                                            <button type="button" onclick="document.getElementById('form-tolak-{{ $instructor->user_id }}').classList.toggle('hidden')" class="btn-reject">
                                                Tolak
                                            </button>
                                        </div>

                                        <div id="form-tolak-{{ $instructor->user_id }}" class="hidden p-3 bg-gray-50 border border-gray-200 rounded-lg shadow-inner w-60 text-left mx-auto">
                                            <form action="{{ url('/admin/reject/' . $instructor->user_id) }}" method="POST" style="margin: 0;">
                                                @csrf
                                                <label class="block text-[11px] text-gray-500 mb-1 font-bold uppercase tracking-wider">
                                                    Alasan Penolakan:
                                                </label>
                                                <input type="text" name="reason" placeholder="Ketik alasan di sini..." required class="w-full border border-gray-300 rounded px-2 py-1.5 text-sm text-gray-700 mb-3 focus:outline-none focus:border-red-400">
                                                <div class="flex gap-2">
                                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs font-bold w-full transition-all">Kirim</button>
                                                    <button type="button" onclick="document.getElementById('form-tolak-{{ $instructor->user_id }}').classList.add('hidden')" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-1 rounded text-xs font-bold w-full transition-all">Batal</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                        @if(!$hasPending)
                        <tr class="empty-row"><td colspan="5">
                            <svg width="32" height="32" fill="none" viewBox="0 0 24 24" stroke="#ddd6fe" stroke-width="1.5" style="margin:0 auto 6px;display:block"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            Tidak ada instruktur pending
                        </td></tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="two-col">
                <div class="iv-card">
                    <div class="iv-card-header">
                        <div class="iv-card-icon ic-green"><svg width="17" height="17" fill="none" viewBox="0 0 24 24" stroke="#16a34a" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg></div>
                        <div><p class="iv-card-title" style="color:#166534;">Instruktur Approved</p><p class="iv-card-sub">Sudah disetujui dan aktif</p></div>
                    </div>
                    <table class="iv-table">
                        <thead><tr><th>Nama</th><th>Email</th></tr></thead>
                        <tbody>
                            @forelse($approvedInstructors as $i)
                            <tr><td class="name-bold">{{ $i->username }}</td><td class="email-muted">{{ $i->email }}</td></tr>
                            @empty
                            <tr class="empty-row"><td colspan="2">Belum ada instruktur approved</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="iv-card">
                    <div class="iv-card-header">
                        <div class="iv-card-icon ic-red"><svg width="17" height="17" fill="none" viewBox="0 0 24 24" stroke="#dc2626" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg></div>
                        <div><p class="iv-card-title" style="color:#991b1b;">Instruktur Rejected</p><p class="iv-card-sub">Ditolak oleh admin</p></div>
                    </div>
                    <table class="iv-table">
                        <thead><tr><th>Nama</th><th>Email</th></tr></thead>
                        <tbody>
                            @forelse($rejectedInstructors as $i)
                            <tr><td class="name-bold">{{ $i->username }}</td><td class="email-muted">{{ $i->email }}</td></tr>
                            @empty
                            <tr class="empty-row"><td colspan="2">Belum ada instruktur rejected</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
</x-app-layout>
<x-app-layout>

<style>
@import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap');

.iv-wrap { 
    font-family: 'DM Sans', sans-serif; 
    padding: 0 0 32px; 
}

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
.iv-card-sub   { font-size:11px; color:#9ca3af; margin:0; }

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
.action-wrap { display:flex; gap:6px; justify-content:center; }
.btn-approve { padding:5px 14px; border-radius:8px; background:#dcfce7; color:#166534; border:1px solid #bbf7d0; font-size:11px; font-weight:700; cursor:pointer; transition:background .15s, transform .15s; }
.btn-approve:hover { background:#16a34a; color:#fff; transform:translateY(-1px); }
.btn-reject  { padding:5px 14px; border-radius:8px; background:#fee2e2; color:#991b1b; border:1px solid #fecaca; font-size:11px; font-weight:700; cursor:pointer; transition:background .15s, transform .15s; }
.btn-reject:hover { background:#dc2626; color:#fff; transform:translateY(-1px); }
.empty-row td { text-align:center; padding:28px; color:#9ca3af; font-size:13px; }
.two-col { display:grid; grid-template-columns:1fr 1fr; gap:16px; }
@media(max-width:700px){ .two-col { grid-template-columns:1fr; } }
</style>

<div class="flex min-h-screen bg-[#fcf9fe] -mx-4 sm:-mx-6 lg:-mx-8 -mt-6">
    @include('admin.partials.sidebar')
    <div class="flex-1 p-6 lg:p-10">
        <div class="iv-wrap">

            {{-- HERO --}}
            <div class="admin-hero">
                <div class="hero-badge">
                    <svg width="11" height="11" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" style="display:inline; margin-right:4px; vertical-align:text-top;"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    Verifikasi Instruktur
                </div>
                <h1 class="hero-title">Kelola Instruktur <span>Cuanify</span></h1>
                <p class="hero-desc">Tinjau dan kelola status verifikasi akun instruktur yang mendaftar di platform.</p>
            </div>

            {{-- PENDING --}}
            <div class="iv-card">
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
                    <thead><tr><th>Nama</th><th>Email</th><th class="center">Status</th><th class="center">Aksi</th></tr></thead>
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
                                    <div class="action-wrap">
                                        <form action="/admin/approve/{{ $instructor->user_id }}" method="POST">@csrf<button type="submit" class="btn-approve">Setujui</button></form>
                                        <form action="/admin/reject/{{ $instructor->user_id }}" method="POST">@csrf<button type="submit" class="btn-reject">Tolak</button></form>
                                    </div>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                        @if(!$hasPending)
                        <tr class="empty-row"><td colspan="4">
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
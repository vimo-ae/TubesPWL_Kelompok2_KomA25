<x-app-layout>

<style>
@import url('https://fonts.googleapis.com/css2?family=Outfit:wght@700;800&family=DM+Sans:wght@400;500;600&display=swap');

.dash-wrap {
    font-family: 'DM Sans', sans-serif;
    padding: 8px 0;
}

/* ---- HERO ---- */
.hero-banner {
    background: linear-gradient(135deg, #7c3aed, #a855f7 50%, #ec4899);
    border-radius: 20px;
    padding: 32px 36px;
    margin-bottom: 24px;
    position: relative;
    overflow: hidden;
}
.hero-banner h1 {
    font-family: 'Outfit', sans-serif;
    font-size: 26px;
    font-weight: 800;
    color: #fff;
    margin: 0 0 8px;
    position: relative;
    z-index: 2;
}
.hero-banner h1 .brand {
    background: linear-gradient(90deg, #fde68a, #fbcfe8);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.hero-banner p {
    color: rgba(255,255,255,.78);
    font-size: 14px;
    margin: 0;
    position: relative;
    z-index: 2;
}
.orb {
    position: absolute;
    border-radius: 50%;
    opacity: .15;
    pointer-events: none;
}
.orb-1 { width:160px; height:160px; background:#fff;    top:-55px;  right:40px; }
.orb-2 { width:90px;  height:90px;  background:#fde68a; bottom:-25px; right:180px; }
.orb-3 { width:55px;  height:55px;  background:#fbcfe8; top:10px;   right:230px; }

/* ---- STATS GRID ---- */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 14px;
    margin-bottom: 24px;
}
@media (max-width: 900px) { .stats-grid { grid-template-columns: repeat(2,1fr); } }

.stat-card {
    background: #fff;
    border: 1px solid #ede9fe;
    border-radius: 16px;
    padding: 18px;
    display: flex;
    align-items: center;
    gap: 14px;
    transition: transform .2s, box-shadow .2s;
}
.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 28px rgba(124,58,237,.12);
}
.stat-icon {
    width: 52px; height: 52px;
    border-radius: 13px;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
}
.icon-violet { background: #ede9fe; }
.icon-pink   { background: #fce7f3; }
.icon-teal   { background: #ccfbf1; }
.icon-amber  { background: #fef3c7; }
.stat-label {
    font-size: 10px; font-weight: 600;
    text-transform: uppercase; letter-spacing: .06em;
    color: #9ca3af; margin: 0 0 3px;
}
.stat-value {
    font-family: 'Outfit', sans-serif;
    font-size: 28px; font-weight: 800;
    color: #1e1b4b; line-height: 1; margin: 0 0 6px;
}
.stat-badge {
    font-size: 10px; font-weight: 600;
    padding: 3px 9px; border-radius: 99px; display: inline-block;
}
.badge-green  { background: #dcfce7; color: #166534; }
.badge-gray   { background: #f1f5f9; color: #475569; }
.badge-amber  { background: #fef3c7; color: #d97706; }

/* ---- CONTENT GRID ---- */
.content-grid {
    display: grid;
    grid-template-columns: 1.6fr 1fr;
    gap: 16px;
}
@media (max-width: 860px) { .content-grid { grid-template-columns: 1fr; } }

/* ---- CARD ---- */
.dash-card {
    background: #fff;
    border: 1px solid #ede9fe;
    border-radius: 16px;
    padding: 22px;
}
.card-head {
    display: flex; align-items: flex-start;
    justify-content: space-between; margin-bottom: 18px;
}
.card-title {
    font-family: 'Outfit', sans-serif;
    font-size: 15px; font-weight: 700;
    color: #1e1b4b; margin: 0 0 4px;
}
.card-sub { font-size: 12px; color: #9ca3af; margin: 0; }
.badge-pill {
    background: linear-gradient(135deg, #7c3aed, #ec4899);
    color: #fff; font-family: 'Outfit', sans-serif;
    font-weight: 700; font-size: 13px;
    min-width: 32px; height: 32px; border-radius: 9px;
    display: flex; align-items: center; justify-content: center;
    padding: 0 9px;
}

/* ---- TASK LIST ---- */
.task-list { display: flex; flex-direction: column; gap: 10px; }
.task-item {
    display: flex; align-items: center;
    justify-content: space-between;
    padding: 13px 15px; border-radius: 11px;
    text-decoration: none; color: inherit;
    border: 1px solid transparent;
    transition: transform .15s;
}
.task-item:hover { transform: translateX(4px); }
.task-warn { background: #fffbeb; border-color: #fde68a; }
.task-ok   { background: #f0fdf4; border-color: #bbf7d0; }
.task-left { display: flex; align-items: center; gap: 12px; }
.task-right { display: flex; align-items: center; gap: 8px; }
.task-dot {
    width: 10px; height: 10px;
    border-radius: 50%; flex-shrink: 0;
}
.dot-amber { background: #d97706; box-shadow: 0 0 0 3px #fde68a; }
.dot-green { background: #22c55e; box-shadow: 0 0 0 3px #bbf7d0; }
.task-name { font-weight: 600; font-size: 13px; color: #1e1b4b; margin: 0 0 2px; }
.task-desc { font-size: 11px; color: #9ca3af; margin: 0; }
.task-num {
    background: #d97706; color: #fff;
    font-family: 'Outfit', sans-serif; font-weight: 700;
    font-size: 12px; width: 26px; height: 26px;
    border-radius: 7px;
    display: flex; align-items: center; justify-content: center;
}

/* ---- QUICK ACTIONS ---- */
.quick-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
.quick-btn {
    display: flex; flex-direction: column;
    align-items: center; justify-content: center;
    gap: 9px; padding: 20px 10px;
    border-radius: 13px; font-size: 12px; font-weight: 600;
    text-decoration: none; border: 1.5px solid transparent;
    transition: transform .18s, box-shadow .18s; text-align: center;
}
.quick-btn:hover { transform: translateY(-3px); box-shadow: 0 6px 18px rgba(0,0,0,.09); }
.qbtn-violet { background: #ede9fe; border-color: #c4b5fd; color: #7c3aed; }
.qbtn-pink   { background: #fce7f3; border-color: #fbcfe8; color: #db2777; }
.qbtn-teal   { background: #ccfbf1; border-color: #99f6e4; color: #0d9488; }
.qbtn-amber  { background: #fef3c7; border-color: #fde68a; color: #d97706; }

/* ---- INSTRUCTOR TABLE ---- */
.section-title {
    font-family: 'Outfit', sans-serif;
    font-size: 17px; font-weight: 700;
    color: #1e1b4b; margin: 0 0 14px;
}
.inst-table {
    width: 100%; border-collapse: collapse;
    font-size: 13px;
}
.inst-table th {
    text-align: left; padding: 10px 14px;
    font-size: 10px; font-weight: 700;
    text-transform: uppercase; letter-spacing: .05em;
    color: #9ca3af;
    border-bottom: 1px solid #ede9fe;
}
.inst-table td {
    padding: 12px 14px;
    border-bottom: 1px solid #f5f3ff;
    color: #374151; vertical-align: middle;
}
.inst-table tr:last-child td { border-bottom: none; }
.inst-table tr:hover td { background: #faf5ff; }

.pill {
    display: inline-block;
    padding: 3px 10px; border-radius: 99px;
    font-size: 10px; font-weight: 700;
}
.pill-pending  { background: #fef3c7; color: #d97706; }
.pill-approved { background: #dcfce7; color: #166534; }
.pill-rejected { background: #fee2e2; color: #991b1b; }

.btn-approve {
    background: #7c3aed; color: #fff;
    border: none; border-radius: 8px;
    padding: 5px 12px; font-size: 11px;
    font-weight: 600; cursor: pointer;
    transition: background .15s;
}
.btn-approve:hover { background: #6d28d9; }
.btn-reject {
    background: #fee2e2; color: #991b1b;
    border: none; border-radius: 8px;
    padding: 5px 12px; font-size: 11px;
    font-weight: 600; cursor: pointer;
    transition: background .15s;
}
.btn-reject:hover { background: #fecaca; }
.action-gap { display: flex; gap: 6px; }
</style>

<div class="dash-wrap">

    {{-- HERO --}}
    <div class="hero-banner">
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>
        <div class="orb orb-3"></div>
        <h1>Selamat datang di <span class="brand">Cuanify</span></h1>
        <p>Kelola platform belajar mengajar dengan mudah dan efisien.</p>
    </div>

    {{-- STATS --}}
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon icon-violet">
                <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="#7c3aed" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 14c-4 0-7 2-7 4v1h14v-1c0-2-3-4-7-4z"/><circle cx="12" cy="8" r="4"/>
                </svg>
            </div>
            <div>
                <p class="stat-label">Total Student</p>
                <p class="stat-value">{{ $totalStudents }}</p>
                <span class="stat-badge badge-green">Aktif</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon icon-pink">
                <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="#db2777" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
            </div>
            <div>
                <p class="stat-label">Total Instructor</p>
                <p class="stat-value">{{ $totalInstructors }}</p>
                <span class="stat-badge badge-green">Terdaftar</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon icon-teal">
                <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="#0d9488" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                </svg>
            </div>
            <div>
                <p class="stat-label">Total Course</p>
                <p class="stat-value">{{ $totalCourses }}</p>
                <span class="stat-badge badge-gray">Tersedia</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon icon-amber">
                <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="#d97706" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
                </svg>
            </div>
            <div>
                <p class="stat-label">Pending Verifikasi</p>
                <p class="stat-value">{{ $pendingInstructors }}</p>
                <span class="stat-badge badge-amber">Perlu Tindakan</span>
            </div>
        </div>
    </div>

    {{-- CONTENT GRID --}}
    <div class="content-grid" style="margin-bottom:24px">

        {{-- Tugas --}}
        <div class="dash-card">
            <div class="card-head">
                <div>
                    <p class="card-title">Tugas Menunggu Anda</p>
                    <p class="card-sub">Item yang memerlukan perhatian segera</p>
                </div>
                <div class="badge-pill">{{ $pendingInstructors }}</div>
            </div>
            <div class="task-list">
                <a href="{{ route('admin.users') }}" class="task-item task-warn">
                    <div class="task-left">
                        <div class="task-dot dot-amber"></div>
                        <div>
                            <p class="task-name">Instruktur menunggu verifikasi</p>
                            <p class="task-desc">Tinjau dan setujui akun instruktur baru</p>
                        </div>
                    </div>
                    <div class="task-right">
                        <div class="task-num">{{ $pendingInstructors }}</div>
                        <svg width="15" height="15" fill="none" stroke="#d97706" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </div>
                </a>
                <div class="task-item task-ok">
                    <div class="task-left">
                        <div class="task-dot dot-green"></div>
                        <div>
                            <p class="task-name">Semua course sudah ditinjau</p>
                            <p class="task-desc">Tidak ada kursus yang menunggu review</p>
                        </div>
                    </div>
                    <svg width="18" height="18" fill="none" stroke="#22c55e" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <polyline points="20 6 9 17 4 12"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Quick Actions --}}
        <div class="dash-card">
            <div class="card-head">
                <div>
                    <p class="card-title">Aksi Cepat</p>
                    <p class="card-sub">Shortcut menu yang sering digunakan</p>
                </div>
            </div>
            <div class="quick-grid">
                <a href="{{ route('admin.users') }}" class="quick-btn qbtn-violet">
                    <svg width="26" height="26" fill="none" viewBox="0 0 24 24" stroke="#7c3aed" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 14c-4 0-7 2-7 4v1h14v-1c0-2-3-4-7-4z"/><circle cx="12" cy="8" r="4"/>
                    </svg>
                    <span>Kelola User</span>
                </a>
                <a href="{{ route('admin.users') }}" class="quick-btn qbtn-pink">
                    <svg width="26" height="26" fill="none" viewBox="0 0 24 24" stroke="#db2777" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                    <span>Kelola Instruktur</span>
                </a>
                <a href="{{ route('courses.index') }}" class="quick-btn qbtn-teal">
                    <svg width="26" height="26" fill="none" viewBox="0 0 24 24" stroke="#0d9488" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                    </svg>
                    <span>Kelola Course</span>
                </a>
                <a href="{{ route('admin.users') }}" class="quick-btn qbtn-amber">
                    <svg width="26" height="26" fill="none" viewBox="0 0 24 24" stroke="#d97706" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>
                    </svg>
                    <span>Verifikasi</span>
                </a>
            </div>
        </div>
    </div>

    {{-- TABEL INSTRUKTUR PENDING --}}
    @if($instructors->isNotEmpty())
    <div class="dash-card">
        <div class="card-head">
            <div>
                <p class="card-title">Daftar Instruktur</p>
                <p class="card-sub">Kelola status verifikasi instruktur</p>
            </div>
        </div>
        <div style="overflow-x:auto">
            <table class="inst-table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($instructors as $inst)
                    <tr>
                        <td style="font-weight:600">{{ $inst->name }}</td>
                        <td style="color:#6b7280">{{ $inst->email }}</td>
                        <td>
                            @if($inst->status_instructor === 'pending')
                                <span class="pill pill-pending">Pending</span>
                            @elseif($inst->status_instructor === 'approved')
                                <span class="pill pill-approved">Disetujui</span>
                            @else
                                <span class="pill pill-rejected">Ditolak</span>
                            @endif
                        </td>
                        <td>
                            @if($inst->status_instructor === 'pending')
                            <div class="action-gap">
                                <form method="POST" action="/admin/approve/{{ $inst->id }}">
                                    @csrf
                                    <button type="submit" class="btn-approve">Setujui</button>
                                </form>
                                <form method="POST" action="/admin/reject/{{ $inst->id }}">
                                    @csrf
                                    <button type="submit" class="btn-reject">Tolak</button>
                                </form>
                            </div>
                            @else
                                <span style="font-size:11px;color:#9ca3af">—</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

</div>

</x-app-layout>
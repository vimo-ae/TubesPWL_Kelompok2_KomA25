<x-app-layout>

<style>
/* SET GLOBAL FONT MENGGUNAKAN UI-SANS-SERIF */
.pf, 
.pf h1, 
.pf h2, 
.pf p, 
.pf span, 
.pf div, 
.pf table, 
.pf th, 
.pf td, 
.pf a { 
    font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif !important; 
}

.pf { max-width:960px; margin:0 auto; padding:32px 16px; }

/* ---- PAGE TITLE ---- */
.pf-title { font-size:28px; font-weight:700; color:#1e1b4b; margin:0 0 4px; }
.pf-subtitle { font-size:14px; color:#6b7280; margin:0 0 24px; }

/* ---- HERO ---- */
.hero-card {
    background:#fff; border:1px solid #ede9fe; border-radius:20px;
    padding:28px 32px; margin-bottom:16px;
    display:flex; align-items:center; gap:28px;
    position:relative; overflow:hidden;
}
.hero-card::after {
    content:''; position:absolute;
    width:200px; height:200px; border-radius:50%;
    background: rgba(255,255,255,0.6);
    right:-40px; top:-40px; pointer-events:none;
}
.hero-card::before {
    content:''; position:absolute;
    top:0; left:0; right:0; height:4px;
    background:linear-gradient(to right,#ec4899,#d946ef,#a855f7);
}
.avatar-wrap { position:relative; flex-shrink:0; }
.avatar-img {
    width:100px; height:100px; border-radius:50%; object-fit:cover;
    border:3px solid transparent;
    background:linear-gradient(#fff,#fff) padding-box,
               linear-gradient(135deg,#ec4899,#a855f7) border-box;
}
.avatar-edit {
    position:absolute; bottom:2px; right:2px;
    width:26px; height:26px; border-radius:50%;
    background:linear-gradient(135deg,#ec4899,#a855f7);
    display:flex; align-items:center; justify-content:center;
    cursor:pointer; border:2px solid #fff;
    text-decoration:none;
}
.hero-info { flex:1; position:relative; z-index:1; }
.hero-name { font-size:24px; font-weight:700; color:#1e1b4b; margin:0 0 4px; display:flex; align-items:center; gap:8px; }
.role-badge { font-size:10px; font-weight:700; padding:3px 10px; border-radius:99px; }
.role-admin      { background:#ede9fe; color:#7c3aed; }
.role-student    { background:#ccfbf1; color:#0d9488; }
.role-instructor { background:#fce7f3; color:#db2777; }
.hero-bio { font-size:14px; color:#6b7280; font-style:italic; line-height: 1.6; margin:0 0 12px; }
.hero-meta { display:flex; flex-direction:column; gap:5px; margin-bottom:16px; }
.meta-row { display:flex; align-items:center; gap:7px; font-size:14px; color:#6b7280; }
.btn-edit-hero {
    display:inline-flex; align-items:center; gap:6px;
    padding:8px 14px; border-radius:9px;
    background:#f5f3ff; color:#7c3aed;
    font-size:12px; font-weight:600;
    text-decoration:none; border:1px solid #ddd6fe;
    transition:background .15s;
}
.btn-edit-hero:hover { background:#ede9fe; color:#7c3aed; }

/* ---- STAT MINI ROW ---- */
.stat-row { display:grid; grid-template-columns:repeat(4,1fr); gap:12px; margin-bottom:16px; }
.stat-mini {
    background:#fff; border:1px solid #ede9fe; border-radius:14px;
    padding:16px; text-align:center;
    transition:transform .2s, box-shadow .2s;
}
.stat-mini:hover { transform:translateY(-3px); box-shadow:0 6px 20px rgba(124,58,237,.1); }
.stat-mini-icon {
    width:40px; height:40px; border-radius:10px;
    display:flex; align-items:center; justify-content:center;
    margin:0 auto 8px;
}
.si-violet { background:#ede9fe; }
.si-pink   { background:#fce7f3; }
.si-amber  { background:#fef3c7; }
.si-teal   { background:#ccfbf1; }
.stat-mini-label { font-size:12px; color:#9ca3af; font-weight:600; text-transform:uppercase; letter-spacing:.04em; margin-bottom:3px; }
.stat-mini-val { font-size:24px; font-weight:800; color:#1e1b4b; line-height:1; margin-bottom:2px; }
.stat-mini-sub { font-size:12px; color:#9ca3af; font-weight: 500; }

/* ---- PROGRESS ---- */
.progress-card {
    background:#fff; border:1px solid #ede9fe; border-radius:16px;
    padding:22px; margin-bottom:16px;
}
.section-head { display:flex; align-items:center; gap:8px; margin-bottom:18px; }
.section-title { font-size:18px; font-weight:700; color:#1e1b4b; margin:0; }
.progress-inner { display:flex; align-items:center; gap:28px; }

.ring-wrap { position:relative; width:150px; height:150px; flex-shrink:0; }
.ring-wrap svg { transform:rotate(-90deg); }
.ring-center { position:absolute; inset:0; display:flex; flex-direction:column; align-items:center; justify-content:center; }

.ring-pct { font-size:28px; font-weight:700; color:#7c3aed; line-height:1; margin-bottom: 2px; }
.ring-lbl { font-size:10px; color:#9ca3af; font-weight:600; text-transform: uppercase; letter-spacing: 0.05em; }

.progress-right { flex:1; }
.prog-encourage { font-size:16px; font-weight: 400; color:#6b7280; margin:0 0 12px; }
.prog-stat-grid { display:grid; grid-template-columns:1fr 1fr; gap:8px; }
.prog-stat-box { background:#faf5ff; border-radius:10px; padding:10px 14px; }
.psb-label {
    font-size: 14px;            
    color: #000000;             
    font-weight: 600;            
    display: inline-block;            
}
.psb-val { 
    font-size: 28px;          
    font-weight: 800; 
    color: #1e1b4b; 
    margin: 0 0 2px;
}
.psb-sub { 
    font-size: 13px; 
    color: #7c3aed;       
    font-weight: 600;
}

/* ---- TWO COL ---- */
.two-col { display:grid; grid-template-columns:1fr 1fr; gap:14px; margin-bottom:14px; align-items: start;}
@media(max-width:700px){ .two-col { grid-template-columns:1fr; } .stat-row { grid-template-columns:repeat(2,1fr); } }

/* ---- INFO CARD ---- */
.info-card { background:#fff; border:1px solid #ede9fe; border-radius:16px; padding:22px; }
.info-row { padding:10px 0; border-bottom:1px solid #f5f3ff; }
.info-row:last-of-type { border-bottom:none; }
.info-label { font-size:10px; color:#9ca3af; font-weight:600; text-transform:uppercase; letter-spacing:.04em; margin:0 0 3px; }
.info-val { font-size:13px; font-weight:600; color:#1e1b4b; margin:0; }
.btn-ubah {
    display:flex; align-items:center; justify-content:center; gap:6px;
    width:100%; margin-top:16px;
    padding:10px; border-radius:10px;
    background:#f5f3ff; color:#7c3aed;
    font-size:14px; font-weight:600;
    text-decoration:none; border:1px solid #ddd6fe;
    transition:background .15s;
}
.btn-ubah:hover { background:#ede9fe; color:#7c3aed; }

.hist-table { width:100%; border-collapse:collapse; font-size:14px; table-layout: auto;}
.hist-table th {
    text-align:left; padding:8px 10px;
    font-size:12px; font-weight:700; text-transform:uppercase;
    letter-spacing:.05em; color:#9ca3af;
    border-bottom:1px solid #ede9fe;
}
.hist-table th:nth-child(2), .hist-table td:nth-child(2),
.hist-table th:nth-child(3), .hist-table td:nth-child(3) {
    white-space: nowrap; 
    width: 1%; 
}

.hist-table td:first-child {
    word-break: break-word;
}

.hist-table td { padding:10px 10px; border-bottom:1px solid #f5f3ff; color:#374151; vertical-align:middle; }
.hist-table tr:last-child td { border-bottom:none; }
.hist-table tr:hover td { background:#faf5ff; }
.xp-pill { background:#ede9fe; color:#7c3aed; font-weight:700; font-size:12px; padding:2px 8px; border-radius:99px; display:inline-block; }
.empty-box { text-align:center; padding:20px 10px; }
.empty-box p { font-size:12px; color:#9ca3af; margin:8px 0 0; }

/* ---- COURSES ---- */
.courses-card { background:#fff; border:1px solid #ede9fe; border-radius:16px; padding:22px; }
.course-grid { display:grid; grid-template-columns:1fr 1fr; gap:10px; }
@media(max-width:700px){ .course-grid { grid-template-columns:1fr; } }
.course-item {
    background:#faf5ff; border:1px solid #ede9fe;
    border-radius:12px; padding:14px;
}
.course-name { font-weight:600; font-size:13px; color:#1e1b4b; margin:0 0 6px; }
.course-status-pill { font-size:10px; font-weight:700; padding:2px 8px; border-radius:99px; display:inline-block; margin-bottom:8px; }
.cs-completed { background:#dcfce7; color:#166534; }
.cs-active    { background:#ede9fe; color:#7c3aed; }
.cs-dropped   { background:#fee2e2; color:#991b1b; }
.prog-bar-wrap { background:#e9d5ff; border-radius:99px; height:6px; overflow:hidden; }
.prog-bar-fill { height:100%; border-radius:99px; background:linear-gradient(to right,#a855f7,#ec4899); }
.prog-bar-label { display:flex; justify-content:space-between; font-size:10px; color:#9ca3af; margin-bottom:3px; }
</style>

<div class="pf">

    @if(session('success'))
    <div style="background:#dcfce7;color:#166534;border:1px solid #bbf7d0;border-radius:10px;padding:11px 16px;margin-bottom:16px;font-size:13px;font-weight:600;">
        {{ session('success') }}
    </div>
    @endif

    <h1 class="pf-title">Profil Saya</h1>
    <p class="pf-subtitle">Kelola informasi profil dan lihat perkembangan belajar kamu.</p>

    {{-- HERO --}}
    <div class="hero-card">
        <div class="avatar-wrap">
            <img src="{{ Auth::user()->profile?->profile_photo && Storage::disk('public')->exists(Auth::user()->profile->profile_photo) ? Storage::url(Auth::user()->profile->profile_photo) : asset('images/profile-default.jpg') }}" class="avatar-img" alt="Foto Profil">
            <a href="{{ route('profile.edit') }}" class="avatar-edit">
                <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="#fff" stroke-width="2.5"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
            </a>
        </div>
        <div class="hero-info">
            <h2 class="hero-name">
                {{ $profile->full_name ?? $user->username }}
                <span class="role-badge role-{{ $user->role }}">{{ ucfirst($user->role) }}</span>
            </h2>
            <p class="hero-bio">"{{ $profile->bio ?? 'Belum ada bio.' }}"</p>
            <div class="hero-meta">
                <div class="meta-row">
                    <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="#9ca3af" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    {{ $user->email }}
                </div>
                <div class="meta-row">
                    <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="#9ca3af" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    Bergabung {{ $user->created_at ? \Carbon\Carbon::parse($user->created_at)->translatedFormat('d F Y') : '-' }}
                </div>
            </div>
            <a href="{{ route('profile.edit') }}" class="btn-edit-hero">
                <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                Edit Profil
            </a>
        </div>
    </div>

    {{-- STAT MINI ROW --}}
    <div class="stat-row">
        <div class="stat-mini">
            <div class="stat-mini-icon si-violet">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#7c3aed" stroke-width="2"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
            </div>
            <p class="stat-mini-label">Level</p>
            <p class="stat-mini-val">{{ $profile->level ?? 1 }}</p>
            <p class="stat-mini-sub">{{ ($profile->level ?? 1) <= 3 ? 'Pemula' : (($profile->level ?? 1) <= 7 ? 'Menengah' : 'Expert') }}</p>
        </div>
        <div class="stat-mini">
            <div class="stat-mini-icon si-pink">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#db2777" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            </div>
            <p class="stat-mini-label">Total XP</p>
            <p class="stat-mini-val">{{ number_format($profile->xp_points ?? 0) }}</p>
            <p class="stat-mini-sub">XP</p>
        </div>
        <div class="stat-mini">
            <div class="stat-mini-icon si-amber">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#d97706" stroke-width="2"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
            </div>
            <p class="stat-mini-label">Streak Belajar</p>
            <p class="stat-mini-val">{{ $profile->streak_days ?? 0 }}</p>
            <p class="stat-mini-sub">Hari</p>
        </div>
        <div class="stat-mini">
            <div class="stat-mini-icon si-teal">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#0d9488" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
            </div>
            <p class="stat-mini-label">Kelas Diikuti</p>
            <p class="stat-mini-val">{{ $enrolledCourses->count() }}</p>
            <p class="stat-mini-sub">Kelas</p>
        </div>
    </div>

    {{-- PROGRESS BELAJAR --}}
    <div class="progress-card">
        <div class="section-head">
            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#7c3aed" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            <p class="section-title">Progress Belajar</p>
        </div>
        <div class="progress-inner">
            
            <div class="ring-wrap">
                <svg width="150" height="150" viewBox="0 0 110 110">
                    <circle cx="55" cy="55" r="46" fill="none" stroke="#ede9fe" stroke-width="6"/>
                    <circle cx="55" cy="55" r="46" fill="none" stroke="#a855f7" stroke-width="6"
                        stroke-dasharray="{{ round(2 * 3.14159 * 46) }}"
                        stroke-dashoffset="{{ round(2 * 3.14159 * 46 * (1 - $persentaseTotal/100)) }}"
                        stroke-linecap="round"/>
                </svg>
                <div class="ring-center">
                    <span class="ring-pct">{{ $persentaseTotal }}%</span>
                    <span class="ring-lbl">Selesai</span>
                </div>
            </div>
            
            <div class="progress-right">
                <p class="prog-encourage">Terus tingkatkan progresmu!</p>
                <div class="prog-stat-grid">
                    <div class="prog-stat-box">
                        <p class="psb-label">Materi Selesai</p>
                        <p class="psb-val">{{ $materiSelesai }} <span style="font-size:13px;color:#9ca3af">/ {{ $totalMateri }}</span></p>
                        <span class="psb-sub">materi</span>
                    </div>
                    <div class="prog-stat-box">
                        <p class="psb-label">Kuis Selesai</p>
                        <p class="psb-val">{{ $kuisSelesai }} <span style="font-size:13px;color:#9ca3af">/ {{ $totalKuis }}</span></p>
                        <span class="psb-sub">kuis</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- TWO COL: INFO + HISTORY --}}
    <div class="two-col">

        {{-- INFORMASI PROFIL --}}
        <div class="info-card">
            <div class="section-head">
                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#7c3aed" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                <p class="section-title">Informasi Profil</p>
            </div>
            <div class="info-row">
                <p class="info-label">Nama Lengkap</p>
                <p class="info-val">{{ $profile->full_name }}</p>
            </div>
            <div class="info-row">
                <p class="info-label">Username</p>
                <p class="info-val">{{ $user->username }}</p>
            </div>
            <div class="info-row">
                <p class="info-label">Bio</p>
                <p class="info-val">{{ $profile->bio ?? '-' }}</p>
            </div>
            <div class="info-row">
                <p class="info-label">Email</p>
                <p class="info-val">{{ $user->email }}</p>
            </div>
            <div class="info-row">
                <p class="info-label">Bergabung Sejak</p>
                <p class="info-val">{{ $user->created_at ? \Carbon\Carbon::parse($user->created_at)->translatedFormat('d F Y') : '-' }}</p>
            </div>
        </div>

        {{-- HISTORY XP --}}
        <div class="info-card" id="history-xp">
            <div class="section-head">
                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#7c3aed" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
                <p class="section-title">History XP</p>
            </div>
            @if($progress->isEmpty())
                <div class="empty-box">
                    <svg width="40" height="40" fill="none" viewBox="0 0 24 24" stroke="#ddd6fe" stroke-width="1.5" style="margin:0 auto"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5.586a1 1 0 0 1 .707.293l5.414 5.414a1 1 0 0 1 .293.707V19a2 2 0 0 1-2 2z"/></svg>
                    <p style="font-weight:600;color:#6b7280;margin:8px 0 4px">Belum ada riwayat XP</p>
                    <p style="font-size:11px">Selesaikan lesson untuk mendapatkan XP!</p>
                </div>
            @else
                <div style="overflow-x:auto">
                    <table class="hist-table">
                        <thead>
                            <tr>
                                <th>Lesson</th>
                                <th>XP</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($progress as $p)
                            <tr>
                                <td style="font-weight:600">{{ $p->lesson->title ?? '-' }}</td>
                                <td><span class="xp-pill">+{{ $p->xp_earned ?? 10 }} XP</span></td>
                                <td style="color:#9ca3af;font-size:11px">
                                    {{ $p->completed_at ? \Carbon\Carbon::parse($p->completed_at)->format('d M Y') : '-' }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>               
                    </table>
                    <div class="mt-4 flex justify-center">
                        {{ $progress->appends(request()->query())->fragment('history-xp')->links() }}
                    </div>
                </div>
            @endif
        </div>

    </div>

    {{-- KELAS YANG DIIKUTI --}}
    <div class="courses-card">
        <div class="section-head">
            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#0d9488" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
            <p class="section-title">Kelas yang Sedang Diikuti</p>
        </div>
        @if($enrolledCourses->isEmpty())
            <div class="empty-box">
                <svg width="40" height="40" fill="none" viewBox="0 0 24 24" stroke="#ddd6fe" stroke-width="1.5" style="margin:0 auto"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                <p style="font-weight:600;color:#6b7280;margin:8px 0 4px">Kamu belum mendaftar di kelas manapun.</p>
                <a href="{{ route('courses.index') }}" style="font-size:12px;color:#7c3aed;font-weight:600">Yuk cari kelas seru di Daftar Course!</a>
            </div>
        @else
            <div class="course-grid">
                @foreach($enrolledCourses as $course)
                    <a href="{{ route('courses.show', $course->pivot->course_id) }}" class="course-item" style="text-decoration: none; color: inherit; display: block;">
                        <p class="course-name">{{ $course->title }}</p>
                        <span class="course-status-pill cs-{{ $course->pivot->status }}">
                            {{ $course->pivot->status === 'completed' ? 'Selesai' : ($course->pivot->status === 'active' ? 'Aktif' : 'Dropped') }}
                        </span>
                        <div class="prog-bar-label">
                            <span>Progress</span>
                            <span>{{ number_format($course->pivot->completion_percentage, 0) }}%</span>
                        </div>
                        <div class="prog-bar-wrap">
                            <div class="prog-bar-fill" style="width:{{ $course->pivot->completion_percentage }}%"></div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>

</div>

</x-app-layout>
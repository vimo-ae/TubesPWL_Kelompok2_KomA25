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
.stat-row { display:grid; grid-template-columns:repeat(3, 1fr); gap:12px; margin-bottom:16px; }
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
.si-amber  { background:#fef3c7; }
.si-teal   { background:#ccfbf1; }
.stat-mini-label { font-size:12px; color:#9ca3af; font-weight:600; text-transform:uppercase; letter-spacing:.04em; margin-bottom:3px; }
.stat-mini-val { font-size:24px; font-weight:800; color:#1e1b4b; line-height:1; margin-bottom:2px; }
.stat-mini-sub { font-size:12px; color:#9ca3af; font-weight: 500; }

/* ---- TWO COL LAYOUT ---- */
.two-col { display:grid; grid-template-columns: 1.2fr 0.8fr; gap:16px; margin-bottom:16px; align-items: start;}
@media(max-width:768px){ .two-col { grid-template-columns:1fr; } .stat-row { grid-template-columns:1fr; } }

/* ---- INFO CARD & DOC CARD ---- */
.info-card { background:#fff; border:1px solid #ede9fe; border-radius:16px; padding:22px; height: 100%; box-sizing: border-box; }
.section-head { display:flex; align-items:center; gap:8px; margin-bottom:18px; }
.section-title { font-size:18px; font-weight:700; color:#1e1b4b; margin:0; }
.info-row { padding:10px 0; border-bottom:1px solid #f5f3ff; }
.info-row:last-of-type { border-bottom:none; }
.info-label { font-size:10px; color:#9ca3af; font-weight:600; text-transform:uppercase; letter-spacing:.04em; margin:0 0 3px; }
.info-val { font-size:13px; font-weight:600; color:#1e1b4b; margin:0; }

/* ---- DOCUMENTS SISI KANAN ---- */
.doc-box-wrapper { display: flex; flex-direction: column; gap: 12px; }
.doc-item-link {
    display: flex; align-items: center; gap: 14px; padding: 16px;
    border: 1px solid #ede9fe; border-radius: 14px; background: #fff;
    text-decoration: none; transition: all 0.2s;
}
.doc-item-link:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(124,58,237,0.06); border-color: #ddd6fe; }
.doc-icon { width: 38px; height: 38px; border-radius: 10px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.bg-linkedin { background: #e0f2fe; color: #0284c7; }
.bg-cv { background: #fce7f3; color: #db2777; }
.doc-texts { flex: 1; }
.doc-title { font-size: 13px; font-weight: 700; color: #1e1b4b; margin: 0 0 2px; }
.doc-desc { font-size: 11px; color: #9ca3af; margin: 0; }

/* ---- COURSES ---- */
.courses-card { background:#fff; border:1px solid #ede9fe; border-radius:16px; padding:22px; margin-top: 16px; }
.course-grid { display:grid; grid-template-columns:repeat(auto-fill, minmax(240px, 1fr)); gap:12px; }
.course-item {
    background:#faf5ff; border:1px solid #ede9fe;
    border-radius:12px; padding:16px;
    display:flex; flex-direction:column; justify-content:space-between;
    text-decoration: none; color: inherit; transition: transform 0.2s, box-shadow 0.2s;
}
.course-item:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(124,58,237,0.08); }
.course-name { font-weight:600; font-size:14px; color:#1e1b4b; margin:0 0 6px; line-clamp: 2; display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden; }
.course-status-pill { font-size:10px; font-weight:700; padding:3px 10px; border-radius:99px; display:inline-block; margin-bottom:8px; text-transform: uppercase; }
.cs-level { background:#ede9fe; color:#7c3aed; }
.course-footer { display:flex; justify-content:space-between; align-items:center; font-size:12px; font-weight:700; color:#6b7280; border-top:1px solid #ede9fe; margin-top:12px; padding-top:12px; }
.course-footer-students { display: inline-flex; align-items: center; gap: 4px; }
.course-link { color:#7c3aed; text-decoration:none; }

.empty-box { text-align:center; padding:32px 16px; }
.empty-box p { font-size:13px; color:#9ca3af; margin:8px 0 0; }
</style>

<div class="pf">

    @if(session('success'))
    <div style="background:#dcfce7;color:#166534;border:1px solid #bbf7d0;border-radius:10px;padding:11px 16px;margin-bottom:16px;font-size:13px;font-weight:600;">
        {{ session('success') }}
    </div>
    @endif

    <h1 class="pf-title">Profil Instruktur</h1>
    <p class="pf-subtitle">Kelola informasi profil, biodata, beserta daftar kelas edukasi Anda.</p>

    {{-- HERO --}}
    <div class="hero-card">
        <div class="avatar-wrap">
            <img src="{{ auth()->user()->profile && auth()->user()->profile->profile_photo && file_exists(public_path('storage/' . auth()->user()->profile->profile_photo)) ? asset('storage/' . auth()->user()->profile->profile_photo) : asset('images/profile-default.jpg') }}" class="avatar-img" alt="Foto Profil">
            <a href="{{ route('profile.edit') }}" class="avatar-edit">
                <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="#fff" stroke-width="2.5"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
            </a>
        </div>
        <div class="hero-info">
            <h2 class="hero-name">
                {{ $profile->full_name ?? auth()->user()->username }}
                <span class="role-badge role-instructor">Instruktur</span>
            </h2>
            
            {{-- BIO DIURUTKAN DARI DESKRIPSI INSTRUCTOR PROFILE --}}
            <p class="hero-bio">
                "{{ $instructor->instructorProfile->deskripsi ?? 'Belum ada deskripsi profil hangat. Tulis deskripsi keahlian Anda di halaman edit!' }}"
            </p>

            <div class="hero-meta">
                <div class="meta-row">
                    <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="#9ca3af" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    {{ auth()->user()->email }}
                </div>
                <div class="meta-row">
                    <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="#9ca3af" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    Bergabung {{ auth()->user()->created_at ? \Carbon\Carbon::parse(auth()->user()->created_at)->translatedFormat('d F Y') : '-' }}
                </div>
            </div>
            <a href="{{ route('profile.edit') }}" class="btn-edit-hero">
                <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                Edit Profil
            </a>
        </div>
    </div>

    {{-- STAT MINI ROW FOR INSTRUCTOR --}}
    <div class="stat-row">
        <div class="stat-mini">
            <div class="stat-mini-icon si-violet">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#7c3aed" stroke-width="2"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            </div>
            <p class="stat-mini-label">Total Course</p>
            <p class="stat-mini-val">{{ $createdCourses->count() }}</p>
            <p class="stat-mini-sub">Kelas Dibuat</p>
        </div>
        <div class="stat-mini">
            <div class="stat-mini-icon si-teal">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#0d9488" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </div>
            <p class="stat-mini-label">Total Siswa</p>
            <p class="stat-mini-val">{{ number_format($createdCourses->sum('enrollments_count')) }}</p>
            <p class="stat-mini-sub">Siswa Terdaftar</p>
        </div>
        <div class="stat-mini">
            <div class="stat-mini-icon si-amber">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#d97706" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            </div>
            <p class="stat-mini-label">Kredibilitas</p>
            <p class="stat-mini-val">4.9</p>
            <p class="stat-mini-sub">Rating Rata-rata</p>
        </div>
    </div>

    {{-- TWO COL LAYOUT: SISI KIRI (INFO AKUN) & SISI KANAN (LINKEDIN + CV) --}}
    <div class="two-col">
        {{-- SISI KIRI: DATA AKUN --}}
        <div class="info-card">
            <div class="section-head">
                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#7c3aed" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                <p class="section-title">Informasi Akun Instruktur</p>
            </div>
            <div class="info-row">
                <p class="info-label">Nama Lengkap</p>
                <p class="info-val">{{ $profile->full_name ?? 'Nama Belum Diatur' }}</p>
            </div>
            <div class="info-row">
                <p class="info-label">Username</p>
                <p class="info-val">{{ auth()->user()->username }}</p>
            </div>
            <div class="info-row">
                <p class="info-label">Email</p>
                <p class="info-val">{{ auth()->user()->email }}</p>
            </div>
            <div class="info-row">
                <p class="info-label">Tanggal Terdaftar</p>
                <p class="info-val">{{ auth()->user()->created_at ? \Carbon\Carbon::parse(auth()->user()->created_at)->translatedFormat('d F Y') : '-' }}</p>
            </div>
        </div>

        {{-- SISI KANAN: DOKUMEN & KUALIFIKASI --}}
        <div class="info-card">
            <div class="section-head">
                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#db2777" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                <p class="section-title">Berkas Kemitraan</p>
            </div>
            
            <div class="doc-box-wrapper">
                {{-- LinkedIn Card --}}
                @if(!empty($instructor->instructorProfile->linkedin))
                    <a href="{{ $instructor->instructorProfile->linkedin }}" target="_blank" class="doc-item-link">
                        <div class="doc-icon bg-linkedin">
                            <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.8v8.37h2.8v-4.67c0-.25.015-.51.09-.69a1.14 1.14 0 0 1 1-.74c.76 0 1 .52 1 1.3v4.8h2.8M6.5 8.37a1.37 1.37 0 1 0 0-2.75 1.37 1.37 0 0 0 0 2.75M8 18.5V10.13H5V18.5h3z"/>
                            </svg>
                        </div>
                        <div class="doc-texts">
                            <p class="doc-title">Profil LinkedIn</p>
                            <p class="doc-desc">Hubungan Profesional &rarr;</p>
                        </div>
                    </a>
                @else
                    <div class="doc-item-link" style="opacity: 0.6; cursor: not-allowed;">
                        <div class="doc-icon bg-linkedin">X</div>
                        <div class="doc-texts"><p class="doc-title" style="color:#9ca3af;">LinkedIn Belum Ditautkan</p></div>
                    </div>
                @endif

                {{-- CV Card --}}
                @if(!empty($instructor->instructorProfile->cv))
                    <a href="{{ Storage::url($instructor->instructorProfile->cv) }}" target="_blank" class="doc-item-link">
                        <div class="doc-icon bg-cv">
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 0 1-2 2z" />
                            </svg>
                        </div>
                        <div class="doc-texts">
                            <p class="doc-title">Curriculum Vitae (CV)</p>
                            <p class="doc-desc">Unduh Berkas Portofolio &rarr;</p>
                        </div>
                    </a>
                @else
                    <div class="doc-item-link" style="opacity: 0.6; cursor: not-allowed;">
                        <div class="doc-icon bg-cv">X</div>
                        <div class="doc-texts"><p class="doc-title" style="color:#9ca3af;">CV Belum Diunggah</p></div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- KURSUS YANG SAYA BUAT (GRID VIEW) --}}
    <div class="courses-card">
        <div class="section-head">
            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#db2777" stroke-width="2"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
            <p class="section-title">Kursus yang Saya Buat</p>
        </div>
        
        @if($createdCourses->isEmpty())
            <div class="empty-box">
                <svg width="40" height="40" fill="none" viewBox="0 0 24 24" stroke="#ddd6fe" stroke-width="1.5" style="margin:0 auto"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                <p style="font-weight:600;color:#6b7280;margin:8px 0 4px">Anda belum membuat kursus apapun.</p>
                <p style="font-size:12px;color:#9ca3af;">Saatnya bagikan ilmumu ke dunia dengan membuat course baru!</p>
            </div>
        @else
            <div class="course-grid">
                @foreach($createdCourses as $course)
                    <div class="course-item">
                        <div>
                            <span class="course-status-pill cs-level">
                                {{ $course->difficulty_level }}
                            </span>
                            <p class="course-name">{{ $course->title }}</p>
                        </div>
                        <div class="course-footer">
                            <span class="course-footer-students">
                                <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                {{ $course->enrollments_count ?? 0 }} Siswa
                            </span>
                            <a href="{{ route('courses.show', $course->course_id) }}" class="course-link">
                                Lihat &rarr;
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</div>

</x-app-layout>
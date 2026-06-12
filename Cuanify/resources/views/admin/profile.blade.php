<x-app-layout>

    @section('title', 'Login - Cuanify')


            <style>

@import url('https://fonts.googleapis.com/css2?family=Outfit:wght@600;700;800&family=DM+Sans:wght@400;500;600&display=swap');


.pf { font-family:'DM Sans',sans-serif; max-width:960px; margin:0 auto; padding:0 0 32px; }

.pf-title { font-family:'Outfit',sans-serif; font-size:22px; font-weight:800; color:#1e1b4b; margin:0 0 4px; }

.pf-subtitle { font-size:13px; color:#9ca3af; margin:0 0 24px; }



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

    background:linear-gradient(to right,#6366f1,#8b5cf6,#a855f7);

}

.avatar-wrap { position:relative; flex-shrink:0; }

.avatar-img {

    width:100px; height:100px; border-radius:50%; object-fit:cover;

    border:3px solid transparent;

    background:linear-gradient(#fff,#fff) padding-box,

                linear-gradient(135deg,#6366f1,#a855f7) border-box;

}

.hero-info { flex:1; position:relative; z-index:1; }

.hero-name { font-family:'Outfit',sans-serif; font-size:22px; font-weight:800; color:#1e1b4b; margin:0 0 4px; display:flex; align-items:center; gap:8px; }

.role-badge { font-size:10px; font-weight:700; padding:3px 10px; border-radius:99px; }

.role-admin { background:#ede9fe; color:#7c3aed; }

.hero-meta { display:flex; flex-direction:column; gap:5px; margin-top:12px; }

.meta-row { display:flex; align-items:center; gap:7px; font-size:12px; color:#6b7280; }



.stat-row { display:grid; grid-template-columns:repeat(4,1fr); gap:12px; margin-bottom:16px; }

.stat-mini {

    background:#fff; border:1px solid #ede9fe; border-radius:14px;

    padding:16px; text-align:center;

}

.stat-mini-icon {

    width:40px; height:40px; border-radius:10px;

    display:flex; align-items:center; justify-content:center;

    margin:0 auto 8px; background:#f5f3ff;

}

.stat-mini-label { font-size:10px; color:#9ca3af; font-weight:600; text-transform:uppercase; margin-bottom:3px; }

.stat-mini-val { font-family:'Outfit',sans-serif; font-size:20px; font-weight:800; color:#1e1b4b; line-height:1; }



.two-col { display:grid; grid-template-columns:1fr 1fr; gap:14px; }

.info-card { background:#fff; border:1px solid #ede9fe; border-radius:16px; padding:22px; }

.section-head { display:flex; align-items:center; gap:8px; margin-bottom:18px; }

.section-title { font-family:'Outfit',sans-serif; font-size:14px; font-weight:700; color:#1e1b4b; margin:0; }

.info-row { padding:10px 0; border-bottom:1px solid #f5f3ff; }

.info-val { font-size:13px; font-weight:600; color:#1e1b4b; }



.hist-table { width:100%; border-collapse:collapse; font-size:13px; }

.hist-table th { text-align:left; padding:8px 10px; font-size:10px; color:#9ca3af; border-bottom:1px solid #ede9fe; }

.hist-table td { padding:10px; border-bottom:1px solid #f5f3ff; color:#374151; }

@media (max-width: 768px){

    .pf{
        padding: 0 12px 24px;
    }

    .hero-card{
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding: 24px 18px;
        gap: 18px;
    }

    .hero-name{
        flex-direction: column;
        gap: 6px;
        font-size: 20px;
    }

    .hero-meta{
        align-items: center;
    }

    .avatar-img{
        width: 80px;
        height: 80px;
    }

    .stat-row{
        grid-template-columns: repeat(2,1fr);
    }

    .two-col{
        grid-template-columns: 1fr;
    }

    .info-card{
        padding: 18px;
    }

    .hist-table th,
    .hist-table td{
        padding: 8px;
        font-size: 12px;
    }

    .pf-title{
        font-size: 20px;
    }

    .pf-subtitle{
        font-size: 12px;
    }
}

@media (max-width: 480px){

    .stat-row{
        grid-template-columns: 1fr;
    }

    .hero-card{
        border-radius: 18px;
    }
}

</style>
            <div class="pf">
                </div>
                 <h1 class="pf-title">Dashboard Admin</h1>

    <p class="pf-subtitle">Pantau seluruh aktivitas sistem dan manajemen pengguna.</p>



    <div class="hero-card">

        <div class="avatar-wrap">

        <img
            src="{{ Auth::user()->profile && Auth::user()->profile->profile_photo ? asset('storage/' . Auth::user()->profile->profile_photo) : asset('images/profile-default.jpg') }}"
            alt="Avatar"
            class="avatar-img"
        >

        </div>

        <div class="hero-info">

            <h2 class="hero-name">

                {{ $user->username }}

                <span class="role-badge role-admin">Administrator</span>

            </h2>

            <div class="hero-meta">

                <div class="meta-row">Email: {{ $user->email }}</div>

                <div class="meta-row">Status: Superuser</div>

            </div>

        </div>

    </div>



    <div class="stat-row">

        <div class="stat-mini">

            <div class="stat-mini-icon">
                <svg class="w-5 h-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
            </div>

            <p class="stat-mini-label">Total User</p>

            <p class="stat-mini-val">{{ $totalUsers }}</p>

        </div>

        <div class="stat-mini">

            <div class="stat-mini-icon">
                <svg class="w-5 h-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path d="M12 14l9-5-9-5-9 5 9 5z"/>
                    <path d="M12 14l6.16-3.42A12.08 12.08 0 0 1 18 20"/>
                    <path d="M12 14l-6.16-3.42A12.08 12.08 0 0 0 6 20"/>
                </svg>
            </div>

            <p class="stat-mini-label">Instruktur</p>

            <p class="stat-mini-val">{{ $totalInstructors }}</p>

        </div>

        <div class="stat-mini">

            <div class="stat-mini-icon">
                <svg class="w-5 h-5 text-pink-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                    <path d="M6.5 2H20v15H6.5A2.5 2.5 0 0 0 4 19.5V4.5A2.5 2.5 0 0 1 6.5 2z"/>
                </svg>
            </div>

            <p class="stat-mini-label">Kursus</p>

            <p class="stat-mini-val">{{ $totalCourses }}</p>

        </div>

        <div class="stat-mini">

            <div class="stat-mini-icon">
                <svg class="w-5 h-5 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path d="M6 2h12"/>
                    <path d="M6 22h12"/>
                    <path d="M8 2v6a4 4 0 0 0 2 3.46L12 13l2-1.54A4 4 0 0 0 16 8V2"/>
                    <path d="M8 22v-6a4 4 0 0 1 2-3.46L12 11l2 1.54A4 4 0 0 1 16 16v6"/>
                </svg>
            </div>

            <p class="stat-mini-label">Pending</p>

            <p class="stat-mini-val">{{ $pendingApprovals }}</p>

        </div>

    </div>



    <div class="two-col">

        <div class="info-card">

            <div class="section-head"><p class="section-title">Informasi Sistem</p></div>

            <div class="info-row"><p class="info-label">Server Time</p><p class="info-val">{{ now()->format('H:i:s') }}</p></div>

            <div class="info-row"><p class="info-label">Environment</p><p class="info-val">Production</p></div>

            <div class="info-row"><p class="info-label">Database</p><p class="info-val">MySQL Connected</p></div>

        </div>

        

        <div class="info-card">

            <div class="section-head"><p class="section-title">Log Aktivitas Terakhir</p></div>

            <div class="overflow-x-auto">
                <table class="hist-table min-w-[500px]">

                    <thead><tr><th>Aksi</th><th>User</th><th>Waktu</th></tr></thead>

                    <tbody>

                        @forelse($recentLogs ?? [] as $log)

                        <tr>

                            <td>{{ $log->action }}</td>

                            <td>{{ $log->user->username }}</td>

                            <td>{{ $log->created_at->diffForHumans() }}</td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="3" style="text-align:center; color:#9ca3af;">Belum ada aktivitas log.</td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>
            </div>

        </div>

    </div>
</x-app-layout>
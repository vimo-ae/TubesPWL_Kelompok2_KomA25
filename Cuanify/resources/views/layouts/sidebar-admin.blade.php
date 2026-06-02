<style>
.menu-active {
    background: linear-gradient(to right, #ec4899, #d946ef, #a855f7);
    color: #ffffff !important;
    box-shadow: 0 4px 12px rgba(168, 85, 247, 0.35);
}
.menu-active i { color: #ffffff !important; }

.menu-item {
    display: flex;
    align-items: center;
    gap: 12px;
    width: 100%;
    padding: 12px 16px;
    border-radius: 10px;
    font-weight: 500;
    font-size: 14px;
    color: #4b5563;
    text-decoration: none;
    transition: all 0.25s ease;
}
.menu-item:hover {
    background: linear-gradient(to right, #ec4899, #d946ef, #a855f7);
    color: #ffffff !important;
    box-shadow: 0 4px 12px rgba(168, 85, 247, 0.3);
    transform: translateY(-1px);
}
.menu-item:hover i { color: #ffffff !important; }
</style>

<div class="space-y-1 px-4 sidebar-container">

    <a href="{{ route('admin.dashboard') }}"
       class="menu-item {{ request()->routeIs('admin.dashboard') ? 'menu-active' : '' }}">
        <i class="fas fa-chart-line text-sm"></i>
        <span>Dashboard</span>
    </a>

    <a href="#"
       class="menu-item {{ request()->routeIs('admin.verifikasi*') ? 'menu-active' : '' }}">
        <i class="fas fa-user-check text-sm"></i>
        <span>Verifikasi Instruktur</span>
    </a>

    <a href="#"
       class="menu-item {{ request()->routeIs('admin.kategori*') ? 'menu-active' : '' }}">
        <i class="fas fa-folder-open text-sm"></i>
        <span>Kelola Kategori</span>
    </a>

    <a href="{{ route('admin.users') }}"
       class="menu-item {{ request()->routeIs('admin.users*') ? 'menu-active' : '' }}">
        <i class="fas fa-users text-sm"></i>
        <span>Kelola Pengguna</span>
    </a>

    <a href="#"
       class="menu-item {{ request()->routeIs('admin.course*') ? 'menu-active' : '' }}">
        <i class="fas fa-book text-sm"></i>
        <span>Kelola Course</span>
    </a>

</div>
<!-- Sidebar -->
<ul class="navbar-nav bg-success sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">HCCI</div>
    </a>
    <li class="nav-item {{ $title === 'beranda' ? 'active' : '' }} ">
        <a class="nav-link" href="/beranda">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Beranda</span>
        </a>
    </li>
    <hr class="sidebar-divider" />
    @can('admin')
    <li class="nav-item {{ $title === '' ? 'active' : '' }}">
        <a class="nav-link" href="/kelus">
            <i class="fas fa-fw fa-table"></i>
            <span>Kelola user</span>
        </a>
    </li>
    <hr class="sidebar-divider" />
    @endcan
    <li class="nav-item {{ $title === 'sertifikasi' ? 'active' : '' }}">
        <a class="nav-link {{ $title === 'sertifikasi' ? 'active' : '' }}" href="/sertifikasi">
            <i class="fas fa-clipboard"></i>
            <span>Sertifikasi</span>
        </a>
    </li>
    <hr class="sidebar-divider" />
    <li class="nav-item {{ $title === 'status' ? 'active' : '' }}">
        <a class="nav-link" href="/status">
            <i class="fas fa-tasks"></i>
            <span>Status pengajuan</span>
        </a>
    </li>
    <hr class="sidebar-divider" />
    <li class="nav-item {{ $title === 'tagihan' ? 'active' : '' }}">
        <a class="nav-link" href="/tagihan">
            <i class="fas fa-money-check-alt"></i>
            <span>Tagihan</span>
        </a>
    </li>
    <hr class="sidebar-divider" />
    <li class="nav-item {{ $title === '' ? 'active' : '' }}">
        <a class="nav-link" href="/sertifikat">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Sertifikat</span>
        </a>
    </li>
    <li class="nav-item {{ $title === '' ? 'active' : '' }}">
        @can('admin')
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Bantuan</span>
        </a>
        @endcan
    </li>
    <hr class="sidebar-divider d-none d-md-block" />
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
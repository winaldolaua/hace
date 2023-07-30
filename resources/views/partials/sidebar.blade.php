<!-- Sidebar -->
<ul class="navbar-nav bg-success sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

        <div class="sidebar-brand-text mx-3">SIHALAL2</div>
    </a>
    <li class="nav-item {{ $title === 'beranda' ? 'active' : '' }} ">
        <a class="nav-link" href="{{ url('/') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span>
        </a>
    </li>
    <hr class="sidebar-divider" />
    <li class="nav-item {{ $title === 'sertifikasi' ? 'active' : '' }}">
        <a class="nav-link {{ $title === 'sertifikasi' ? 'active' : '' }}" href="{{ url('/sertifikasi') }}/">
            <i class="fas fa-clipboard"></i>
            <span>Sertifikasi</span>
        </a>
    </li>
    <hr class="sidebar-divider d-none d-md-block" />
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
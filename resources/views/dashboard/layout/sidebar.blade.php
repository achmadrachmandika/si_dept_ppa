<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('assets/dist/img/logo-inka.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">DEPT. PPA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('spr.index') }}"
                        class="nav-link {{ (request()->routeIs('spr.index') ? 'active' : '') }}">
                        <img src="{{ asset('assets/dist/img/spr1.png') }}" class="nav-icon" alt="Logo">
                        <p>SPR</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('riwayatLp3m') }}" class="nav-link {{ (request()->routeIs('riwayatLp3m') ? 'active' : '') }}">
                        <img src="{{ asset('assets/dist/img/lp3m.png') }}" class="nav-icon" alt="Logo">
                        <p>LP3M</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('laporan.open') }}" class="nav-link {{ (request()->routeIs('laporan.open') ? 'active' : '') }}">
                        <img src="{{ asset('assets/dist/img/proses.png') }}" class="nav-icon" alt="Logo">
                        <p>Laporan SPR Proses</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('laporan.closed') }}"
                        class="nav-link {{ (request()->routeIs('laporan.closed') ? 'active' : '') }}">
                        <img src="{{ asset('assets/dist/img/closed.jpg') }}" class="nav-icon" alt="Logo">
                        <p>Laporan SPR Closed</p>
                    </a>
                </li>

              



                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
            </ul>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
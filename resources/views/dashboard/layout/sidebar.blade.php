<script src="https://kit.fontawesome.com/41f4b13e34.js" crossorigin="anonymous"></script>


<aside class="main-sidebar sidebar-dark-primary elevation-4"
    style="background: linear-gradient(to bottom, rgb(41, 48, 66), rgb(41, 48, 66)); color: #fff;">
    <!-- Brand Logo -->
    <a 
    @if(Auth::user()->hasRole('monitoring') || Auth::user()->hasRole('admin'))
    href="{{ route('dashboard') }}"
    @else
    href="{{ route('spr.index') }}"
    @endif
    class="brand-link">
        <img src="{{ asset('assets/dist/img/logo2.png') }}" alt="AdminLTE Logo" class="brand-image elevation-4"
            style="opacity: 1; border-radius: 20px; width: 120px; height: 100px;">
        <span class="brand-text" style="font-weight: bold;">PPA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @if(Auth::user()->hasRole('user') || Auth::user()->hasRole('admin'))
                <li class="nav-item">
                    <a href="{{ route('spr.index') }}"
                        class="nav-link {{ (request()->routeIs('spr.index') ? 'active' : '') }}">
                        <i class="fa-solid fa-file mr-2"></i>
                        <p>SPR</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('riwayatLp3m') }}"
                        class="nav-link {{ (request()->routeIs('riwayatLp3m') ? 'active' : '') }}">
                        <i class="fa-solid fa-file-invoice mr-2"></i>
                        <p>LP3M</p>
                    </a>
                </li>
                @endif
                @if(Auth::user()->hasRole('admin'))
                <li class="nav-item">
                    <a href="{{ route('laporan.closed') }}"
                        class="nav-link {{ (request()->routeIs('laporan.closed') ? 'active' : '') }}">
                        <i class="fa-solid fa-file-circle-check mr-2"></i>
                        <p>Laporan SPR Closed</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('spareparts.index') }}"
                    class="nav-link {{ (request()->routeIs('spareparts.index') ? 'active' : '') }}">
                    <i class="fa-solid fa-database mr-2"></i>
                    <p>Daftar Sparepart</p>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('aset.index') }}"
                        class="nav-link {{ (request()->routeIs('aset.index') ? 'active' : '') }}">
                        <i class="fa-solid fa-database mr-2"></i>
                        <p>Daftar Aset</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link {{ (request()->routeIs('user.index') ? 'active' : '') }}">
                        <i class="fa-solid fa-users mr-2"></i>
                        <p>Daftar User</p>
                    </a>
                </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-right-from-bracket mr-2"></i>
                        <p>Logout</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
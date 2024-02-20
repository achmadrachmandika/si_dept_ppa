<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('lp3m') }}" class="brand-link">
        <img src="{{ asset('assets/dist/img/logo-inka.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">DEPT. PPA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            {{-- <div class="image">
                <img src="{{ asset('assets/dist/img/logo2.png') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div> --}}
            <div class="info">
                <a href="#" class="d-block">Perencanaan dan Pengendalian Operasi</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                {{-- <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ (request()->routeIs('home') ? 'active' : '') }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ route('spr') }}" class="nav-link {{ (request()->routeIs('spr') ? 'active' : '') }}">
                        <img src="{{ asset('assets/dist/img/spr1.png') }}" class="nav-icon" alt="Logo">
                        <p>
                            INPUT SPR
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('lp3m') }}"
                        class="nav-link {{ (request()->routeIs('lp3m') ? 'active' : '') }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            INPUT LP3M
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pengalaman') }}"
                        class="nav-link {{ (request()->routeIs('pengalaman') ? 'active' : '') }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            REKAP SARAH
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                        <a href="{{ route('pengalaman') }}" class="nav-link {{ (request()->routeIs('pengalaman') ? 'active' : '') }}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>     
                                REKAP SARAH
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                            <a href="{{ route('pengalaman') }}" class="nav-link {{ (request()->routeIs('pengalaman') ? 'active' : '') }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    REKAP SARAH
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                                <a href="{{ route('pengalaman') }}" class="nav-link {{ (request()->routeIs('pengalaman') ? 'active' : '') }}">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        REKAP SARAH
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                    <a href="{{ route('pengalaman') }}" class="nav-link {{ (request()->routeIs('pengalaman') ? 'active' : '') }}">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            REKAP SARAH
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                        <a href="{{ route('pengalaman') }}" class="nav-link {{ (request()->routeIs('pengalaman') ? 'active' : '') }}">
                                            <i class="nav-icon fas fa-th"></i>
                                            <p>
                                                REKAP SARAH
                                            </p>
                                        </a>
                                    </li>
                                          <li class="nav-item">
                            <a href="{{ route('pengalaman') }}" class="nav-link {{ (request()->routeIs('pengalaman') ? 'active' : '') }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    REKAP SARAH
                                </p>
                            </a>
                        </li>
                              <li class="nav-item">
                            <a href="{{ route('pengalaman') }}" class="nav-link {{ (request()->routeIs('pengalaman') ? 'active' : '') }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    REKAP SARAH
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                                <a href="{{ route('pengalaman') }}" class="nav-link {{ (request()->routeIs('pengalaman') ? 'active' : '') }}">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        REKAP SARAH
                                    </p>
                                </a>
                            </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
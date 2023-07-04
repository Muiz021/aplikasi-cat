<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    @if (Auth::user()->roles == 'admin')
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ Auth::user()->nama }}</span>
    </a>
    @else
    <a href="{{ route('pelajar.dashboard') }}" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ Auth::user()->nama }}</span>
    </a>
    @endif

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @if (Auth::user()->roles == 'admin')
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link {{request()->is('admin/dashboard*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <hr size="1" color="white" width="100%">

                    <li class="nav-header">Master Data</li>
                    <li class="nav-item">
                        <a href="{{ route('pelajaran.index') }}" class="nav-link {{request()->is('admin/pelajaran*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Pelajaran
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('soal.index') }}" class="nav-link {{request()->is('admin/soal*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-question-circle"></i>
                            <p>
                                Soal
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.ujian.index') }}" class="nav-link {{ request()->is('admin/ujian*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-pen-square"></i>
                            <p>
                                Ujian
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">User</li>
                    <li class="nav-item">
                        <a href="{{ route('user.index') }}" class="nav-link {{request()->is('admin/user*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Mahasiswa
                            </p>
                        </a>
                    </li>
                    <hr size="1" color="white" width="100%">
                    <li class="nav-item">
                        <a href="{{ route('admin.logout') }}" class="nav-link {{request()->is('admin/logout*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                Log out
                            </p>
                        </a>
                    </li>
                @elseif (Auth::user()->roles == 'pelajar')
                <li class="nav-item">
                    <a href="{{ route('pelajar.dashboard') }}" class="nav-link {{request()->is('pelajar/dashboard*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <hr size="1" color="white" width="100%">

                <li class="nav-header">Master Data</li>
                <li class="nav-item">
                    <a href="{{route('ujian.index')}}" class="nav-link {{request()->is('pelajar/ujian*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-question"></i>
                        <p>
                            Ujian
                        </p>
                    </a>
                </li>
                <hr size="1" color="white" width="100%">
                <li class="nav-item">
                    <a href="{{ route('pelajar.logout') }}" class="nav-link {{request()->is('pelajar/logout*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Log out
                        </p>
                    </a>
                </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

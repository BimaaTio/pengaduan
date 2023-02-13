<!-- Sidebar Menu -->
<nav class="mt-2" style="">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="/dashboard" class="nav-link @if ($title === 'SIADU &mdash; Dashboard') active @else @endif">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        @can('admin')
            <li class="nav-item @if ($title != 'SIADU &mdash; Dashboard') menu-open @endif ">
                <a href=" #" class="nav-link 
                @if ($title != 'SIADU &mdash; Dashboard') active @endif">
                    <i class="nav-icon fas fa-folder"></i>
                    <p>
                        Data Master
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="{{ route('reports') }}"
                            class="nav-link @if ($title === 'SIADU &mdash; Laporan' && 'SIADU &mdash; Buat Laporan') active @else @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Laporan</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('masyarakat') }}"
                            class="nav-link @if ($title === 'SIADU &mdash; Masyarakat' && 'SIADU &mdash; Edit Masyarakat') active @else @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Akun Masyarakat</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('petugas') }}"
                            class="nav-link @if ($title === 'SIADU &mdash; Petugas' && 'SIADU &mdash; Edit Petugas') active @else @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Akun Petugas</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin') }}"
                            class="nav-link @if ($title === 'SIADU &mdash; Admin' && 'SIADU &mdash; Edit Admin') active @else @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Akun Admin</p>
                        </a>
                    </li>

                </ul>
            </li>
        @endcan
        @can('petugas')
            <li class="nav-item">
                <a href="{{ route('reports') }}" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                    <p>
                        Data Laporan
                    </p>
                </a>
            </li>
        @endcan
        @can('member')
            <li class="nav-item">
                <a href="{{ route('buatLaporan') }}" class="nav-link">
                    <i class="nav-icon fas fa-plus"></i>
                    <p>
                        Buat Laporan
                    </p>
                </a>
            </li>
        @endcan
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-search"></i>
                <p>
                    Cek Pengaduan
                </p>
            </a>
        </li>
        <li class="nav-item">
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="nav-link text-dark">
                    <i class="nav-icon text-center fas fa-sign-out-alt text-dark"></i>
                </button>
            </form>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->

<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href="/" class="sidebar-link">
                        {{-- <i class="bi bi-person-bounding-box" style="font-size: 1.5rem"></i> --}}
                        <img src="{{ asset('assets/images/logo/inspiringbeltim.png') }}"
                            style="width: 65px; height: auto;">
                        <span class="h5"> Aplikasi Presensi</span>
                    </a>
                </div>
                {{-- darkmode --}}
                <div class="theme-toggle d-flex gap-2 align-items-center mt-2">
                    <span id="toggle-dark"> </span>
                </div>
                <div class="sidebar-toggler x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                @if (auth()->user()->isAdmin() or
                        auth()->user()->isOperator())
                    <li class="sidebar-item {{ request()->routeIs('dashboard.*') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.index') }}" class="sidebar-link">
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-title">Menu Data</li>
                    <li class="sidebar-item {{ request()->routeIs('partofs.*') ? 'active' : '' }}">
                        <a href="{{ route('partofs.index') }}" class="sidebar-link">
                            <i class="bi bi-person-badge-fill"></i>
                            <span>Bagian</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('positions.*') ? 'active' : '' }}">
                        <a href="{{ route('positions.index') }}" class="sidebar-link">
                            <i class="bi bi-briefcase-fill"></i>
                            <span>Posisi</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('employees.*') ? 'active' : '' }}">
                        <a href="{{ route('employees.index') }}" class="sidebar-link">
                            <i class="bi bi-people-fill"></i>
                            <span>Pegawai</span>
                        </a>
                    </li>
                    <li class="sidebar-title">Menu Presensi</li>
                    <li class="sidebar-item {{ request()->routeIs('attendances.*') ? 'active' : '' }}">
                        <a href="{{ route('attendances.index') }}" class="sidebar-link">
                            <i class="bi bi-calendar2-week"></i>
                            <span>Presensi</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('location.*') ? 'active' : '' }}">
                        <a href="{{ route('locations.index') }}" class="sidebar-link">
                            <i class="bi bi-geo-fill"></i>
                            <span>Lokasi</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('holidays.*') ? 'active' : '' }}">
                        <a href="{{ route('holidays.index') }}" class="sidebar-link">
                            <i class="bi bi-calendar2-x"></i>
                            <span>Hari Libur</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('presences.*') ? 'active' : '' }}">
                        <a href="{{ route('presences.show', 1) }}" class="sidebar-link">
                            <i class="bi bi-person-check-fill"></i>
                            <span>Kehadiran Hari Ini</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('statistics.*') ? 'active' : '' }}">
                        <a href="{{ route('statistics.show', 1) }}" class="sidebar-link">
                            <i class="bi bi-file-earmark-bar-graph"></i>
                            <span>Rekap Presensi</span>
                        </a>
                    </li>
                @endif
            </ul>
            <ul>

                <form action="{{ route('auth.logout') }}" method="post"
                    onsubmit="return confirm('Apakah anda yakin ingin keluar?')">
                    @method('DELETE') @csrf
                    <button class="w-full mt-4 d-block bg-transparent border-0 text-danger px-3">
                        <span data-feather="log-out" class="me-2"></span>Keluar
                    </button>
                </form>

            </ul>
        </div>
    </div>
</div>

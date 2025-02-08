<div>
    <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="#" class="text-nowrap logo-img">
           <h4>Si AKad SMK</h4>
        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
        </div>
    </div>
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="./index.html" aria-expanded="false">
                    <span>
                        <i class="ti ti-layout-dashboard"></i>
                    </span>
                    <span class="hide-menu">Dashboard</span>
                </a>
            </li>
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Menu</span>
            </li>
            @if (auth()->user()->role == 'admin')


            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('atur_kepsek') }}" aria-expanded="{{ request()->routeIs('atur_kepsek') ? 'true' : 'false' }}">


                    <span>
                        <i class="ti ti-article"></i>
                    </span>
                    <span class="hide-menu">Kepala Sekolah</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('jurusan') }}" aria-expanded="{{ request()->routeIs('jurusan') ? 'true' : 'false' }}">


                    <span>
                        <i class="ti ti-article"></i>
                    </span>
                    <span class="hide-menu">Jurusan</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('kelas') }}" aria-expanded="{{ request()->routeIs('kelas') ? 'true' : 'false' }}">


                    <span>
                        <i class="ti ti-article"></i>
                    </span>
                    <span class="hide-menu">Kelas</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('detail_kelas') }}" aria-expanded="{{ request()->routeIs('detail_kelas') ? 'true' : 'false' }}">


                    <span>
                        <i class="ti ti-article"></i>
                    </span>
                    <span class="hide-menu">detail_kelas</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('mapel') }}" aria-expanded="{{ request()->routeIs('mapel') ? 'true' : 'false' }}">


                    <span>
                        <i class="ti ti-book"></i>
                    </span>
                    <span class="hide-menu">Mapel</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('ekskul') }}" aria-expanded="{{ request()->routeIs('ekskul') ? 'true' : 'false' }}">


                    <span>
                        <i class="fas fa-handshake"></i>
                    </span>
                    <span class="hide-menu">ekskul</span>
                </a>
            </li>


            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('siswa') }}" aria-expanded="{{ request()->routeIs('siswa') ? 'true' : 'false' }}">


                    <span>
                        <i class="fas fa-graduation-cap"></i>
                    </span>
                    <span class="hide-menu">Siswa</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('walikelas') }}" aria-expanded="{{ request()->routeIs('walikelas') ? 'true' : 'false' }}">


                    <span>
                        <i class="fa-solid fa-user-tie"></i>
                    </span>
                    <span class="hide-menu">Wali Kelas</span>
                </a>
            </li>
            @endif
            @if (auth()->user()->role == 'wali_kelas')
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('penilaian') }}" aria-expanded="{{ request()->routeIs('penilaian') ? 'true' : 'false'}}">


                    <span>
                        <i class="fas fa-book-open fa-pencil-alt"></i>


                    </span>
                    <span class="hide-menu">Kelas</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('pengikut_ekskul') }}" aria-expanded="{{ request()->routeIs('pengikut_ekskul') ? 'true' : 'false' }}">


                    <span>
                        <i class="fas fa-handshake"></i>
                    </span>
                    <span class="hide-menu">pengikut_ekskul </span>
                </a>
            </li>


            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('kelas_hadir') }}" aria-expanded="{{ request()->routeIs('kelas_hadir') ? 'true' : 'false' }}">



                    <span class="hide-menu">Rekab Absen </span>
                </a>
            </li>
            @endif
            {{-- <li class="sidebar-item">
                <a class="sidebar-link" href="./ui-alerts.html" aria-expanded="false">
                    <span>
                        <i class="ti ti-alert-circle"></i>
                    </span>
                    <span class="hide-menu">Alerts</span>
                </a>
            </li> --}}
            {{-- <li class="sidebar-item">
                <a class="sidebar-link" href="./ui-card.html" aria-expanded="false">
                    <span>
                        <i class="ti ti-cards"></i>
                    </span>
                    <span class="hide-menu">Card</span>
                </a>
            </li> --}}

            @if (auth()->user()->role == 'siswa')
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('mapelku') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-file-description"></i>
                    </span>
                    <span class="hide-menu">Mapelku</span>
                </a>
            </li>
            @endif

            @if (auth()->user()->role == 'kepsek')
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('kepsek_kelas') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-file-description"></i>
                    </span>
                    <span class="hide-menu">Kelas</span>
                </a>
            </li>
            @endif



        </ul>

    </nav>
    <!-- End Sidebar navigation -->
</div>

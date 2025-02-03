<div>
    <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="./index.html" class="text-nowrap logo-img">
            <img src="../assets/images/logos/dark-logo.svg" width="180" alt="" />
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
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('jurusan') }}" aria-expanded="{{ request()->routeIs('jurusan') ? 'true' : 'false' }}">


                    <span>
                        <i class="ti ti-article"></i>
                    </span>
                    <span class="hide-menu">Jurusan</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('mapel') }}" aria-expanded="{{ request()->routeIs('mapel') ? 'true' : 'false' }}">


                    <span>
                        <i class="ti ti-article"></i>
                    </span>
                    <span class="hide-menu">Mapel</span>
                </a>
            </li>
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
            <li class="sidebar-item">
                <a class="sidebar-link" href="./ui-forms.html" aria-expanded="false">
                    <span>
                        <i class="ti ti-file-description"></i>
                    </span>
                    <span class="hide-menu">Forms</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="./ui-typography.html" aria-expanded="false">
                    <span>
                        <i class="ti ti-typography"></i>
                    </span>
                    <span class="hide-menu">Typography</span>
                </a>
            </li>


        </ul>

    </nav>
    <!-- End Sidebar navigation -->
</div>

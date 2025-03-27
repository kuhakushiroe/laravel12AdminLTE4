@php
    $routeName = request()->route()->getName();
@endphp
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="/" class="brand-link">
            <!--begin::Brand Image-->
            <img src="../../../dist/assets/img/AdminLTELogo.png" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow" />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">SHE-G</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/" class="nav-link @if ($routeName == 'home') active @endif">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-header">Master Data</li>
                @hasAnyRole('superadmin')
                    <li class="nav-item">
                        <a href="/users" class="nav-link @if ($routeName == 'users') active @endif">
                            <i class="nav-icon bi bi-people"></i>
                            <p>Users</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/departments" class="nav-link @if ($routeName == 'departments') active @endif">
                            <i class="nav-icon bi bi-people"></i>
                            <p>Departments</p>
                        </a>
                    </li>
                @endhasAnyRole
                <li class="nav-item">
                    <a href="/karyawan" class="nav-link @if ($routeName == 'karyawan') active @endif">
                        <i class="nav-icon bi bi-people"></i>
                        <p>Karyawan</p>
                    </a>
                </li>
                <li class="nav-header">Pengajuan</li>
                <li class="nav-item">
                    <a href="mcu" class="nav-link @if ($routeName == 'mcu') active @endif">
                        <i class="nav-icon bi bi-hospital"></i>
                        <p>MCU</p>
                    </a>
                </li>
                @hasAnyRole('superadmin')
                    <li class="nav-header">Component</li>
                    <li class="nav-item">
                        <a href="table" class="nav-link">
                            <i class="nav-icon bi bi-table"></i>
                            <p>Table</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="chart" class="nav-link">
                            <i class="nav-icon bi bi-bar-chart"></i>
                            <p>Chart</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="proses" class="nav-link">
                            <i class="nav-icon bi bi-hourglass-split"></i>
                            <p>Proses</p>
                        </a>
                    </li>
                @endhasAnyRole
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->

</aside>

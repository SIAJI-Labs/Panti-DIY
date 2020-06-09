<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('cms.index') }}" class="brand-link d-flex justify-content-center">
        <img src="{{ !empty($wlogo) ? $wlogo : asset('assets/images/siaji_white-logo.svg') }}"
            alt="AdminLTE Logo"
            class="brand-image"
            style="opacity: .8">
    </a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('assets/adminlte/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar nav-legacy flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ route('cms.index') }}" class="nav-link d-flex align-items-center {{ !empty($sidebar_menu) ? ($sidebar_menu == 'dashboard' ? 'active' : '') : '' }}">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>

            <li class="nav-header text-uppercase">Configuration</li>
            <li class="nav-item has-treeview {{ !empty($sidebar_menu) ? ($sidebar_menu == 'setting' ? 'menu-open' : '') : '' }}">
                <a href="#" class="nav-link d-flex align-items-center">
                    <i class="nav-icon fas fa-cogs"></i>
                    <p>
                        Settings
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" {{ !empty($sidebar_menu) ? ($sidebar_menu == 'setting' ? 'style="display: block;"' : '') : '' }}>
                    <li class="nav-item">
                        <a href="#" class="nav-link d-flex align-items-center {{ !empty($sidebar_submenu) ? ($sidebar_submenu == 'general' ? 'active' : '') : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>General</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link d-flex align-items-center {{ !empty($sidebar_submenu) ? ($sidebar_submenu == 'contact' ? 'active' : '') : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Contact Data</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link d-flex align-items-center {{ !empty($sidebar_submenu) ? ($sidebar_submenu == 'access-control' ? 'active' : '') : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Access Control</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-header">MISCELLANEOUS</li>
            <li class="nav-item">
                <a href="{{ route('cms.profile.index') }}" class="nav-link d-flex align-items-center {{ !empty($sidebar_menu) ? ($sidebar_menu == 'profile' ? 'active' : '') : '' }}">
                    <i class="nav-icon far fa-circle text-primary"></i>
                    <p class="text">User Settings</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link d-flex align-items-center" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="nav-icon far fa-circle text-danger"></i>
                    <p>Log Out</p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
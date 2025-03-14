<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link d-flex justify-content-center">
        {{-- <img src="{{ asset('backend/assets') }}/dist/img/logo.png" width="160" alt="Logo" class="brand-image"
            style="opacity: .8"> --}}
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('backend/assets') }}/dist/img/images (1).jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()?->name ?: Auth::user()?->email }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                {{-- visas --}}
                <li class="nav-item">
                    <a href="{{ route('admin.visas.index') }}"
                        class="nav-link {{ request()->routeIs('admin.visas.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-passport"></i>
                        <p>
                            Visas
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.contacts.index') }}"
                        class="nav-link {{ request()->routeIs('admin.contacts.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>
                            Contacts
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}"
                        class="nav-link {{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>

                {{-- setting --}}
                <li class="nav-item">
                    <a href="{{ route('admin.setting') }}"
                        class="nav-link {{ request()->routeIs('admin.setting') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Settings
                        </p>
                    </a>
                </li>

                {{-- <li class="nav-header">Appearance</li>



                <li class="nav-item">
                    <a href="" class="nav-link ">
                        <i class="nav-icon fas fa-bars"></i>
                        <p>
                            Nav Menus
                        </p>
                    </a>

                </li> --}}




            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

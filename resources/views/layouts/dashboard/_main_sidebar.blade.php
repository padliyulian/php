<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>
    
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                </div>
            </div>
    
            <!-- Sidebar Menu -->
            <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                <a href="/admin" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                    Dashboard
                    </p>
                </a>
                </li>
                <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>
                    Management
                    <i class="right fa fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="/admin/users" class="nav-link">
                        <i class="fa fa-users nav-icon"></i>
                        <p>Users</p>
                    </a>
                    </li>
                </ul>
                </li>
                <li class="nav-item">
                <a href="/developer" class="nav-link">
                    <i class="nav-icon fas fa-cogs"></i>
                    <p>
                    Developer
                    </p>
                </a>
                </li>
                <li class="nav-item">
                <a href="/profile" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                    Profile
                    </p>
                </a>
                </li>
                <li class="nav-item">
                <a
                    class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                >
                    <i class="nav-icon fas fa-power-off"></i>
                    <p>
                    {{ __('Logout') }}
                    </p>
                </a>
                <form id="logout-form"
                    action="{{ route('logout') }}"
                    method="POST"
                    style="display: none;"
                >
                    @csrf
                </form>
                </li>
            </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
</aside>
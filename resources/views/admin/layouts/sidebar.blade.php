<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('admin/img/boss.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="{{ route('admin.index') }}" class="d-block">{{ auth()->user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->

            <li class="nav-header">DASHBOARD</li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p>Orders</p>
                </a>
            </li>

            <li class="nav-item has-treeview ">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>
                        Settings
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link ml-2">
                            <i class="nav-icon fas fa-building"></i>
                            <p>
                                Object
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.hotel.index') }}" class="nav-link ml-4">
                                    <i class="nav-icon fas fa-list"></i>
                                    <p>Objects List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.hotel.facility.index') }}" class="nav-link ml-4">
                                    <i class="nav-icon fas fa-sliders-h"></i>
                                    <p>Facilities List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.hotel.type.index') }}" class="nav-link ml-4">
                                    <i class="nav-icon fas fa-text-height"></i>
                                    <p>Type List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.hotel.surround.index') }}" class="nav-link ml-4">
                                    <i class="nav-icon fas fa-store-alt"></i>
                                    <p>Surround List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.hotel.bonus.index') }}" class="nav-link ml-4">
                                    <i class="nav-icon fas fa-archive"></i>
                                    <p>Bonus List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link ml-2">
                            <i class="nav-icon fas fa-window-restore"></i>
                            <p>
                                Room
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.room.index') }}" class="nav-link ml-4">
                                    <i class="nav-icon fas fa-list"></i>
                                    <p>Rooms List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.room.facility.index') }}" class="nav-link ml-4">
                                    <i class="nav-icon fas fa-sliders-h"></i>
                                    <p>Facilities List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.room.type.index') }}" class="nav-link ml-4">
                                    <i class="nav-icon fas fa-text-height"></i>
                                    <p>Type List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.room.bonus.index') }}" class="nav-link ml-4">
                                    <i class="nav-icon fas fa-archive"></i>
                                    <p>Bonus List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.location.index') }}" class="nav-link ml-2">
                            <i class="nav-icon fas fa-globe-asia"></i>
                            <p>Location</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
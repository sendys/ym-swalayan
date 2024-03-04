<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <div class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="image text-center">
                <img src="{{ url('theme/dist/img/img1.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="info">
                <p>Admin</p>
                <a href="#"><i class="fa fa-cog"></i></a>
                <a href="#"><i class="fa fa-power-off"></i></a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            @php
                $userRole = auth()->check() ? auth()->user()->role : null;
            @endphp

            @if ($userRole == 'admin')
                <li class="{{ request()->routeIs('admin.dashboard.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard.index') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li
                    class="treeview{{ request()->routeIs('admin.kategori.*') || request()->routeIs('admin.satuan.*') ? ' active' : '' }}">
                    <a href="#">
                        <i class="fa fa-list"></i> <span>Data Master</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ request()->routeIs('admin.kategori.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.kategori.index') }}">
                                <i class="fa fa-list-alt"></i>
                                <span>Kategori</span>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('admin.satuan.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.satuan.index') }}">
                                <i class="fa fa-balance-scale"></i>
                                <span>Satuan</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li
                    class="treeview{{ request()->routeIs('admin.pelanggan.*') || request()->routeIs('admin.supplier.*') ? ' active' : '' }}">
                    <a href="#">
                        <i class="fa fa-list"></i> <span>Pelanggan & Supplier</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ request()->routeIs('admin.pelanggan.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.pelanggan.index') }}">
                                <i class="fa fa-users"></i>
                                <span>Pelanggan</span>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('admin.supplier.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.supplier.index') }}">
                                <i class="fa fa-industry"></i>
                                <span>Supplier</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @elseif ($userRole == 'pemilik')
                <li class="{{ request()->routeIs('admin.dashboard.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard.index') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Menu Pemilik</span>
                    </a>
                </li>
            @endif
        </ul>

    </div>
    <!-- /.sidebar -->
</aside>

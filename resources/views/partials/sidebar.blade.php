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

                <li class="{{ request()->routeIs('admin.kategori.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.kategori.index') }}">
                        <i class="fa fa-list"></i>
                        <span>Kategori</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.pelanggan.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.pelanggan.index') }}">
                        <i class="fa fa-list"></i>
                        <span>Pelanggan</span>
                    </a>
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

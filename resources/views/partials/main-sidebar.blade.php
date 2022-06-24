<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>Amdre</b> Elektronik</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
            <div class="image">
                <img src="{{ Auth()->user()->employee->photo }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info d-flex flex-column">
                <div class="text-white font-weight-bold m-0 p-0">
                    {{ Auth()->user()->employee->role->name }}
                </div>
                <div>
                    <a href="#" class="d-block">
                        {{ Auth()->user()->employee->name }}
                    </a>
                </div>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <div class="dropdown-divider"></div>

                {{-- Dashboard  --}}
                <li class="nav-item">
                    <a href="/" class="nav-link {{ ($active === 'dashboard')? "active" : "" }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <div class="dropdown-divider"></div>

                {{-- Admin  --}}
                @if(Auth()->user()->employee->role_id === 1)
                <li class="nav-item {{ in_array($active, ['employees', 'accounts'])? "menu-open" : "" }}">
                    <a href="#" class="nav-link {{ in_array($active, ['employees', 'accounts'])? "active" : "" }}">
                        <i class="nav-icon fas fa-toolbox"></i>
                        <p>
                            Admin
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/employees" class="nav-link {{ ($active === 'employees')? "active" : "" }}">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Employees</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/accounts" class="nav-link {{ ($active === 'accounts')? " active" : "" }}">
                                <i class="far fa-user nav-icon"></i>
                                <p>Accounts</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                <div class="dropdown-divider"></div>

                {{-- Products  --}}
                <li class="nav-item {{ in_array($active, ['products', 'vendors'])? "menu-open" : "" }}">
                    <a href="/products" class="nav-link {{ in_array($active, ['products', 'vendors'])? "active" : "" }}">
                        <i class="nav-icon fas fa-warehouse"></i>
                        <p>
                            Products
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/products" class="nav-link {{ ($active === 'products')? "active" : "" }}">
                                <i class="fas fa-boxes-stacked nav-icon"></i>
                                <p>Products</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/vendors" class="nav-link {{ ($active === 'vendors')? "active" : "" }}">
                                <i class="fas fa-user-group nav-icon"></i>
                                <p>Vendor</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <div class="dropdown-divider"></div>

                {{-- Transactions  --}}
                <li class="nav-item {{ in_array($active, ['procurements', 'orders'])? "menu-open" : "" }}">
                    <a href="/products" class="nav-link {{ in_array($active, ['procurements', 'orders'])? "active" : "" }}">
                        <i class="nav-icon fas fa-cart-shopping"></i>
                        <p>
                            Transactions
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/orders" class="nav-link {{ ($active === 'orders')? "active" : "" }}">
                                <i class="fas fa-cart-plus nav-icon"></i>
                                <p>Orders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/procurements" class="nav-link {{ ($active === 'procurements')? "active" : "" }}">
                                <i class="fa-solid fa-truck-arrow-right nav-icon" style="transform: scale(-1, 1);"></i>
                                <p>procurements</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

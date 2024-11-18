<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="index.html" class="logo logo-light">
        <span class="logo-lg">
            <img src="{{ asset('assets/images/logo.png') }}" alt="logo">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('assets/images/logo-sm.png') }}" alt="small logo">
        </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="index.html" class="logo logo-dark">
        <span class="logo-lg">
            <img src="{{ asset('assets/images/logo-dark.png') }}" alt="dark logo">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('assets/images/logo-dark-sm.png') }}" alt="small logo">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <ul class="side-nav">
            <li class="side-nav-title">App</li>

            <li class="side-nav-item">
                <a href="{{ route('Dashboard') }}" class="side-nav-link">
                    <i class='bx bxs-dashboard'></i>
                    <span>Dashboard</span>
                </a>
            </li>


            <li class="side-nav-title">Process Manage</li>

            <li class="side-nav-item">
                <a href="{{ route('QrCodeList') }}" class="side-nav-link">
                    <i class='bx bx-qr'></i>
                    <span>QrCode</span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('production.list') }}" class="side-nav-link">
                    <i class='bx bx-box'></i>
                    <span>Production</span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{route('sales.list')}}" class="side-nav-link">
                    <i class='bx bx-money-withdraw' ></i>
                    <span>Sales</span>
                </a>
            </li>

            <li class="side-nav-title">Users Manage</li>

            <li class="side-nav-item">
                <a href="{{ route('AdminsList') }}" class="side-nav-link">
                    <i class='bx bx-user'></i> 
                    <span> Admins </span>
                </a>
            </li>

            <li class="side-nav-title">Money Management</li>

            <li class="side-nav-item">
                <a href="{{ route('ExpensesList') }}" class="side-nav-link">
                    <i class='bx bx-money'></i>
                    <span> Expenses </span>
                </a>
            </li>

            <li class="side-nav-title">Logout</li>

            <li class="side-nav-item">
                <a href="{{ route('admin.logout') }}" class="side-nav-link">
                    <i class='bx bx-log-out'></i>
                    <span> Logout </span>
                </a>
            </li>
            {{-- <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarCrm" aria-expanded="false" aria-controls="sidebarCrm" class="side-nav-link">
                    <i class="uil uil-tachometer-fast"></i>
                    <span class="badge bg-danger text-white float-end">New</span>
                    <span> CRM </span>
                </a>
                <div class="collapse" id="sidebarCrm">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="crm-projects.html">Projects</a>
                        </li>
                        <li>
                            <a href="crm-orders-list.html">Orders List</a>
                        </li>
                        <li>
                            <a href="crm-clients.html">Clients</a>
                        </li>
                        <li>
                            <a href="crm-management.html">Management</a>
                        </li>
                    </ul>
                </div>
            </li> --}}


        </ul>

        <div class="clearfix"></div>
    </div>
</div>

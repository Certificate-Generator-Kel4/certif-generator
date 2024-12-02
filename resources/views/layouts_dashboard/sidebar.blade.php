<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    @if (Auth::user() && Auth::user()->role === 'super-admin')

    <li class="nav-item">
        <a class="nav-link" href="{{route('superadmin.home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">

    </div>

    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link" href="{{route('superadmin.user')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>User</span></a>
    </li>


    <li class="nav-item">
        <a class="nav-link" href="{{route('superadmin.event')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Event</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('superadmin.certificate.indexSearch')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Search Certificate</span></a>
    </li>
    @endif

    @if (Auth::user() && Auth::user()->role === 'admin')
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">

    </div>

    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.event')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Event</span></a>
    </li>
    @endif

    <hr class="sidebar-divider d-none d-md-block">


    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <i class="fas fa-building"></i>
            <i class="fa-sharp fa-solid fa-building-user"></i>
        </div>
        <div class="sidebar-brand-text mx-1">InProduk</div>

    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <li class="nav-item {{ Request::is('*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('product') }}">
            <i class="fa fa-newspaper" aria-hidden="true"></i>
            <span>Product</span></a>
    </li>

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

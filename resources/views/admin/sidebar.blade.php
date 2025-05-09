
   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{  url('/') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-store"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ env('APP_NAME') }}<sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
{{-- هاي معناته يقرا من ملف الترجمة --}}
            <span>{{ __('admin.dash') }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">



    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-tag"></i>
            <span>Categories</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Categories:</h6>
                <a class="collapse-item" href="{{ route('admin.categories.index') }}">all Categories</a>
                <a class="collapse-item" href="{{ route('admin.categories.create') }}">add new</a>
            </div>
        </div>
    </li>




    <hr class="sidebar-divider">

    <hr class="sidebar-divider d-none d-md-block my-0">


    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-heart"></i>
            <span>Products</span></a>
    </li>
    <!-- Divider -->

    <hr class="sidebar-divider">

    <hr class="sidebar-divider d-none d-md-block my-0">


    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Orders</span></a>
    </li>
    <hr class="sidebar-divider">

    <hr class="sidebar-divider d-none d-md-block my-0">


    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Payments</span></a>
    </li>


    <hr class="sidebar-divider">

    <hr class="sidebar-divider d-none d-md-block my-0">


    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-users"></i>
            <span>Customers</span></a>
    </li>


    <hr class="sidebar-divider">

    <hr class="sidebar-divider d-none d-md-block my-0">


    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-lock"></i>
            <span>Roles</span></a>
    </li>




    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
            <i class="fas fa-fa fa-home"></i>
            <span>Dashboard</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Tüm İşlemler
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.home')}}">
            <i class="fas fa-fa fa-home"></i>
            <span>Home</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.blog')}}">
            <i class="fas fa-fa fa-blog"></i>
            <span>Blog</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.about')}}">
            <i class="fas fa-certificate"></i>
            <span>About</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.contact')}}">
            <i class="fas fa-phone"></i>
            <span>Contact</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.message')}}">
            <i class="fas fa-comments"></i>
            <span>Messages</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.socialmedia')}}">
            <i class="fas fa-cog"></i>
            <span>Social Media</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.settings')}}" target="_blank">
            <i class="fas fa-cog"></i>
            <span>Settings</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item">
        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('/') }}">
            <i class="fas fa-cog"></i>
            <span>View Site</span></a>
    </li>

    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

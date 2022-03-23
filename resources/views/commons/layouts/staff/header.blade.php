<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">
        <li class="dropdown notification-list">
            <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                <p>Text</p>
            </a>
        </li>

        <li class="dropdown notification-list">
            <a href="{{ route('admin.logout') }}" class="nav-link right-bar-toggle waves-effect waves-light">
                <i class="mdi mdi-logout-variant"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>

    <!-- LOGO -->
    <div class="logo-box bg-transparent">
        <a href="{{ route('admin.home') }}" class="logo text-center logo-dark">
            <span class="logo-lg">
                <img src="{!! file_exists('images/logo.jpg') ? asset('images/logo.jpg') : asset('storage/images/logo.png') !!}" alt="" height="50">
            </span>
        </a>
    </div>
</div>

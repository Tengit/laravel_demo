<div class="navbar-custom">

    <ul class="list-unstyled topnav-menu float-right mb-0">
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <span class="d-none d-sm-inline-block ml-1 font-weight-medium">User</span>
                <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <div class="dropdown-divider"></div>
                <!-- item-->
                <a href="{{ route('admin.logout')}}" class="dropdown-item notify-item">
                    <i class="mdi mdi-logout-variant"></i>
                    <span>{{ trans('commons.logout') }}</span>
                </a>

            </div>
        </li>
    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="{{ route('admin.home') }}" class="logo text-center logo-dark">
            <span class="logo-lg">
                <img src="{!! file_exists('images/logo.jpg') ? asset('images/logo.jpg') : asset('storage/images/logo.png') !!}" alt="" height="50">
            </span>
        </a>
    </div>


    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect waves-light">
                <i class="mdi mdi-menu"></i>
            </button>
        </li>
    </ul>

    <h3 class="admin_title text-white mt-2"> @yield('title')</h3>

</div>

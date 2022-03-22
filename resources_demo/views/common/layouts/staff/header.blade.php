<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">
        <li class="dropdown notification-list">
            <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                <p>{{  getCurrentDateTimeAdmin() }}</p>
            </a>
        </li>

        <li class="dropdown notification-list">
            <a href="{{ routeByPlaceId('staff.logout') }}" class="nav-link right-bar-toggle waves-effect waves-light">
                <i class="mdi mdi-logout-variant"></i>
                <span>{{ trans('common.logout') }}</span>
            </a>
        </li>
    </ul>

    <!-- LOGO -->
    <div class="logo-box bg-transparent">
        <a href="{{ routeByPlaceId('staff.staffDashboard') }}" class="logo text-center logo-dark">
            <span class="logo-lg">
                <img src="{!! file_exists('images/logo.png') ? asset('images/logo.png') : asset('storage/images/logo.png') !!}" alt="" height="50">
            </span>
            <span class="logo-sm">
                <img src="{!! file_exists('images/logo.png') ? asset('images/logo.png') : asset('storage/images/logo.png') !!}" alt="" height="40">
            </span>
        </a>
    </div>

    <ul class="list-unstyled m-0">
        <li class="d-none d-sm-block">
            <h2 class="title_place text-center text-white"><span class="custom-text-long custom-width-header">{{ getPlaceName() }}</span></h2>
        </li>
    </ul>
</div>

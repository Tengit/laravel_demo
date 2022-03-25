<div class="navbar-custom">

    <ul class="list-unstyled topnav-menu float-right mb-0">
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <span class="d-none d-sm-inline-block ml-1 font-weight-medium">{{ Auth::guard('web')->user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <a class="dropdown-item notify-item" href="{{ route('user.logout') }}"
                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
        <li class="dropdown notification-list">
            <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                <p>{{  Carbon\Carbon::now() }}</p>
            </a>
        </li>
    </ul>


    <!-- LOGO -->
    <div class="logo-box">
        <a href="{{ route('user.home') }}" class="logo text-center logo-dark">
            <span class="logo-lg">
                <img src="{!! file_exists('images/logo.jpg') ? asset('images/logo.jpg') : asset('storage/images/logo.png') !!}" alt="" height="50">
            </span>
            <span class="logo-sm">
                <img src="{!! asset('images/admin.jpg') !!}" alt="" height="40">
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

    <h3 class="admin_title text-white mt-2">{{ Auth::guard('web')->user()->name }} - @yield('title')</h3>

</div>

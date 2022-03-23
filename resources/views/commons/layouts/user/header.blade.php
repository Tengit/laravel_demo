<div class="navbar-custom">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-right mb-0">
            <li class="dropdown notification-list">
                <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                    <p>{{  getCurrentDateTime() }}</p>
                </a>
            </li>
        </ul>

        <ul class="list-unstyled m-0">
            <li>
                <a href="{{ route('userDashboard'). '?hinan=' . getPlaceID() }}">
                    <h2 class="title_place text-center text-white title-custom">{{ getPlaceName() }}</h2>
                </a>
            </li>
        </ul>

    </div>
</div>

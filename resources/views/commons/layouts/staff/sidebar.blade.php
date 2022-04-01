<div class="left-side-menu">
    <div class="slimscroll-menu">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">
                <li>
                    <a href="{{route('user.books.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-tachometer-alt">
                        
                        </i>
                        <span class="text-primary">{{trans('global.user.title') }} Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('user.books.index')}}" class="nav-link">
                        <i class="fa-fw fas fa-list nav-icon">

                        </i>
                        <span>List Book</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('user.authors.index')}}" class="nav-link">
                        <i class="fa-fw fas fa-list nav-icon">

                        </i>
                        <span>List Author</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('user.categories.index')}}" class="nav-link">
                        <i class="fa-fw fas fa-list nav-icon">

                        </i>
                        <span>List Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('user.publishers.index')}}" class="nav-link">
                        <i class="fa-fw fas fa-list nav-icon">

                        </i>
                        <span>List Publisher</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End Sidebar -->
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>

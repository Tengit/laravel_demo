<div class="left-side-menu">
    <div class="slimscroll-menu">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">
                <li>
                    <a href="{{route('admin.home')}}" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-tachometer-alt">

                        </i>
                        <span class="text-primary">{{trans('global.admin.title') }} Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.books.create')}}" class="nav-link">
                        <i class="fa-fw fas fa-plus nav-icon">

                        </i>
                        <span>Create a Book</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.authors.create')}}" class="nav-link">
                        <i class="fa-fw fas fa-plus nav-icon">

                        </i>
                        <span>Create an Author</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.categories.create')}}" class="nav-link">
                        <i class="fa-fw fas fa-plus nav-icon">

                        </i>
                        <span>Create a Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.publishers.create')}}" class="nav-link">
                        <i class="fa-fw fas fa-plus nav-icon">

                        </i>
                        <span>Create a Publisher</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End Sidebar -->
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>

<!DOCTYPE html>
<html lang="en">
@include('commons.layouts.head')
<body>
<!-- Begin page -->
<div id="wrapper">
    <!-- Topbar Start -->
    @include('commons.layouts.header')
    <!-- end Topbar -->

    <!-- Left Sidebar Start -->
    @include('commons.layouts.sidebar')
    <!-- Left Sidebar End -->

    <!-- Start Page Content here -->
    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                <!-- start page title -->
                @yield('breadcrumb')
                <!-- end page title -->

                <!-- Content -->
                @yield('content')
                <!-- Content -->

                <!-- Modal -->
                @yield('modal')
                <!-- Modal -->
            </div>
            <!-- end container-fluid -->
        </div> <!-- end content -->

        <!-- Footer Start -->
        @include('commons.layouts.footer')
        <!-- end Footer -->
    </div>
    <!-- End Page content -->
</div>
<!-- END wrapper -->
<!-- Loading -->
<div class="overlay"><div class="loader"></div></div>
@include('commons.layouts.script')
@stack('scripts')
</body>
</html>

<!DOCTYPE html>
<html lang="en">
@include('commons.layouts.staff.head')
<body class="authentication-bg">

<div class="account-pages pt-5 my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 @if (!empty($colLogin) && $colLogin == 1) col-lg-6 col-xl-5 @else col-lg-7 col-xl-7 @endif ">
                <div class="account-card-box">
                    <div class="card mb-0">
                        <div class="card-body p-4">
                            <!-- Content -->
                            @yield('content')
                            <!-- Content -->
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
    <!-- Footer Start -->
    @include('commons.layouts.footer')
    <!-- end Footer -->
</div>
<!-- end page -->
@include('commons.layouts.script')
@stack('scripts')
</body>
</html>

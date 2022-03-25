@section('title', 'Admin login')
@extends('commons.layouts.staff.auth', ['colLogin' => 1])
@push('head_css')
    <link href="{{ asset('css/login/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
@endpush
@section('content')
<div class="container">
    <div class="card-body">
        <div class="text-center">
            <div class="my-3 item-image">
                <span><img src="{!! file_exists('images/logo.jpg') ? asset('images/logo.jpg') : asset('storage/images/logo.png') !!}" alt="" height="120"></span>
            </div>
            <h5 class="text-muted text-uppercase py-3 font-16">
                {{ __('Admin Login') }}
            </h5>
        </div>

        @if(Session::has('message'))
            <h6 class="text-success font-weight-bold">{{ Session::get('message') }}</h6>
        @endif

        <form action="{{ route('admin.check') }}" method="post" autocomplete="off" id="checkLogin">
            @csrf
            <div class="form-group">
                <label for="email">Email<span class="text-danger">*</span></label>
                <input type="email"
                    id="email"
                    class="form-control @if($errors->get('email')) is-invalid @endif"
                    name="email"
                    placeholder="Enter email address"
                    value="{{ old('email') }}"
                    required >
                @if($errors->has('email'))
                    <span class="text-danger font-weight-bold text-center">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="password">Password<span class="text-danger">*</span></label>
                <input type="password"
                    id="password"
                    class="form-control @if($errors->get('password')) is-invalid @endif"
                    name="password"
                    placeholder="Enter password"
                    value="{{ old('password') }}"
                    required >
                @if($errors->has('password'))
                    <span class="text-danger font-weight-bold text-center">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-rounded" type="submit">Login</button>
            </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('js/validate/jquery.validate.min.js') }}"></script>
    @include('commons.auth.validate.login_validate')
@endpush
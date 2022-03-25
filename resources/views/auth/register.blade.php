@section('title', 'User Register')
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
                {{ __('USER REGISTER') }}
            </h5>
        </div>
        <form action="{{ route('user.create') }}" method="post" autocomplete="off" id="checkLogin">
            @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
            @endif
            @if (Session::get('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}
            </div>
            @endif

            @csrf
            <div class="form-group">
                <label for="name">Name<span class="text-danger">*</span></label>
                <input type="text"
                    id="name"
                    class="form-control @if($errors->get('name')) is-invalid @endif"
                    name="name"
                    placeholder="Enter user name"
                    value="{{ old('name') }}" >
                @if($errors->has('name'))
                    <span class="text-danger font-weight-bold text-center">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="fullname">Fullname<span class="text-danger">*</span></label>
                <input type="text"
                    id="fullname"
                    class="form-control @if($errors->get('fullname')) is-invalid @endif"
                    name="fullname"
                    placeholder="Enter full name"
                    value="{{ old('fullname') }}" >
                @if($errors->has('fullname'))
                    <span class="text-danger font-weight-bold text-center">{{ $errors->first('fullname') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="email">Email<span class="text-danger">*</span></label>
                <input type="email"
                    id="email"
                    class="form-control @if($errors->get('email')) is-invalid @endif"
                    name="email"
                    placeholder="Enter email address"
                    value="{{ old('email') }}" >
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
                    value="{{ old('password') }}" >
                @if($errors->has('password'))
                    <span class="text-danger font-weight-bold text-center">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="form-group text-center">
                <button class="btn btn-primary btn-rounded" type="submit">Register</button>
            </div>
            <br>
            <div class="form-group text-center mb-0">
                <a href="{{ route('user.login') }}" class="text-muted">
                    I'm an User
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('js/validate/jquery.validate.min.js') }}"></script>
    @include('commons.auth.validate.login_validate')
@endpush
@section('title', 'User login')
@extends('commons.layouts.auth', ['colLogin' => 1])
@push('head_css')
    <link href="{{ asset('css/login/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
@endpush
@push('scripts')
    @include('commons.auth.validate.login_validate')
@endpush
@section('content')
    <div class="text-center">
        <div class="my-3 item-image">
            <span><img src="{!! file_exists('images/logo.jpg') ? asset('images/logo.jpg') : asset('storage/images/logo.png') !!}" alt="" height="120"></span>
        </div>
        <h5 class="text-muted text-uppercase py-3 font-16">
            {{ __('USER LOGIN') }}
        </h5>
    </div>

    @if(Session::has('message'))
        <h6 class="text-success font-weight-bold text-center">{{ Session::get('message') }}</h6>
    @endif

    <form action="{{ route('user.check') }}" method="post" autocomplete="off" id="checkLogin">
        @if (count($errors) > 0)
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @csrf
        <div class="form-group">
            <label for="email">Email<span class="text-danger">*</span></label>
            <div class="form-group">
                <input type="email"
                        id="email"
                        class="form-control @if($errors->get('email')) is-invalid @endif"
                        name="email"
                        placeholder="Enter email address"
                        value="{{ old('email') }}"
                        required >
            </div>
            @if($errors->has('email'))
                <span class="text-danger font-weight-bold text-center">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="password">Password<span class="text-danger">*</span></label>
            <div class="form-group">
                <input type="password"
                        id="password"
                        class="form-control @if($errors->get('password')) is-invalid @endif"
                        name="password"
                        placeholder="Enter password"
                        value="{{ old('password') }}"
                        required >
            </div>
            @if($errors->has('password'))
                <span class="text-danger font-weight-bold text-center">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="form-group text-center">
            <button class="btn btn-primary btn-rounded" type="submit">Login</button>
        </div>
        <br>
        <div class="form-group text-center mb-0">
            <a href="{{ route('user.register') }}" class="text-muted text-forgot">
                Create new User
            </a>
        </div>
    </form>

@endsection

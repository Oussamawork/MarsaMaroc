@extends('layouts.masterLogin')

@section('content')

<div class="m-login__logo">
    <a href="#">
        <img src="{{asset('assets/demo/demo12/media/img/logo.png')}}">
    </a>
</div>

<div class="m-login__head">
    <h3 class="m-login__title">
        Reset Password
    </h3>
</div>
<form class="m-login__form m-form" method="POST" action="{{ route('password.request') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    
    <div class="form-group m-form__group">
        <input class="form-control m-input {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" type="email" name="email" placeholder="Email" autocomplete="off" required autofocus>
        
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group m-form__group">
        <input class="form-control m-input {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" id="password" type="password" name="password" required>
    
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group m-form__group">
        <input class="form-control m-input m-login__form-input--last" id="password-confirm" type="password" placeholder="Confirm Password" name="password_confirmation" required>
    </div>

    <div class="m-login__form-action">
        <button class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn" type="submit">
            {{ __('Reset Password') }}
        </button>
    </div>
</form>
@endsection

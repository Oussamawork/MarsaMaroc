@extends('layouts.masterLogin')


@section('title') 
Reset
@endsection 


@section('content')
<div class="m-login__logo">
    <a href="#">
        <img src="{{asset('assets/demo/demo12/media/img/logo.png')}}">
    </a>
</div>
<div class="m-login__head">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <h3 class="m-login__title">
        Forgotten Password ?
    </h3>
    <div class="m-login__desc">
        Enter your email to reset your password:
    </div>
</div>
<form class="m-login__form m-form" method="POST" action="{{ route('password.email') }}">
    @csrf
    <div class="form-group m-form__group">
        <input id="email" type="email" placeholder="Email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <div class="m-login__form-action">
        <button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primaryr">
            Send
        </button>
    </div>
</form>
@endsection

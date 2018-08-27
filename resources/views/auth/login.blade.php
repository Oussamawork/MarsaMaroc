@extends('layouts.masterLogin') 

@section('title') 
Login
@endsection 

@section('content')
<div class="m-login__logo">
	<a href="#">
		<img src="{{asset('assets/demo/demo12/media/img/logo.png')}}">
	</a>
</div>
<div class="m-login__signin">
	<div class="m-login__head">
		<h3 class="m-login__title">
			Sign In To Admin
		</h3>
	</div>
	<form class="m-login__form m-form" method="POST" action="{{ route('login') }}">
		@csrf
		
		<div class="form-group m-form__group">
			<input id="email" type="email" placeholder="Email" class="form-control m-input{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
			@if ($errors->has('email'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('email') }}</strong>
				</span>
			@endif
		</div>
		<div class="form-group m-form__group">
			<input id="password" type="password" placeholder="Password" class="form-control m-input m-login__form-input--last{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
			@if ($errors->has('password'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('password') }}</strong>
				</span>
			@endif
		</div>
		<div class="row m-login__form-sub">
			<div class="col m--align-left m-login__form-left">
				<label class="m-checkbox  m-checkbox--focus">
					<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
						Remember me
					<span></span>
				</label>
			</div>
			<div class="col m--align-right m-login__form-right">
				<a href="{{ route('password.request') }}" class="m-link">
					Forget Password ?
				</a>
			</div>
		</div>
		<div class="m-login__form-action">
			<button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
				Sign In
			</button>
		</div>
	</form>
</div>
@endsection
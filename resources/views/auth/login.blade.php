@extends('layouts.app') 

@section('content')
<div class="uk-container uk-margin-large uk-flex uk-flex-center">
	<div class="uk-card uk-card-default qrky-border uk-width-1-2@s">
		<div class="uk-card-header">
			<div class="uk-grid uk-grid-small">
				<div class="uk-width-auto">
					<h4>Login</h4>
				</div>
				<div class="uk-width-expand uk-text-right">
					<i class="fas fa-door-open" style="font-size: 20px;"></i>
				</div>
			</div>
		</div>
		<form class="uk-form-stacked" method="POST" action="{{ route('login') }}" novalidate>
			{{ csrf_field() }}
			<div class="uk-card-body">

				<div class="uk-margin">
					<label class="uk-form-label {{ $errors->has('username') ? ' uk-text-danger' : '' }}">
						Username
					</label>
					<div class="uk-width-1-1 uk-inline">
						<span class="uk-form-icon {{ $errors->has('username') ? ' uk-text-danger' : '' }}" uk-icon="icon: user"></span>
						<input id="username" type="text" class="uk-input qrky-form {{ $errors->has('username') ? ' uk-form-danger' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
					</div>
					@if ($errors->has('username'))
						<span class="uk-text-small uk-text-danger">{{ $errors->first('username') }}</span>
					@endif
				</div>

				<div class="uk-margin">
					<label class="uk-form-label {{ $errors->has('password') ? ' uk-text-danger' : '' }}">
						Password
					</label>
					<div class="uk-width-1-1 uk-inline">
						<span class="uk-form-icon {{ $errors->has('password') ? ' uk-text-danger' : '' }}" uk-icon="icon: lock"></span>
						<input id="password" type="password" class="uk-input qrky-form {{ $errors->has('password') ? ' uk-form-danger' : '' }}"name="password" required>
					</div>
					@if ($errors->has('password'))
						<span class="uk-text-small uk-text-danger">{{ $errors->first('password') }}</span>
					@endif
				</div>

				<div class="margin uk-inline">
					<button type="submit" class="uk-button uk-button-default qrky-nav-btn">
						Login
					</button>
				</div>
				<div class="margin uk-inline uk-float-right">
					<label>
						<input type="checkbox" name="remember" {{ old( 'remember') ? 'checked' : '' }} class="uk-checkbox qrky-form qrky-check"> Remember Me
					</label>
				</div>

			</div>
				<!--
				<a class="uk-button uk-button-link uk-float-right" href="{{ route('password.request') }}">
					Forgot Your Password?
				</a>
				-->
		</form>
	</div>
</div>
@endsection
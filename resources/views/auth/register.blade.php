@extends('layouts.app') 

@section('content')
<div class="uk-container uk-margin uk-flex uk-flex-center">
	<div class="uk-card uk-card-default uk-width-1-2@s qrky-border">
		<div class="uk-card-header">
			<div class="uk-grid uk-grid-small">
				<div class="uk-width-auto">
					<h4>Register</h4>
				</div>
				<div class="uk-width-expand uk-text-right">
					<i class="fas fa-edit" style="font-size: 20px;"></i>
				</div>
			</div>
		</div>
		<form class="uk-form-stacked" method="POST" action="{{ route('register') }}" novalidate>
			{{ csrf_field() }}
			<div class="uk-card-body">
				<div class="uk-margin">
					<label class="uk-form-label {{ $errors->has('name') ? ' uk-text-danger' : '' }}">
						Full Name
					</label>
					<div class="uk-width-1-1 uk-inline">
						<span class="uk-form-icon {{ $errors->has('name') ? ' uk-text-danger' : '' }}" uk-icon="icon: user">
						</span>
						<input id="name" type="name" class="uk-input qrky-form {{ $errors->has('name') ? ' uk-form-danger' : '' }}"
						 name="name" value="{{ old('name') }}" required autofocus>
					</div>
					@if ($errors->has('name'))
						<span class="uk-text-small uk-text-danger">{{ $errors->first('name') }}</span>
					@endif
				</div>

				<div class="uk-margin">
					<label class="uk-form-label {{ $errors->has('username') ? ' uk-text-danger' : '' }}">
						Username
					</label>
					<div class="uk-width-1-1 uk-inline">
						<span class="uk-form-icon {{ $errors->has('username') ? ' uk-text-danger' : '' }}" uk-icon="icon: tag">
						</span>
						<input id="username" type="username" class="uk-input qrky-form {{ $errors->has('username') ? ' uk-form-danger' : '' }}"
						 name="username" value="{{ old('username') }}" required autofocus>
					</div>
					@if ($errors->has('username'))
						<span class="uk-text-small uk-text-danger">{{ $errors->first('username') }}</span>
					@endif
				</div>

				<div class="uk-margin">
					<label class="uk-form-label {{ $errors->has('email') ? ' uk-text-danger' : '' }}">
						E-Mail Address
					</label>
					<div class="uk-width-1-1 uk-inline">
						<span class="uk-form-icon {{ $errors->has('email') ? ' uk-text-danger' : '' }}" uk-icon="icon: mail">
						</span>
						<input id="email" type="email" class="uk-input qrky-form {{ $errors->has('email') ? ' uk-form-danger' : '' }}"
						 name="email" value="{{ old('email') }}" required autofocus>
					</div>
					@if ($errors->has('email'))
						<span class="uk-text-small uk-text-danger">{{ $errors->first('email') }}</span>
					@endif
				</div>

				<div class="uk-margin">
					<label class="uk-form-label {{ $errors->has('password') ? ' uk-text-danger' : '' }}">
						Password
					</label>
					<div class="uk-width-1-1 uk-inline">
						<span class="uk-form-icon {{ $errors->has('password') ? ' uk-text-danger' : '' }}"
						 uk-icon="icon: lock">
						</span>
						<input id="password" type="password" class="uk-input qrky-form {{ $errors->has('password') ? ' uk-form-danger' : '' }}"
						 name="password" required>
					</div>
					@if ($errors->has('password'))
						<span class="uk-text-small uk-text-danger">{{ $errors->first('password') }}</span>
					@endif
				</div>

				<div class="uk-margin">
					<label class="uk-form-label">
						Confirm Password
					</label>
					<div class="uk-width-1-1 uk-inline">
						<span class="uk-form-icon" uk-icon="icon: lock">
						</span>
						<input id="password" type="password" class="uk-input qrky-form" name="password_confirmation" required>
					</div>
				</div>

			</div>
			<div class="uk-card-footer uk-clearfix">
				<button type="submit" class="uk-button uk-button-default qrky-nav-btn">
					Register
				</button>
			</div>
		</form>
	</div>
</div>
@endsection
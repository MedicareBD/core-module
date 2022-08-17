@extends('core::layouts.auth.app')

@section('form')
    {{ Module::asset('core:') }}
    <form action="{{ route('login') }}" method="POST" class="instant_reload_form">
        @csrf
        <div class="form-group">
            <label for="email">{{ __("Email") }}</label>
            <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
        </div>

        <div class="form-group">
            <div class="d-block">
                <label for="password" class="control-label">{{ __("Password") }}</label>
            </div>
            <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
        </div>

        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                <label class="custom-control-label" for="remember-me">{{ __("Remember Me") }}</label>
            </div>
        </div>

        <div class="form-group text-right">
            <a href="{{ route('password.request') }}" class="float-left mt-3">
                {{ __("Forgot Password?") }}
            </a>
            <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right submit-button" tabindex="4">
                {{ __("Login") }}
            </button>
        </div>

        @if(Route::has('register'))
            <div class="mt-5 text-center">
                {!! __("Don't have an account? :register_url", ['register_url' => '<a href="'.route('register').'">'.__("Create new one").'</a>']) !!}
            </div>
        @endif
    </form>
@endsection

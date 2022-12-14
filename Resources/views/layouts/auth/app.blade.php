@extends('core::layouts.admin.master')

@section('body')
    <section class="section">
        <div class="d-flex flex-wrap align-items-stretch">
            <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                <div class="p-4 m-3">
                    <img src="{{ logo() }}" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
                    <h4 class="text-dark font-weight-normal">
                        {!! __("Welcome to :title", ['title' => '<span class="font-weight-bold">'.config('app.name').'</span>']) !!}
                    </h4>
                    <p class="text-muted">
                        {{ __("Before you get started, you must login or register if you don't already have an account.") }}
                    </p>
                    @yield('form')

                    <div class="text-center mt-5 text-small">
                        {!! __("Copyright &copy; :company", ['company' => config('app.name')]) !!}
                        <div class="mt-2">
                            <a href="{{ url('privacy') }}">{{ __("Privacy Policy") }}</a>
                            <div class="bullet"></div>
                            <a href="{{ url('terms') }}">{{ __("Terms of Service") }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="http://stisla.test/assets/img/unsplash/login-bg.jpg">
                <div class="absolute-bottom-left index-2">
                    <div class="text-light p-5 pb-2">
                        <div class="mb-5 pb-3">
                            <h1 class="mb-2 display-4 font-weight-bold">Good Morning</h1>
                            <h5 class="font-weight-normal text-muted-transparent">Bali, Indonesia</h5>
                        </div>
                        Photo by <a class="text-light bb" target="_blank" href="https://unsplash.com/photos/a8lTjWJJgLA">Justin Kauffman</a> on <a class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

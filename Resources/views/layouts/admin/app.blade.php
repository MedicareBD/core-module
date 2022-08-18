@extends('core::layouts.admin.master')

@section('body')
    <div class="main-wrapper">
        @include('core::layouts.admin.partials.navbar')
        @include('core::layouts.admin.partials.sidebar')

        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
{{--                @if(!isset($withHeader) || $withHeader)--}}
{{--                    @hasSection('title')--}}
{{--                        <div class="section-header">--}}
{{--                            <h1>@yield('title')</h1>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                @endif--}}

                <div class="section-body">
                    @yield('content')
                </div>
            </section>

            @include('core::layouts.admin.partials.modals')
        </div>
        @include('core::layouts.admin.partials.footer')
    </div>
@endsection

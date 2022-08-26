<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta content="{{ csrf_token() }}" name="csrf-token">

    <link rel="icon" type="image/x-icon" href="{{ asset('stisla.svg') }}">

    <title>{{ __("Installer") }} | {{ __("Medicare") }}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/4.3.1/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/6.1.2/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/toastify-js/src/toastify.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/jquery-confirm/dist/jquery-confirm.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/waves/waves.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-theme-bootstrap4/dist/select2-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables.net-buttons-bs4/css/buttons.bootstrap4.css') }}">

    <!-- CSS Libraries -->
    @yield('vendorCss')
    @stack('vendorCss')

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/components.css') }}">


    @yield('pageCss')
    @stack('pageCss')

    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
</head>

<body>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mt-4">
                                <div class="col-12 col-lg-8 offset-lg-2">
                                    <div class="wizard-steps">
                                        <div class="wizard-step wizard-step-active">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-server"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                {{ __("Database") }}
                                            </div>
                                        </div>
                                        <div class="wizard-step">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-box-open"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                Create an App
                                            </div>
                                        </div>
                                        <div class="wizard-step">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-server"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                Server Information
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<!-- General JS Scripts -->
<script src="{{ asset('plugins/jquery/3.6.0/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/popperjs/1.16.1/umd/popper.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/4.3.1/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/jquery.nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('plugins/moment/2.24.0/moment.min.js') }}"></script>
<script src="{{ asset('admin/js/stisla.js') }}"></script>

<script src="{{ asset('plugins/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-confirm/dist/jquery-confirm.min.js') }}"></script>
<script src="{{ asset('plugins/toastify-js/src/toastify.js') }}"></script>
<script src="{{ asset('plugins/clipboard-js/clipboard.min.js') }}"></script>
<script src="{{ asset('plugins/waves/waves.min.js') }}"></script>
<script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>

<script src="{{ asset('plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>

<!-- JS Libraies -->
@yield('vendorScripts')
@stack('vendorScripts')

<!-- Template JS File -->
<script src="{{ asset('admin/js/scripts.js') }}"></script>

<!-- Page Specific JS File -->
@yield('pageScripts')
@stack('pageScripts')

<script src="{{ asset('admin/js/custom.js') }}"></script>
</body>
</html>

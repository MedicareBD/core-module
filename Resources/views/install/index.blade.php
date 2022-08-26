@extends('core::layouts.install.app')

@section('content')
    <form action="{{ route('install.get-database-information') }}" class="wizard-content mt-2 instant_reload_form">
        @csrf
        <div class="wizard-pane">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="db_connection" class="required">{{ __("Database Connection") }}</label>
                        <select name="db_connection" id="db_connection" data-control="select2" required>
                            <option value="mysql">{{ __("MySQL") }}</option>
                            <option value="pgsql">{{ __("pgSQL") }}</option>
                            <option value="sqlsrv">{{ __("SQLSRV") }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="db_host" class="required">{{ __("Database Host") }}</label>
                        <input type="text" name="db_host" id="db_host" class="form-control" value="localhost">
                    </div>

                    <div class="form-group">
                        <label for="db_port" class="required">{{ __("Database Port") }}</label>
                        <input type="text" name="db_port" id="db_port" class="form-control" value="3306" placeholder="3306" required>
                    </div>

                    <div class="form-group">
                        <label for="db_database" class="required">{{ __("Database Name") }}</label>
                        <input type="text" name="db_database" id="db_database" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="db_username" class="required">{{ __("Database User") }}</label>
                        <input type="text" name="db_username" id="db_username" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="db_password" class="optional">{{ __("Database Password") }}</label>
                        <input type="text" name="db_password" id="db_password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="db_prefix" class="optional">{{ __("Database Prefix") }}</label>
                        <input type="text" name="db_prefix" id="db_prefix" class="form-control" placeholder="Ex: ab_">
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4"></div>
                        <div class="col-lg-4 col-md-6 text-right">
                            <button class="btn btn-icon icon-right btn-primary submit-button">
                                Next <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

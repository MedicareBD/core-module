<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Modules\Core\Http\Controllers\InstallController;

Route::prefix('core')->group(function () {
    Route::get('/', 'CoreController@index');
});


Route::controller(InstallController::class)
    ->middleware('installed')
    ->group(function (){
        Route::get('install', 'index')->name('install.index');
        Route::post('install/database', 'getDatabaseInformation')->name('install.get-database-information');
});

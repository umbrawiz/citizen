<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::namespace('Admin')->group(function () {
    Route::get('/', function () {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('declaration.index');
        } else {
            return redirect()->route('admin.form.login');
        }
    });
    // Login, logout
    Route::get('/login', 'LoginController@showLoginForm')->name('admin.form.login');
    Route::get('/logout', 'LoginController@logout')->name('admin.handle.logout');

    Route::group(['middleware' => 'admin'], function () {
        // Declarations routes
        Route::get('/declarations', 'DeclarationController@index')->name('declaration.index');
        Route::get('/declaration/print', 'DeclarationController@print');

        // Administrators routes
        Route::get('/admins', 'AdminController@index');

        // Provinces routes
        Route::get('/provinces', 'ProvinceController@index');

        // Districts routes
        Route::get('/districts', 'DistrictController@index');

        // Wards routes
        Route::get('/wards', 'WardController@index');

        // Villages routes
        Route::get('/villages', 'VillageController@index');

        // Report city, district, ward, village
        Route::get('/report-province', 'ReportController@reportProvince');
        Route::get('/report-district', 'ReportController@reportDistrict');
        Route::get('/report-ward', 'ReportController@reportWard');
        Route::get('/report-village', 'ReportController@reportVillage');

        Route::get('/declaration/search', 'ReportController@searchDeclaration');

        Route::get('/show-province', 'ReportController@showDeclarationProvince');
        Route::get('/show-district', 'ReportController@showDeclarationDistrict');
        Route::get('/show-ward', 'ReportController@showDeclarationWard');
        Route::get('/show-village', 'ReportController@showDeclarationVillage');
    });
});

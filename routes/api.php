<?php

use Illuminate\Http\Request;
use App\Libs\RouteLib;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('Api')->post('/login', 'AuthController@login');

Route::group(['namespace' => 'Api', 'middleware' => 'auth:admin'], function () {

    // Declaration api
    Route::get('/declaration', 'DeclarationController@index')->name('api.declaration.index');
    Route::get('/declaration/render', 'DeclarationController@render')->name('api.declaration.render');

    Route::post('/declaration/add', 'DeclarationController@store')->name('api.declaration.add');

    Route::get('/declaration/edit', 'DeclarationController@edit')->name('api.declaration.edit');

    Route::put('/declaration/update', 'DeclarationController@update')->name('api.declaration.update');

    Route::delete('/declaration/delete', 'DeclarationController@destroy')->name('api.declaration.delete');

    Route::get('/declaration/search', 'ReportController@searchWithName')->name('api.declaration.search');

    Route::get('/declaration/print', 'DeclarationController@print')->name('api.declaration.print');

    // Admin api
    Route::get('/admin', 'AdminController@index')->name('api.admin.index');
    Route::get('/admin/render', 'AdminController@render')->name('api.admin.render');

    Route::post('/admin/add', 'AdminController@store')->name('api.admin.add');

    Route::get('/admin/edit', 'AdminController@edit')->name('api.admin.edit');

    Route::put('/admin/update', 'AdminController@update')->name('api.admin.update');

    Route::delete('/admin/delete', 'AdminController@destroy')->name('api.admin.delete');

    // Province api
    RouteLib::generateRoute('province', 'ProvinceController', 'province');

    // District api
    RouteLib::generateRoute('district', 'DistrictController', 'district');

    // Ward api
    RouteLib::generateRoute('ward', 'WardController', 'ward');

    // Village api
    RouteLib::generateRoute('village', 'VillageController', 'village');

    // Orther api
    Route::post('/check-user-role', 'AuthController@check')->name('api.auth.check');

    // Report api
    Route::get('/report-progress', 'ReportController@reportProgress')->name('api.report.progress');
    Route::get('/report-province', 'ReportController@reportProvince')->name('api.report.province');
    Route::get('/report-district', 'ReportController@reportDistrict')->name('api.report.district');
    Route::get('/report-ward', 'ReportController@reportWard')->name('api.report.ward');
    Route::get('/report-village', 'ReportController@reportVillage')->name('api.report.village');

    Route::get('/report-province/render', 'ReportController@renderProvince')->name('api.report.render.province');
    Route::get('/report-district/render', 'ReportController@renderDistrict')->name('api.report.render.district');
    Route::get('/report-ward/render', 'ReportController@renderWard')->name('api.report.render.ward');
    Route::get('/report-village/render', 'ReportController@renderVillage')->name('api.report.render.village');

    Route::get('/show-province', 'ReportController@showDeclarationProvince')->name('api.show.declaration.province');
    Route::get('/show-district', 'ReportController@showDeclarationDistrict')->name('api.show.declaration.district');
    Route::get('/show-ward', 'ReportController@showDeclarationWard')->name('api.show.declaration.ward');
    Route::get('/show-village', 'ReportController@showDeclarationVillage')->name('api.show.declaration.village');

    Route::get('/sum-village', 'ReportController@sumDeclarationVillage')->name('api.sum.declaration.village');
    Route::get('/sum-province', 'ReportController@sumDeclarationProvince')->name('api.sum.declaration.province');
    Route::get('/sum-district', 'ReportController@sumDeclarationDistrict')->name('api.sum.declaration.district');
    Route::get('/sum-ward', 'ReportController@sumDeclarationWard')->name('api.sum.declaration.ward');
});

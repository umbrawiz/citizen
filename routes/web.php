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

        } else {
            return redirect()->route('admin.form.login');
        }
    });
    // Login, logout
    Route::get('/login', 'LoginController@showLoginForm')->name('admin.form.login');
    Route::get('/logout', 'LoginController@logout')->name('admin.handle.logout');

    Route::get('/declarations', 'DeclarationController@index');
    Route::get('/declarations/add', 'DeclarationController@create');
    Route::get('/declarations/edit/id/{id}', 'DeclarationController@edit');
});

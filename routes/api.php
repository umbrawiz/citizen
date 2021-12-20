<?php

use Illuminate\Http\Request;
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

Route::group(['namespace' => 'Api'], function()
{
    Route::post('/login', 'AuthController@login');
 
    // Declarations api
    Route::get('/declarations','DeclarationController@index');

    Route::get('/declaration/add','DeclarationController@create');

    Route::get('/declaration/edit/id/{id}','DeclarationController@edit');

    Route::post('/declaration','DeclarationController@store');
    
    Route::get('/declarations/id/{id}','DeclarationController@show');
    
    Route::put('/declarations/id/{id}','DeclarationController@update');
    
    Route::delete('/declarations/id/{id}','DeclarationController@destroy');
});

<?php

namespace App\Libs;

use Illuminate\Support\Facades\Route;

class RouteLib
{
    public static function generateRoute($prefix, $controller, $name)
    {
        Route::prefix($prefix)->group(function () use ($controller, $name) {

            Route::group(
                ['middleware' => ['permission:' . config('permission.list.' . $name . '.list') . ':admin']],
                function () use ($controller, $name) {
                    Route::get('/', $controller . '@index')->name('api.' . $name . '.index');
                    Route::get('/render', $controller . '@render')->name('api.' . $name . '.render');
                }
            );

            Route::group(
                ['middleware' => ['permission:' . config('permission.list.' . $name . '.create') . ':admin']],
                function () use ($controller, $name) {
                    Route::post('/add', $controller . '@store')->name('api.' . $name . '.add');
                }
            );

            Route::group(
                ['middleware' => ['permission:' . config('permission.list.' . $name . '.update') . ':admin']],
                function () use ($controller, $name) {
                    Route::get('/edit', $controller . '@edit')->name('api.' . $name . '.edit');
                    Route::put('/update', $controller . '@update')->name('api.' . $name . '.update');
                }
            );

            Route::group(
                ['middleware' => ['permission:' . config('permission.list.' . $name . '.delete') . ':admin']],
                function () use ($controller, $name) {
                    Route::delete('/delete', $controller . '@destroy')->name('api.' . $name . '.delete');
                }
            );
        });
    }
}

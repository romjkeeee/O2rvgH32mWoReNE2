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
Route::group(['namespace' => 'Api',], function () {
    //Auth
    Route::group(['prefix' => 'auth'], function () {
        Route::post('login', 'AuthController@login');
        Route::post('signup', 'AuthController@signup');
        Route::group(['middleware' => 'auth:api'], function () {
            Route::get('logout', 'AuthController@logout');
            Route::get('user', 'AuthController@user');
        });
    });
    //User post
    Route::group(['middleware' => 'auth:api', 'prefix' => 'user'], function () {
        Route::apiResource('posts', 'UserPostController')->only('index','store','destroy');
        Route::apiResource('favorite', 'FavoritePostController');
    });

    Route::apiResource('categories', 'CategoryController')->only('index');
    Route::apiResource('posts', 'PostController')->only('index', 'show');
});

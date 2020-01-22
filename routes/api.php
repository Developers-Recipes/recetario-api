<?php

use Illuminate\Http\Request;

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

Route::get('api', 'Api\ApiController@index');


/**
 * Routes for the first version of the API
 */

Route::group(
    [
        'prefix' => 'V1',
        'middleware' => 'json.request'
    ],
    function () {

        /**
         * Route group for authentication
         */
        Route::group(
            [
                'prefix' => 'auth'
            ],
            function () {
                Route::post('login', 'AuthController@login');
                Route::post('signup', 'AuthController@signup');

                Route::group(['middleware' => 'auth:api'], function () {
                    Route::get('logout', 'AuthController@logout');
                    Route::get('user', 'AuthController@user');
                });
            }
        );

        /**
         * Group of protected routes with authentication
         */
        Route::group(
            [
                'middleware' => 'auth:api'
            ],
            function () {

                /**
                 * Route group for recipes
                 */
                Route::group([
                    'namespace' => 'Recipe'
                ], function () {
                    Route::get('recipes/paginated/{pages?}', 'RecipeController@index');
                    Route::resource('recipes', 'RecipeController', ['only' => ['show']]);
                    Route::post('recipes/{recipe}/fork', 'RecipeController@fork');
                });
            }
        );
    }
);
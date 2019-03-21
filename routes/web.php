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

Route::get('/', 'MainController@index');

Route::get('/filter', 'MainController@filter');

Route::get('/auth/{provider}', 'AuthenticationController@redirectToProvider');

Route::get('/auth/{provider}/callback', 'AuthenticationController@AuthenticateUser');

Route::post('/revendication/create', 'RevendicationController@create')->name('revendication.create');

Route::post('/revendication/like', 'RevendicationController@like');

Route::post('/revendication/dislike', 'RevendicationController@dislike');

Route::group(['prefix' => 'admin-panel'], function () {
    Voyager::routes();
});

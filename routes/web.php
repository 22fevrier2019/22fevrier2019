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

Route::get('/',[
    'uses' => 'MainController@index'
]);

Route::get('/ar',[
    'uses' => 'MainController@index'
]);

Route::get('/ar/newest',[
    'uses' => 'MainController@indexNewest'
]);

Route::get('/fr',[
    'uses' => 'MainController@indexFr'
]);

Route::get('/fr/newest',[
    'uses' => 'MainController@indexFrNewest'
]);

Route::get('/auth/{provider}',[
    'uses' => 'AuthenticationController@redirectToProvider',
]);

Route::get('/auth/{provider}/callback',[
    'uses' => 'AuthenticationController@AuthenticateUser',
]);


Route::post('/revendication/create',[
    'uses' => 'RevendicationController@create',
    'as' => 'revendication.create'
]);

Route::post('/revendication/create/fr',[
    'uses' => 'RevendicationController@createFr',
    'as' => 'revendication.create.fr'
]);


Route::post('/revendication/like',[
    'uses' => 'RevendicationController@like'
]);



Route::post('/revendication/dislike',[
    'uses' => 'RevendicationController@dislike'
]);

Route::group(['prefix' => 'admin-panel'], function () {
    Voyager::routes();
});

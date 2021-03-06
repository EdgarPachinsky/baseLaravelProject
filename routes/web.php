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

Route::get("/",'PagesController@index');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/change-current-password', 'AccountEdit@changePassword')->name('changePassword');
Route::get('/account-edit', 'AccountEdit@edit')->name('accountEdit');
Route::post('/account-edit-action', 'AccountEdit@editAction')->name('accountEditAction');


/*** SOCIAL LOGIN ***/
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

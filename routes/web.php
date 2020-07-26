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


Route::get('/', 'PagesController@homepage');

Route::get('about', 'PagesController@about');

Auth::routes(['register' => false]);

Route::get('reservation', 'ReservationController@index');

Route::get('reservation/create', 'ReservationController@create');

Route::get('reservation/{reservation}', 'ReservationController@show');

Route::post('reservation', 'ReservationController@store');

Route::get('reservation/{reservation}/edit', 'ReservationController@edit');

Route::patch('reservation/{reservation}', 'ReservationController@update');
		
Route::delete('reservation/{reservation}', 'ReservationController@destroy');

Route::resource('store', 'StoreController');

Route::resource('treatment', 'TreatmentController');

Route::resource('user', 'UserController');





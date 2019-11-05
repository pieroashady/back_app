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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', 'BackController@index');
Route::post('/create_programmer', 'BackController@createDikaProgrammer');
Route::get('/show_form', 'BackController@show');
Route::post('/register_user', 'LoginController@userRegistration');
Route::get('/regist_form', 'LoginController@showForm');
Route::get('/login_form', 'LoginController@showLoginForm');
Route::post('/login_user', 'LoginController@userLogin');
Route::get('/get_data', 'BackController@programmersData');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

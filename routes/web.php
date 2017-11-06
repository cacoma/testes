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

Route::get('tests',function () {
  return view('tests');
});

// Teste de rota para /about. Rodrigo Machado - 23/10/2017 as 20:10hs
Route::get('/about',function () {
  return view('about');
});

Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/home', 'HomeController');
Route::resource('users', 'UserController');
Route::put('users/{id}', 'UserController@update');
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
Route::resource('invests','InvestController');
// Route::patch('/users/update/{id}','UserController@update');
Route::resource('cities','CityController');

//production above

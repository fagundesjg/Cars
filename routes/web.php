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

//Auth::routes();

Route::get('/login', function () {
    return view('custom.auth.login');
})->name('login')->middleware('guest');

Route::get('/register', function () {
    return view('custom.auth.register');
})->name('register')->middleware('guest');

Route::get('/','HomeController@index');

Route::post('/login','Auth\LoginController@login');
Route::post('/register', 'Auth\RegisterController@register')->name('register');
Route::post('/logout','Auth\LoginController@logout')->name('logout');
Route::get('/logout','Auth\LoginController@logout')->name('logout');

Route::get('/cadastrar-equipe', 'EquipeController@showCreateForm')->name('cadastrar-equipe');
Route::post('/cadastrar-equipe', 'EquipeController@create')->name('cadastrar-equie');
Route::post('/cadastrar-membro-equipe','EquipeController@showInsertMemberForm')->name('cadastrar-membro-equipe');

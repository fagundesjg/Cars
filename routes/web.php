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

Route::middleware(['admin'])->group(function() {

Route::get('/cadastrar-equipe', 'EquipeController@showCreateForm')->name('cadastrar-equipe');
Route::post('/cadastrar-equipe', 'EquipeController@create');

Route::post('/cadastrar-membro-equipe','EquipeController@showInsertMemberForm')->name('cadastrar-membro-equipe');
Route::get('/cadastrar-membro-equipe/{id_equip}','EquipeController@getInsertMemberForm');

Route::put('/cadastrar-membro-equipe','EquipeController@setEquipeValue');
Route::put('/remover-membro-equipe/{id_equip}/{id_user}', 'EquipeController@unsetEquipeValue');


Route::get('/selecionar-equipe','EquipeController@showSelectEquip')->name('selecionar-equipe');
Route::post('/preencher-resultados-equipe','EquipeController@showInsertResultForm')->name('preencher-resultados-equipe');
Route::post('/cadastrar-resultado','EquipeController@createResult')->name('cadastrar-resultado');
Route::post('/remover-equipe/{equip}','HomeController@removeEquip')->name('remover-equipe');
});

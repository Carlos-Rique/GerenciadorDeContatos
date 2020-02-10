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

Route::get('/login', function (){
    return 'login';
})->name('login');


/*
Route::name('Contatos.')->group(function() {
    Route::get('/Contatos/create', 'ContatosController@create')->name('create');
    Route::get('/Contatos/{id}/edit', 'ContatosController@edit')->name('edit');
    Route::get('/Contatos/{id}', 'ContatosController@show')->name('show');
    Route::get('/Contatos', 'ContatosController@index')->name('index');
    Route::post('/Contatos', 'ContatosController@store')->name('store');
    Route::delete('/Contatos/{id}', 'ContatosController@destroy')->name('destroy');
    Route::put('/Contatos/{id}', 'ContatosController@update')->name('update');
    
});
*/
Route::resource('contatos',"ContatosController");

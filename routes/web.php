<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth', 'prefix' => 'contato'],function(){
    Route::get('/show/{id}',    ['as' => 'contato.show',    'uses' => 'App\Http\Controllers\contatosController@show']);
    Route::get('/create',       ['as' => 'contato.create',  'uses' => 'App\Http\Controllers\contatosController@create']);
    Route::post('/store',       ['as' => 'contato.store',   'uses' => 'App\Http\Controllers\contatosController@store']);
    Route::get('/edit/{id}',    ['as' => 'contato.edit',    'uses' => 'App\Http\Controllers\contatosController@edit']);
    Route::put('/update/{id}',  ['as' => 'contato.update',  'uses' => 'App\Http\Controllers\contatosController@update']);
    Route::post('/destroy/{id}',['as' => 'contato.destroy', 'uses' => 'App\Http\Controllers\contatosController@destroy']);
});

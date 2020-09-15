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

Route::get('home', 'HomeController')->name('home');

Route::resource('user', 'UserController')->names('user');
Route::patch('user/{user}/imagen', 'UserController@image')->name('user.image');

Route::resource('empresas', 'EmpresaController')->names('empresa');
Route::resource('areas', 'AreaController')->names('area');

Route::resource('categorias', 'CategoriaController')->names('categoria');
Route::resource('prioridad', 'PrioridadController')->names('prioridad');
Route::resource('tipo_tk', 'Tipo_tkController')->names('tipo_tk');
Route::post('/ticket/comentario','TicketController@comentarioGuardar')->name('comentario.guardar');


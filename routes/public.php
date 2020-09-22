<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Auth::routes();
Route::resource('ticket', 'TicketController')->names('ticket');

// Route::get('ticket/{id}', 'TicketController@show')->names('ticketuser');
Route::post('/ticket/comentario','TicketController@comentarioGuardar')->name('comentario.guardar');

Route::get('/download/{archivo}', 'TicketController@getDownload')->name('descarga');

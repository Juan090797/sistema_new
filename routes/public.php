<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Auth::routes();
Route::resource('ticket', 'TicketController')->names('ticket');

// Route::get('ticket/{id}', 'TicketController@show')->names('ticketuser');

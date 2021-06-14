<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Auth::routes();

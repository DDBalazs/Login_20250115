<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

#főoldal
Route::view('/', 'welcome');
#reg
Route::view('/reg', 'reg');
Route::post('/reg', [UserController::class, 'Reg']);
#login
Route::view('/login', 'login');
Route::post('login', [UserController::class, 'Login']);

<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(LoginController::class)->group(function()
{   
    Route::get('/login','index')->name('login');
    Route::post('/login','login')->name('entrar');
    Route::get('/logout','destroy')->name('logout');
    Route::get('/login/registar','create')->name('criarUsuario');
    Route::post('/login/registar','store')->name('salvarUsuario');
});

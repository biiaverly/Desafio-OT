<?php

use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\ConversaoController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\Authenticate;
use App\Mail\VerificacaoEmail;
use Illuminate\Support\Facades\Auth;
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
Auth::routes(['verify' => true]);


Route::get('/',function(){
    return view('index');
})->name('home');

Route::controller(LoginController::class)->group(function()
{   
    Route::get('/login','index')->name('login');
    Route::post('/login','login')->name('entrar');
    Route::get('/logout','destroy')->name('logout');
    Route::get('/login/registar','create')->name('criarUsuario');
    Route::post('/login/registar','store')->name('salvarUsuario');
});
Route::get('/verificacao/{token}',[VerificationController::class,'VerificarEmail'])->name('verificar');

Route::middleware(Authenticate::class)->middleware('verified')->group(function(){
    Route::get('/conversao', [ConversaoController::class,'index'])->name('conversao.home');
    Route::post('/conversao',[ConversaoController::class,'store'])->name('conversao.store');
    Route::get('/conversao/{id}',[ConversaoController::class,'visualizarDados'])->name('posconversao.home');
});
Route::get('/historico',[ConversaoController::class,'historicoDados'])->name('dadosHistorico')->middleware(Authenticate::class)->middleware('verified');;


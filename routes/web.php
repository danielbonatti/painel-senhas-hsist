<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SetorController;

use App\Http\Controllers\SenhaController;

use App\Http\Controllers\PainelController;

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

Route::get('/setores',[SetorController::class,'index'])->name('setores');

Route::get('/senha/{array?}',[SenhaController::class,'emissao'])->name('senha.emissao');

Route::get('/painel',[PainelController::class,'index'])->name('painel');
Route::get('/chamada',[PainelController::class,'chamada'])->name('painel.chamada');
Route::get('/historico/{id}',[PainelController::class,'historico'])->name('painel.histor');
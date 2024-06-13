<?php

use App\Http\Controllers\SiteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// [SiteController::class, "home"] - dentro de SiteController, quero carregar o método home()
Route::get('/',[SiteController::class, "home"]);
// '/sobre-nos' - o que o usuário vai digitar na URL, então, letra minúscula - trazendo a view sobre-nos.blade.php
Route::get('/sobre-nos',[SiteController::class, "sobreNos"]);
// trazendo a view contato atraves do controller
Route::get('/contato',[SiteController::class, "contato"]);

// get pois quero mostrar algo na tela
// ao chamar na url '/admin/usuarios' ira chamar UsuarioController e depois a função index
Route::get('/admin/usuarios', [UsuarioController::class, "index"]);
// se estiver com o parametro id (sem $ pois é um parametro) irá chamar o método show, que mostra um único usuário (este será um sub-arquivo de /admin/usuarios) 
Route::get('/admin/usuarios/{id}', [UsuarioController::class, "show"]);

Route::get('/admin/dashboard', [DashboardController::class, "dashboard"]);

Route::get('/admin/index',[UsuarioController::class, "index"] );
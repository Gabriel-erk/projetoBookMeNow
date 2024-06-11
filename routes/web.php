<?php

use App\Http\Controllers\SiteController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;


// [SiteController::class, "home"] - dentro de SiteController, quero carregar o método home()
Route::get('/',[SiteController::class, "home"]);
// '/sobre-nos' - o que o usuário vai digitar na URL, então, letra minúscula
Route::get('/sobre-nos',[SiteController::class, "sobreNos"]);

Route::get('/contato',[SiteController::class, "contato"]);

// get pois quero mostrar algo na tela
// ao chamar na url '/admin/usuarios' ira chamar UsuarioController e depois a função index
Route::get('/admin/usuarios', [UsuarioController::class, "index"]);
// se estiver com o parametro id (sem $ pois é um parametro) irá chamar o método show, que mostra um único usuário (este será um sub-arquivo de /admin/usuarios) 
Route::get('/admin/usuarios/{id}', [UsuarioController::class, "show"]);
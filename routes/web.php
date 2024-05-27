<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;


// [SiteController::class, "home"] - dentro de SiteController, quero carregar o método home()
Route::get('/',[SiteController::class, "home"]);
// '/sobre-nos' - o que o usuário vai digitar na URL, então, letra minúscula
Route::get('/sobre-nos',[SiteController::class, "sobreNos"]);

Route::get('/contato',[SiteController::class, "contato"]);
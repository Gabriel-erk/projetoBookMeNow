<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

/* 
* ->name("nomeDaRota") 
* atribuindo nomes as rotas pois o sistema está ficando grande, e para facilitar, e não ter que se dar o trabalho de digitar a mesma rota extensa várias vezes, atribuimos um "alias" para elas
* utilizando o meio do professor de atribuir nomes as rotas, então ->name('nomeControlador.nomePágina)
*/

Route::get('/', [SiteController::class, "home"])->name('site.home');
Route::get('/sobre-nos', [SiteController::class, "sobreNos"])->name('site.sobreNos');
Route::get('/contato', [SiteController::class, "contato"])->name('site.contato');

Route::get('/admin/usuarios', [UsuarioController::class, "index"])->name('usuario.index');
Route::get('/admin/usuarios/cadastrar', [UsuarioController::class, "create"])->name('usuario.create');
// post pois são informações submetidas por formulário
Route::post('/admin/usuarios/cadastrar/salvar', [UsuarioController::class, "store"])->name('usuario.store');
Route::get('/admin/usuarios/editar/{id}', [UsuarioController::class, "edit"])->name('usuario.edit');
// quando a rota tiver passando um id, irá jogar no método "show" de usuarioController (foi alocado aqui para baixo pois as rotas também funcionam em efeito cascata, ou seja, se este estiver acima de /cadastrar ou /usuarios, ao passar /cadastrar ou /usuarios ou qualquer outro, será interpretado como se estivessemos tentando passar algum parâmetro, e será jogado no metódo show, ou seja, no visualizar)
Route::get('/admin/usuarios/visualizar/{id}', [UsuarioController::class, "show"])->name('usuario.show');



Route::get('/admin/dashboard', [DashboardController::class, "dashboard"])->name('dashboard');

<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // traz todos os registros
    public function index()
    {   
        // estou dizendo que quero que traga tudo que está no DB, isso é igual a um SELECT *
        // $usuarios = User::all();

        /* 
        * utilizando where
        * dizendo que quero que retornde ONDE, no campo email, ele seja igual a 'bquintana@example.net'
        * -> get() é obrigatório
        */
        $usuarios = User::where('email', 'bquintana@example.net') ->get();

        /* 
        * dd variavel do laravel que retorna objetos - utilizado para deputrar e ver se tem algum erro 
        * Aqui, a variável $usuarios armazena todos os registros do modelo User, e dd($usuarios) é usado para depuração, exibindo o conteúdo da variável.    
        * pra ver se está retornando tudo certo tambem
        */
        dd($usuarios);
    }

    
    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
        //
    }

    // traz apenas um registro
    public function show(string $id)
    {
        // findOrFail, irá buscar o id do usuário, e SE encontrar algum erro, irá retornar o erro 404 - isso equivale a um SELECT id = FROM usuarios
        $usuario = User::findOrFail($id);

        dd($usuario);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}

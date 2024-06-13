<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    
    public function index()
    {   
        return view('admin.usuarios.index');
    }

    
    public function create()
    {
        
    }

  
    public function store(Request $request)
    {
        
    }

   
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

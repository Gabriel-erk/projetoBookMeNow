<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CategoriaController extends Controller
{

    public function index()
    {
        $categorias = Categoria::all();
        return view('admin.categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('admin.categorias.cadastrar');
    }

    public function store(Request $request)
    {

        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
            
        ]);

        Categoria::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
          
        ]);

        return redirect()->route('categoria.index')->with('sucesso', 'Categoria cadastrado com sucesso!');
    }

    public function show(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('admin.categorias.visualizar', compact('categoria'));
    }

    public function edit(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('admin.categorias.editar', compact('categoria'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
        ]);

        $categoria = Categoria::findOrFail($id);

        $categoria->update([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
           
        ]);

        return redirect()->route('categoria.index')->with('sucesso', 'Categoria atualizado com sucesso!!!');
    }

    public function destroy(string $id)
    {
        try {
            $categoria = Categoria::findOrFail($id);
            $categoria->delete();
            return redirect()->route('categoria.index')->with('sucesso', 'Categoria deletado com sucesso!!!');
        } catch (\Exception $e) {

            return redirect()->route('categoria.index')->with('error', 'Erro ao deletar o usuário');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use App\Models\Foto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicos = Servico::paginate(10);
        return view('admin.servicos.index', compact('servicos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.servicos.cadastrar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:100',
            'descricao' => 'required',
            'valor' => 'required|string|max:20',
            'celular' => 'required|string|max:20',
            'endereco' => 'required',
            'numero' => 'required',
            'complemento' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'cep' => 'required',
            'usuario_id' => 'required',
            'categoria_id' => 'required'
        ]);

        // armazenando o serviço em uma váriavelm, para pegar o seu id
        $servico = Servico::create($request->all());

        // verifica se tem um arquivo no campo foto, do form de "cadastrar"
        if ($request->hasFile('foto')) {
            // como tem muitas fotos, utiliza-se foreach, caso for 1 só, como um campo de foto de perfil, não precisa dele
            foreach ($request->file('foto') as $file) {
                // armazena o caminho da foto - pasta fotos, para public
                $caminhoFoto = $file->store('fotos', 'public');
                Foto::create([
                    'servico_id' => $servico->id,
                    'imagem' => $caminhoFoto
                ]);
            }
        }

        return redirect()->route('servico.index')->with('sucesso', 'Usuário cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $servico = Servico::findOrFail($id);
        return view('admin.servicos.visualizar', compact('servico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $servico = Servico::findOrFail($id);
        return view('admin.servicos.editar', compact('servico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:100',
            'descricao' => 'required',
            'valor' => 'required|string|max:20',
            'celular' => 'required|string|max:20',
            'endereco' => 'required',
            'numero' => 'required',
            'complemento' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'cep' => 'required',
            'usuario_id' => 'required',
            'categoria_id' => 'required'
        ]);

        // armazenando o serviço em uma váriavelm, para pegar o seu id
        // $servico = Servico::create($request->all());
        $servico = Servico::findOrFail($id);

        $servico->update([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'valor' => $request->valor,
            'celular' => $request->celular,
            'endereco' => $request->endereco,
            'numero' => $request->numero,
            'complemento' => $request->complemento,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'cep' => $request->cep,
            'usuario_id' => $request->usuario_id,
            'categoria_id' => $request->categoria_id
        ]);

        // verifica se tem um arquivo no campo foto, do form de "cadastrar"
        if ($request->hasFile('foto')) {
            // como tem muitas fotos, utiliza-se foreach, caso for 1 só, como um campo de foto de perfil, não precisa dele
            foreach ($request->file('foto') as $file) {
                // armazena o caminho da foto - pasta fotos, para public
                $caminhoFoto = $file->update('fotos', 'public');
                Foto::create([
                    'servico_id' => $servico->id,
                    'imagem' => $caminhoFoto
                ]);
            }
        }

        return redirect()->route('servico.index')->with('sucesso', 'Usuário editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try {
            $servico = Servico::findOrFail($id);
            $servico->delete();
            return redirect()->route('servico.index')->with('sucesso', 'Servico deletado com sucesso!!!');
        } catch (\Exception $e) {

            return redirect()->route('servico.index')->with('error', 'Erro ao deletar o usuário');
        }

        // $servico = Servico::findOrFail($id);
        // $servico->delete();
        // return redirect()->route('servico.index')->with('error', 'Erro ao deletar o usuário');
    }
}

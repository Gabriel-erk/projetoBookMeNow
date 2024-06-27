<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{

    public function index()
    {
        // User é o nosso model - all busca todos os registros da tabela
        $usuarios = User::all();
        /*
        * compact - é uma das formas de passar o conteudo da váriavel para a view - compact('usuarios') - compact analisa o escopo do método index, detecta o que posso utilizar nele, no caso estou utilizando 'usuarios', que é a variavel criada que contém todos os registros da tabela em questão (sem o $ pois daria erro) 
        * compact analisa o escopo do metodo index e procura por algo chamado 'usuarios' (que declarei no parenteses de compact - compact é uma váriavel tambem), ele irá encontrar pois declarei uma váriavel chamada $usuarios que contém todos os registros da minha tabela, e depois retorna para a minha view
        */
        return view('admin.usuarios.index',compact('usuarios'));
    }

    public function create()
    {
        return view('admin.usuarios.cadastrar');
    }

    /*
    * o nome store é convencionalmente usado para métodos que armazenam novos recursos.  
    * O método é público, o que significa que pode ser acessado de fora da classe.
    * este metodo store aceita um parâmetro do tipo 'Request', uma classe do laravel que encapsula todos os dados da solicitação http (como dados de formulário, cookies, arquivos...no caso estou submetendo dados de formulário)
    */
    public function store(Request $request)
    {   
        /* dd é para trazer um "log" das informações dentro de $request - no caso, deve conter entre as informações que ele retorna, as informações submetidas pelo meu formulário dentro de cadastrar */
        // dd($request); 

        User::create([
            
            // $request->nome esta diretamente ligado ao campo "name" igual a "nome"
            'nome' => $request->nome,
            'email' => $request->email,
            'password' => Hash::make($request->senha)

        ]);

        return redirect()->route('usuario.index');
    }

    // função que vai retornar o 'visualizar', que vai trazer as informações para eu poder ver
    public function show(string $id)
    {
        // findOrFail - procura o usuário com o id que estou passando, realiza o tratamento e se não encontrar retorna um erro
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.visualizar', compact('usuario'));
    }

    public function edit(string $id)
    {
        return view('admin.usuarios.editar');
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

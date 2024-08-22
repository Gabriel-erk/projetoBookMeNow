<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutenticacaoController extends Controller
{
    public function formLogin()
    {
        return view("admin.autenticacao.login");
    }

    // request contém todos os dados enviados na requisição http (url), como dados de formulário parâmetros da url, etc
    public function login(Request $request)
    {
        // request->validate é utilizado para garantir que os dados recebidos atendam a certos critérios antes de continuar com o processamento, se a validação falhar, será redirecionado para a página anterior com mensagens de erro
        // valida o usuário e joga as informações na váriavel $dadosUsuario (um array)
        $dadosUsuario = $request->validate([
            // [required, email] tem que ser um email valido, não pode ser deixado em branco
            "email" => ["required", "email"],
            // campo password não pode ser deixado em branco
            "password" => "required"
        ]);
        /*
        * Auth está ligado diretamente com o model de user, model usuários e utilizará suas informações 
        * Auth:;attempt() - se as credenciais forem validas (ou seja, se existir um usuário no banco de dados com essas credenciais), Auth::attempt() retornará true e o usuário será autenticado
        */
        if (Auth::attempt($dadosUsuario)) {
            // após a atutenticação bem sucedida a sesão do usuário é regenerada (o que ajuda a proteger contra ataques de fixação de sessão, onde poderia ser explorado a sessão antiga do usuário)
            $request->session()->regenerate();
            /*
             * redirect() - loga e volta para a ultima rota protegida que ele tentou acessar
             * intended("/admin/dashboard"), caso ele não tentou acessar nenhuma rota protegida (como algo de admin, que alguem que não esta logado não pode acessar), ele irá por padrão nesta rota
              */
            return redirect()->intended("/admin/dashboard");
        }
        /* 
        * se a tentativa de autenticação falhar (se as credenciais não forem válidas) este bloco será executado
        * manda de volta para a ultima página em que estava com redirect->back()
        * withErrors() adiciona uma mensagem de erro à sessão, que pode ser exibida na view para informar ao usuário que o email ou a senha são inválidos. Neste caso, a mensagem associada ao campo "email" é "Usuário ou Senha inválida"
        */
        return redirect()->back()->withErrors(["email" => "Usuário ou Senha inválida"]);
    }
    
    public function logout(Request $request)
    {
        // realizando logout/apagando do db
        Auth::logout();
        // invalidando a sesão
        $request->session()->invalidate();
        // invalidando token
        $request->session()->regenerateToken();

        return redirect("/");
    }
}

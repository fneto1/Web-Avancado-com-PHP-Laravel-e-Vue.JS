<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class LoginController extends Controller
{
    //
    public function index(Request $request) {

        $erro = '';

        if($request->get('erro') == 1){
            $erro = 'Usuário e/ou senha inválido';
        }

        if($request->get('erro') == 2){
            $erro = 'Necessário realizar login para acessar a página';
        }

        return view('site.login', ['titulo' =>'Login', 'erro' => $erro]);
    }
    public function autenticar(Request $request) {
        //regras de validação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        //as mensagens de feedback de validação
        $feedback = [
            'usuario.email' => 'O campo usuário é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);

        $email = $request->get('usuario');
        $password = $request->get('senha');

        //iniciar model User para verificar no DB os dados do input
        $user = new User();

        //quando a consulta é por igualdade, omitimos o , '=', do where
        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();

        if(isset($usuario->name)){
            //dd($usuario);
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }

//        echo '<pre>';
//        print_r($usuario);
//        echo '</pre>';

    }

    public function sair()
    {
        session_destroy();
        return redirect()->route('site.index');
    }

}
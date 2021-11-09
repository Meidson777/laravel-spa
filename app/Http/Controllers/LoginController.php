<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    //
    public function index(Request $request)
    {
        $erro = '';
        
        if($request->get('error') == 1)
        {
            $erro = 'Usuario e senha inexistentes !';
        }
        if($request->get('error') ==2)
        {
            $erro = 'Necessario realizar login para ter acesso !';
        }

        return view ('site.login', ['erro' => $erro]);
    }

    public function autenticar(Request $request)
    {
        
        $regras = [
            'email' => 'email',
            'senha' => 'required',
        ];

        // mensagens de feedback 
        $feedback = [
            'email.email' => 'O campo email é obrigatorio',
            'senha.required' => 'O campo senha é obrigatorio',
        ];

        $request->validate($regras, $feedback);

        // recebendo dados do formulario
        $email = $request->get('email');
        $senha = $request->get('senha');
        $encrypt_pass = sha1($senha);
        // chamando model user
        $user = new User();
        $funcionario = new Funcionario();

        $usuario = $user->where('emailUser', $email)->where('senha', $encrypt_pass)->get()->first();

        if(isset($usuario))
        {
            session_start();

            $_SESSION['user_id'] = $usuario->idUser;
            $_SESSION['user_name'] = $usuario->nomeUser;
            $_SESSION['user_email'] = $usuario->emailUser;
            $_SESSION['user_key'] = sha1($usuario->idUser);
            $_SESSION['user_type'] = $usuario->tipoUser;

            // dd($_SESSION);

            return redirect()->route('admin.home');
        }
        else
        {
            $funcionario = $funcionario->where('emailFuncionario', $email)->where('senha', $encrypt_pass)->get()->first();
            if(isset($funcionario)){
                session_start();

                $_SESSION['user_id'] = $funcionario->idFuncionario;
                $_SESSION['user_name'] = $funcionario->nomeFuncionario;
                $_SESSION['user_email'] = $funcionario->emailFuncionario;
                $_SESSION['user_key'] = sha1($funcionario->idFuncionario);
                $_SESSION['user_type'] = $funcionario->tipoUser;
    
                // dd($_SESSION);
    
                return redirect()->route('admin.home');
            }
            else{
                return redirect()->route('login-page', ['error' => 1]);
            }
        }
    }

    public function logout(){
        
        session_destroy();
        return redirect()->route('login-page');
    }
}

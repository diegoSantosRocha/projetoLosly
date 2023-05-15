<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller

{

    public function checkLogin(Request $request)
    {

        $user = User::where('senha_at', md5($request['senha']))->where('email', $request['email'])->first();

        if (empty($user->perfil) || ($user->perfil <> $request['perfil'])) {
            $mensagem = "ERRO";
            return redirect('login')->with('login', $mensagem);
        } else {

            Session::put('id', $user->id);

            switch ($user->perfil) {
                case 1:
                    Session::put('adm', 'OK');
                    Session::put('home_url', '/adm');
                    return redirect('adm');
                    break;
                case 2:
                    Session::put('aprovacao', 'OK');
                    Session::put('home_url', '/homeaprovacao');
                    return redirect('homeaprovacao');
                    break;
                case 3:
                    Session::put('pedidos', 'OK');
                    Session::put('home_url', '/pedidos');
                    return redirect('pedidos');
                    break;
                default:
                    $mensagem = "ERRO";
                    return redirect('login')->with('login', $mensagem);
                    break;
            }
        }
    }

    public static function criarLogin($dados)
    {
        $forn = new User;
        $forn->name = $dados['nome'];
        $forn->email = $dados['email'];
        $forn->senha_at = $dados['senha'];
        $forn->perfil = $dados['perfil'];
        $forn->save();
    }

    public function alterarUser(Request $request)
    {

        $forn = User::find($request['id']);
        $forn->name =  $forn->name;
        $forn->email =  $request['email'];
        $forn->senha_at = md5($request['senha']);
        $forn->perfil = $forn->perfil;
        $forn->update();

        session()->flash('msg', 'Ok');

        return view('login.dados_pessoais')->with('dados', $forn);
    }

    public function dadosPessoais()
    {
        $data = User::find(Session('id'));
        return view('login.dados_pessoais')->with('dados', $data);
    }
 
}

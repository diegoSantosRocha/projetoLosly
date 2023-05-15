<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aprovador;
use App\Http\Controllers\UserController;

class AprovadorController extends Controller
{
    public function mostrarTelaCadAprovador()
    {
        $this->checkLogin();
        return view('adm.cadastrar_aprov');
    }
    public function cadastrar(request $request)
    {
        $this->checkLogin();
        $aprov = new Aprovador;
        $aprov->nome = $request['nome'];
        $aprov->telefone = $request['telefone'];
        $aprov->email = $request['email'];
        $aprov->nivel_contrato = $request['contrato'];
        $aprov->save();

        if (!empty($aprov->id)) {
            $dados['nome'] = $aprov->nome;
            $dados['email'] = $aprov->email;
            $dados['senha']= md5($aprov->telefone);
            $dados['perfil'] = '2';
            UserController::criarLogin($dados);
            return response()->json(['success' => 'success'], 200);
        } else {
            return response()->json(['error' => 'invalid'], 401);
        }
    }
    public function manterAprovadores(request $request)
    {
        $this->checkLogin();
        $aprovador = Aprovador::all()->toArray();
        $id = '';
        $filter = $aprovador;
        $i = 0;
        foreach ($filter as $row) {
            $filter[$i]['nivel_contrato'] = $this->get_descricao_nivel_contrato($row['nivel_contrato']);
            $i++;
        }

        if (!empty($request['id'])) {
            $posicao_atual = array_search($request['id'], array_column($aprovador, 'id'));
            $cont = 0;

            foreach ($aprovador as $row) {

                if ($cont <> $posicao_atual) {
                    unset($filter[$cont]);
                }
                $cont++;
            }
            $id = $filter[$posicao_atual]['id'];
        }
        return view('adm.manteraprov')->with('aprovadores', $aprovador)->with('filtros',  $filter)->with('id', $id);
    }
    public function mostrarTelaEdicao(request $request)
    {
        $this->checkLogin();
        $aprovador = Aprovador::find($request['id']);
        return view('adm.alterar_aprov')->with('aprovadores', $aprovador);
    }
    public function gravarEditacaoAprovadores(request $request)
    {
        $this->checkLogin();
        $mensagem = '';
        $aprov = Aprovador::find($request['id']);
        $aprov->nome = $request['nome'];
        $aprov->telefone = $request['telefone'];
        $aprov->email = $request['email'];
        $aprov->nivel_contrato = $request['contrato'];

        $rowsAfected = $aprov->update();

        if ($rowsAfected) {
            $mensagem = "Ok";
        }

        return redirect('manterarprova')->with('msg', $mensagem);
    }
    private function get_descricao_nivel_contrato($nivel_contrato)
    {
        switch ($nivel_contrato) {
            case 1:
                return $nivel_contrato . '-Gerente de Produto';
                break;
            case 2:
                return $nivel_contrato . '-Gerente de Comrpra';
                break;
            case 3:
                return $nivel_contrato . '-Gerente de Financeiro';
                break;
            case 4:
                return $nivel_contrato . '-Diretoria de Compras';
                break;
        }
    }
    private function checkLogin()
    {
        $aprovador = session('pedidos');

        if (session('adm')=='OK'){
            return;
        }

        if (empty($aprovador)) {
           die();
        }
    }
}

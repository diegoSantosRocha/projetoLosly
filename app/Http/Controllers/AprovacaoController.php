<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Aprovacao;
use App\Models\Aprovador;
use App\Http\Controllers\FornecedorController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AprovacaoController extends Controller
{
    public function getPedidoAprovacao(Request $request)
    {
        $this->checkLogin();
        $id_user = '1';
        $contador = 0;
        $pendente = $request['pendente'];
        $concluido = $request['concluido'];

        if ((!empty($pendente) && !empty($concluido)) || (empty($pendente) && empty($concluido))) {
            $pedido = Pedido::where('id_user', $id_user)->get()->toArray();
        } else {
            if (!empty($pendente)) {
                $status = "EM";
            } else {
                $status = "AP";
            }
            $pedido = Pedido::where('id_user', $id_user)->where('status', $status)->get()->toArray();
        }

        foreach ($pedido as $row) {
            $results = DB::table('aprovacao')
                ->join('aprovadores', 'aprovacao.id_aprovador', '=', 'aprovadores.id')
                ->where('aprovacao.id_pedido', $row['id_user'])
                ->orderby('nivel_contrato', 'asc')
                ->get()
                ->toArray();
            $pedido[$contador]['status'] = PedidoController::get_status_desc($row['status']);
            $pedido[$contador]['produto'] = FornecedorController::get_descricao_produto($row['produto']);
            $pedido[$contador]['join'] = $results;
            $contador = $contador + 1;
        }

        foreach ($pedido as $row) {
            foreach ($row['join'] as $join) {
                $join->nivel_contrato = $this->cargo_desc($join->nivel_contrato);
                $join->status = PedidoController::get_status_desc($join->status);
            }
        }
        return view('pedido_compras.acompanhar')->with('data', $pedido)->with('pendente', $pendente)->with('concluido', $concluido);
    }
    public function cargo_desc($id)
    {

        switch ($id) {
            case 1:
                return $id . '-Gerente de Produto';
                break;
            case 2:
                return $id . '-Gerente de Comrpra';
                break;
            case 3:
                return $id . '-Gerente de Financeiro';
                break;
            case 4:
                return $id . '-Diretoria de Compras';
                break;
        }
    }
    public function listarAprovacao(Request $request)
    {
        $this->checkLogin();
        if (!empty($request->aprovar)) {
            $status = 'AP';
            $this->updateStatusWF($status, $request->id);
            $this->verificarUltimoAprovador($request->id);
            session()->flash('msg', 'Ok');
        } elseif (!empty($request->rejeitar)) {
            $status = 'RP';
            $this->updateStatusWF($status, $request->id);
            $this->reprovarPedido($request->id);
            session()->flash('msg', 'Ok');
        }

        $id = 8;
        $results = DB::table('aprovacao')
            ->select('aprovacao.id as idKey', 'produto', 'quantidade', 'nome', 'id_pedido')
            ->join('pedido', 'pedido.id', '=', 'aprovacao.id_pedido')
            ->join('fornecedores', 'fornecedores.id', '=', 'pedido.id_fornecedor')
            ->where('aprovacao.id_aprovador', $id)
            ->where('pedido.status', 'EM')
            ->where('aprovacao.status', 'EM')
            ->orderby('id_pedido', 'asc')
            ->get()
            ->toArray();

        foreach ($results as $row) {
            $row->produto =  FornecedorController::get_descricao_produto($row->produto);
        }


        return view('aprovacao.aprovar')->with('dados', $results);
    }

    private function updateStatusWF($status, $id)
    {
        $this->checkLogin();
        $aprov = Aprovacao::find($id);
        $aprov->status = $status;
        $aprov->save();
    }
    private function verificarUltimoAprovador($id)
    {
        $this->checkLogin();
        $pedido_unique = aprovacao::find($id);
        $aprov_all = aprovacao::where('id_pedido', $pedido_unique->id_pedido)->get();

        $id_pedido = 0;

        $tudoAprovado = true;

        foreach ($aprov_all as $row) {
            $id_pedido =  $row->id_pedido;
            if ($row->status == 'EM') {
                $tudoAprovado = false;
                break;
            }
        }

        if ($tudoAprovado == true) {
            $pedido = Pedido::find($id_pedido);
            $pedido->status = 'AP';
            $pedido->save();
        }
    }
    private function reprovarPedido($id)
    {
        $this->checkLogin();
        $pedido_unique = aprovacao::find($id);

        $pedido = Pedido::find($pedido_unique->id_pedido);
        $pedido->status = 'RP';
        $pedido->save();
    }
    private function checkLogin()
    {
        $aprovador = session('aprovacao');

        if (session('adm')=='OK'){
            return;
        }

        if (empty($aprovador)) {
           die();
        }
    }
}

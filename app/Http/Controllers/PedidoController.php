<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Fornecedor;
use App\Models\Pedido;
use App\Models\Aprovacao;
use App\Models\Aprovador;
use App\Http\Controllers\FornecedorController;


class PedidoController extends Controller
{
    public function mostrarTelaPedido()
    {
        $fornecedor = Fornecedor::all()->toArray();
        return view('pedido_compras.pedido')->with('fornecedores', $fornecedor);
    }
    public function gravarPedido(Request $request)
    {
        $linha = 0;

        $aprovadores = Aprovador::all();

        foreach ($request['produto'] as $produto) {

            $quantidade = $request['quantidade'][$linha];

            $pedido = new Pedido;
            $pedido->produto = $produto;
            $pedido->quantidade = $quantidade;
            $pedido->id_fornecedor = $request['id_cliente'];
            $pedido->id_user = '1';
            $pedido->status = 'EM';
            $pedido->save();

            foreach ($aprovadores as $aprovador) {
                $aprovacao  = new Aprovacao;
                $aprovacao->id_pedido = $pedido->id;
                $aprovacao->id_aprovador =  $aprovador['id'];
                $aprovacao->status = 'EM';
                $aprovacao->save();
            }

            $linha++;
        }
        $mensagem = "Ok";
        return redirect('criarpedido')->with('msg', $mensagem);
    }

    public function consultarPedido(Request $request)
    {
        $i = 0;
        $pedido = array();

        if ($request['data_ini']) {

            $from = $request['data_ini'];
            $to = $request['data_fim'];

            if (empty($request['data_fim'])) {
                $to = $from;
            }
            $pedido = Pedido::whereBetween('created_at', [$from, $to])->get();
        } else {
            $pedido = Pedido::all();
        }

        foreach ($pedido as $row) {
            $pedido[$i]['produto'] = FornecedorController::get_descricao_produto($row['produto']);
            $pedido[$i]['status'] = $this->get_status_desc($row['status']);
            $fornecedor = Fornecedor::find($row['id_fornecedor']);
            $pedido[$i]['id_fornecedor'] = $fornecedor['nome'];
            $i++;
        }

          $pdf = Pdf::loadView('componente.pedido_pdf', array('pedidos'=> $pedido));

        if (isset($request['pdf'])) {
            $nome = 'Pedido'.date("Y/m/d").'.pdf';
            return $pdf->download($nome);
        } else {
            return view('pedido_compras.consultar')->with('pedidos', $pedido);
        }
    }
    public static function get_status_desc($des)
    {
        switch ($des) {
            case 'EM':
                return 'Em aprovação';
                break;
            case 'AP':
                return 'Aprovado';
            case 'RP':
                return 'Reprovado';
        }
    }
}

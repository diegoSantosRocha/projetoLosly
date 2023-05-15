<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function cadastrar(request $request)
    {
        $forn = new Fornecedor;
        $forn->nome = $request['nome'];
        $forn->cnpj = $request['cnpj'];
        $forn->telefone = $request['telefone'];
        $forn->email = $request['email'];
        $forn->tipo_produto = $request['produto'];
        $forn->status_liberacao_pedido = $request['liberar'];
        $forn->save();

        if (!empty($forn->id)) {
            return response()->json(['success' => 'success'], 200);
        } else {
            return response()->json(['error' => 'invalid'], 401);
        }
    }

    public function manterFornecedor(request $request)
    {
        $fornecedor = Fornecedor::all()->toArray();
        $id = '';
        $filter = $fornecedor;
        $i = 0;
        foreach ($filter as $row) {
            $filter[$i]['tipo_produto'] = $this->get_descricao_produto($row['tipo_produto']);
            $filter[$i]['status_liberacao_pedido'] = ($row['status_liberacao_pedido'] == "1") ? "Sim" : "Não";
            $i++;
        }

        if (!empty($request['id'])) {
            $posicao_atual = array_search($request['id'], array_column($fornecedor, 'id'));
            $cont = 0;

            foreach ($fornecedor as $row) {

                if ($cont <> $posicao_atual) {
                    unset($filter[$cont]);
                }
                $cont++;
            }
            $id = $filter[$posicao_atual]['id'];
        }
        return view('adm.manterforn')->with('fornecedores', $fornecedor)->with('filtros',  $filter)->with('id', $id);
    }

    public function mostrarTelaEdicao($id)
    {

        $fornecedor = Fornecedor::find($id)->toArray();
        return view('adm.alterar_fornecedor')->with('fornecedores', $fornecedor);
    }

    public function gravarEditacaAprovadores(request $request)
    {
        $mensagem = '';
        $forn = Fornecedor::find($request['id']);
        $forn->nome = $request['nome'];
        $forn->telefone = $request['telefone'];
        $forn->email = $request['email'];
        $forn->cnpj = $request['cnpj'];
        $forn->tipo_produto = $request['produto'];
        $forn->status_liberacao_pedido = $request['liberar'];


        $rowsAfected = $forn->update();

        if ($rowsAfected) {
            $mensagem = "Ok";
        }

        return redirect('manterfornecedor')->with('msg', $mensagem);
    }

    public static function get_descricao_produto($id)
    {
        switch ($id) {
            case 1:
                return $id . '-Losly Externo(BRANCO)';
                break;
            case 2:
                return $id . '-Losly Interno(BRANCO)';
                break;
            case 3:
                return $id . '-Losly Externo(CINZA)';
                break;
            case 4:
                return $id . '-Losly Interno(CINZA)';
                break;
            case 5:
                return $id . '-Losly Externo bloco de Vidro(CINZA)';
                break;
            case 6:
                return $id . '-Losly Interno bloco de Vidro(CINZA)';
                break;
            case 7:
                return $id . '-Losly Externo bloco de Vidro(BRANCO)';
                break;
            case 8:
                return $id . '-Losly Internob loco de Vidro(BRANCO)';
                break;
        }
    }
    private function checkLogin()
    {
        $aprovador = session('adm');

        if (empty($aprovador)) {
            die();
        }
    }
}

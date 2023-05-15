<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AprovadorController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\AprovacaoController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/////////////////////////////////////////////////////////////////
//Pedido
////////////////////////////////////////////////////////////////
Route::get('/pedidos', function () {
    return view('pedido_compras.home');
});

Route::get('/criarpedido',[PedidoController::class, 'mostrarTelaPedido']);
Route::post('/gravarpedido',[PedidoController::class, 'gravarPedido']);
Route::get('/consultar',[PedidoController::class, 'consultarPedido']);

/*Route::get('', function () {
    return view('pedido_compras.consultar');
});*/



Route::get('/acompanharpedido', [AprovacaoController::class, 'getPedidoAprovacao'] );

/////////////////////////////////////////////////////////////////
//Aprovacao
////////////////////////////////////////////////////////////////

Route::get('/homeaprovacao', function () {
    return view('aprovacao.home');
});

Route::get('/aprovacao',[AprovacaoController::class,'listarAprovacao']);
/////////////////////////////////////////////////////////////////
//ADM
////////////////////////////////////////////////////////////////
Route::get('/adm', function () {
    return view('adm.home');
});
//Fornecedor
Route::get('/cadastrarforn', function () {
    return view('adm.cadastrar_forn');
});
route::get('/manterfornecedor',[FornecedorController::class, 'manterFornecedor']);
Route::post('/gravarFornecedor',[FornecedorController::class,'cadastrar']);
Route::get('/editarFornecedor/{id}',[FornecedorController::class,'mostrarTelaEdicao']);
Route::post('/gravarAlteraoFornecedores', [FornecedorController::class,'gravarEditacaAprovadores']);

//Aprovadores
Route::get('/cadastroAprovador', [AprovadorController::class,'mostrarTelaCadAprovador']);
Route::post('/gravarAprovador', [AprovadorController::class,'cadastrar']);
Route::get('/editarAprovadores/{id}', [AprovadorController::class,'mostrarTelaEdicao']);
Route::get('/manterarprova', [AprovadorController::class,'manterAprovadores']);
Route::post('/gravarAlteraoAprovadores', [AprovadorController::class,'gravarEditacaoAprovadores']);

Route::get('/chart', function () {
    return view('adm.chart');
});

/////////////////////////////////////////////////////////////////
//Login
////////////////////////////////////////////////////////////////
Route::get('/login', function () {
    return view('login.home');
});

Route::post('/verificar', [UserController::class,'checkLogin']);
Route::post('/alterarUser', [UserController::class,'alterarUser']);
Route::get('/dadospessoais',  [UserController::class,'dadosPessoais']);















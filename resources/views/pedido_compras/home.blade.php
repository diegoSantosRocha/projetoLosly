@extends('layout')
@section('dashboard')
    @include('pedido_compras.dashbordtext')
@endsection
@section('main')
    <div class="container-fluid bg-trasparent my-4 p-3 " style="position: relative;">
        <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3 ">
            <!--Fazer Pedido-->
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-text">
                        <div class="text-center"> <a href="/criarpedido"> <img src="{{ asset('img/cadastro_pedido.png') }}"
                                    class="card-img-top" alt="...">
                                <div class="btn btn-primary">Fazer Pedido</div>
                            </a> </div>
                    </div>
                </div>
            </div>
            <!--Histórico de Pedidos-->
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-text">
                        <div class="text-center"> <a href="/consultar"> <img src="{{ asset('img/historico.png') }}"
                                    class="card-img-top" alt="...">
                                <div class="btn btn-warning">Consulta de Pedidos</div>
                            </a> </div>
                    </div>
                </div>
            </div>
            <!--Workflow-->
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-text">
                        <div class="text-center"> <a href="/acompanharpedido"> <img src="{{ asset('img/workflow.png') }}"
                                    class="card-img-top" alt="...">
                                <div class="btn btn-success">Acompanhar Aprovação de Pedido</div>
                            </a> </div>
                    </div>
                </div>
            </div>
            <!--Meus dados-->
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-text">
                        <div class="text-center"> <a href="/dadospessoais"> <img src="{{ asset('img/dados_pessoais.png') }}"
                                    class="card-img-top" alt="...">
                                <div class="btn btn-secondary">Meus dados</div>
                            </a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection('main')

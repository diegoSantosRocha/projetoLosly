@extends('layout')
@section('title')
    Acompanhar Aprovação Pedido
@endsection
@section('dashboard')
    @include('pedido_compras.dashbordtext')
@endsection
@section('main')
    <div class="container-fluid bg-trasparent my-4 p-3 ">
        <p><img src="{{ asset('img/workflow.png') }}" alt="Cadastro de Pedido" width="40" />
            <span class="p-2">Acompanhar Aprovação</span>
        </p>
        <hr>
        <div class="mb-3">
            <!--  <div class="col col-lg-8">
                    <label for="contrato" class="form-label">Selecione o Cliente</label>
                    <select id="contrato" class="form-select input_size">
                        <option>Disabled select</option>
                        <option>teste</option>
                        <option>Disabled select</option>
                        <option>Disabled select</option>
                    </select>
                </div> -->
        </div>
        <form action="/acompanharpedido" method="get">
            <div class="mb-3">
                <div class="col col-lg-6">
                    Pedente <input type="checkbox" name="pendente" @if(isset($pendente)) checked @endif/> concluído<input type="checkbox" name="concluido"  @if(isset($concluido)) checked @endif />
                </div>
            </div>
            <div class="mb-3">
                <div class="col">
                    <button type="submit" class="btn-sm btn-success"><i class="bi bi-funnel-fill p-2"></i>Filtrar</button>
                </div>
            </div>
        </form>
        @foreach ($data as $item)
            <div id="Aprovacao" class="mb-3">
                <div class="row border border-dark ">
                    <div class="row">
                        <div class="col col-lg-10">
                            <h6>Pedido {{ $item['id'] }}</h6>
                        </div>
                        <div class="col col-lg-2">
                            <h6>Status: {{ $item['status'] }} </h6>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col">
                            <p>Item
                            <p>
                        </div>
                        <div class="col col-lg-4"><span>Produto</span></div>
                        <div class="col col-lg-3"><span>Quantidade</span></div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>10</p>
                        </div>
                        <div class="col col-lg-4"><span>{{ $item['produto'] }}</span></div>
                        <div class="col col-lg-3"><span>30</span></div>
                    </div>
                    <div class="mb-3">
                        <div class="col">
                            <button class="btn-sm btn-primary" type="button" data-toggle="collapse"
                                data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                <i class=" p-2 bi bi-box-arrow-down-right"></i>
                                Ver fluxo
                            </button>

                        </div>
                    </div>
                </div>
                @foreach ($item['join'] as $join)
                    <div class="collapse" id="collapseExample">
                        <br />
                        <div id="Aprovacao">
                            <div class="row border border-dark">
                                <div class="row">
                                    <h4>Aprovação de Nível {{ $join->nivel_contrato }}</h4>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col">
                                        <p>Aprovador Responsável: {{ $join->nome }}
                                        </p>
                                    </div>
                                    <div class="col col-lg-4">
                                        <p>Data da Solicitação: {{ $join->created_at }}</p>
                                    </div>
                                    <div class="col col-lg-3"><span> {{ $join->status }}</span><i
                                            class="bi bi-person-workspace"></i></div>
                                </div>
                                <div class="row">
                                    <div class="col">Obs:</div>
                                </div>

                                <hr />
                                <!--     <div class="row">
                                <h4>Aprovação de Nível 1 - Gerente de Compras</h4>
                            </div>
                            <hr />
                         <div class="row">
                                <div class="col">
                                    <p>Aprovador Responsável: Diego dos Santos Rocha
                                    <p>
                                </div>
                                <div class="col col-lg-4">
                                    <p>Data da Solicitação: 14/11/2023</p>
                                </div>
                                <div class="col col-lg-3"><span>Staus:Em processamento</span><i
                                        class="bi bi-person-workspace"></i></div>
                            </div>
                            <div class="row">
                                <div class="col">Obs:Seu pedido em análise</div>
                            </div> -->

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
        <a href="{{ session('home_url') }}" class="btn btn-primary">Voltar</a>
    </div>
@endsection('main')

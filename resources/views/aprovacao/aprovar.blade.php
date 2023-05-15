@extends('layout')
@section('title')
    Aprovação do Pedido
@endsection
@section('dashboard')
    @include('aprovacao.aprovacaotxt')
@endsection
@section('main')
    <div class="container-fluid bg-trasparent my-4 p-3 ">
        <p><img src="{{ asset('img/aprovarcheck.png') }}" alt="Aprovação Pedido" width="40" />
            <span class="p-2">Aprovar Pedido</span>
        </p>
        <hr>
        <div id="Aprovacao" class="mb-3">
            @foreach ($dados as $item)
                <form method="get" action="/aprovacao">
                    <input type="hidden" value="{{ $item->idKey }}" name="id" >
                    <div class="row border border-dark ">
                        <div class="row">
                            <div class="col col-lg-8">
                                <h6>Pedido {{ $item->id_pedido }}</h6>
                            </div>
                            <div class="col col-lg-4">
                                <h6>Solicitante: {{ $item->nome }} </h6>
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
                            <div class="col col-lg-4"><span>{{ $item->produto }}</span></div>
                            <div class="col col-lg-3"><span>{{ $item->quantidade }}</span></div>
                        </div>
                        <div class="mb-3">
                            <div class="col">
                                <button class="btn-sm btn-success" name="aprovar" type="submit" value="aprovar">
                                    Aprovar
                                </button>
                                <button class="btn-sm btn-danger" name="rejeitar" type="submit"value="reprovar">
                                    Rejeitar
                                </button>

                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>
        <a href="{{ session('home_url') }}" class="btn btn-primary">Voltar</a>
    </div>
@endsection('main')

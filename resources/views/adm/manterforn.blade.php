@extends('layout')
@section('title')
    Acompanhar Aprovação Pedido
@endsection
@section('dashboard')
    @include('pedido_compras.dashbordtext')
@endsection
@section('main')
    <div class="container-fluid bg-trasparent my-4 p-3 ">
        <p><img src="{{ asset('img/manter_fornecedor.png') }}" alt="Manter Fornecedor" width="40" />
            <span class="p-2">Manter Fornecedor</span>
        </p>
        <hr>
        <div class="mb-3">
            <div class="col col-lg-8">
                <form action="/manterfornecedor" method="get">
                    <label for="fornecedor" class="form-label">Selecione o Fornecedor</label>
                    <select id="fornecedor" class="form-select input_size" name="id">
                        <option value="">Todos</option>
                        @foreach ($fornecedores as $fornecedor)
                            <option value="{{ $fornecedor['id'] }}" @if (isset($id) && $id == $fornecedor['id']) selected @endif $id>
                                {{ $fornecedor['nome'] }}</option>
                        @endforeach
                    </select>
            </div>
        </div>
        <div class="mb-3">
            <div class="col">
                <button type="submit" class="btn-sm btn-success"><i class="bi bi-funnel-fill p-2"></i>Filtrar</button>
            </div>
        </form>
        </div>
        @foreach ($filtros as $fornecedor)
            <div class="mb-3">
                <div class="row border border-dark ">
                    <div class="row">
                        <div class="col col-lg-5">
                            <h6><b>Fornecedor:</b> {{ $fornecedor['nome'] }}</h6>
                        </div>
                        <div class="col col-lg-4">
                            <h6><b>CNPJ:</b> {{ $fornecedor['cnpj'] }} </h6>
                        </div>
                        <div class="col col-lg-3">
                            <h6><b>Liberado para fazer pedido:</b> {{ $fornecedor['status_liberacao_pedido'] }} </h6>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col">
                            <p><b>Telefone</b></p>
                        </div>
                        <div class="col col-lg-4"><span><b>Email</b></span></div>
                        <div class="col col-lg-3"><span><b>Produto</b></span></div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>(21)99780-5345</p>
                        </div>
                        <div class="col col-lg-4"><span>{{ $fornecedor['email'] }}</span></div>
                        <div class="col col-lg-3"><span>{{ $fornecedor['tipo_produto'] }}</span></div>
                    </div>
                    <div class="mb-3">
                        <div class="col">
                            <a href="/editarFornecedor/{{ $fornecedor['id'] }}" class="btn-sm btn-primary" role ="button">
                                <i class="bi bi-pencil-fill"></i>
                                Alterar
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <a href="{{ session('home_url') }}" class="btn btn-primary">Voltar</a>
    </div>
@endsection('main')

@extends('layout')
@section('title')
    Acompanhar Aprovação Pedido
@endsection
@section('dashboard')
    @include('pedido_compras.dashbordtext')
@endsection
@section('main')
    <div class="container-fluid bg-trasparent my-4 p-3 ">
        <p><img src="{{ asset('img/aprovarcheck.png') }}" alt="Manter Fornecedor" width="40" />
            <span class="p-2">Manter Aprovadores</span>
        </p>
        <hr>
        <div class="mb-3">
            <div class="col col-lg-8">
                <form action="/manterarprova" method="get">
                    <label for="aprovador" class="form-label">Filtrar Aprovador</label>
                    <select name="id" id="aprovador" class="form-select input_size">
                        <option value="">Todos</option>
                        @foreach ($aprovadores as $aprovador)
                            <option value="{{ $aprovador['id'] }}" @if (isset($id) && $id == $aprovador['id']) selected @endif $id>
                                {{ $aprovador['nome'] }}</option>
                        @endforeach
                    </select>
            </div>
        </div>
        <div class="mb-3">
            <div class="col">
                <button type="submit" class="btn-sm btn-success"><i class="bi bi-funnel-fill p-2"></i>Filtrar</button>
            </div>
        </div>
        </form>
        @foreach ($filtros as $aprovador)
            <div class="mb-3">
                <div class="row border border-dark ">
                    <div class="row">
                        <div class="col col-lg-9">
                            <h6>Nome: {{ $aprovador['nome'] }}</h6>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col">
                            <p>Telefone</p>
                        </div>
                        <div class="col col-lg-4"><span>Email</span></div>
                        <div class="col col-lg-3"><span>Nível de Aprovação</span></div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p> {{ $aprovador['telefone'] }}</p>
                        </div>
                        <div class="col col-lg-4"><span>{{ $aprovador['email'] }}</span></div>
                        <div class="col col-lg-3"><span>{{ $aprovador['nivel_contrato'] }}</span></div>
                    </div>
                    <div class="mb-3">
                        <div class="col">
                            <a class="btn-sm btn-primary" role="button" href="/editarAprovadores/{{ $aprovador['id'] }}">
                                <i class="bi bi-pencil-fill"></i>
                                Alterar
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <a href="#" class="btn btn-primary" onclick="voltar();">Voltar</a>
    </div>   
@endsection('main')

@extends('layout')
@section('dashboard')
    @include('pedido_compras.dashbordtext')
@endsection
@section('dashboard')
    @include('pedido_compras.dashbordtext')
@endsection
@section('main')
    <div class="container-fluid bg-trasparent my-4 p-3 ">
        <form action="/consultar" method="get">
            <div class="mb-3">
                <div class="mb-3"><img src="{{ asset('img/historico.png') }}" alt="Cadastro de Pedido" width="40" /><span
                        class="p-2">Consultar Pedido</span></div>
                <hr>
                <h4>Filtro</h4>
                <div class="input-group mb-3 p-2">
                    <label class=" p-2">De</label> <input type="date" name="data_ini" class="form-input input_size_20"
                        placeholder="Data de">
                    <label class=" p-2">Até</label><input type="date" name="data_fim" class="form input_size_20"
                        placeholder="Data até">
                    <div class="p-2"></div> <button type="submit" class="btn btn-success">Buscar</button>
                </div>
            </div>
        </form>
        @if (!empty($pedidos))
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Data</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Material</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedidos as $pedido)
                            <tr>
                                <td>{{ date("d/m/Y", strtotime($pedido['created_at'])) }}</td>
                                <td>{{$pedido['id_fornecedor']}}</td>
                                <td>{{ $pedido['produto'] }}</td>
                                <td>{{ $pedido['quantidade'] }}</td>
                                <td>{{ $pedido['status']}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
             <button type="button" class="btn btn-success" name="Salvar" onclick="pdfPedido();">Salvar em PDF</button>

        @endif
        <a href="{{ session('home_url') }}" class="btn btn-primary">Voltar</a>
    </div>

    </div>
@endsection('main')

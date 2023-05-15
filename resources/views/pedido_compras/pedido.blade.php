@extends('layout')
@section('dashboard')
    @include('pedido_compras.dashbordtext')
@endsection
@section('main')
    <div class="container-fluid bg-trasparent my-4 p-3 ">

        <form class="form-control-lg" id="form_pedido" action="/gravarpedido" method="post">
           @csrf
            <p><img src="{{ asset('img/cadastro_pedido.png') }}" alt="Cadastro de Pedido" width="40" />Pedido</p>
            <hr>
            <div class="mb-3">
                <label for="contrato" class="form-label">Selecione o Cliente</label>
                <select id="cliente" class="form-select input_size" name="id_cliente" required>
                    <option value="">Selecione</option>
                    @foreach ($fornecedores as $fornecedor)
                        <option value="{{ $fornecedor['id'] }}" @if (isset($id) && $id == $fornecedor['id']) selected @endif $id>
                            {{ $fornecedor['nome'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <p>Informe o Material e quantidade</p>
                <table class="table table-sm" id="adicionar">
                    <thead>
                        <tr>
                            <th scope="col">Material</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                     <tr>
                       <td> <select id="produto" class="form-select input_size" name="produto[]" required>
                        <option value="">Escolha</option>
                        <option value="1">Losly Externo(BRANCO)</option>
                        <option value="2">Losly Interno(BRANCO)</option>
                        <option value="3">Losly Externo(CINZA)</option>
                        <option value="4">Losly Interno(CINZA)</option>
                        <option value="5">Losly Externo bloco de Vidro(CINZA)</option>
                        <option value="6">Losly Internob loco de Vidro(CINZA)</option>
                        <option value="7">Losly Externo bloco de Vidro(BRANCO)</option>
                        <option value="8">Losly Interno bloco de Vidro(BRANCO)</option>
                    </select></td>
                            <td><input type="number" class="form-input input_size" name="quantidade[]" /></td>
                            <td><a href="#" onclick="adicionaLinha();">
                                <i class="bi bi-plus-circle-fill"></i>
                                </a></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>     
        <button type="submit" class="btn btn-success">Enviar</button>
        <a href='{{ session('home_url') }}' class="btn btn-primary">Voltar</a>
    </form>
    </div>
@endsection('main')

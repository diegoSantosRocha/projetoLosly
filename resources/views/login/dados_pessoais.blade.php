@extends('layout')
@section('dashboard')
    @include('pedido_compras.dashbordtext')
@endsection
@section('main')
    <div class="container-fluid bg-trasparent my-4 p-3 ">

        <form class="form-control-lg" id="form_dados_pessoais" action="/alterarUser" method="post">
            @csrf
            <p><img src="{{ asset('img/dados_pessoais.png') }}" alt="Dados Pessoais" width="40" />Dados Pessoais</p>
            <hr>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" required value="{{$dados->email}}">
                </div>
                <div class="form-group col-md-2">
                    <label for="senha">Nova Senha</label>
                    <input type="password" class="form-control" id="senha" placeholder="Senha" required name="senha">
                </div>
            </div>
            <input type="hidden" name="id" value="{{ $dados->id}}">
            <br>
            <div class="mb-4">
                <button type="submit" class="btn btn-success">Alterar</button>
                <a href='{{ session('home_url') }}' class="btn btn-primary">Voltar</a>
            </div>
    </div>

    </form>
@endsection('main')

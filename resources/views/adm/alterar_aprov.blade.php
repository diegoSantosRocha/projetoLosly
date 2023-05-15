@extends('layout')
@section('dashboard')
    @include('adm.admtxt')
@endsection
@section('title')
    Alterar Aprovadores
@endsection
@section('main')
    <div class="container-fluid bg-trasparent my-4 p-3 ">
        <form class="form-control-lg" action="/gravarAlteraoAprovadores"  method="POST">
            @csrf
            <p><img src="{{ asset('img/aprovarcheck.png') }}" alt="Manter Aprovadores" width="40" /><span
                    class="p-2">Alterar Aprovadores</span></p>
            <hr>
            <input type='hidden' value="{{$aprovadores['id']}}" name="id" />
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="nome">Nome</label>
                    <input name="nome" type="text" class="form-control" id="nome" placeholder="Nome" required
                        maxlength="50" value="{{$aprovadores['nome']}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="telefone">Telefone</label>
                    <input name="telefone" type="tel" class="form-control" id="telefone" placeholder="Telefone"
                        maxlength="30" required value="{{$aprovadores['telefone']}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="email">Email</label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="Email" required
                        maxlength="50" value="{{$aprovadores['email']}}">
                </div>
                <div class="form-group col-md-6">
                    <div class="col col-lg-8">
                        <label for="contrato" class="form-label">Nível de aprovação</label>
                        <select name="contrato" id="contrato" class="form-select" required>
                            <option value="">Escolha</option>
                            <option value="1" @if($aprovadores['nivel_contrato'] == "1") selected @endif>Gerente de Produto</option>
                            <option value="2" @if($aprovadores['nivel_contrato'] == "2") selected @endif>Gerente de Comrpra</option>
                            <option value="3" @if($aprovadores['nivel_contrato'] == "3") selected @endif>Gerente de Financeiro</option>
                            <option value="4" @if($aprovadores['nivel_contrato'] == "4") selected @endif>Diretoria de Compras</option>
                        </select>
                    </div>
                </div>
                <br />
                <div class="mb-4">
                    <button type="submit" class="btn btn-success">Alterar</button>
                    <a href='{{ session('home_url') }}' class="btn btn-primary">Voltar</a>
                </div>
        </form>
    </div>
@endsection('main')

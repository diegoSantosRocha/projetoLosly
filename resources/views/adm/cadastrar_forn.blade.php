@extends('layout')
@section('dashboard')
    @include('adm.admtxt')
@endsection
@section('main')
    <div class="container-fluid bg-trasparent my-4 p-3 ">
        <form class="form-control-lg" id="cad_fornecedor"
            onsubmit="cadastrarFornecedores(event)";
           >
           @csrf
            <p><img src="{{ asset('img/fornecedor_adm.png') }}"
            alt="Cadastro" width="40" /><span class="p-2">Cadastro de Fornecedor</span></p>
        <hr>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="nome">Nome</label>
                <input type="nome" class="form-control" id="nome" placeholder="Nome" name="nome" required>
            </div>
            <div class="form-group col-md-2">
                <label for="cnpj">CNPJ</label>
                <input type="text" class="form-control" id="cnpj" placeholder="CNPJ" name="cnpj" required>
            </div>
            <div class="form-group col-md-4">
                <label for="telefone">Telefone</label>
                <input type="telefone" class="form-control" id="telefone" placeholder="Telefone" name="telefone" required>
            </div>
            <div class="form-group col-md-4">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
            </div>
            <div class="form-group col-md-6">
                <div class="col col-lg-8">
                    <label for="produto" class="form-label">Selecione o produto a ser Fornecido</label>
                    <select id="produto" class="form-select" name="produto" required>
                        <option value="">Escolha</option>
                        <option value="1">Losly Externo(BRANCO)</option>
                        <option value="2">Losly Interno(BRANCO)</option>
                        <option value="3">Losly Externo(CINZA)</option>
                        <option value="4">Losly Interno(CINZA)</option>
                        <option value="5">Losly Externo bloco de Vidro(CINZA)</option>
                        <option value="6">Losly Internob loco de Vidro(CINZA)</option>
                        <option value="7">Losly Externo bloco de Vidro(BRANCO)</option>
                        <option value="8">Losly Internob loco de Vidro(BRANCO)</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="col col-lg-8">
                    <label for="liberar" class="form-label">Liberado para Pedido?</label>
                    <select id="liberar" class="form-select" name="liberar" required>
                        <option value="1">Sim</option>
                        <option value="2">Não</option>
                    </select>
                </div>
            </div>
        </div>
        <br />
        <div class="mb-4">
            <button type="submit" class="btn btn-success">Cadastrar</button>
            <a href='{{ session('home_url') }}' class="btn btn-primary">Voltar</a>

            </form>
        </div>
    </div>
@endsection('main')

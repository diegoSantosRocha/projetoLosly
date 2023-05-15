@extends('layout')
@section('dashboard')
    @include('adm.admtxt')
@endsection
@section('main')
    <div class="container-fluid bg-trasparent my-4 p-3 ">
        <form class="form-control-lg" id="alt_fornecedor" action="/gravarAlteraoFornecedores" method="post">
           @csrf
           <input type="hidden"  name="id" value="{{ $fornecedores['id']}}">
            <p><img src="{{ asset('img/manter_fornecedor.png') }}"
            alt="Alterar" width="40" /><span class="p-2">Alterar Fornecedor</span></p>
        <hr>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="nome">Nome</label>
                <input type="nome" class="form-control" id="nome" placeholder="Nome" name="nome" required value="{{ $fornecedores['nome']}}">
            </div>
            <div class="form-group col-md-2">
                <label for="cnpj">CNPJ</label>
                <input type="text" class="form-control" id="cnpj" placeholder="CNPJ" name="cnpj" required value="{{ $fornecedores['cnpj']}}">
            </div>
            <div class="form-group col-md-4">
                <label for="telefone">Telefone</label>
                <input type="telefone" class="form-control" id="telefone" placeholder="Telefone" name="telefone" required value="{{ $fornecedores['telefone']}}">
            </div>
            <div class="form-group col-md-4">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Email" name="email" required value="{{ $fornecedores['email']}}">
            </div>
            <div class="form-group col-md-6">
                <div class="col col-lg-8">
                    <label for="produto" class="form-label">Selecione o produto a ser Fornecido</label>
                    <select id="produto" class="form-select" name="produto" required>
                        <option value="">Escolha</option>
                        <option value="1" @if($fornecedores['tipo_produto'] == "1") selected @endif>Losly Externo(BRANCO)</option>
                        <option value="2" @if($fornecedores['tipo_produto'] == "2") selected @endif>Losly Interno(BRANCO)</option>
                        <option value="3" @if($fornecedores['tipo_produto'] == "3") selected @endif>Losly Externo(CINZA)</option>
                        <option value="4" @if($fornecedores['tipo_produto'] == "4") selected @endif>Losly Interno(CINZA)</option>
                        <option value="5" @if($fornecedores['tipo_produto'] == "5") selected @endif>Losly Externo bloco de Vidro(CINZA)</option>
                        <option value="6" @if($fornecedores['tipo_produto'] == "6") selected @endif>Losly Internob loco de Vidro(CINZA)</option>
                        <option value="7" @if($fornecedores['tipo_produto'] == "7") selected @endif>Losly Externo bloco de Vidro(BRANCO)</option>
                        <option value="8" @if($fornecedores['tipo_produto'] == "8") selected @endif>Losly Internob loco de Vidro(BRANCO)</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="col col-lg-8">
                    <label for="liberar" class="form-label">Liberado para Pedido?</label>
                    <select id="liberar" class="form-select" name="liberar" required>
                        <option value="1" @if($fornecedores['status_liberacao_pedido'] == "1") selected @endif>Sim</option>
                        <option value="2" @if($fornecedores['status_liberacao_pedido'] == "2") selected @endif>Não</option>
                    </select>
                </div>
            </div>
        </div>
        <br />
        <div class="mb-4">
            <button type="submit" class="btn btn-success">Alterar</button>
            <a href='#' class="btn btn-primary" onclick="voltar()">Voltar</a>

            </form>
        </div>
    </div>
@endsection('main')

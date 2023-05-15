@extends('layout')

@section('main')
@section('dashboard')
    @include('adm.admtxt')
@endsection

<div class="container-fluid bg-trasparent my-4 p-3 " style="position: relative;">
    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3 ">
        <!--Aprovadores-->
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-text">
                    <div class="text-center"> <a href="/cadastroAprovador"> <img src="{{ asset('img/adm_cadastrar.png') }}"
                                class="card-img-top" alt="...">
                            <div class="btn btn-primary">Cadastrar Aprovadores Pedido</div>
                        </a> </div>
                </div>
            </div>
        </div>
        <!--Manter Aprovadores-->
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-text">
                    <div class="text-center"> <a href="/manterarprova"> <img src="{{ asset('img/aprovarcheck.png') }}"
                                class="card-img-top" alt="...">
                            <div class="btn btn-success">Manter Aprovadores</div>
                        </a> </div>
                </div>
            </div>
        </div>
        <!--Cadastrar Fornecedor-->
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-text">
                    <div class="text-center"> <a href="/cadastrarforn"> <img src="{{ asset('img/fornecedor_adm.png') }}"
                                class="card-img-top" alt="...">
                            <div class="btn btn-warning">Cadastrar Fornecedor</div>
                        </a> </div>
                </div>
            </div>
        </div>
        <!--Manter Fornecedor-->
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-text">
                    <div class="text-center"> <a href="/manterfornecedor"> <img src="{{ asset('img/manter_fornecedor.png') }}"
                                class="card-img-top" alt="...">
                            <div class="btn btn-info">Manter Fornecedor</div>
                        </a> </div>
                </div>
            </div>
        </div>
<!--Gráfico de Aprovações-->
                <div class="col">
                  <div class="card shadow-sm">
                      <div class="card-text">
                          <div class="text-center"> <a href="/acompanharpedido"> <img src="{{ asset('img/workflow.png') }}"
                                      class="card-img-top" alt="...">
                                  <div class="btn btn-dark">Acompanhar Aprovação</div>
                              </a> </div>
                      </div>
                  </div>
              </div>    
        <!--Gráfico de Aprovações-->
        <div class="col">
          <div class="card shadow-sm">
              <div class="card-text">
                  <div class="text-center"> <a href="/chart"> <img src="{{ asset('img/adm_ico.png') }}"
                              class="card-img-top" alt="...">
                          <div class="btn btn-primary">Gráficos das aprovações</div>
                      </a> </div>
              </div>
          </div>
      </div>        

        <!--Meus dados-->
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-text">
                    <div class="text-center"> <a href="/dadospessoais"> <img src="{{ asset('img/dados_pessoais.png') }}"
                                class="card-img-top" alt="...">
                            <div class="btn btn-secondary">Meus dados</div>
                        </a> </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('main')

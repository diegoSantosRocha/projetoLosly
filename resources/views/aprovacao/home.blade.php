
@extends('layout')

@section('main')

@section('dashboard')
@include('aprovacao.aprovacaotxt')
@endsection

<div class="container-fluid bg-trasparent my-4 p-3 " style="position: relative;">
      <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3 ">
        <!--Fazer Pedido-->
        <div class="col">
          <div class="card shadow-sm">
            <div class="card-text">
              <div class="text-center"> <a href="/aprovacao"> <img src="{{asset('img/aprovarcheck.png')}}" class="card-img-top" alt="...">
                  <div class="btn btn-primary">Aprovar Pedido</div>
                </a> </div>
            </div>
          </div>
        </div>
        <!--Meus dados-->
        <div class="col">
          <div class="card shadow-sm">
            <div class="card-text">
              <div class="text-center"> <a href="/dadospessoais"> <img src="{{asset('img/dados_pessoais.png')}}" class="card-img-top" alt="...">
                  <div class="btn btn-secondary">Meus dados</div>
                </a> </div>
            </div>
          </div>
        </div>    
      </div>
    </div>

    @endsection('main')
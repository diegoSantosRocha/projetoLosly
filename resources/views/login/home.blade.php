@extends('layout')
@section('title')
 Acesso
@endsection
@section('dashboard')
@endsection
@section('main')
<div class="container-fluid bg-trasparent my-4 p-3 ">
  <form class="form-control-lg" id="login" method="post" action="/verificar">
     @csrf
      <p><i class="bi bi-person"></i><span class="p-2">Login</span></p>
  <hr>
  <div class="form-row">
      <div class="form-group col-md-4">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" placeholder="Digite seu Email" name="email" required>
      </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
        <label for="senha">Senha</label>
        <input type="password" class="form-control" id="password" placeholder="Digite sua Senha" name="senha" required>
    </div>
</div>
<div class="form-group col-md-6">
  <div class="col col-lg-8">
      <label for="perfil" class="form-label">Perfil</label>
      <select id="perfil" class="form-select" name="perfil" required>
          <option value="">Escolha</option>
          <option value="3">Fornecedor</option>
          <option value="2">Aprovador</option>
          <option value="1">Administrador</option>        
      </select>
  </div>
</div>
  <br />
  <div class="mb-4">
      <button type="submit" class="btn btn-success">Login</button> 
    <!--  <a href='/facebook' class="btn btn-secondary "><img src="{{ asset('img/google.png') }}" alt="Aprovação Pedido" width="20">&nbsp;Google</a> -->

      </form>
      <hr>
  </div>
</div>
@endsection('main')

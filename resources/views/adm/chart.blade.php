@extends('layout')
@section('title')
    Acompanhar Aprovação Pedido
@endsection
@section('dashboard')
    @include('pedido_compras.dashbordtext')
@endsection
@section('main')  
<div class="container-fluid bg-trasparent my-4 p-3 "> 
    <p><img src="{{ asset('img/adm_ico.png') }}" alt="Manter Fornecedor" width="40" />
        <span class="p-2">Gráfico Pendência aprovação</span>
    </p>
    <hr>
        <canvas id="myChart"></canvas>   
</div>
<script>
    const ctx = document.getElementById('myChart');
      new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Losly Interno(BRANCO)', 'Losly Externo(CINZA)', 'Losly Interno(CINZA)', 'Losly Externo bloco de Vidro(CINZA)', 'Losly Internob loco de Vidro(CINZA)', 'Losly Internob loco de Vidro(BRANCO)'],
        datasets: [{
          label: 'Pendente de Aprovação',
          data: [12, 19, 3, 5, 2, 3],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
   
  </script>
@endsection('main')

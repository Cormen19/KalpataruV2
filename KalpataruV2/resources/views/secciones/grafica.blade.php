@extends('layout.masterpage')
@section('Titulo','Grafico')
@section('estilos')
<link rel="stylesheet" href="{{URL::asset('css/grafica.css') }}">

@endsection
@section('contenido')
@php

$usuarios=App\Models\User::all();
$usuarioUno=$usuarios->where('role_id',1);
$usuarioDos=$usuarios->where('role_id',2);
@endphp
<script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.typeit/3.0.1/typeit.min.js"></script>
<div class="grafico">
<canvas id="myChart" width="400" height="400"></canvas>
</div>
<script>
let admin={{$usuarioUno->count()}};
let user={{$usuarioDos->count()}};
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Administradores', 'Usuarios'],
        datasets: [{
            label: '# of Votes',
            data: [admin,user],
            backgroundColor: [
                'rgba(255, 99, 132, 0.7)',
                'rgba(54, 162, 235, 0.7)',
                'rgba(255, 206, 86, 0.7)',
                'rgba(75, 192, 192, 0.7)',
                'rgba(153, 102, 255, 0.7)',
                'rgba(255, 159, 64, 0.7)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
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
 
@endsection
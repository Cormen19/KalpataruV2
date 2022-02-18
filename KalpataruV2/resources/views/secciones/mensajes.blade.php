@extends('layout.masterpage')
@section('Titulo','Mensajes')
@section('contenido')
@section('estilos')
<link rel="stylesheet" href="{{URL::asset('css/mensajes.css') }}">
@endsection
@foreach($mensajes as $mensaje)
<div class="card">
  <div class="card-body">
    <h5 class="card-title"></h5>

    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

  </div>
</div>
@endforeach
@endsection

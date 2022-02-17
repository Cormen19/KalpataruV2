@extends('layout.masterpage')
@section('Titulo','Inicio')
@section('estilos')
<link rel="stylesheet" href="{{URL::asset('css/inicio.css') }}">

@endsection
@section('contenido')
<img src="{{url('img/fondoPaginaInicio.jpg')}}">


@endsection

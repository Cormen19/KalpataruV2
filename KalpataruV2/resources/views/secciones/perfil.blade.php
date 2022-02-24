@extends('layout.masterpage')
@section('Titulo','Perfil')
@section('estilos')
<link rel="stylesheet" href="{{URL::asset('css/perfil.css') }}">
@php
$mensajes=App\Models\Mensaje::all()->where('usuario_id',Auth::user()->id);
$user=Auth::user();

@endphp
@endsection
@section('contenido')

<div class="container">
    <div class="main-body">
        
       
                

    
          <!-- Breadcrumb -->
          
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4 class="nombreUsuarioGrande">{{$user->name}}</h4>
                      
                      
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            

            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0" id="nombreUsuario">{!! trans('traduccion.Nombre') !!}</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$user->name}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0" id="emailUsuario">{!! trans('traduccion.Email') !!}</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{$user->email}}
                    </div>
                  </div>
                  <hr> 
                  <h6 class="mb-0" id="mensajesUsuario">{!! trans('traduccion.Mensajes') !!}</h6>
                  @foreach($mensajes as $mensaje)
                  
                  <div id="mensajes">
                    
                  <ul class="listaMensajes">
                      <li class="row" id="tituloMensaje"><strong>{!! trans('traduccion.Titulo') !!}</strong></li>
                      <p class="tituloMensaje">{{$mensaje->titulo}}</p>
                      <li class="row" id="contenidoMensaje"><strong>{!! trans('traduccion.Texto') !!}</strong></li>
                      <p class="textoMensaje">{{$mensaje->texto}}</p>
                  </ul>
                  </div>
                  @endforeach
                  
                  
                  
                  
                  
                </div>
              </div>

              



            </div>
          </div>

        </div>
    </div>
 


@endsection
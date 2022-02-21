@extends('layout.masterpage')
@section('Titulo','Mensajes')
<script src="https://cdnjs.cloudflare.com/ajax/libs/granim/2.0.0/granim.js"></script>
<script type="text/js" src="{{URL::asset('js/arboles.js') }}"></script>

@section('contenido')


@section('estilos')
<link rel="stylesheet" href="{{URL::asset('css/mensajes.css') }}">
<link rel="stylesheet" href="{{URL::asset('css/show_mensajes.css') }}">
<link rel="stylesheet" href="{{URL::asset('css/granim.css') }}">

<canvas id="arbolesColores"></canvas>
@endsection


<p class="titulo">Mensajes</p>
<div class="botonAñadir">
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" >
    <i class="fa-solid fa-plus"></i>
  </button>
  </div>
  <div id="mensajes">
@foreach($mensajes as $mensaje)

<div class="card">
  <div class="card-body">
    <h5 class="card-title">{{$mensaje->titulo}}</h5>

    <p class="card-text">{{$mensaje->texto}}</p>

  </div>
</div>



@endforeach
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form class="row g-3" action="{{route('mensajes.store')}}" method="post"  enctype="multipart/form-data"  >
    {{csrf_field()}}

    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Mensaje</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

          <div class="col-md-6">
            <label for="nombre" class="form-label">Titulo mensaje</label>
            <input type="text" class="form-control" id="nombre" name="titulo" placeholder="Titulo mensaje">
          </div>
          <div class="mb-3">
            <label for="imagen" class="form-label">Mensaje</label>
            <input class="form-control" type="text" id="imagen" name="texto" placeholder="Texto mensaje">
          </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Crear</button>
      </div>

    </div>
  </div>
</form>
</div>
<script>
var granimInstance = new Granim({
    element: '#arbolesColores',
    direction: 'top-bottom',
    isPausedWhenNotInView: true,

    states : {
        "default-state": {
            gradients: [
                ['#29323c', '#485563'],
                ['#FF6B6B', '#556270'],
                ['#80d3fe', '#7ea0c4'],
                ['#f0ab51', '#eceba3']
            ],
            transitionSpeed: 7000
        }
    }
});

 $(document).ready(function(){
    var height=$("#mensajes").height();
     $('#arbolesColores').height(height);
});
</script>
@endsection



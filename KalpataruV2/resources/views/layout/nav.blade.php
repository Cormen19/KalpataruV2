@section('estilos')
<link rel="stylesheet" href="{{URL::asset('css/nav.css') }}">

@endsection
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a style="margin-left:2%" class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul style="margin-left:68%" class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Inicio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('login')}}">Login</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="{{route('register')}}">Registrarse</a>
      </li>
      
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="" onclick="event.preventDefault(); document.getElementById('logout').submit();">Cerrar sesion</a>
          <!-- Solo usuarios identificados -->
          <form id="logout" action="{{route('logout')}}" method="POST" style="display:none;">
          @csrf
          </form>
        </li>
    
    </ul>

  </div>
</nav>

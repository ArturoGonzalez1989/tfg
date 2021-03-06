<?php
  function menuActivo($url){
    return request()->is($url) ? 'active' : '';
  }
?>

@if(auth()->guest())
  <nav class="navbar navbar-expand-md navbar-dark bg-primary pr-3" id="navbar-principal">
    <a class="navbar-brand" href="{{route('home')}}">
      <img src="/img/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt=""> tusRutas
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav ml-sm-auto text-center">
        <li class="nav-item">
          <a class="nav-link {{ menuActivo('/') }}" href="{{ route('home') }}" href="{{ route('home') }}">Inicio <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ menuActivo('contacto') }}" href="{{ route('contacto') }}">Contacto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mr-md-4 {{ menuActivo('base_legal') }}" href="{{ route('base_legal') }}">Base legal</a>
        </li>
        
          <a class="btn btn-success text-white mr-2" id="boton-acceder" href="/login">Acceder</a>
        
      </ul>
    </div>
  </nav>
@elseif (auth()->user()->role_id === 2)
  <nav class="navbar navbar-expand-md navbar-dark bg-primary pr-3" id="navbar-principal">
    <a class="navbar-brand" href="{{route('home')}}">
      <img src="/img/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt=""> tusRutas
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav ml-sm-auto text-center">
        <li class="nav-item">
          <a class="nav-link {{ menuActivo('/') }}" href="{{ route('home') }}" href="{{ route('home') }}">Inicio <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ menuActivo('contacto') }}" href="{{ route('contacto') }}">Contacto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mr-md-4 {{ menuActivo('base_legal') }}" href="{{ route('base_legal') }}">Base legal</a>
        </li>

        <a class="nav-item dropdown">
          <a class="btn btn-success nav-link dropdown-toggle text-white" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->nombre}}</a>
          <div class="dropdown-menu text-center text-md-left dropdown-menu-right" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="{{ route('cuenta') }}">Mi cuenta</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/logout">Cerrar sesión</a>
          </div>
        </a>
      </ul>
    </div>
  </nav>

@endif


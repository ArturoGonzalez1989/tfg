@extends('layout')

@section('contenido')

<div class="jumbotron jumbotron-fluid text-center mb-5">
	<h1 class="pt-5 pt-lg-0">Bienvenido {{ auth()->user()->nombre}}</h1>
</div> {{-- Jumbotron --}}

<div class="container">
	<div class="row">
		<div class="col-sm-6 col-md-4 col-lg-3 mt-3 px-5 px-sm-2">
			<div class="card">
			  <div class="card-header text-center">
			    Usuarios
			  </div>
			  <div class="card-body text-center">
				<p class="card-text display-4"> {{ $usuarios->count() }} </p>
			    <a href=" {{ route('usuarios.index') }}" class="btn btn-primary">Ver todos</a>
			  </div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3 mt-3 px-5 px-sm-2">
			<div class="card">
			  <div class="card-header text-center">
			    Rutas
			  </div>
			  <div class="card-body text-center">
			    <p class="card-text display-4"> {{ $rutas->count() }} </p>
			    <a href=" {{ route('rutas.index') }}" class="btn btn-primary text-center">Ver todas</a>
			  </div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3 mt-3 px-5 px-sm-2">
			<div class="card text-center">
			  <div class="card-header text-center">
			    Puntos de interés
			  </div>
			  <div class="card-body text-center">
			    <p class="card-text display-4">{{ $puntos->count() }} </p>
			    <a href=" {{ route('puntos.index') }}" class="btn btn-primary">Ver todos</a>
			  </div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3 mt-3 px-5 px-sm-2">
			<div class="card">
			  <div class="card-header text-center">
			    Tematicas
			  </div>
			  <div class="card-body text-center">
			    <p class="card-text display-4"> {{ $tematicas->count() }} </p>
			    <a href=" {{ route('tematicas.index') }}" class="btn btn-primary text-center">Ver todas</a>
			  </div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3 mt-3 px-5 px-sm-2">
			<div class="card">
			  <div class="card-header text-center">
			    Ciudades
			  </div>
			  <div class="card-body text-center">
				<p class="card-text display-4"> {{ $ciudades->count() }} </p>
			    <a href=" {{ route('ciudades.index') }}" class="btn btn-primary">Ver todas</a>
			  </div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3 mt-3 px-5 px-sm-2">
			<div class="card">
			  <div class="card-header text-center">
			    Comunidades
			  </div>
			  <div class="card-body text-center">
			    <p class="card-text display-4"> {{ $comunidades->count() }} </p>
			    <a href=" {{ route('comunidades.index') }}" class="btn btn-primary text-center">Ver todas</a>
			  </div>
			</div>
		</div>
		
		<div class="col-sm-6 col-md-4 col-lg-3 mt-3 px-5 px-sm-2">
			<div class="card">
			  <div class="card-header text-center">
			    Mensajes en rutas
			  </div>
			  <div class="card-body text-center">
			    <p class="card-text display-4"> {{ $mensajes_rutas->count() }} </p>
			    <a href=" {{ route('mensajes_rutas.index') }}" class="btn btn-primary">Ver todos</a>
			  </div>
			</div> {{-- fin card --}}
		</div> {{-- fin col-3 --}}
		<div class="col-sm-6 col-md-4 col-lg-3 mt-3 px-5 px-sm-2">
			<div class="card">
			  <div class="card-header text-center">
			    Mensajes en puntos
			  </div>
			  <div class="card-body text-center">
			    <p class="card-text display-4"> {{ $mensajes_puntos->count() }} </p>
			    <a href=" {{ route('mensajes_puntos.index') }}" class="btn btn-primary">Ver todos</a>
			  </div>
			</div> {{-- fin card --}}
		</div> {{-- fin col-3 --}}
	</div> {{-- fin row --}}
</div> {{-- fin container --}}

@stop
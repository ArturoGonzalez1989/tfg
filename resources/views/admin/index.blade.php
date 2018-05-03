@extends('layout_admin')

@section('contenido')

<div class="jumbotron jumbotron-fluid text-center mb-5">
	<h1 class="display-4">Bienvenido {{ auth()->user()->nombre}}</h1>
</div> {{-- Jumbotron --}}

<div class="container">
	<div class="row">
		<div class="col-3">
			<div class="card">
			  <div class="card-header text-center">
			    Número de usuarios
			  </div>
			  <div class="card-body text-center">
				<p class="card-text display-4"> {{ $usuarios->count() }} </p>
			    <a href=" {{ route('usuarios.index') }}" class="btn btn-primary">Ver todos los usuarios</a>
			  </div>
			</div>
		</div>
		<div class="col-3">
			<div class="card">
			  <div class="card-header text-center">
			    Número de rutas
			  </div>
			  <div class="card-body text-center">
			    <p class="card-text display-4"> {{ $rutas->count() }} </p>
			    <a href=" {{ route('rutas.index') }}" class="btn btn-primary text-center">Ver todas las rutas</a>
			  </div>
			</div>
		</div>
		<div class="col-3">
			<div class="card text-center">
			  <div class="card-header text-center">
			    Número de puntos de interés
			  </div>
			  <div class="card-body text-center">
			    <p class="card-text display-4">{{ $puntos->count() }} </p>
			    <a href=" {{ route('puntos.index') }}" class="btn btn-primary">Ver todos los PI</a>
			  </div>
			</div>
		</div>
		<div class="col-3">
			<div class="card">
			  <div class="card-header text-center">
			    Número de mensajes
			  </div>
			  <div class="card-body text-center">
			    <p class="card-text display-4"> {{ $mensajes->count() }} </p>
			    <a href=" {{ route('mensajes.index') }}" class="btn btn-primary">Ver todos los mensajes</a>
			  </div>
			</div> {{-- fin card --}}
		</div> {{-- fin col-3 --}}
	</div> {{-- fin row --}}
	<div class="row mt-5">
		<div class="col-3">
			<div class="card">
			  <div class="card-header text-center">
			    Número de ciudades
			  </div>
			  <div class="card-body text-center">
				<p class="card-text display-4"> {{ $ciudades->count() }} </p>
			    <a href=" {{ route('ciudades.index') }}" class="btn btn-primary">Ver todas las ciudades</a>
			  </div>
			</div>
		</div>
		<div class="col-3">
			<div class="card">
			  <div class="card-header text-center">
			    Número de comunidades
			  </div>
			  <div class="card-body text-center">
			    <p class="card-text display-4"> {{ $comunidades->count() }} </p>
			    <a href=" {{ route('comunidades.index') }}" class="btn btn-primary text-center">Ver todas las comunidades</a>
			  </div>
			</div>
		</div>
	</div> {{-- fin row --}}
</div> {{-- fin container --}}

@stop
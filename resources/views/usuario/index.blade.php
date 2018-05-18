@extends('layout')

@section('contenido')

@include('partials.hero')

<div class="container pt-5">
	<div class="pb-5">
		<h2>Buscador de ciudades</h2>
		@include('partials.selects-dinamicos')
	</div>
	

	<div class="row">
		<div class="col-4">
			<a href="{{ route('ciudades.index') }}">
			<div class="contenedor">
				<img class="imagen img-thumbnail" src="/img/secciones/ciudades.png" alt="ver ciudades">
				<div class="overlay">
				    <div class="texto">Ver todas las ciudades</div>
				</div>
			</div>
			</a>
		</div>
		<div class="col-4">
			<div class="contenedor">
				<a href="{{ route('recomendar-rutas') }}">
					<div class="contenedor">
						<img class="imagen img-thumbnail" src="/img/secciones/recomendar.png" alt="recomandar rutas">
						<div class="overlay">
						    <div class="texto">Recomandarme rutas</div>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-4 pb-4">
			<div class="contenedor">
				<a href="{{ route('rutas.create') }}">
					<img class="imagen img-thumbnail" src="/img/secciones/crear-ruta.png" alt="crear ruta">
					<div class="overlay">
					    <div class="texto">Crear nueva ruta</div>
					</div>
				</a>
			</div>
		</div>	
		<div class="col-4">
			<div class="contenedor">
				<a href="{{ route('rutas_usuario', Auth::user()->id) }}">
					<img class="imagen img-thumbnail" src="/img/secciones/ver-mis-rutas.png" alt="crear ruta">
					<div class="overlay">
					    <div class="texto">Ver mis rutas</div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-4">
			<div class="contenedor">
				<a href="usuarios/{{ auth()->id() }}">
					<img class="imagen img-thumbnail" src="/img/secciones/preferencias.png" alt="crear ruta">
					<div class="overlay">
					    <div class="texto">Preferencias</div>
					</div>
				</a>
			</div>
		</div>		
	</div>

</div>


</div> {{-- fin container --}}

@stop
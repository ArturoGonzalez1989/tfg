@extends('layout')

@section('contenido')

<div class="div-encabezado">

	<div class="container">
    	@include('partials.selects-dinamicos')
	</div>
</div>

<div class="text-center m-5 py-5" id="seccion1">
	<h2>Descubre todo lo que tusRutas puede hacer por ti</h2>
	<div class="container">
		<div class="row pt-sm-5">
			<div class="col-12 col-sm-6 col-lg-3">
				<i class="fa fa-money" aria-hidden="true"></i><h3 class="pt-2">Totalmente gratis</h3>
				<p class="pt-2">tusRutas es completamente gratis! Puedes utilizar todas sus funcionalidades sin sorpresas.</p>
			</div>
			<div class="col-12 col-sm-6 col-lg-3">
				<i class="fa fa-clock-o" aria-hidden="true"></i><h3 class="pt-2">Ahorra tu tiempo</h3>
				<p class="pt-2">Ya no pierdas más horas planificando tu rutas allá donde vayas, encuentra tu ruta ideal en pocos minutos.</p>
			</div>
			<div class="col-12 col-sm-6 col-lg-3">
				<i class="fa fa-users" aria-hidden="true"></i><h3 class="pt-2">Comunidad</h3>
				<p class="pt-2">Mira lo que otros usuarios han hablado sobre cada ruta e interactúa con ellos.</p>
			</div>
			<div class="col-12 col-sm-6 col-lg-3">
				<i class="fa fa-road" aria-hidden="true"></i><h3 class="pt-2">Facilidad de uso</h3>
				<p class="pt-2">No te pierdas entre decenas de secciones, nosotros te llevamos directamente al grano.</p>
			</div>
		</div>
	</div>
</div>

<div class="text-center py-5 px-5" id="seccion2">
	<h2 class="text-primary">¿Cansado de perder tiempo planificando tu viaje?</h2>
	<hr class="separador">
	<p class="pb-3 px-5">En tusRutas, sabemos lo complicado y frustrante que puede llegar a ser planificar qué vas a hacer en tu viaje... por eso, en tusRutas podrás encontrar las rutas que más se ajustan a tus necesidades y en pocos pasos.</p>
	<a class="btn btn-primary" href="#">Enlace 1</a><a class="btn btn-primary ml-5" href="#">Enlace 2</a>
</div>

<div id="seccion3" class="pt-5 pb-2">
	<div class="container mt-5">
		<h2 class="pb-5 text-primary">Disfruta de las mejores rutas por temáticas</h2>
		<div class="row">
			
			<?php
				$aleatorios = $tematicas->shuffle();
			?>


			@for( $i=1 ; $i <= 8 ; $i++ )
				<?php
					$elemento = $aleatorios->shift();
				?>
				<div class="col-12 col-sm-6 col-lg-3">
					<a href="{{ route('tematicas.index')}}">
						<div class="card mb-4">
						  <a href="https://placeholder.com"><img class="img-fluid rounded" src="http://via.placeholder.com/300x200"></a>
						  <div class="card-body">
						    <h5 class="card-title text-capitalize">{{ $elemento->nombre }}</h5>
						    <p class="card-text">{{ $elemento->descripcion }}</p>
						  </div>
						</div>
					</a>
				</div>
			@endfor
		</div>
	</div>
</div>

<div class=" text-center pb-5 mb-5">
	<a class="btn btn-primary" href="{{ route('tematicas.index') }}">Ver todas las temáticas</a>
</div>

<div class="text-center" id="seccion4">
	<div class="container">
		<h2 class="py-5">Seguimos creciendo cada día!</h2>
	<div class="row pb-5">
		<div class="col-12 col-sm-6 col-lg-3">
			<span>{{ $puntos->count() }}</span>
			<p>Puntos de interés</p>
		</div>
		<div class="col-12 col-sm-6 col-lg-3">
			<span>{{ $rutas->count() }}</span>
			<p>Rutas</p>
		</div>
		<div class="col-12 col-sm-6 col-lg-3">
			<span>{{ $ciudades->count() }}</span>
			<p>Ciudades</p>
		</div>
		<div class="col-12 col-sm-6 col-lg-3">
			<span>{{ $usuarios->count() }}</span>
			<p>Usuarios</p>
		</div>
	</div>
	</div>
	
</div>

<?php
	$rutas = $rutas->sortByDesc('votos');
	$primera = $rutas->shift();
	$segunda = $rutas->shift();
	$tercera = $rutas->shift();
?>

<div class="container mt-5 mb-5 pb-5 mb-lg-0 pb-lg-0">
	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
		<div id=seccion5>
			<div class="seccion5-header">
				<div class="row">
					<div class="col-7 col-sm-8">
						<h3>Las rutas más votadas</h3>
					</div>
					<div class="col-5 col-sm-4">
						<div class="botones-slider">
							<div class="boton-slider1">
								<a href="#carouselExampleControls" role="button" data-slide="prev">
									<i class="fa fa-arrow-left" aria-hidden="true"></i>
								</a>
							</div>
							<div class="boton-slider2">    
								<a href="#carouselExampleControls" role="button" data-slide="next">
									<i class="fa fa-arrow-right" aria-hidden="true"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<div class="row">
						<div class="col-12 col-lg-6">
			
							<a href="{{ route('rutas.show', $primera->id) }}"><img class="img-fluid img-thumbnail" src="{{ Storage::url($primera->imagen)}}" alt=""></a>
						</div>
						<div class="col-12 col-lg-6">
							<h4 class="pb-2">{{ $primera->nombre }}</h4>
							<p>Ciudad: {{ $primera->ciudad->nombre }} ({{ $primera->ciudad->comunidad->nombre }})</p>
							<hr class="mt-4">
							<h4 class="h3-info pb-2">Información de la ruta</h4>
							<div>
								<div id="iconos-info">
									<span data-toggle="tooltip" title="Coste estimado"><i class="fa fa-money" aria-hidden="true"></i> {{ $primera->coste }}€</span>
									<span data-toggle="tooltip" title="Comentarios"><i class="fa fa-commenting-o" aria-hidden="true"></i> {{ $primera->mensajes->count() }}</span>
									<span data-toggle="tooltip" title="Me gusta"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> {{ $primera->votos }}</span>
								</div>
								<p id="puntos-info">Puntos de interés de la ruta: {{ $primera->puntos->count()}}</p>
							</div>
							<hr class="mt-4">
							<h4 class="pb-2">Lo que los usuarios han dicho</h4>
							@if($primera->mensajes->isEmpty())
								<p>No hay mensajes todavía</p>
							@else
								<p id="opinion-mensaje">{{ $primera->mensajes->first()->mensaje }}</p>
								<p id="opinion-nombre">-- {{ $primera->mensajes->first()->nombre }} --</p>
							@endif
						</div>
					</div>
				</div>
				{{-- <div class="carousel-item">
					<div class="row">
						<div class="col-12 col-lg-6">
							<a href="{{ route('rutas.show', $segunda->id) }}"><img class="imagen-carousel" src="/img/rutas/{{ $segunda->imagen }}" alt=""></a>
						</div>
						<div class="col-12 col-lg-6">
							<h4 class="pb-2">{{ $segunda->nombre }}</h4>
							<p>Ciudad: {{ $segunda->ciudad->nombre }} ({{ $segunda->ciudad->comunidad->nombre }})</p>
							<hr class="mt-4">
							<h4 class="h3-info pb-2">Información de la ruta</h4>
							<div>
								<div id="iconos-info">
									<span data-toggle="tooltip" title="Coste estimado"><i class="fa fa-money" aria-hidden="true"></i> {{ $segunda->coste }}€</span>
									<span data-toggle="tooltip" title="Comentarios"><i class="fa fa-commenting-o" aria-hidden="true"></i> {{ $segunda->mensajes->count() }}</span>
									<span data-toggle="tooltip" title="Me gusta"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> {{ $segunda->votos }}</span>
								</div>
								<p id="puntos-info">Puntos de interés de la ruta: {{ $segunda->puntos->count()}}</p>
							</div>
							<hr class="mt-4">
							<h4 class="pb-2">Lo que los usuarios han dicho</h4>
							@if($segunda->mensajes->isEmpty())
								<p>No hay mensajes todavía</p>
							@else
								<p id="opinion-mensaje">{{ $segunda->mensajes->first()->mensaje }}</p>
								<p id="opinion-nombre">-- {{ $segunda->mensajes->first()->nombre }} --</p>
							@endif
						</div>
					</div>
				</div> --}}
				{{-- <div class="carousel-item">
					<div class="row">
						<div class="col-12 col-lg-6">
							<a href="{{ route('rutas.show', $tercera->id) }}"><img class="imagen-carousel" src="/img/rutas/{{ $tercera->imagen }}" alt=""></a>
						</div>
						<div class="col-12 col-lg-6">
							<h4 class="pb-2">{{ $tercera->nombre }}</h4>
							<p>Ciudad: {{ $tercera->ciudad->nombre }} ({{ $tercera->ciudad->comunidad->nombre }})</p>
							<hr class="mt-4">
							<h4 class="h3-info pb-2">Información de la ruta</h4>
							<div>
								<div id="iconos-info">
									<span data-toggle="tooltip" title="Coste estimado"><i class="fa fa-money" aria-hidden="true"></i> {{ $tercera->coste }}€</span>
									<span data-toggle="tooltip" title="Comentarios"><i class="fa fa-commenting-o" aria-hidden="true"></i> {{ $tercera->mensajes->count() }}</span>
									<span data-toggle="tooltip" title="Me gusta"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> {{ $tercera->votos }}</span>
								</div>
								<p id="puntos-info">Puntos de interés de la ruta: {{ $tercera->puntos->count()}}</p>
							</div>
							<hr class="mt-4">
							<h4 class="pb-2">Lo que los usuarios han dicho</h4>
							@if($tercera->mensajes->isEmpty())
								<p>No hay mensajes todavía</p>
							@else
								<p id="opinion-mensaje">{{ $tercera->mensajes->first()->mensaje }}</p>
								<p id="opinion-nombre">-- {{ $tercera->mensajes->first()->nombre }} --</p>
							@endif
						</div>
					</div>
				</div> --}}
			</div>
		</div>
	</div>
</div>
@stop


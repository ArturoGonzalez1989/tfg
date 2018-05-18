@extends('layout')

@section('contenido')

<div class="jumbotron jumbotron-fluid text-center">
	<h1 class="display-4">{{ $punto->nombre}}</h1>
</div> {{-- Jumbotron --}}

<div class="container">
	<div class="row">
		<div class="col-4">
			<img class="img-fluid" src="http://placehold.it/350x350" alt="">
		</div>
		<div class="col-8">
			<h4 class="pb-2">Punto de interés: </h4><h5>{{ $punto->nombre}}</h5>
			<h4 class="py-2">Ciudad: </h4><h5> {{ $punto->ciudad->nombre}}</h5>
			<h4 class="py-2">Comunidad: {{ $punto->ciudad->comunidad->nombre}}</h4>
			<h4 class="py-2">Rutas:</h4>
				@foreach ($punto->rutas as $ruta)
					<p>- {{ $ruta->nombre}}</p>
				@endforeach
			
		</div>
	</div>
		<h4 class="pt-5">Descripción:</h4>
		<h4> {{ $punto->descripcion}}</h4>

</div>

@stop
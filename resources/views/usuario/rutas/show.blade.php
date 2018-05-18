@extends('layout')

@section('contenido')

<?php 
	$encontradoP = "no";
	$encontradoM = "no";
?>

<div class="jumbotron jumbotron-fluid text-center mb-5">
	<h1 class="display-4">{{ $ruta->nombre}}</h1>
</div> {{-- Jumbotron --}}

<div class="container my-5">
	@foreach ($puntos as $punto)
		<div>
			<div class="list-group">
				@foreach ($punto->rutas as $i)
				 	@if( $i->pivot->ruta_id == $ruta->id)
				 		<?php $encontradoP = 'si';?>
				 		<div class="card mb-4 list-group-item list-group-item-action">
				 			<div class="row">
				 				<div class="col-3">
				 					<img class="img-fluid" src="http://placehold.it/200x200" alt="">
				 				</div>
				 				<div class="col-9">
						 			<a class="quitar-links" href="{{route('puntos.show', $punto->id) }}">
										<div class="card-header">
											{{ $punto->nombre }}
										</div>
									  	<div class="card-body">
									  		<p class="card-text">{{ $punto->descripcion }}</p>
										</div>
									</a>
								</div>
				 			</div>
				 		</div> 	
					@endif
				@endforeach
			</div>
		</div>
	@endforeach
	@if( $encontradoP == "no" )
		<h2 class="text-center">No hay puntos asociados a esta ruta</h2>
	@endif
</div>
<div class="container">
	<div class="card text-center">
		<div class="card-header">
			<div class="d-md-flex justify-content-between">
				<h4 class="text-center">{{ $mensajes->where('ruta_id', $ruta->id)->count() }} comentarios sobre la ruta</h4>
				<a class="btn btn-primary" href="{{ route('mensajes.crear', $ruta->id) }}">Crear nuevo comentario</a>
			</div>
			
		
		</div>
		<div class="card-body">
			@isset($mensajes)
				@foreach($mensajes as $mensaje)
					@if($mensaje->ruta->id == $ruta->id)
						<?php $encontradoM = 'si';?>
						<div class="row py-4">
							<div class="col-3">
								<p class=" text-left pl-4">
									<img src="/img/admin.png" alt="foto usuario" class="img-thumbnail rounded-circle" width="60px">
									<span class="pl-2">{{ $mensaje->nombre }}</span>
								</p>
							</div>
							<div class="col-8">
								<p class="text-left align-middle">{{ $mensaje->mensaje }}</p>
							</div>
						</div>
						<hr>
					@endif
				@endforeach
			@endisset
			@if( $encontradoM == "no" )
				<p class="text-center">No hay mensajes</p>
			@endif
		</div>
	</div>
</div>

@stop
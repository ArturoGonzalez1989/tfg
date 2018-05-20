@extends('layout')

@section('contenido')

<div class="jumbotron jumbotron-fluid text-center mb-5">
	<h1>Todas las ciudades</h1>
</div> {{-- Jumbotron --}}

<div class="container">
	@foreach($comunidades as $comunidad)
		<h3 class="pt-5">Ciudades de {{ $comunidad->nombre }}</h3>
	    <hr class="separador-titulo text-left">
		@foreach($ciudades as $ciudad)
			@if($ciudad->comunidad_id == $comunidad->id)
				<div class="list-group list-group-flush">
					<a class="sin_subrayar" href="{{ route('ciudades.show', $ciudad->id) }}">
						<div class="card list-group-item list-group-item-action">
							<div class="card-body text-center">
								<div class="row">
									<div class="col-12 col-lg-2">
											<img class="img-fluid" src="/img/ciudades/{{ $ciudad->imagen }}" alt="imagen ciudad">
									</div>
									<div class="col-12 col-lg-9 pt-2 text-xl-left">
										<p class="h4 text-left">{{ $ciudad->nombre }}</p>
										<p>{{ $ciudad->descripcion }}</p>
										<?php $contadorR = 0 ?>
										@foreach($rutas as $ruta)
											@if($ruta->ciudad_id == $ciudad->id)
												<?php $contadorR = $contadorR + 1 ?>
											@endif
										@endforeach
										<?php $contadorP = 0 ?>
					                    @foreach($puntos as $punto)
					                     @foreach( $punto->rutas as $j )
					                     	@if( $j->ciudad->id == $ciudad->id)
												<?php $contadorP = $contadorP + 1 ?>
					                     	@endif
					                      @endforeach
					                    @endforeach
										<div class="iconos-ruta">
											<span class="pr-1" data-toggle="tooltip" title="Rutas"><i class="fa fa-map" aria-hidden="true"></i> {{ $contadorR }}</span>
											<span data-toggle="tooltip" title="Puntos turísticos"><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $contadorP }}</span>
										</div>
									</div>
									<div class="col-12 col-lg-3 text-center pt-3 text-lg-right">
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			@endif
		@endforeach
	@endforeach
</div>		

@stop
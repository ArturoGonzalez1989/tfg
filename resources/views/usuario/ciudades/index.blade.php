@extends('layout')

@section('contenido')

<div class="jumbotron jumbotron-fluid text-center mb-5">
	<h1>Todas las ciudades</h1>
</div> {{-- Jumbotron --}}

<div class="container-fluid pt-5">
	<div class="row">
		<div class="col-lg-2">
	        <div class="card text-center mb-5">
	          <a data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
	            <div class="card-header">
	              <span class="lead">Filtrar por comunidad <i class="fa fa-chevron-down" aria-hidden="true"></i></span>
	            </div>
	          </a>
	            <div class="card-body text-left">
	              <div class="collapse multi-collapse" id="multiCollapseExample1">
	                    <div class="form-check">
	                          <input class="filtrarComunidad form-check-input" type="radio" name="exampleRadios" checked value="0">
	                          <label class="form-check-label" for="exampleRadios">Todas las comunidades</label>
	                        </div>
	                <?php $comunidades = $comunidades->sortBy('nombre');?>
	                @foreach($comunidades as $comunidad)
	                    <div class="form-check">
	                      <input class="filtrarComunidad form-check-input" type="radio" name="exampleRadios" id="tematica" value="{{ $comunidad->id }}">
	                      <label class="form-check-label" for="exampleRadios">{{ $comunidad->nombre }}</label>

	                    </div>
	              @endforeach
	              </div>
	          </div>
	        </div>
      </div>
      <div class="col-lg-10">
      	

	      	@foreach($comunidades as $comunidad)
	      	<div class="contenedor-comunidad comunidad{{ $comunidad->id }}">
	      		<h3>Ciudades de {{ $comunidad->nombre }}</h3>
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
			      	</div>

		@endforeach
		
      </div>
	</div>
	
</div>		

@stop
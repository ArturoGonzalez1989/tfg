@extends('layout')

@section('contenido')

<?php 
	$encontradoP = "no";
	$encontradoM = "no";
?>

<div class="jumbotron jumbotron-fluid text-center mb-5">
	<h1>Información sobre punto turístico</h1>
</div> {{-- Jumbotron --}}

<div class="container-fluid pb-5 px-5">
	<div class="row">
		<div class="col-8">
			<div class="container">	
				<p class="text-left h2">{{ $punto->nombre }}</p> <span>Coste aproximado: {{$punto->coste}}€</span>
				<p class="pt-5">{{ $punto->descripcion}}</p>

			</div>
			<div class="container pt-3">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					{{-- <ol class="carousel-indicators">
						@foreach( $imagenes as $imagen )
							<li data-target="#carouselExampleIndicators" data-slide-to="{{@iteration}}" class="active"></li> 
						@endforeach
					</ol> --}}
					<div class="carousel-inner mt-5 carousel-puntos">
						<?php
							$elemento = $imagenes->shift();
						?>
					    <div class="carousel-item active">
					    	<img class="d-block img-fluid" src="/img/puntos/{{ $elemento->imagen }}" alt="First slide">
					    </div>
						@foreach( $imagenes as $imagen )
						    <div class="carousel-item">
						    	<img class="d-block img-fluid" src="/img/puntos/{{ $imagen->imagen }}" alt="First slide">
						    </div>
						@endforeach
				  		
		  			</div>
		  			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
					  	</a>
					  	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					    	<span class="carousel-control-next-icon" aria-hidden="true"></span>
					    	<span class="sr-only">Next</span>
					  	</a>
			</div>
			</div>
			
		</div>
		<div class="col-4">
			<div>
				<div class="border" id="googleMap" style="width:100%;height:800px;"></div>
			</div>

			<script>
			function myMap() {
			      var mapProp= {
			        center:new google.maps.LatLng( {{ $punto->coordenadas }}  ),
			          zoom:12,
			          zoomControl: false,
			          scaleControl: false,
			          fullscreenControl: false,
			          mapTypeControl: false,
			          streetViewControl: false,
			      };
			      var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
			      }
			  </script>

			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqs-4rD_7XYuZ5KQnVxR9NgnrKJPhCbUc&callback=myMap"></script>
		</div>
	</div>
	<div class="container mt-5 p-5">
		<h2>Rutas que contienen este punto</h2>
		<hr class="separador-titulo text-left">
		@foreach( $punto->rutas as $ruta )
			<div class="card mb-4">
              <div class="card-header">
                <div class="row">
                  <div class="col-12 col-sm-7 col-md-8 text-center text-sm-left">
                    <a class="sin_subrayar" href="{{ route('rutas.show', $ruta->id) }}"><span class="h4 text-left">{{ $ruta->nombre }}</span></a>
                  </div>
                  <div class="col-12 col-sm-5 col-md-4 text-center text-sm-right">
                    @if($ruta->puntos->sum('coste') != 0)
                  <span class="btn btn-warning btn-md">Coste estimado: {{ $ruta->puntos->sum('coste') }}€</span>
                @else
                  <span class="btn btn-warning btn-sm">Coste no disponible</span>
                @endif
                  </div>
                </div>
                
                
              </div>
              <div class="card-body text-center py-lg-0 pl-md-0">
                <div class="row">
                  <div class="col-12 col-lg-3">
                    <h5 class="card-title pb-0 mb-0 text-lg-left">
              <img style="max-height: 200px;" class="img-fluid" src="{{ Storage::url($ruta->imagen)}}" alt="">
                    </h5>
                  </div>
                  <div class="col-12 col-lg-6 pt-3 pl-lg-5 ml-lg-5 ml-xl-0 text-lg-left">
                    {{ $ruta->descripcion }}
                  </div>
                  <div class="col-12 col-lg-3 text-center pt-3 text-lg-right">
                    <?php $contador = 0 ?>
                    @foreach($puntos as $i)
                      @foreach($i->rutas as $j)
                        @if($ruta->id == $j->id)
                          <?php $contador = $contador + 1 ?>
                        @endif
                      @endforeach
                    @endforeach
                    <div class="iconos-ruta">
                      <span data-toggle="tooltip" title="Me gusta"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                      {{ $ruta->votos}}</span><span class="pl-4" data-toggle="tooltip" title="Comentarios"><i class="fa fa-comments-o" aria-hidden="true"></i>
                      {{ $mensajes_ruta->where('ruta_id', $ruta->id)->count() }}</span><span class="pl-4" data-toggle="tooltip" title="Puntos de interés"><i class="fa fa-map-marker" aria-hidden="true"></i>
                      {{ $contador}}</span><span class="pl-4" data-toggle="tooltip" title="Duración de la ruta"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $ruta->duracion}}</span>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
		@endforeach
	</div>
</div>

<div class="container mt-5">
	<div class="card text-center">
		<div class="card-header">
			<div class="d-md-flex justify-content-between">
				<h4 class="text-center">{{ $mensajes_puntos->where('punto_id', $punto->id)->count() }} comentarios</h4>
				<a class="btn btn-primary" href="{{ route('mensajes.punto.crear', $punto->id) }}">Crear nuevo comentario</a>
			</div>
			
		
		</div>
		<div class="card-body">
			@isset($mensajes_puntos)
				@foreach($mensajes_puntos as $mensaje)
					@if($mensaje->punto->id == $punto->id)
						<?php $encontradoM = 'si';?>
						<div class="row py-4">
							<div class="col-3">
								<p class=" text-left pl-4">
									<img src="/img/admin.png" alt="foto usuario" class="img-thumbnail rounded-circle" width="60px">
									<span class="pl-2">{{ $mensaje->user->nombre }}</span>
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
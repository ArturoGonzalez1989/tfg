@extends('layout')

@section('contenido')

<?php 
	$encontradoP = "no";
	$encontradoM = "no";
?>

<div class="jumbotron jumbotron-fluid text-center mb-5">
	<h1>{{ $ruta->nombre}}</h1>
</div> {{-- Jumbotron --}}

<div class="container my-5 py-5">
	<div class="row">
		<div class="col-3">
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
				    <div class="carousel-item active">
						<img class="img-fluid img-thumbnail" src="{{ Storage::url($ruta->imagen)}}" alt="">
				    </div>
					@foreach($puntos as $punto)
						@foreach ($punto->rutas as $i)
				 			@if( $i->pivot->ruta_id == $ruta->id)
							    <div class="carousel-item">
						<img style="max-height: 200px;" class="img-fluid img-thumbnail" src="{{ Storage::url($punto->imagen)}}" alt="">
							    </div>
						    @endif
						@endforeach
					@endforeach   
				</div> 
			</div>
			<div>
				<a  href="#carouselExampleControls" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon bg-primary" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a href="#carouselExampleControls" role="button" data-slide="next">
			    <span class="carousel-control-next-icon bg-primary" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a> 
			</div>
		</div>
		<div class="col-9">
		    <p>{{ $ruta->descripcion }}</p>
		</div>	
	</div>
</div>

<div class="container my-5 pb-5">
<h2 class="text-primary">+ información:</h2>
<p>Precio aproximado de la ruta: {{$ruta->puntos->sum('coste')}} €</p>
<p>Duración aproximada de la ruta: {{$ruta->duracion}} horas</p>
<p>Votos: {{$ruta->votos}}</p>
</div>

<div class="container my-5 pb-5">
	<h2 class="mb-5">Puntos turísticos de esta ruta:</h2>
	@foreach ($puntos as $punto)
			<div class="list-group">
				@foreach ($punto->rutas as $i)
				 	@if( $i->pivot->ruta_id == $ruta->id)
				 		<?php $encontradoP = 'si';?>
				 		<div class="card mb-4">
              <div class="card-header">
                <div class="row">
                  <div class="col-12 col-sm-7 col-md-8 text-center text-sm-left">
                    <a class="sin_subrayar" href="{{ route('puntos.show', $punto->id) }}"><span class="h4 text-left">{{ $punto->nombre }}</span></a>
                  </div>
                  <div class="col-12 col-sm-5 col-md-4 text-center text-sm-right">
                    @if($punto->coste != 0)
                  <span class="btn btn-warning btn-md">Coste estimado: {{ $punto->coste }}€</span><a data-toggle="tooltip" title="Me gusta" class="btn btn-white btn-md"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
                @else
                  <span class="btn btn-warning btn-md">Coste no disponible</span><a data-toggle="tooltip" title="Me gusta" class="btn btn-white btn-md"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
                @endif
                  </div>
                </div>
                
                
              </div>
              <div class="card-body text-center py-lg-0 pl-md-0">
                <div class="row">
                  <div class="col-12 col-lg-3">
                    <h5 class="card-title pb-0 mb-0 text-lg-left">
						<img style="width: 200px;" class="img-fluid img-thumbnail" src="{{ Storage::url($punto->imagen)}}" alt="">
                    </h5>

                  </div>
                  <div class="col-12 col-lg-6 pt-3 pl-lg-5 ml-lg-5 ml-xl-0 text-lg-left">
                    {{ $punto->descripcion }}
                  </div>
                  <div class="col-12 col-lg-3 text-center pt-3 text-lg-right">
                    
                    <div class="iconos-ruta">
                      <span data-toggle="tooltip" title="Me gusta"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                      {{ $punto->votos}}</span><span class="pl-4" data-toggle="tooltip" title="Comentarios"><i class="fa fa-comments-o" aria-hidden="true"></i>
                      {{ $mensajes_puntos->where('punto_id', $punto->id)->count() }}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>	
					@endif
				@endforeach
		</div>
	@endforeach
	
</div>
<div class="container pt-5">
	<div class="card text-center">
		<div class="card-header">
			<div class="d-md-flex justify-content-between">
				<h4 class="text-center">{{ $mensajes_ruta->where('ruta_id', $ruta->id)->count() }} comentarios sobre la ruta</h4>
				<a class="btn btn-primary" href="{{ route('mensajes.ruta.crear', $ruta->id) }}">Crear nuevo comentario</a>
			</div>
			
		
		</div>
		<div class="card-body">
			@isset($mensajes_ruta)
				@foreach($mensajes_ruta as $mensaje)
					@if($mensaje->ruta->id == $ruta->id)
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
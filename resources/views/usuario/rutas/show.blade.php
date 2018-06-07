@extends('layout')

@section('contenido')

<?php 
	$encontradoP = "no";
	$encontradoM = "no";
?>

<div class="jumbotron jumbotron-fluid text-center mb-5">
	<h1>{{ $ruta->nombre}}</h1>
</div> {{-- Jumbotron --}}

<div class="container my-5">
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
                  <span class="btn btn-warning btn-md">Coste estimado: {{ $punto->coste }}€</span>
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
                      <img width="250" src="/img/rutas/{{ $punto->imagen }}" alt="">
                    </h5>
                  </div>
                  <div class="col-12 col-lg-6 pt-3 pl-lg-5 ml-lg-5 ml-xl-0 text-lg-left">
                    {{ $punto->descripcion_corta }}
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
<div class="container">
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
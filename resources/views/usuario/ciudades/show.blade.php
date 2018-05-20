@extends('layout')

@section('contenido')


<div style="margin-bottom: 50px">
		<div id="googleMap" style="width:100%;height:300px;"></div>
</div>

<script>
function myMap() {
      var mapProp= {
        center:new google.maps.LatLng( {{ $ciudad->first()->coordenadas }}  ),
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


<div class="container-fluid border p-5 my-5">
	<div class="row">
    	<div class="col-md-3">
    		<img class="img-fluid img-thumbnail" src="{{ Storage::url($ciudad->imagen) }}" alt="">
			
		</div>
		<div class="col-md-9">
			<h2>{{ $ciudad->nombre}} ({{ $ciudad->comunidad->nombre}})</h2>
			<p>{{ $ciudad->descripcion }}</p>
		</div>
	</div>
</div>

{{-- <h2 class="py-5 text-center">Rutas encontradas en <a class="sin_subrayar" href="{{route('ciudades.show', $ciudad->first()->id) }}">{{ $ciudad->first()->nombre}} <img class="img-fluid border" width="50px" src="/img/banderas/{{ $ciudad->first()->comunidad->bandera }}" alt=""></h2> --}}
{{-- 	</a> --}}

	<div class="container-fluid">
		<div class="row">
			<div class="col-12 col-lg-2">
				<div class="card text-center mb-5">
					<a data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
						<div class="card-header">
							<h4>Filtrar por temas <i class="fa fa-chevron-down" aria-hidden="true"></i></h4>
						</div>
					</a>
				  	<div class="card-body text-left">
				  		<div class="collapse multi-collapse" id="multiCollapseExample1">
					  		@foreach($tematicas as $tematica)
						        <div class="form-check">
								  <input class="form-check-input" type="checkbox" value="{{ $tematica->id }}" id="defaultCheck1">
								  <label class="form-check-label" for="defaultCheck1">{{ $tematica->nombre }}</label>
								</div>
							@endforeach
							</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-10">
				<div class="container-fluid">
					@foreach ($rutas as $ruta)
					<?php $var = $ruta->puntos->sum('coste'); ?>
				<div class="card mb-4">
              <div class="card-header">
                <div class="row">
                  <div class="col-12 col-sm-7 col-md-8 text-center text-sm-left">
                    <span class="h4 text-left">{{ $ruta->nombre }}</span>
                  </div>
                  <div class="col-12 col-sm-5 col-md-4 text-center text-sm-right">
                    @if($ruta->coste != 0)
                  <span class="p-2 bg-warning">Coste estimado: {{ $var }}€</span>
                @else
                  <span class="p-2 bg-warning">Coste no disponible</span>
                @endif
                  </div>
                </div>
                
                
              </div>
              <div class="card-body text-center py-lg-0 pl-md-0">
                <div class="row">
                  <div class="col-12 col-lg-3">
                    <h5 class="card-title pb-0 mb-0 text-lg-left">
                      <img width="250" src="/img/rutas/{{ $ruta->imagen }}" alt="">
                    </h5>
                  </div>
                  <div class="col-12 col-lg-6 pt-3 pl-lg-5 ml-lg-5 ml-xl-0 text-lg-left">
                    {{ $ruta->descripcion_corta }}
                  </div>
                  <div class="col-12 col-lg-3 text-center pt-3 text-lg-right">
                    <?php $contador = 0 ?>
                    @foreach($puntos as $punto)
                      @foreach($punto->rutas as $j)
                        @if($ruta->id == $j->id)
                          <?php $contador = $contador + 1 ?>
                        @endif
                      @endforeach
                    @endforeach
                    <div class="iconos-ruta">
                      <span data-toggle="tooltip" title="Me gusta"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                      {{ $ruta->votos}}</span><span class="pl-4" data-toggle="tooltip" title="Comentarios"><i class="fa fa-comments-o" aria-hidden="true"></i>
                      {{ $mensajes->where('ruta_id', $ruta->id)->count() }}</span><span class="pl-4" data-toggle="tooltip" title="Puntos de interés"><i class="fa fa-map-marker" aria-hidden="true"></i>
                      {{ $contador}}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
				@endforeach

				</div>
				
			</div>
		</div>
	</div>
	


@stop
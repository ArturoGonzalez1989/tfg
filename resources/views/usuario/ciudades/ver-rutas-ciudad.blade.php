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

	<h2 class="py-5 text-center">Rutas en <a href="" class="badge badge-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
  {{ $ciudad->first()->nombre}}
</a></h2>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">{{ $ciudad->first()->nombre}} ({{ $ciudad->first()->comunidad->nombre}})</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-5">
              <img style="max-height: 200px;" class="img-fluid" src="{{ Storage::url($ciudad->first()->imagen)}}" alt="">
            </div>
            <div class="col-7">
              <p>{{ $ciudad->first()->descripcion }}</p> 
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


	<div class="container-fluid px-5">
    @if( $rutas->pluck('ciudad_id')->contains($ciudad->first()->id))
		<div class="row">
			<div class="col-lg-2">
				<div class="card text-center mb-5">
					<a data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
						<div class="card-header">
							<span class="lead">Filtrar por temas <i class="fa fa-chevron-down" aria-hidden="true"></i></span>
						</div>
					</a>
          <input type="hidden" id="ciudad" value="{{ $ciudad->first()->id }}">
				  	<div class="card-body text-left">
				  		<div class="collapse multi-collapse" id="multiCollapseExample1">
                    <div class="form-check">
                          <input class="filtrar form-check-input" type="radio" name="exampleRadios" checked value="0">
                          <label class="form-check-label" for="exampleRadios1">Todos los temas</label>
                        </div>
					  		@foreach($tematicas as $tematica)
                    <div class="form-check">
                      <input class="filtrar form-check-input" type="radio" name="exampleRadios" id="tematica" value="{{ $tematica->id }}">
                      <label class="form-check-label" for="exampleRadios1">{{ $tematica->nombre }}</label>

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
            <div class="card ruta-card mb-4 tematica{{ $ruta->tematicas->pluck('id')->implode(' tematica') }}">
              <div class="card-header">
                <div class="row">
                  <div class="col-12 col-sm-7 col-md-8 text-center text-sm-left">
                    <a class="sin_subrayar" href="{{ route('rutas.show', $ruta->id) }}"><span class="h4 text-left">{{ $ruta->nombre }}</span></a>
                  </div>
                  <div class="col-12 col-sm-5 col-md-4 text-center text-sm-right">
                    @if($var != 0)
                  <span class="btn btn-warning btn-md">Coste estimado: {{ $var }}€</span>
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
    @else
            <p class="text-center py-5 my-5 h4">No hay rutas en esta ciudad todavía</p>
          @endif
	</div>

@stop
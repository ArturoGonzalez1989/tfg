@extends('layout')

@section('contenido')

<div class="jumbotron jumbotron-fluid text-center mb-5">
	<h1>Todas las rutas</h1>
</div> {{-- Jumbotron --}}

<div class="container py-5 d-flex justify-content-center">
<div class="d-flex justify-content-center mr-4 align-items-center">
  <span class="text-center">Elegir orden</span>
</div>
<div class="d-flex justify-content-center">
 <select class="form-control" id="orden" class="form-control" onchange="location = this.value;">
        <option value="{{route('rutas.ordenadas', '0')}}" {{ $opcion == '0' ? 'selected' : '' }}>aleatorio</option>
        <option value="{{route('rutas.ordenadas', '1')}}" {{ $opcion == '1' ? 'selected' : '' }}>más votadas</option>
      </select></div>
      
     
        
     

  
</div>





<div class="container">
  @switch($opcion)
    @case(0)
    <?php $rutas = $rutas->shuffle(); ?>
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
          
                  <span class="btn btn-warning btn-md">Coste estimado: {{ $var }}€</span><a data-toggle="tooltip" title="Me gusta" class="btn btn-white btn-md"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
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
              <img style="max-height: 200px;" class="img-fluid" src="{{ Storage::url($ruta->imagen)}}" alt="">
                    </h5>
                  </div>
                  <div class="col-12 col-lg-6 pt-3 pl-lg-5 ml-lg-5 ml-xl-0 text-lg-left">
                    <p>{{ $ruta->descripcion }}</p>
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
                      {{ $mensajes->where('ruta_id', $ruta->id)->count() }}</span><span class="pl-4" data-toggle="tooltip" title="Puntos de interés"><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $contador}}</span><span class="pl-4" data-toggle="tooltip" title="Duración de la ruta"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $ruta->duracion}}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        @endforeach
      @break
    @case(1)
        <?php $rutas = $rutas->sortByDesc('votos'); ?>
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
      @break     
  @endswitch
					

				</div>


@stop
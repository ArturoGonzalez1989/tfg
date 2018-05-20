@extends('layout')

@section('contenido')

<div class="jumbotron jumbotron-fluid text-center mb-5">
  <h2>Hola {{ Auth::user()->nombre }}, aquí tienes algunas recomendaciones basadas en tus gustos sobre</h2>
  <h3>{{ Auth::user()->tematicas->pluck('nombre')->implode(' - ') }}</h3>
</div> {{-- Jumbotron --}}

<?php $rutas = $rutas->sortByDesc('votos'); ?>
<div class="container">
  @foreach( Auth::user()->tematicas as $tematica)
    <h3 class="pt-5">Rutas de {{ $tematica->nombre }}</h3>
      <hr class="separador-titulo text-left">
    @foreach ($rutas as $ruta)
      <?php $var = $ruta->puntos->sum('coste'); ?>
        @foreach($ruta->tematicas as $i)
          @if($tematica->id == $i->id)
            <div class="card mb-4">
              <div class="card-header">
                <div class="row">
                  <div class="col-12 col-sm-7 col-md-8 text-center text-sm-left">
                    <span class="h4 text-left">{{ $ruta->nombre }}</span>
                  </div>
                  <div class="col-12 col-sm-5 col-md-4 text-center text-sm-right">
                    @if($ruta->coste != 0)
                  <span class="btn btn-warning btn">Coste estimado: {{ $var }}€</span>
                @else
                  <span class="btn btn-warning ">Coste no disponible</span>
                @endif
                  </div>
                </div>
                
                
              </div>
              <div class="card-body text-center py-lg-0 pl-md-0">
                <div class="row">
                  <div class="col-12 col-lg-3">
                    <h5 class="card-title pb-0 mb-0">
                      <img width="250" src="/img/rutas/{{ $ruta->imagen }}" alt="">
                    </h5>
                  </div>
                  <div class="col-12 col-lg-6 pt-3 text-xl-left">
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
          @endif
        @endforeach
      @endforeach
    @endforeach
</div>


@stop
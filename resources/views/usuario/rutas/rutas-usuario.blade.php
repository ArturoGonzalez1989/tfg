@extends('layout')

@section('contenido')

<div class="jumbotron jumbotron-fluid text-center mb-5">
  <h1>Mis rutas</h1>
</div> {{-- Jumbotron --}}

<?php $rutas = $rutas->sortByDesc('votos'); ?>
<div class="container">
  @foreach($rutas as $ruta)
    <div class="card mb-4">
              <div class="card-header">
                <div class="row">
                  <div class="col-12 col-sm-7 col-md-8 text-center text-sm-left">
                    <span class="h4 text-left">
                      <a href="{{route('rutas.show', $ruta->id) }}" class="sin_subrayar mr-1">{{ $ruta->nombre }}</a>
                      <div class="btn-group">
                        <form action="{{ route('rutas.edit', $ruta->id) }}">
                          {!! csrf_field() !!}
                          {!! method_field('PUT') !!}
                          <button type="submit" class="btn-sm btn-primary mr-1">Editar</button>
                        </form>
                        <form method="POST" action="{{route('rutas.destroy', $ruta->id) }}">
                          {!! csrf_field() !!}
                          {!! method_field('DELETE') !!}
                          <button type="submit" class="btn-sm btn-danger">Eliminar</button>
                        </form>
                      </div>
                    </span>
                  </div>
                  <div class="col-12 col-sm-5 col-md-4 text-center text-sm-right">
                    @if($ruta->coste != 0)
                  <span class="p-3">Coste estimado: {{ $var }}€</span>
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
  	
 </div>
   

@stop

@extends('layout')

@section('contenido')

<div class="jumbotron text-center">
	<h1>Preferencias de usuario</h1>
</div>

<div class="container my-5 py-5 border">
    <div class="row justify-content-center">
        <div class="col-md-2">
        	<img class="img-fluid img-thumbnail" width="150" src="/img/usuarios/{{ $usuario->imagen }}" alt="imagen de usuario">
        </div>
        <div class="col-md-10">
        	<p>
        		<span class="h4">Usuario: </span><span class="h4">{{ $usuario->nombre }}</span>
        	</p>
        	<p>
        		<span class="h4">E-mail: </span><span class="h4">{{ $usuario->email }}</span>
        	</p>
			<a class="btn btn-primary" href="{{ auth()->id() }}/edit">Editar usuario</a>
        </div>
	</div>
</div>

<div class="container">
	<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link quitar-links" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Rutas creadas por el {{ $usuario->nombre }}
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
    	@if( $rutas->pluck('id')->count() == 0)
			<p>No hay rutas creadas por {{ $usuario->nombre }}</p>
    	@else
			<table class="table table-hover">
			<thead>
			    <tr>
			      <th class="border-top-0" scope="col">Ruta</th>
			      <th class="border-top-0" scope="col">Ciudad</th>
			      <th class="border-top-0" scope="col">Puntos de interés</th>
			      <th class="border-top-0" scope="col">Comentarios</th>
			      <th class="border-top-0" scope="col">Me gusta</th>
			    </tr>
			</thead>
		  	<tbody>
				@foreach($rutas as $ruta)
					<tr>
				      <td><a href="{{route('rutas.show', $ruta->id) }}">{{ $ruta->nombre }}</a></td>
				      <td><a href="{{route('ciudades.show', $ruta->ciudad->id) }}">{{ $ruta->ciudad->nombre }}</td>
				      <td>
						<?php $contador = 0 ?>
	                    @foreach($puntos as $punto)
	                      @foreach($punto->rutas as $j)
	                        @if($j->id == $ruta->id)
	                          <?php $contador = $contador + 1 ?>
	                        @endif
	                      @endforeach
	                    @endforeach
				      	{{ $contador }}
				      </td>
				      <td>{{ $mensajes_rutas->count() }}</td>
				      <td>{{ $ruta->votos }}</td>
				    </tr>
		    	@endforeach
    		</tbody>
		</table>
    	@endif
		
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed btn btn-link quitar-links" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Comentarios de {{ $usuario->nombre }} en rutas
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
      	@if( $mensajes_rutas->pluck('user_id')->count() == 0)
			<p>No hay comentarios de {{ $usuario->nombre }}</p>
    	@else
    		<table class="table table-hover">
			<thead>
			    <tr>
			      <th class="border-top-0" scope="col">Ruta</th>
			      <th class="border-top-0" scope="col">Ciudad</th>
			      <th class="border-top-0" scope="col">Comentario</th>
			      <th class="border-top-0" scope="col">Fecha</th>
			      <th class="border-top-0" scope="col">Acciones</th>
			    </tr>
			</thead>
		  	<tbody>
				@foreach($mensajes_rutas as $mensaje)
					<tr>
				      <td><a href="{{route('rutas.show', $mensaje->ruta->id) }}">{{ $mensaje->ruta->nombre }}</a></td>
				      <td><a href="{{route('ciudades.show', $mensaje->ruta->ciudad->id) }}">{{ $mensaje->ruta->ciudad->nombre }}</a></td>
				      <td>{{ $mensaje->mensaje }}</td>
				      <td>{{ $mensaje->created_at }}</td>
				      <td>
						<div class="btn-group">
							<a href="{{route('mensajes_rutas.show', $mensaje->id) }}" class="btn-sm btn-info sin_subrayar mr-1">Ver</a>
							<form action="{{ route('mensajes_rutas.edit', $mensaje->id) }}">
								{!! csrf_field() !!}
								{!! method_field('PUT') !!}
								<button type="submit" class="btn-sm btn-primary mr-1">Editar</button>
								{{-- <a class="btn-sm btn-danger" href="">Eliminar</a> --}}
								
							</form>
							<form method="POST" action="{{route('mensajes_rutas.destroy', $mensaje->id) }}">
								{!! csrf_field() !!}
								{!! method_field('DELETE') !!}
								<button type="submit" class="btn-sm btn-danger">Eliminar</button>
								{{-- <a class="btn-sm btn-danger" href="">Eliminar</a> --}}
							</form>
						</div>
					</td>
						
				    </tr>
		    	@endforeach
    		</tbody>
		</table>
    	@endif
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed btn btn-link quitar-links" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Comentarios de {{ $usuario->nombre }} en puntos de interés
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
      	@if( $mensajes_puntos->pluck('id')->count() == 0)
			<p>No hay comentarios de {{ $usuario->nombre }}</p>
    	@else
			<table class="table table-hover">
			<thead>
			    <tr>
			      <th class="border-top-0" scope="col">Ruta</th>
			      <th class="border-top-0" scope="col">Ciudad</th>
			      <th class="border-top-0" scope="col">Comentario</th>
			      <th class="border-top-0" scope="col">Fecha</th>
			      <th class="border-top-0" scope="col">Acciones</th>
			      
			    </tr>
			</thead>
		  	<tbody>
				@foreach($mensajes_puntos as $mensaje)
					<tr>
				      <td><a href="{{route('rutas.show', $mensaje->punto->id) }}">{{ $mensaje->punto->nombre }}</a></td>
				      <td><a href="{{route('ciudades.show', $mensaje->punto->ciudad->id) }}">{{ $mensaje->punto->ciudad->nombre }}</a></td>
				      <td>{{ $mensaje->mensaje }}</td>
				      <td>{{ $mensaje->created_at }}</td>
				      <td>
						<div class="btn-group">
							<a href="{{route('mensajes_puntos.show', $mensaje->id) }}" class="btn-sm btn-info sin_subrayar mr-1">Ver</a>
							<form action="{{ route('mensajes_puntos.edit', $mensaje->id) }}">
								{!! csrf_field() !!}
								{!! method_field('PUT') !!}
								<button type="submit" class="btn-sm btn-primary mr-1">Editar</button>
								{{-- <a class="btn-sm btn-danger" href="">Eliminar</a> --}}
								
							</form>
							<form method="POST" action="{{route('mensajes_puntos.destroy', $mensaje->id) }}">
								{!! csrf_field() !!}
								{!! method_field('DELETE') !!}
								<button type="submit" class="btn-sm btn-danger">Eliminar</button>
								{{-- <a class="btn-sm btn-danger" href="">Eliminar</a> --}}
							</form>
						</div>
					</td>
						
				    </tr>
		    	@endforeach
    		</tbody>
		</table>
    	@endif
        
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingFour">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed btn btn-link quitar-links" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          Temáticas preferidas por {{ $usuario->nombre }}: 
        </button>
      </h5>
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
      <div class="card-body">
      	@if( $usuario->tematicas->pluck('id')->count() == 0)
			<p>No hay tematicas elegidas para {{ $usuario->nombre }}</p>
    	@else
			<table class="table table-hover">
			<thead>
			    <tr>
			      <th class="border-top-0" scope="col">Nombre</th>
			    </tr>
			</thead>
		  	<tbody>
		  		@foreach($usuario->tematicas as $i)
					<tr>
						<td>
							{{ $i->nombre }}					
						</td>
					</tr>
				@endforeach	
    		</tbody>
		</table>
    	@endif
        
      </div>
    </div>
  </div>
</div>
</div>
   

@stop
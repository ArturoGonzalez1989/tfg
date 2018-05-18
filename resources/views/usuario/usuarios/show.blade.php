@extends('layout')

@section('contenido')

<div class="jumbotron text-center">
	<h1 class="display-4">Preferencias de usuario</h1>
</div>

<div class="container my-5 py-5 border">
    <div class="row justify-content-center">
        <div class="col-md-2">
        	<img class="img-fluid img-thumbnail" width="150" src="/img/usuarios/{{ $usuario->imagen }}" alt="imagen de usuario">
        </div>
        <div class="col-md-10">
        	<p>
        		<span class="h3">Usuario: </span><span class="h4">{{ $usuario->nombre }}</span>
        	</p>
        	<p>
        		<span class="h3">E-mail: </span><span class="h4">{{ $usuario->email }}</span>
        	</p>
			<a class="btn btn-primary" href="{{ auth()->id() }}/edit">Editar usuario</a>
        </div>
    </div>
    <div>
    	<p class="h3 my-5">Rutas creadas por el usuario: {{ $rutas->count() }}</p>
		<table class="table table-hover">
			<thead>
			    <tr>
			      <th scope="col">Ruta</th>
			      <th scope="col">Ciudad</th>
			      <th scope="col">Puntos de interés</th>
			      <th scope="col">Comentarios</th>
			      <th scope="col">Me gusta</th>
			      <th scope="col">Acciones</th>
			    </tr>
			</thead>
		  	<tbody>
				@foreach($rutas as $ruta)
					<tr>
				      <td>{{ $ruta->nombre }}</td>
				      <td>{{ $ruta->ciudad->nombre }}</td>
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
				      <td>{{ $mensajes->count() }}</td>
				      <td>{{ $ruta->votos }}</td>
				      <td>
						<div class="btn-group">
							<a href="{{route('rutas.show', $ruta->id) }}" class="btn-sm btn-info sin_subrayar mr-1">Ver</a>
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
					</td>
				    </tr>
		    	@endforeach
    		</tbody>
		</table>
    </div>
</div>

@stop
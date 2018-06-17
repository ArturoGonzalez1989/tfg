@extends('layout')

@section('contenido')

<div class="jumbotron jumbotron-fluid text-center mb-5">
	<h1>Rutas del sistema</h1>
</div> {{-- Jumbotron --}}
	<div class="text-center mb-5">
		<a class="btn btn-primary" href="{{ route('rutas.create')}}">Crear nueva ruta</a>
	</div>
	<div class="container">
		<table class="table table-hover" width="100%" border="1">
		<thead class="thead-light">
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Nombre</th>
				<th scope="col"><span data-toggle="tooltip" title="Me gusta"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></span></th>
				<th scope="col"><span data-toggle="tooltip" title="Comentarios"><i class="fa fa-comments-o" aria-hidden="true"></i></span></th>
				<th scope="col"><span data-toggle="tooltip" title="Puntos de interés"><i class="fa fa-map-marker" aria-hidden="true"></i></span></th>
				<th scope="col">Coste</th>
				<th scope="col">Localización</th>
				<th scope="col">Creada por</th>
				<th scope="col">Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($rutas as $ruta)
				<?php $coste = 0; ?>
			{{-- <p>{{ $ruta->puntos }}</p> --}}
				@foreach($ruta->puntos as $i)
					<p><?php $coste = $coste + $i->coste ?></p>
				@endforeach
				
				
				<?php $coste = $ruta->puntos->sum('coste'); ?>
				
				<tr>
					<td>{{ $ruta->id }}</td>
					<td>{{ $ruta->nombre }}</td>
					<td>{{ $ruta->votos }}</td>
					<td>{{ $ruta->mensajes->count() }}</td>
					<td>{{ $ruta->puntos->count() }}</td>
					<td>{{ $coste }}€</td>
					<td>
						<img class="img-fluid" width="50" src="/img/banderas/{{ $ruta->ciudad->comunidad->bandera }}" alt=""> {{ $ruta->ciudad->nombre }}
					</td>
					<td>{{ $ruta->creador->nombre }}</td>
					<td class="text-center">
						<div class="btn-group">
							<a href="{{route('rutas.show', $ruta->id) }}" class="btn-sm btn-info sin_subrayar mr-1">Ver</a>
							<form action="{{ route('rutas.edit', $ruta->id) }}">
								{!! csrf_field() !!}
								{!! method_field('PUT') !!}
								<button type="submit" class="btn-sm btn-primary mr-1">Editar</button>
								{{-- <a class="btn-sm btn-danger" href="">Eliminar</a> --}}
								
							</form>
							<form method="POST" action="{{route('rutas.destroy', $ruta->id) }}">
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
	</div>
	
@stop
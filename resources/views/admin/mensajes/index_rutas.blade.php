@extends('layout')

@section('contenido')


<div class="jumbotron jumbotron-fluid text-center mb-5">
	<h1 class="display-4">Mensajes</h1>
</div> {{-- Jumbotron --}}
<div class="container">
	
	@if( $mensajes->pluck('ruta')->pluck('id')->count() == 0 )
    	<p class="h4 text-center">No hay mensajes</p>
			

    	@else
    	<p class="h4">Mensajes en rutas:</p>
    	<table class="table table-hover" width="100%" border="1">
	<thead class="thead-light">
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Nombre</th>
			<th scope="col">Email</th>
			<th scope="col">Contenido</th>
			<th scope="col">Ruta</th>
			<th scope="col">Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($mensajes as $mensaje)
			<tr>
				<td>{{ $mensaje->id }}</td>
				<td><a href="{{ route('usuarios.show', $mensaje->user->id) }}">{{ $mensaje->user->nombre }}</a></td>
				<td>{{ $mensaje->user->email }}</td>
				<td>{{ $mensaje->mensaje }}</td>
				<td><a href="{{ route('rutas.show', $mensaje->ruta->id) }}">{{ $mensaje->ruta->nombre }}</a></td>
				<td class="text-center">
					<div class="btn-group">
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

@stop
@extends('layout')

@section('contenido')


<div class="jumbotron jumbotron-fluid text-center mb-5">
	<h1 class="display-4">Mensajes</h1>
</div> {{-- Jumbotron --}}
<div class="container">
	<p class="h4">Mensajes en puntos de interés:</p>
	<table class="table table-hover" width="100%" border="1">
	<thead class="thead-light">
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Nombre</th>
			<th scope="col">Email</th>
			<th scope="col">Contenido</th>
			<th scope="col">Punto de interés</th>
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
				<td>{{ $mensaje->punto->nombre }}</td>
				<td class="text-center">
					<div class="btn-group">
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
</div>


@stop
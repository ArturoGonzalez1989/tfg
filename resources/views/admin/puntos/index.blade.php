@extends('layout')

@section('contenido')

<div class="jumbotron jumbotron-fluid text-center mb-5">
	<h1>Puntos de interés</h1>
</div> {{-- Jumbotron --}}

<div class="text-center mb-5">
	<a class="btn btn-primary" href="{{ route('puntos.create')}}">Crear nuevo punto de interés</a>
</div>
<div class="container">
	<table class="table table-hover" width="100%" border="1">
	<thead class="thead-light">
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Nombre</th>
			<th scope="col">Coste</th>
			<th scope="col">Rutas</th>
			<th scope="col">Comentarios</th>
			<th scope="col">Ciudad</th>
			<th scope="col">Creada en</th>
			<th scope="col">Última edición</th>
			<th scope="col">Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($puntos as $punto)
			<tr>
				<td>{{ $punto->id }}</td>
				<td>{{ $punto->nombre }}</td>
				<td class="text-center">{{ $punto->coste }}€</td>
				<td class="text-center">{{ $punto->rutas->pluck('nombre')->count() }}</td>
				<td class="text-center">{{ $punto->mensajes->pluck('nombre')->count() }}</td>
				<td>
					<img class="img-fluid" width="50" src="/img/banderas/{{ $punto->ciudad->comunidad->bandera }}" alt=""> {{ $punto->ciudad->nombre }}
				</td>
				<td>{{ $punto->created_at->format('Y-m-d') }}</td>
				<td>{{ $punto->updated_at->format('Y-m-d') }}</td>
				
				<td class="text-center">
					<div class="btn-group">
						<a href="{{route('puntos.show', $punto->id) }}" class="btn-sm btn-info sin_subrayar mr-1">Ver</a>
						<form action="{{ route('puntos.edit', $punto->id) }}">
							{!! csrf_field() !!}
							{!! method_field('PUT') !!}
							<button type="submit" class="btn-sm btn-primary mr-1">Editar</button>
							{{-- <a class="btn-sm btn-danger" href="">Eliminar</a> --}}
							
						</form>
						<form method="POST" action="{{route('puntos.destroy', $punto->id) }}">
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
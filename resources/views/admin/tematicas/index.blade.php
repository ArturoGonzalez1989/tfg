@extends('layout')

@section('contenido')


<div class="jumbotron jumbotron-fluid text-center mb-5">
	<h1 class="display-4">Tematicas</h1>
</div> {{-- Jumbotron --}}

<div class="text-center mb-5">
	<a class="btn btn-primary" href="{{ route('tematicas.create')}}">Crear nueva tematica</a>
</div>

<div class="container">
	<table class="table table-hover" width="100%" border="1">
	<thead class="thead-light">
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Nombre</th>
			<th scope="col">Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($tematicas as $tematica)
			<tr>
				<td>{{ $tematica->id }}</td>
				<td>{{ $tematica->nombre }}</td>
				<td class="text-center">
					<div class="btn-group">
						<form action="{{ route('tematicas.edit', $tematica->id) }}">
							{!! csrf_field() !!}
							{!! method_field('PUT') !!}
							<button type="submit" class="btn-sm btn-primary mr-1">Editar</button>
							{{-- <a class="btn-sm btn-danger" href="">Eliminar</a> --}}
							
						</form>
						<form method="POST" action="{{route('tematicas.destroy', $tematica->id) }}">
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
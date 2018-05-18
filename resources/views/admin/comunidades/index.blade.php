@extends('layout')
@section('contenido')

<div class="jumbotron jumbotron-fluid text-center mb-5">
	<h1>Comunidades del sistema</h1>
</div> {{-- Jumbotron --}}

<div class="container">
	<table class="table table-hover" width="100%" border="1">
	<thead class="thead-light">
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Bandera</th>
			<th scope="col">Nombre</th>
			<th scope="col">Descripción</th>
			<th scope="col">Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($comunidades as $comunidad)
			<tr>
				<td>{{ $comunidad->id }}</td>
				<td width="100"><img class="img-fluid" width="100" height="100" src="/img/banderas/{{ $comunidad->bandera }}" alt=""></td>
				<td>{{ $comunidad->nombre }}</td>
				<td>{{ $comunidad->descripcion }}</td>
				<td class="text-center">
					<div class="btn-group">
						<a href="{{route('comunidades.show', $comunidad->id) }}" class="btn-sm btn-info sin_subrayar mr-1">Ver</a>
						<form action="{{ route('comunidades.edit', $comunidad->id) }}">
							{!! csrf_field() !!}
							{!! method_field('PUT') !!}
							<button type="submit" class="btn-sm btn-primary mr-1">Editar</button>
							{{-- <a class="btn-sm btn-danger" href="">Eliminar</a> --}}
							
						</form>
						<form method="POST" action="{{route('comunidades.destroy', $comunidad->id) }}">
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
@extends('layout')

@section('contenido')


<div class="jumbotron jumbotron-fluid text-center mb-5">
	<h1>Usuarios registrados en el sistema</h1>
</div> {{-- Jumbotron --}}
<div class="text-center mb-5">
	<a class="btn btn-primary" href="{{ route('usuarios.create')}}">Crear nuevo usuario</a>
</div>
<div class="container">
	<table class="table table-hover" width="100%" border="1">
	<thead class="thead-light">
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Nombre</th>
			<th scope="col">Email</th>
			<th scope="col">Rol</th>
			<th scope="col">Creado</th>
{{-- 			<th scope="col">Preferencia turismo</th>
 --}}			<th scope="col">Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($usuarios as $usuario)
			<tr>
				<td>{{ $usuario->id }}</td>
				<td>{{ $usuario->nombre }}</td>
				<td>{{ $usuario->email }}</td>
				<td>{{ $usuario->role->nombre }}</td>
				<td>{{ $usuario->created_at->format('Y-m-d') }}</td>
{{-- 				<td>{{ $usuario->tematicas->pluck('nombre')->implode(' / ') }}
 --}}				</td>
				<td class="text-center">
					<div class="btn-group">
						<a href="{{route('usuarios.show', $usuario->id) }}" class="btn-sm btn-info sin_subrayar mr-1">Ver</a>
						<form action="{{ route('usuarios.edit', $usuario->id) }}">
							{!! csrf_field() !!}
							{!! method_field('PUT') !!}
							<button type="submit" class="btn-sm btn-primary mr-1">Editar</button>
							{{-- <a class="btn-sm btn-danger" href="">Eliminar</a> --}}
							
						</form>
						<form method="POST" action="{{route('usuarios.destroy', $usuario->id) }}">
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
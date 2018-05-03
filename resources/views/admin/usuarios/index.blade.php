@extends('layout')

@section('contenido')

<main role="main">
	<div class="row">
			<div class="col-lg-2 navbar-dark bg-dark sidebar sidebar-sticky fixed-top" id="sidebar">
	            @include('partials.menu_admin') <!-- Incluimos el navbar vertical -->    
	        </div><!-- fin col-2 -->
			<div class="col-10">
				<div class="jumbotron jumbotron-fluid text-center mb-5">
					<h1 class="display-4">Usuarios registrados en el sistema</h1>
				</div> {{-- Jumbotron --}}
				<div class="text-center mb-5">
					<a class="btn btn-primary" href="">Crear nuevo usuario</a>
				</div>
				
				<table class="table table-hover" width="100%" border="1">
					<thead class="thead-light">
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Nombre</th>
							<th scope="col">Email</th>
							<th scope="col">Rol</th>
							<th scope="col">Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($usuarios as $usuario)
							<tr>
								<td>{{ $usuario->id }}</td>
								<td>{{ $usuario->nombre }}</td>
								<td>{{ $usuario->email }}</td>
								<td>{{ $usuario->role->nombre }}</td>
								<td class="text-center">
									<div class="btn-group">
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
			</div> {{-- fin col-10 --}}
		</div> {{-- fin row --}}
</main>

@stop
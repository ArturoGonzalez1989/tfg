@extends('layout')

@section('contenido')

<main role="main">
		<div class="row">
			<div class="col-lg-2 navbar-dark bg-dark sidebar sidebar-sticky fixed-top" id="sidebar">
	            @include('partials.menu_admin') <!-- Incluimos el navbar vertical -->    
	        </div><!-- fin col-2 -->
			<div class="col-10">
				<div class="jumbotron jumbotron-fluid text-center mb-5">
					<h1 class="display-4">Ciudades del sistema</h1>
				</div> {{-- Jumbotron --}}
				<div class="text-center mb-5">
					<a class="btn btn-primary" href="{{ route('ciudades.create')}}">Crear nueva ciudad</a>
				</div>
				<table class="table table-hover" width="100%" border="1">
					<thead class="thead-light">
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Nombre</th>
							<th scope="col">Descripción</th>
							<th scope="col">C. Autónoma</th>
							<th scope="col">Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($ciudades as $ciudad)
							<tr>
								<td>{{ $ciudad->id }}</td>
								<td>{{ $ciudad->nombre }}</td>
								<td>{{ $ciudad->descripcion }}</td>
								<td><img class="img-fluid" width="50" src="/img/banderas/{{ $ciudad->comunidad->bandera }}" alt=""> {{ $ciudad->comunidad->nombre }}</td>
								<td class="text-center">
									<div class="btn-group">
										<a href="{{route('ciudades.show', $ciudad->id) }}" class="btn-sm btn-info sin_subrayar mr-1">Ver</a>
										<form action="{{ route('ciudades.edit', $ciudad->id) }}">
											{!! csrf_field() !!}
											{!! method_field('PUT') !!}
											<button type="submit" class="btn-sm btn-primary mr-1">Editar</button>
										</form>
										<form method="POST" action="{{route('ciudades.destroy', $ciudad->id) }}">
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
			</div> {{-- fin col-10 --}}
		</div> {{-- fin row --}}
</main>

@stop
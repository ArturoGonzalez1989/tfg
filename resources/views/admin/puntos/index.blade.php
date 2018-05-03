@extends('layout')

@section('contenido')

<main role="main">
		<div class="row">
			<div class="col-lg-2 navbar-dark bg-dark sidebar sidebar-sticky fixed-top" id="sidebar">
	            @include('partials.menu_admin') <!-- Incluimos el navbar vertical -->    
	        </div><!-- fin col-2 -->
			<div class="col-10">
				<div class="jumbotron jumbotron-fluid text-center mb-5">
					<h1 class="display-4">Puntos de interés</h1>
				</div> {{-- Jumbotron --}}
				<div class="text-center mb-5">
					<a class="btn btn-primary" href="{{ route('puntos.create')}}">Crear nuevo punto de interés</a>
				</div>
				<table class="table table-hover" width="100%" border="1">
					<thead class="thead-light">
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Nombre</th>
							<th scope="col">Descripción</th>
							<th scope="col">Rutas a las que pertenece</th>
							<th scope="col">Localización</th>
							<th scope="col">Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($puntos as $punto)
							<tr>
								<td>{{ $punto->id }}</td>
								<td>{{ $punto->nombre }}</td>
								<td>{{ $punto->descripcion }}</td>
								<td>
									@foreach ($punto->rutas as $ruta)
										<p>- {{ $ruta->nombre }}</p>
									@endforeach
								</td>
								<td>
									<img class="img-fluid" width="50" src="/img/banderas/{{ $punto->ciudad->comunidad->bandera }}" alt=""> {{ $punto->ciudad->nombre }}
								</td>
								
								<td class="text-center">
									<div class="btn-group">
										<a href="{{route('puntos.show', $punto->id) }}" class="btn-sm btn-info sin_subrayar mr-1">Leer</a>
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
			</div> {{-- fin col-10 --}}
		</div> {{-- fin row --}}
</main>

@stop
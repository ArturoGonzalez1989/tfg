@extends('layout')
@section('contenido')

<div class="jumbotron jumbotron-fluid text-center mb-5">
	<h1>Ciudades del sistema</h1>
</div> {{-- Jumbotron --}}

<div class="container">
	<div class="text-center mb-5">
	<a class="btn btn-primary" href="{{ route('ciudades.create')}}">Crear nueva ciudad</a>
</div>
<table class="table table-hover" width="100%" border="1">
	<thead class="thead-light">
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Nombre</th>
			<th scope="col">C. Autónoma</th>
			<th scope="col">Rutas</th>
			<th scope="col">Puntos de interés</th>
			<th scope="col">Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($ciudades as $ciudad)
			<tr>
				<td>{{ $ciudad->id }}</td>
				<td>{{ $ciudad->nombre }}</td>
				<td><img class="img-fluid" width="50" src="/img/banderas/{{ $ciudad->comunidad->bandera }}" alt=""> {{ $ciudad->comunidad->nombre }}</td>
				<td class="text-center">
					<?php $contadorR = 0; ?>
					@foreach($rutas as $ruta)
						@if($ruta->ciudad->id == $ciudad->id)
							<?php $contadorR = $contadorR + 1; ?>
						@endif
					@endforeach
					{{ $contadorR }}
				</td>
				<td class="text-center">
					<?php $contadorP = 0; ?>
					@foreach($puntos as $punto)
						@if($punto->ciudad->id == $ciudad->id)
							<?php $contadorP = $contadorP + 1; ?>
						@endif
					@endforeach
					{{ $contadorP }}
				</td>
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
			
</div>


@stop
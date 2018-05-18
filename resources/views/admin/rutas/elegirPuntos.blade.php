@extends('layout')

@section('contenido')

<div class="jumbotron jumbotron-fluid text-center mb-5">
	<h1 class="display-4">Elegir puntos</h1>
</div> {{-- Jumbotron --}}

<div class="container mt-5 border p-5">
	<h2>{{ $ruta->nombre }}</h2>
	<hr>
	<form method="post" id="formulario" action="{{ route('rutas.update', $ruta->id) }}" enctype="multipart/form-data">
				{!! method_field('PUT') !!}	
					{{ csrf_field() }}
	<h3 class="mt-5">Puntos de la ruta: {{ $ruta->puntos->count() }}</h3>
	<hr>
	<table class="table table-hover" width="100%" border="1">
		<thead class="thead-light">
			<tr>
				<th scope="col">Añadir / Quitar</th>
				<th scope="col">Más info</th>
				<th scope="col">ID</th>
				<th scope="col">Nombre</th>
				<th scope="col">Descripción</th>
				<th scope="col">Coste</th>
			</tr>
		</thead>
		@foreach($puntos as $punto)
			@if($punto->ciudad_id == $ruta->ciudad_id)
		 		<tbody>
					<tr>
						<td class="text-center">
							<input type="checkbox" name="puntos[]" {{ $ruta->puntos->pluck('id')->contains($punto->id) ? 'checked' : '' }} value="{{ $punto->id }}">	
						</td>
						<td class="text-center">
							<div class="btn-group">
								<a href="{{route('puntos.show', $punto->id) }}" class="btn-sm btn-info sin_subrayar mr-1">Ver ruta</a>
							</div>
						</td>
				 		<td>{{ $punto->id }}</td>
						<td>{{ $punto->nombre }}</td>
						<td>{{ $punto->descripcion }}</td>
						<td>{{ $punto->coste }}€</td>
					</tr>
				</tbody>
			@endif
		@endforeach
	</table>
	<button class="btn btn-info my-5" type="submit">Editar ruta</button>
	</form>	
</div>

@stop
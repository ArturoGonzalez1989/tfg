@extends('layout')

@section('contenido')

<div class="jumbotron jumbotron-fluid text-center mb-5">
	<h1>{{ $punto->nombre}}</h1>
</div> {{-- Jumbotron --}}

<div class="container border p-5">
	<div class="row">
    	<div class="col-md-9">
			<p>Nombre: {{ $punto->nombre}}</p>
			<p>Ciudad: {{ $punto->ciudad->nombre}} ({{ $punto->ciudad->comunidad->nombre}})</p>
			<p>Descripción: {{ $punto->descripcion}}</p>
			<p>Comentarios: {{ $punto->mensajes->count() }}</p>
			<p>Coste: {{ $punto->coste }}€</p>
			<p>Coordenadas: {{ $punto->coordenadas }}</p>
		</div>
		<div class="col-md-3">
			<img class="img-fluid img-thumbnail" src="{{ Storage::url($punto->imagen)}}" alt="">			
		</div>
	</div>
	
	<a class="btn btn-primary py-2 my-2" href="{{ route('puntos.edit', $punto->id )}}">Editar punto</a>
</div>

<div class="container my-5">
	<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Rutas a las que pertenece:
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
      	@if( $punto->rutas->pluck('id')->count() == 0)
			<p>No hay puntos en esta ruta</p>
    	@else
			<table class="table table-hover">
				<thead>
					<tr>
						<th class="border-top-0" scope="col">ID</th>
						<th class="border-top-0" scope="col">Nombre</th>
						<th class="border-top-0" scope="col">Descripción</th>
						<th class="border-top-0" scope="col">Creada por</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($punto->rutas as $ruta)
						@if($ruta->ciudad_id == $punto->ciudad_id)
							<tr>
								<td>{{ $ruta->id }}</td>
								<td><a href="{{ route('rutas.show', $ruta->id) }}">{{ $ruta->nombre }}</a></td>
								<td>{{ $ruta->descripcion }}</td>
								<td>{{ $ruta->creador->nombre }}</td>
							</tr>
						@endif
					@endforeach
				</tbody>
			</table>
    	@endif
        
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Comentarios del punto:
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        @if( $punto->mensajes->pluck('id')->count() == 0)
			<p>No hay mensajes en este punto</p>
    	@else
			<table class="table table-hover">
		<thead>
			<tr>
				<th class="border-top-0" scope="col">ID</th>
				<th class="border-top-0" scope="col">Usuario</th>
				<th class="border-top-0" scope="col">Mensaje</th>
			</tr>
		</thead>
		<tbody>
				@foreach($mensajes_puntos as $mensaje)
					@if($mensaje->punto->id == $ruta->id)
						<tr>
							<td>{{ $mensaje->id }}</td>
							<td>{{ $mensaje->user->nombre }}</td>
							<td>{{ $mensaje->mensaje }}</td>
						</tr>
					@endif
				@endforeach					
		</tbody>
	</table>

    	@endif
      </div>
    </div>
  </div>
</div>
</div>

	
@stop
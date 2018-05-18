@extends('layout')
@section('contenido')

<div class="jumbotron jumbotron-fluid text-center mb-5">
	<h1>{{ $ciudad->nombre}} <img class="img-fluid" width="100px" src="/img/banderas/{{ $ciudad->comunidad->bandera }}" alt=""></h1>				
</div> {{-- Jumbotron --}}
			
<div class="container border p-5">
	<div class="row">
    	<div class="col-md-9">
			<p>Ciudad: {{ $ciudad->nombre}} ({{ $ciudad->comunidad->nombre}})</p>
			<p>Descripción: {{ $ciudad->descripcion }}</p>
			<p>Coordenadas: {{ $ciudad->coordenadas }}</p>
		</div>
		<div class="col-md-3">
			<img class="img-fluid img-thumbnail" src="{{ Storage::url($ciudad->imagen) }}" alt="">
		</div>
	</div>
	
	<a class="btn btn-primary py-2 my-4" href="{{ route('ciudades.edit', $ciudad->id )}}">Editar ciudad</a>
</div>

<div class="container my-5">
	<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Puntos de interés de la ciudad: 
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">

      	@if( $puntos->pluck('ciudad_id')->contains($ciudad->id))
			<table class="table table-hover">
				<thead>
					<tr>
						<th class="border-top-0" scope="col">ID</th>
						<th class="border-top-0" scope="col">Nombre</th>
						<th class="border-top-0" scope="col">Descripción</th>
						<th class="border-top-0" scope="col">Coste</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($puntos as $punto)
						<tr>
							@if($punto->ciudad_id == $ciudad->id)
								<td>{{ $punto->id }}</td>
								<td><a href="{{ route('puntos.show', $punto->id) }}">{{ $punto->nombre }}</a></td>
								<td>{{ $punto->descripcion }}</td>
								<td>{{ $punto->coste }}€</td>
							@endif
						</tr>
					@endforeach
				</tbody>
			</table>
    	@else
			<p>No hay puntos en esta ciudad</p>
    	@endif
        
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Rutas de la ciudad:
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
      	@if( $rutas->pluck('ciudad_id')->contains($ciudad->id))
      		<table class="table table-hover">
		<thead>
			<tr>
				<th class="border-top-0" scope="col">ID</th>
				<th class="border-top-0" scope="col">Nombre</th>
				<th class="border-top-0" scope="col">Descripción</th>
				<th class="border-top-0" scope="col">PI</th>
				<th class="border-top-0" scope="col">Coste</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($rutas as $ruta)
				<tr>
					@if($ruta->ciudad_id == $ciudad->id)
						<td>{{ $ruta->id }}</td>
						<td><a href="{{ route('rutas.show', $ruta->id) }}">{{ $ruta->nombre }}</a></td>
						<td>{{ $ruta->descripcion }}</td>
						<td>{{ $ruta->puntos->count() }}</td>
						<td>{{ $ruta->puntos->sum('coste') }}€</td>
					@endif
				</tr>
			@endforeach
		</tbody>
	</table>
    	@else
			<p>No hay mensajes en este punto</p>
        	
        @endif
      </div>
    </div>
  </div>

</div>

{{-- <div class="container pt-5">
	<h3 class="pb-3">Rutas: </h3>
	
</div> --}}


@stop
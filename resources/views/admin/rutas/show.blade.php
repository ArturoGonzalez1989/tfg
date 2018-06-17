@extends('layout')

@section('contenido')

<div class="jumbotron jumbotron-fluid text-center mb-5">
	<h1>{{ $ruta->nombre}}</h1>
</div> {{-- Jumbotron --}}

<div class="container border p-5">
	<div class="row">
    	<div class="col-md-9">
			<p>Ciudad: {{ $ruta->ciudad->nombre}} ({{ $ruta->ciudad->comunidad->nombre}})</p>	
			<p>Descripción: {{ $ruta->descripcion}}</p>
			<p>Creada por: {{ $ruta->creador->nombre}}</p>
			<p>Votos: {{ $ruta->votos }}</p>
			<p>Comentarios: {{ $ruta->mensajes->count() }}</p>
			<p>Puntos de interés: {{ $ruta->puntos->count() }}</p>

			<?php $coste = 0; ?>
			@foreach ($puntos as $punto)
				<?php $coste = $ruta->puntos->sum('coste'); ?>
			@endforeach

			<p>Coste de la ruta: {{ $coste }}€</p>		
		</div>
		<div class="col-md-3">
			<img class="img-fluid img-thumbnail" src="{{ Storage::url($ruta->imagen)}}" alt="">
			
		</div>
	</div>
	
	<a class="btn btn-primary py-2 my-2" href="{{ route('rutas.edit', $ruta->id )}}">Editar ruta</a>
</div>

<div class="container pt-5">
	<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			Puntos turísticos: {{ $ruta->puntos->count() }}
		</button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
      	@if( $ruta->puntos->pluck('id')->count() == 0)
			<p>No hay puntos en esta ruta</p>
    	@else
    		<table class="table table-hover">
		<thead>
			<tr>
				<th class="border-top-0" scope="col">ID</th>
				<th class="border-top-0" scope="col">Nombre</th>
				<th class="border-top-0" scope="col">Descripción</th>
				<th class="border-top-0" scope="col">Coste</th>
				<th class="border-top-0" scope="col">Acciones</th>
			</tr>
		</thead>
			@foreach ($puntos as $punto)
				@foreach ($punto->rutas as $i)
				 	@if( $i->pivot->ruta_id == $ruta->id)
				 		<tbody>
							<tr>
						 		<td>{{ $punto->id }}</td>
								<td>{{ $punto->nombre }}</td>
								<td>{{ $punto->descripcion }}</td>
								<td>{{ $punto->coste }}€</td>
								<td class="text-center">
									<div class="btn-group">
										<a href="{{route('puntos.show', $punto->id) }}" class="btn-sm btn-info sin_subrayar mr-1">Ver</a>
									</div>
								</td>
							</tr>
						</tbody>
					@endif
				@endforeach
			@endforeach
	</table>
    	@endif
        
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Comentarios sobre la ruta: {{ $ruta->mensajes->count() }}
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
      	@if( $ruta->mensajes->pluck('id')->count() == 0)
			<p>No hay puntos en esta ruta</p>
    	@else
			<table class="table table-hover">
		<thead>
			<tr>
				<th class="border-top-0" scope="col">ID</th>
				<th class="border-top-0" scope="col">Usuario</th>
				<th class="border-top-0" scope="col">Mensaje</th>
				<th class="border-top-0" scope="col">Acciones</th>
			</tr>
		</thead>
		<tbody>
				@foreach($mensajes_ruta as $mensaje)
					@if($mensaje->ruta->id == $ruta->id)
						<tr>
							<td>{{ $mensaje->id }}</td>
							<td>{{ $mensaje->user->nombre }}</td>
							<td>{{ $mensaje->mensaje }}</td>
							<td>
								<div class="btn-group">
									<form action="{{ route('mensajes_rutas.edit', $mensaje->id) }}">
										{!! csrf_field() !!}
										{!! method_field('PUT') !!}
										<button type="submit" class="btn-sm btn-primary mr-1">Editar</button>
										{{-- <a class="btn-sm btn-danger" href="">Eliminar</a> --}}
										
									</form>
									<form method="POST" action="{{route('mensajes_rutas.destroy', $mensaje->id) }}">
										{!! csrf_field() !!}
										{!! method_field('DELETE') !!}
										<button type="submit" class="btn-sm btn-danger">Eliminar</button>
										{{-- <a class="btn-sm btn-danger" href="">Eliminar</a> --}}
									</form>
								</div>
							</td>
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
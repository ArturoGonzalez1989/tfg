@extends('layout')

@section('contenido')

<div class="jumbotron jumbotron-fluid text-center mb-5">
	<h1>Editar ruta</h1>
</div> {{-- Jumbotron --}}

<div class="container mt-5 border p-5">
	<h2>{{ $ruta->nombre }}</h2>
	<hr>
	<div class="row">
		<div class="col-5">
			<img class="img-fluid" src="{{ Storage::url($ruta->imagen)}}" alt="">
		</div>
		<div class="col-7">
			<form method="post" id="formulario" action="{{ route('rutas.update', $ruta->id) }}" enctype="multipart/form-data">
				{!! method_field('PUT') !!}	
					{{ csrf_field() }}
				<div class="row form-group">
					<label class="col-form-label col-md-4" for="nombre">Nombre de la ruta:</label>
					<div class="col-md-8">
		    			<input class="form-control" id="nombre" name="nombre" required type="text" value="{{ $ruta->nombre }}">
		    			</input>
		    			{!! $errors->first('nombre', '<span class="text-danger">:message</span>') !!} 
		    			<!-- 
		    			el objeto errors, el cual está en todas las vistas, contiene todos los errores de validación
		    			Utilizamos el método first para obtener el primer error del campo nombre
						-->
					</div>
				</div>
				<div class="row form-group">
				    <label class="col-form-label col-md-4" for="email">Descripción:</label>
				    <div class="col-md-8">
				        <textarea class="form-control" id="descripcion" name="descripcion" required rows="3" value="{{ $ruta->descripcion }}">{{ $ruta->descripcion }}</textarea>
				    </div>
				</div>
				<div class="row form-group">
		            <label class="col-form-label col-md-4" for="comunidad_id">Ciudad: </label>
		            <div class="col-md-8">
		                <select class="form-control" id="ciudad_id" name="ciudad_id">
		                	
		                    @foreach ($ciudades as $ciudad)
		                        
		                        @if( $ciudad->id == $ruta->ciudad_id)
									<option selected value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
								@else
									<option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
		                        @endif
		                    @endforeach
		                </select>
		            </div>
		        </div>
		</div>
		<div class="container">
			<div class="form-group">
			        <div class="form-group">
	                    <label for="imagen">Cambiar foto ruta</label>
	                    <input type="file" class="form-control-file" id="imagen" name="imagen">
	                </div>
			</div>	
		</div>	
	</div>


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

<div class="container mt-5 border p-5">
		@if( $ruta->mensajes->pluck('id')->count() == 0)
			<p>No hay mensajes en esta ruta</p>
    	@else
			<h3 class="pb-3">Comentarios en la ruta: {{ $ruta->mensajes->count() }}</h3>
			<table class="table table-hover" width="100%" border="1">
			<thead class="thead-light">
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Usuario</th>
					<th scope="col">Mensaje</th>
					<th scope="col">Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($mensajes as $mensaje)
					@if($mensaje->ruta->id == $ruta->id)
						<tr>
							<td>{{ $mensaje->id }}</td>
							<td>{{ $mensaje->user->nombre }}</td>
							<td>{{ $mensaje->mensaje }}</td>
							<td class="text-center">
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

@stop
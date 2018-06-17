@extends('layout')

@section('contenido')

<div class="jumbotron jumbotron-fluid text-center mb-5">
	<h1>Editar punto</h1>
</div> {{-- Jumbotron --}}


<div class="container mt-5 border p-5">
	<h2>{{ $punto->nombre }}</h2>
	<hr>
	<div class="row">
		<div class="col-5">
			<img class="img-fluid img-thumbnail" src="{{ Storage::url($punto->imagen)}}" alt="">
		</div>
		<div class="col-7">
			<form method="post" id="formulario" action="{{ route('puntos.update', $punto->id) }}" enctype="multipart/form-data">
				{!! method_field('PUT') !!}	
					{{ csrf_field() }}
				<div class="row form-group">
					<label class="col-form-label col-md-4" for="nombre">ID de la ruta:</label>
					<div class="col-md-8">
		    			<input class="form-control" id="id" name="id" required type="text" value="{{ $punto->id }}">
		    			</input>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-form-label col-md-4" for="nombre">Nombre de la punto:</label>
					<div class="col-md-8">
		    			<input class="form-control" id="nombre" name="nombre" required type="text" value="{{ $punto->nombre }}">
		    			</input>
		    			{!! $errors->first('nombre', '<span class="text-danger">:message</span>') !!} 
		    			<!-- 
		    			el objeto errors, el cual está en todas las vistas, contiene todos los errores de validación
		    			Utilizamos el método first para obtener el primer error del campo nombre
						-->
					</div>
				</div>
				<div class="row form-group">
					<label class="col-form-label col-md-4" for="nombre">Coste del punto:</label>
					<div class="col-md-8">
		    			<input class="form-control" id="coste" name="coste" required type="text" value="{{ $punto->coste }}">
		    			</input>
					</div>
				</div>
				<div class="row form-group">
				    <label class="col-form-label col-md-4" for="email">Descripción:</label>
				    <div class="col-md-8">
				        <textarea class="form-control" id="descripcion" name="descripcion" required rows="3" value="{{ $punto->descripcion }}">{{ $punto->descripcion }}</textarea>
				    </div>
				</div>
				<div class="row form-group">
		            <label class="col-form-label col-md-4" for="comunidad_id">Ciudad: </label>
		            <div class="col-md-8">
		                <select class="form-control" id="ciudad_id" name="ciudad_id">
		                	
		                    @foreach ($ciudades as $ciudad)
		                        
		                        @if( $ciudad->id == $punto->ciudad_id)
									<option selected value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
								@else
									<option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
		                        @endif
		                    @endforeach
		                </select>
		            </div>
		        </div>
		        <div class="row form-group">
					<label class="col-form-label col-md-4" for="nombre">Coordenadas del punto:</label>
					<div class="col-md-8">
		    			<input class="form-control" id="coordenadas" name="coordenadas" required type="text" value="{{ $punto->coordenadas }}">
		    			</input>
					</div>
				</div>
		</div>
		<div class="container">
			<div class="form-group">
		        <div class="form-group">
                    <label for="imagen">Cambiar foto punto</label>
                    <input type="file" class="form-control-file" id="imagen" name="imagen">
                </div>
			</div>	
		</div>	
	</div>
	
	<button class="btn btn-info my-5" type="submit">Editar punto</button>
	</form>	
</div>


@stop
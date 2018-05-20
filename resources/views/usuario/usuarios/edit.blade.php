@extends('layout')

@section('contenido')

<div class="jumbotron jumbotron-fluid text-center mb-5">
	<h1 class="text-center">Editar usuario {{ $usuario->nombre }}</h2>
</div> {{-- Jumbotron --}}

<div class="container mt-5">
	<form method="post" id="formulario" action="{{ route('usuarios.update', $usuario->id) }}" enctype="multipart/form-data">
		{!! method_field('PUT') !!}	
		{{ csrf_field() }}
		<div class="row">
			<div class="col-md-3">
				<img class="img-fluid img-thumbnail" width="200" src="{{ Storage::url($usuario->imagen)}}" alt="">
			</div>
			<div class="col-md-9">
				<div class="form-group row">
					<label class="col-sm-3 col-form-label" for="nombre">Nombre de usuario:</label>
				    <div class="col-sm-8">
				    	<input class="form-control" id="nombre" name="nombre" required type="text" value="{{ $usuario->nombre }}"></input>
				    </div>
				</div>
				<div class="row form-group">
		    		<label class="col-sm-3 col-form-label" for="email">E-mail:</label>
		    		<div class="col-sm-8">
		        		<input class="form-control" id="email" name="email" type="email" required value="{{ $usuario->email }}"></input>
		        		{!! $errors->first('email', '<span class="text-danger">:message</span>') !!} 
				    </div>
	    		</div>
	    		<div class="form-group row">
					<label class="col-sm-3 col-form-label" for="imagen">Imágen del usuario:</label>
				    <div class="col-sm-8">
				    	<input type="file" class="form-control-file" id="imagen" name="imagen">
				    </div>
				</div>
				<button class="btn btn-info" type="submit">Enviar</button>
			</div>
		</div>
		<div class="container">
			<h3 class="pt-5">Temáticas preferidas:</h3>
			<div class="row">	
				@foreach($tematicas as $tematica)
					<div class="col-3">
						<div class="form-check">
							<input type="checkbox" name="tematicas[]" {{ $usuario->tematicas->pluck('id')->contains($tematica->id) ? 'checked' : '' }} value="{{ $tematica->id }}"> <label class="form-check-label" for="defaultCheck1">{{ $tematica->nombre }}</label>
						</div>
					</div>
				@endforeach
			</div>
		</div>		
	</form>
</div>

@stop
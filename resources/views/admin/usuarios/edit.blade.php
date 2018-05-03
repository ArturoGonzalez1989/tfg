@extends('layout')

@section('contenido')


<div class="container mt-5">
	<h1 class="display-4">Editar usuario -> {{ $usuario->nombre }}</h1>
	<hr class="bg-primary">
	<form method="POST" id="formulario" action="{{ route('usuarios.update', $usuario->id) }}">
		{!! method_field('PUT') !!}	
 		{{ csrf_field() }}
		<div class="row form-group">
    		<label class="col-form-label col-md-4" for="nombre">Nombre:</label>
    		<div class="col-md-8">
        		<input class="form-control" id="nombre" name="nombre" type="text" required value="{{ $usuario->nombre }}"></input>
        		{!! $errors->first('nombre', '<span class="text-danger">:message</span>') !!} 
        		<!-- 
        		el objeto errors, el cual está en todas las vistas, contiene todos los errores de validación
        		Utilizamos el método first para obtener el primer error del campo nombre
    			-->
   			</div>
		</div>
		<div class="row form-group">
    		<label class="col-form-label col-md-4" for="email">E-mail:</label>
    		<div class="col-md-8">
        		<input class="form-control" id="email" name="email" type="email" required value="{{ $usuario->email }}"></input>
        		{!! $errors->first('email', '<span class="text-danger">:message</span>') !!} 
		        <!-- 
		        el objeto errors, el cual está en todas las vistas, contiene todos los errores de validación
		        Utilizamos el método first para obtener el primer error del campo nombre
		    	-->
    		</div>
		</div>
		<button class="btn btn-info" type="submit">Enviar</button>
	</form>	
</div>



@stop
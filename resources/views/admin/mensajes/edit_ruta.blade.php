@extends('layout')

@section('contenido')

<div class="jumbotron jumbotron-fluid text-center mb-5">
    <h1 class="display-4">Editar mensaje</h1>
</div> {{-- Jumbotron --}}

<div class="container mt-5">
	<h2 class="text-center">Editar mensaje de: <a href="{{ route('usuarios.show', $mensaje->user->id) }}">{{ $mensaje->user->nombre }}</a> en la ruta <a href="{{ route('rutas.show', $mensaje->ruta->id) }}">{{ $mensaje->ruta->nombre }}</a></h2>
	<hr>
	<form method="POST" id="formulario" action="{{ route('mensajes_rutas.update', $mensaje->id) }}">
	{!! method_field('PUT') !!}	
 {{ csrf_field() }}
</div>
<div class="container border p-5">
    <div class="row form-group justify-content-center">
        <label class="col-form-label col-md-2" for="mensaje">
            Mensaje:
        </label>
        <div class="col-md-4">
            <textarea class="form-control" id="mensaje" name="mensaje" required rows="3">{{ $mensaje->mensaje }}</textarea>
            {!! $errors->first('mensaje', '<span class="text-danger">:message</span>') !!} 
            <!-- 
            el objeto errors, el cual está en todas las vistas, contiene todos los errores de validación
            Utilizamos el método first para obtener el primer error del campo nombre
            -->
        </div>
    </div>
</div>
<div class="row justify-content-center pt-5">
<button class="btn btn-info" type="submit">Editar</button>
    
</div>


</form>	
</div>



@stop
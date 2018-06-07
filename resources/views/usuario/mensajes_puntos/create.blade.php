@extends('layout')

@section('contenido')

<div class="jumbotron jumbotron-fluid text-center mb-5">
    <h1 class="display-4">Crear mensaje</h1>
</div> {{-- Jumbotron --}}

<div class="container mt-5">
	<form method="POST" id="formulario" action="{{ route('mensajes_puntos.store') }}">
        {{ csrf_field() }}
        <div class="container border p-5">
            <div class="row form-group justify-content-center">
                <label class="col-form-label col-md-2" for="mensaje">Mensaje:</label>
                <div class="col-md-6">
                    <textarea class="form-control" id="mensaje" name="mensaje" required rows="3"></textarea>
                </div>
            </div>
        </div>{{-- {{ $ruta->creador->id }} --}}
        <div class="row justify-content-center pt-5">
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <input type="hidden" name="punto_id" value="{{ $punto->id }}">
        <button class="btn btn-info" type="submit">Enviar mensaje</button>
            
        </div>


</form>	
</div>



@stop
@extends('layout')
@section('contenido')

<div class="jumbotron jumbotron-fluid text-center">
    <h1>Crear nueva tematica</h1>
</div>
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <form method="POST" id="formulario" action="{{ route('tematicas.store') }}">
                 {{ csrf_field() }}
                <div class="row form-group">
                    <label class="col-form-label col-md-4" for="nombre">Nombre:</label>
                    <div class="col-md-8">
                        <input class="form-control" id="nombre" name="nombre" required type="text">
                        </input>
                    </div>
                </div>
                <button class="btn btn-info" type="submit">Enviar</button>
            </form>
        </div>
    </div>
</div>
@stop
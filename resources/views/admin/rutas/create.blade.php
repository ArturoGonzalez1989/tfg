@extends('layout')
@section('contenido')

<div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
        <h1 class="display-4">
            Crear nueva ruta
        </h1>
    </div>
</div>

<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
                <form method="POST" id="formulario" action="{{ route('rutas.store') }}">
                     {{ csrf_field() }}
                    <div class="row form-group">
                        <label class="col-form-label col-md-4" for="nombre">
                            Nombre:
                        </label>
                        <div class="col-md-8">
                            <input class="form-control" id="nombre" name="nombre" required type="text" value="{{ old('nombre') }}">
                            </input>
                            
                        </div>
                    </div>
                    <button class="btn btn-info" type="submit">
                        Enviar
                    </button>
                </form>
        </div>
    </div>
</div>

@stop
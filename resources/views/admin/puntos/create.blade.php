@extends('layout')
@section('contenido')

<div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
        <h1 class="display-4">
            Crear nuevo punto de interés
        </h1>
    </div>
</div>

<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
                <form method="POST" id="formulario" action="{{ route('puntos.store') }}">
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
                    <div class="row form-group">
                        <label class="col-form-label col-md-4" for="comunidad_id">Ciudad:</label>
                        <div class="col-md-8">
                            <select class="form-control" id="ciudad_id" name="ciudad_id">
                                <option>-- Elegir ciudad --</option>
                                @foreach ($ciudades as $ciudad)
                                    <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-form-label col-md-4" for="mensaje">Descripcion:</label>
                        <div class="col-md-8">
                            <textarea class="form-control" id="descripcion" name="descripcion" required rows="3">{{ old('descripcion') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="exampleInputFile">Elegir foto</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file" id="portada" name="portada">
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
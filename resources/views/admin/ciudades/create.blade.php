@extends('layout')
@section('contenido')

<div class="jumbotron jumbotron-fluid text-center">
    <h1>Crear nueva ciudad</h1>
</div>

    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <form method="POST" id="formulario" action="{{ route('ciudades.store') }}" enctype="multipart/form-data">
                     {{ csrf_field() }}
                    <div class="row form-group">
                        <label class="col-form-label col-md-4" for="nombre">Nombre:</label>
                        <div class="col-md-8">
                            <input class="form-control" id="nombre" name="nombre" required type="text" value="{{ old('nombre') }}">
                            </input>
                            {!! $errors->first('nombre', '<span class="text-danger">:message</span>') !!} 
                            <!-- 
                            el objeto errors, el cual está en todas las vistas, contiene todos los errores de validación
                            Utilizamos el método first para obtener el primer error del campo nombre
                        	-->
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-form-label col-md-4" for="mensaje">Descripcion:</label>
                        <div class="col-md-8">
                            <textarea class="form-control" id="descripcion" name="descripcion" required rows="3">{{ old('descripcion') }}</textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-form-label col-md-4" for="comunidad_id">Comunidad Autónoma:</label>
                        <div class="col-md-8">
                            <select class="form-control" id="comunidad_id" name="comunidad_id">
                                <option>-- Elegir comunidad autónoma --</option>
                                @foreach ($comunidades as $comunidad)
                                    <option value="{{ $comunidad->id }}">{{ $comunidad->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-form-label col-md-4" for="email">Coordenadas:</label>
                        <div class="col-md-8">
                            <input class="form-control" id="coordenadas" name="coordenadas" placeholder="x, x">
                            </input>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Elegir foto ciudad</label>
                        <input type="file" class="form-control-file" id="imagen" name="imagen">
                      </div>
                    <button class="btn btn-info" type="submit">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</main>
@stop
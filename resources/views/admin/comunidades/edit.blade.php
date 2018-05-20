@extends('layout')
@section('contenido')

<div class="jumbotron jumbotron-fluid text-center mb-5">
	<h1>Editar comunidad</h1>
</div> {{-- Jumbotron --}}

<div class="container mt-5 border p-5">
    <h2>{{ $comunidad->nombre }}</h2>
    <hr>
    <div class="row">
        <div class="col-5">
            <img class="img-fluid img-thumbnail" src="{{ Storage::url($comunidad->imagen)}}" alt="">
        </div>
        <div class="col-7">
            <form method="post" id="formulario" action="{{ route('comunidades.update', $comunidad->id) }}" enctype="multipart/form-data">
                {!! method_field('PUT') !!} 
                    {{ csrf_field() }}
                <div class="row form-group">
                    <label class="col-form-label col-md-4" for="nombre">Nombre de la comunidad:</label>
                    <div class="col-md-8">
                        <input class="form-control" id="nombre" name="nombre" required type="text" value="{{ $comunidad->nombre }}">
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
                        <textarea class="form-control" id="descripcion" name="descripcion" required rows="6" value="{{ $comunidad->descripcion }}">{{ $comunidad->descripcion }}</textarea>
                    </div>
                </div>

        </div>
        <div class="container">
            <div class="form-group">
                <div class="form-group">
                    <label for="imagen">Cambiar foto comunidad</label>
                    <input type="file" class="form-control-file" id="imagen" name="imagen">
                </div>
            </div>  
        </div>  
    </div>
    
    <button class="btn btn-info my-5" type="submit">Editar comunidad</button>
    </form> 
</div>

@stop
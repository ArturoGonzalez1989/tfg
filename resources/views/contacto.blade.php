@extends('layout')
@section('contenido')

    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h1 class="display-4">
                Contacta con nosotros
            </h1>
            <p class="lead">
                ¿Tienes alguna duda sobre nuestra aplicación? utiliza nuestro formulario de contacto y resuelve tus dudas!
            </p>
        </div>
    </div>

    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <h1 class="display-5">
                    Formulario de contacto
                </h1>
                <hr class="bg-info">
                    <p class="text-danger small pt-0 mt-0">
                        *Todos los campos son obligatorios
                    </p>
                    <form method="POST" id="formulario" action="">
                         {{ csrf_field() }}
                        <div class="row form-group">
                            <label class="col-form-label col-md-4" for="nombre">
                                Nombre:
                            </label>
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
                            <label class="col-form-label col-md-4" for="email">
                                E-mail:
                            </label>
                            <div class="col-md-8">
                                <input class="form-control" id="email" name="email" type="email" required value="{{ old('email') }}">
                                </input>
                                {!! $errors->first('email', '<span class="text-danger">:message</span>') !!} 
                                <!-- 
                                el objeto errors, el cual está en todas las vistas, contiene todos los errores de validación
                                Utilizamos el método first para obtener el primer error del campo nombre
                            	-->
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-form-label col-md-4" for="mensaje">
                                Mensaje:
                            </label>
                            <div class="col-md-8">
                                <textarea class="form-control" id="mensaje" name="mensaje" required rows="3">{{ old('mensaje') }}</textarea>
                                {!! $errors->first('mensaje', '<span class="text-danger">:message</span>') !!} 
    							<!-- 
                                el objeto errors, el cual está en todas las vistas, contiene todos los errores de validación
                                Utilizamos el método first para obtener el primer error del campo nombre
                            	-->
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" data-toggle="popover" title="Aviso" data-content="Esta funcionalidad estará activa próximamente">Enviar mensaje</button>
                    </form>
                </hr>
            </div>
        </div>
    </div>
@stop
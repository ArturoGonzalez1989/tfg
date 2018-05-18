@extends('layout')
@section('contenido')

<div class="jumbotron jumbotron-fluid text-center">
    <h1>Crear nuevo usuario</h1>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <form method="POST" action="{{ route('usuarios.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                    <div class="col-md-6">
                        <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" required autofocus>
                        @if ($errors->has('nombre'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('nombre') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Repetir contraseña') }}</label>
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="imagen" class="col-md-4 col-form-label text-md-right">Imágen del usuario:</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control-file" id="imagen" name="imagen">
                    </div>
                </div>
                <div class="form-group row">
                    <h3 class="pt-5">Temáticas preferidas por el usuario:</h3>
                    <div class="row">   
                        @foreach($tematicas as $tematica)
                            <div class="col-4">
                                <div class="form-check">
                                    <input type="checkbox" name="tematicas[]" value="{{ $tematica->id }}"> <label class="form-check-label" for="defaultCheck1">{{ $tematica->nombre }}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>      
                <input id="role_id" type="hidden" name="role_id" value="2">                                      
                <div class="form-group row mt-4">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Registrar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>









                        

                        

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@stop
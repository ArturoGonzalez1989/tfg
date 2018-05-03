@extends('layout')

@section('contenido')

{{-- @if(session()->has('info'))
	<div class="alert alert-success">{{ session('info') }}</div>
@endif --}}
<main role="main">
	<div class="row">
		<div class="col-lg-2 navbar-dark bg-dark sidebar sidebar-sticky fixed-top" id="sidebar">
            @include('partials.menu_admin') <!-- Incluimos el navbar vertical -->    
        </div><!-- fin col-2 -->
		<div class="col-10">
			<div class="jumbotron jumbotron-fluid text-center mb-5">
				<h1 class="display-4">Editar comunidad</h1>
			</div> {{-- Jumbotron --}}

			<div class="container mt-5">
				<h2 class="text-center">{{ $comunidad->nombre }}</h2>
				<hr class="bg-primary">
				<form method="post" id="formulario" action="{{ route('comunidades.update', $comunidad->id) }}">
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
		    <label class="col-form-label col-md-4" for="email">Descripción de la comunidad:</label>
		    <div class="col-md-8">
		        <input class="form-control" id="descripcion" name="descripcion" required value="{{ $comunidad->descripcion }}">
		        </input>
		    </div>
		</div>
		
		<div class="row form-group">
		    <label class="col-form-label col-md-4" for="email">Imágen de portada:</label>
		    <img src="/img/portadas/{{ $comunidad->portada }}" alt="imagen-{{ $comunidad->nombre }}">
		    <div class="col-md-8">
		        <div class="form-group">
                    <label for="exampleInputFile">Cambiar foto ciudad</label>
                    <input type="file" class="form-control-file" id="portada" name="portada">
                </div>
		    </div>
		</div>
		
		<button class="btn btn-info" type="submit">Enviar</button>
		</form>	
		</div>
			
		</div> {{-- fin col-10 --}}
	</div> {{-- fin row --}}
</main>


@stop
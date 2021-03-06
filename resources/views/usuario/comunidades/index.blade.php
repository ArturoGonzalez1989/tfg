@extends('layout')

@section('contenido')

<div class="parallax row align-items-center justify-content-center">
	<div class="col-8 align-items-center">
	  	<div class="container text-center">
	        <h1 class="display-4">
	            Bienvenido {{ auth()->user()->nombre}}
	        </h1>
	        <p class="lead">
	            Descubre todo lo que <em>Far Away!</em> puede hacer por ti
	        </p>
	    </div>	    
  	</div>
</div>
<div class="container">
	<h2 class="display-4 text-center my-5">Comunidades</h2>
	<div class="card-columns" id="explorarComunidades">
		<?php $comunidades = $comunidades->sortBy('nombre'); ?>
		@foreach ($comunidades as $comunidad)
	        <a href="{{route('comunidades.show', $comunidad->id) }}">
	        	<div class="card" style="width: 19rem;">
					<img class="card-img-top" src="http://placehold.it/300x300" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">{{ $comunidad->nombre }}</h5>
					</div>
				</div>
		    </a>
		   @endforeach
	</div>
</div>

@stop
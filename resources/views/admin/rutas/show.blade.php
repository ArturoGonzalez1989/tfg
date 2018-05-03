@extends('layout')

@section('contenido')

<main role="main">
	<div class="row">
		<div class="col-lg-2 navbar-dark bg-dark sidebar sidebar-sticky fixed-top" id="sidebar">
            @include('partials.menu_admin') <!-- Incluimos el navbar vertical -->    
        </div><!-- fin col-2 -->
		<div class="col-10">
			<div class="jumbotron jumbotron-fluid text-center mb-5">
				<h1 class="display-4">{{ $ruta->nombre}}</h1>
			</div> {{-- Jumbotron --}}
			<div class="container my-5">
				@foreach ($puntos as $punto)
					<div>
						<div class="list-group">
							@foreach ($punto->rutas as $i)
							 	@if( $i->pivot->ruta_id == $ruta->id)
								 	<div class="card mb-4 list-group-item list-group-item-action">
								 		<a class="quitar-links" href="{{route('puntos.show', $punto->id) }}">
											<div class="card-header">
										    	{{ $punto->nombre }}
										  	</div>
										  	<div class="card-body">
										  		<div class="row">
										  			<div class="col-3"><img class="img-fluid" src="http://placehold.it/200x200" alt=""></div>
										  			<div class="col-9"><p class="card-text">{{ $punto->descripcion }}</p></div>
										  		</div>
											</div>
										</a>
									</div>
								@endif
							@endforeach
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</main>



@stop
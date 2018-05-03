@extends('layout')

@section('contenido')

<main role="main">
	<div class="row">
		<div class="col-lg-2 navbar-dark bg-dark sidebar sidebar-sticky fixed-top" id="sidebar">
            @include('partials.menu_admin') <!-- Incluimos el navbar vertical -->    
        </div><!-- fin col-2 -->
		<div class="col-10">
			<div class="jumbotron jumbotron-fluid text-center mb-5">
				<h1 class="display-4">{{ $punto->nombre}}</h1>
			</div> {{-- Jumbotron --}}
			<div class="container">
				<div class="row">
					<div class="col-4">
						<img class="img-fluid" src="http://placehold.it/350x350" alt="">
					</div>
					<div class="col-8">
						<h4 class="pb-2">Punto de interés: {{ $punto->nombre}}</h4>
						<h4 class="py-2">Ciudad: {{ $punto->ciudad->nombre}}</h4>
						<h4 class="py-2">Comunidad: {{ $punto->ciudad->comunidad->nombre}}</h4>
						<h4 class="py-2">Rutas:</h4>
							@foreach ($punto->rutas as $ruta)
								<p>- {{ $ruta->nombre}}</p>
							@endforeach
						
					</div>
				</div>
					<h4 class="pt-5">Descripción:</h4>
					<h4> {{ $punto->descripcion}}</h4>

			</div>
		</div>
	</div>
</main>


@stop
@extends('layout')

@section('contenido')

<main role="main">
	<div class="row">
		<div class="col-lg-2 navbar-dark bg-dark sidebar sidebar-sticky fixed-top" id="sidebar">
            @include('partials.menu_admin') <!-- Incluimos el navbar vertical -->    
        </div><!-- fin col-2 -->
		<div class="col-10">
			<div class="jumbotron jumbotron-fluid text-center mb-5">
				<img class="img-fluid" width="200px" src="/img/banderas/{{ $ciudad->comunidad->bandera }}" alt="">
				<h1 class="display-4">{{ $ciudad->nombre}}</h1>				
			</div> {{-- Jumbotron --}}
			<div class="container">
				<div class="row">
					
					<div class="col-8">
						<h4 class="pb-2">Nombre: {{ $ciudad->nombre}}</h4>
						<h4 class="py-2">Comunidad: {{ $ciudad->comunidad->nombre}}</h4>
						
						<?php $contadorP = 0; ?>
							@foreach($puntos as $punto)
								@if($punto->ciudad_id == $ciudad->id)
									<?php $contadorP = $contadorP + 1; ?>
								@endif
							@endforeach
						<h4 class="py-2">Puntos de interés: {{ $contadorP }}</h4>
						
					</div>
				</div>
				<h4 class="py-2">Descripción: {{ $ciudad->descripcion}}</h4>
				
				<?php $contadorR = 0; ?>
							@foreach($rutas as $ruta)
								@if($ruta->ciudad_id == $ciudad->id)
									<?php $contadorR = $contadorR + 1; ?>
								@endif
							@endforeach
				<div class="container">
					<h2 class="display-4 text-center my-5">Rutas: {{ $contadorR }}</h2>
					<div class="container">
						<div class="card-deck mx-auto" id="explorarCiudades">
							@foreach ($rutas as $ruta)
								@if($ruta->ciudad_id == $ciudad->id)
							        <a href="{{route('rutas.show', $ruta->id) }}">
							        	<div class="card">
											<img class="card-img-top" src="http://placehold.it/300x300" alt="Card image cap">
											<div class="card-body">
												<h5 class="card-title">{{ $ruta->nombre }}</h5>
											</div>
										</div>
								    </a>
							    @endif
							   @endforeach
						</div>
					</div>
				</div>
				<div class="container">
					<h2 class="display-4 text-center my-5">Puntos de interés: {{ $contadorP }}</h2>
					<div class="container">
						<div class="card-deck mx-auto" id="explorarCiudades">
							@foreach ($puntos as $punto)
								@if($punto->ciudad_id == $ciudad->id)
							        <a href="{{route('rutas.show', $punto->id) }}">
							        	<div class="card">
											<img class="card-img-top" src="http://placehold.it/300x300" alt="Card image cap">
											<div class="card-body">
												<h5 class="card-title">{{ $punto->nombre }}</h5>
											</div>
										</div>
								    </a>
							    @endif
							   @endforeach

						</div>
					</div>
				</div>
					

			</div>
		</div>
	</div>
</main>


@stop
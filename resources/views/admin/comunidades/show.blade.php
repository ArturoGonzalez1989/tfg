@extends('layout')

@section('contenido')

<main role="main">
	<div class="row">
		<div class="col-lg-2 navbar-dark bg-dark sidebar sidebar-sticky fixed-top" id="sidebar">
            @include('partials.menu_admin') <!-- Incluimos el navbar vertical -->    
        </div><!-- fin col-2 -->
		<div class="col-10">
			<div class="jumbotron jumbotron-fluid text-center mb-5">
				<h1 class="display-4">Comunidad de {{ $comunidad->nombre}}</h1>
			</div> {{-- Jumbotron --}}
			<div class="container">
				<div class="row">
					<div class="col-4">
						<img class="img-fluid" width="350px" src="/img/banderas/{{ $comunidad->bandera }}" alt="">
					</div>
					<div class="col-8">
						<h4 class="pb-2">Nombre: {{ $comunidad->nombre}}</h4>
												
						<?php $contadorC = 0; ?>
							@foreach($ciudades as $ciudad)
								@if($ciudad->comunidad_id == $comunidad->id)
									<?php $contadorC = $contadorC + 1; ?>
								@endif
							@endforeach
						<h4 class="py-2">Ciudades: {{ $contadorC }}</h4>

						<?php $contadorR = 0; ?>
							@foreach($rutas as $ruta)
								@if($ruta->ciudad->comunidad_id == $comunidad->id)
									<?php $contadorR = $contadorR + 1; ?>
								@endif
							@endforeach
						<h4 class="py-2">Rutas turísticas: {{ $contadorR }}</h4>
						
						<?php $contadorP = 0; ?>
							@foreach($puntos as $punto)
								@if($punto->ciudad->comunidad_id == $comunidad->id)
									<?php $contadorP = $contadorP + 1; ?>
								@endif
							@endforeach
						<h4 class="py-2">Puntos de interés: {{ $contadorP }}</h4>
						

						{{-- @foreach($puntos as $punto)
								@if($punto->ruta->ciudad->comunidad_id == $comunidad->id)
									<h4> {{ $punto->nombre }}</h4>
								@endif
							@endforeach
 --}}
						
						{{-- <h4 class="py-2">Ciudades: {{ $puntos->ruta->ciudad->nombre}}</h4>
						<h4 class="py-2">Comunidad: {{ $puntos->ruta->ciudad->comunidad->nombre}}</h4>
						<h4 class="py-2">Rutas: {{ $puntos->ruta->nombre}}</h4> --}}
					</div>
				</div>
				<div class="card mt-5">
				  <h5 class="card-header">Descripción</h5>
				  <div class="card-body">
				    <p class="card-text">{{ $comunidad->descripcion}}</p>
				  </div>
				</div>
				<div class="container">
					<h2 class="display-4 text-center my-5">Ciudades</h2>
					<div class="container">
						<div class="card-deck mx-auto" id="explorarCiudades">
							@foreach ($ciudades as $ciudad)
								@if($ciudad->comunidad_id == $comunidad->id)
							        <a href="{{route('ciudades.show', $ciudad->id) }}">
							        	<div class="card">
											<img class="card-img-top" src="http://placehold.it/300x300" alt="Card image cap">
											<div class="card-body">
												<h5 class="card-title">{{ $ciudad->nombre }}</h5>
											</div>
										</div>
								    </a>
							    @endif
							   @endforeach
						</div>
					</div>
				</div>
				<div class="container">
					<h2 class="display-4 text-center my-5">Rutas</h2>
					<div class="container">
						<div class="card-deck mx-auto" id="explorarCiudades">
							@foreach ($rutas as $ruta)
								@if($ruta->ciudad->comunidad_id == $comunidad->id)
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
					<h2 class="display-4 text-center my-5">Puntos de interés</h2>
					<div class="container">
						<div class="card-deck mx-auto" id="explorarCiudades">
							@foreach ($puntos as $punto)
								@if($punto->ciudad->comunidad_id == $comunidad->id)
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
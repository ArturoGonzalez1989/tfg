<div class="mt-5 px-5">
	
	<div id="carrusel" class="carousel slide" data-ride="carousel" data-interval="4000" data-pause="hover">

		<div class="carousel-inner">
			<div class="carousel-item active">
				<div class="row">
					@for($i=1;$i<=4;$i++)
						<div class="col-md-3">
		  					<div class="card ml-5" style="width: 20rem;">
								<img class="card-img-top" src="http://placehold.it/200x200" alt="Card image cap">
								<div class="card-body">
									<h5 class="card-title">{{ $rutas->find($i)->nombre }}</h5>
						    		<p class="card-text">{{ $rutas->find($i)->descripcion }}</p>
						    		<a href="{{route('rutas.show', $rutas->find($i)->id) }}" class="btn btn-primary">Ir a la ruta</a>
								</div>
		  					</div>
						</div>
					@endfor
				</div>
			</div>
			<div class="carousel-item">
				<div class="row">
					@for($j=5;$j<=8;$j++)
						<div class="col-md-3">
		  					<div class="card ml-5" style="width: 20rem;">
								<img class="card-img-top" src="http://placehold.it/200x200" alt="Card image cap">
								<div class="card-body">
									<h5 class="card-title">{{ $rutas->find($j)->nombre }}</h5>
						    		<p class="card-text">{{ $rutas->find($j)->descripcion }}</p>
						    		<a href="{{route('rutas.show', $rutas->find($j)->id) }}" class="btn btn-primary">Ir a la ruta</a>
								</div>
		  					</div>
						</div>
					@endfor
				</div>
			</div>
			
		</div>
			
		<a class="carousel-control-prev" href="#carrusel" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carrusel" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>
<div class="container mb-5">
	<form action="{{ route('rutas-ciudad') }}" method="post">
		{{ csrf_field() }}
		<div class="d-flex flex-column flex-lg-row justify-content-center">
			<div class="p-2 w-50 m-auto">
				<select name="comunidad" class="form-control" id="comunidad" required>
					<option value="">Seleccionar comunidad</option>
					@foreach($comunidades as $comunidad)
						<option value="{{ $comunidad->id}}">{{ $comunidad->nombre}}</option>
					@endforeach
				</select>
			</div>
			<div class="p-2 w-50 m-auto">
				<select id="ciudad" class="form-control" name="ciudad" required>
					<option value="">Seleccione ciudad</option>
				</select>
			</div>
			<div class="p-2 m-auto">
				<button class="btn btn-success" type="submit">Buscar rutas</button>
			</div>
		</div>
	</form>
</div>

	
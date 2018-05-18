@extends('layout')

@section('contenido')


<div class="jumbotron jumbotron-fluid text-center mb-5">
	<h1 class="display-4">Temáticas</h1>
</div> {{-- Jumbotron --}}

<table class="table table-hover" width="100%" border="1">
	<thead class="thead-light">
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Nombre</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($tematicas as $tematica)
			<tr>
				<td>{{ $tematica->id }}</td>
				<td>{{ $tematica->nombre }}</td>
			</tr>
		@endforeach
	</tbody>
</table>

@stop
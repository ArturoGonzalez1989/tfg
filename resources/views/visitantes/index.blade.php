@extends('layout')

@section('contenido')

<div class="div-encabezado row align-items-center justify-content-center">
  <div class="col-8 align-items-center">
    <form class="form-inline justify-content-center my-2 my-lg-0 text-white lead">
        <label for="busqueda" class="align-items-center">¿Quiéres ver las mejores rutas en el lugar donde piensas viajar?</label>
        <input id="busqueda" class="form-control mr-sm-2 ml-2" type="text" placeholder="Buscar las mejores rutas" aria-label="Search">
        <button type="button" class="btn btn-outline-success my-2 my-sm-0" data-container="body" data-toggle="popover" data-placement="top" data-content="La funcionalidad estará operativa próximamente">
				Llévame allí!
		</button>
    </form>
  </div>
</div>

@include('partials.carrusel')

@stop


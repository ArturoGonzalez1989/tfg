@extends('layout')

@section('contenido')

<header>
    @include('partials.menu') <!-- Incluimos el navbar -->
 </header>

<div class="div-encabezado row align-items-center justify-content-center">
  <div class="col-8 align-items-center">
    <form class="form-inline justify-content-center my-2 my-lg-0 text-white lead">
        <label for="busqueda" class="align-items-center">¿Quiéres ver las mejores rutas en el lugar donde piensas viajar?</label>
        <input id="busqueda" class="form-control mr-sm-2 ml-2" type="text" placeholder="Buscar las mejores rutas" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Quiero viajar!</button>
    </form>
  </div>
</div>
<div class="container my-5">
	<p class="display-4 text-center">Las mejores rutas</p>
	<div class="row">
		<div class="col-md-4">
			<div class="card">
			  <img class="card-img-top" src="/img/2.jpg" alt="Card image cap">
			  <div class="card-body">
			    <h5 class="card-title">Card title</h5>
			    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			    <a href="#" class="btn btn-primary">Go somewhere</a>
			  </div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
			<img class="card-img-top" src="/img/3.jpg" alt="Card image cap">
			<div class="card-body">
			<h5 class="card-title">Card title</h5>
			<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			<a href="#" class="btn btn-primary">Go somewhere</a>
			</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
			  <img class="card-img-top" src="/img/4.jpg" alt="Card image cap">
			  <div class="card-body">
			    <h5 class="card-title">Card title</h5>
			    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			    <a href="#" class="btn btn-primary">Go somewhere</a>
			  </div>
			</div>
		</div>
	</div>{{-- div row --}}
</div>{{-- Div container --}}

@stop


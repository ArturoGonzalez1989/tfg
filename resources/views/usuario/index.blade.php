@extends('layout')

@section('contenido')

<main role="main">
	<div class="jumbotron text-center">
		<h1 class="display-4">
	            Bienvenido {{ auth()->user()->nombre}}
	 	</h1>
	    <p class="lead">
	        Descubre todo lo que <em>Far Away!</em> puede hacer por ti
	    </p>
	  </div>


	<div class="container my-5 py-5">
		<h2 class="display-4 pb-5">
	            ¿Qué deseas hacer?
	 	</h2>

	<div class="row">
	  <div class="col-4">
	    <div class="list-group" id="list-tab" role="tablist">
	      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Rutas</a>
	      {{-- <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
	      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Messages</a>
	      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a> --}}
	    </div>
	  </div>
	  <div class="col-8">
	    <div class="tab-content" id="nav-tabContent">
	      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
			<div class="list-group">
				<button type="button" class="list-group-item list-group-item-action">
			    <a class="no-link" href=" {{ route('explorar') }}">Explorar rutas</a>
			  </button>
			  {{-- <button type="button" class="list-group-item list-group-item-action">
			    <a class="no-link" href=" {{ route('rutas.create') }}" role="button">Crear nueva ruta</a>
			  </button>
			  <button type="button" class="list-group-item list-group-item-action">
			    <a class="no-link" href="#" role="button">Ver mis rutas creadas</a>
			  </button>
			  
			  <button type="button" class="list-group-item list-group-item-action">
			    <a class="no-link" href="#" role="button">Ver mis rutas favoritas</a>
			  </button> --}}			  
			</div>
		
	      </div>
	      <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">...</div>
	      <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
	      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
	    </div>
	  </div>
	</div>



	{{-- <div class="row">
		<div class="col-3">
			<a class="btn btn-primary" href=" {{ route('rutas.create') }}">Crear nueva ruta</a>
		</div>
		<div class="col-3">
			<a class="btn btn-primary" href=" {{ route('explorar') }}">Explorar rutas</a>
		</div>
		<div class="col-3">
			<a class="btn btn-primary" href="">Explorar rutas</a>
		</div>
		<div class="col-3">
			<a class="btn btn-primary" href="">Explorar rutas</a>
		</div>
	</div> --}} {{-- fin row --}}
</div> {{-- fin container --}}

</main>






@stop
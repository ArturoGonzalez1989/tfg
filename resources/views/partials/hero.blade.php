<div class="jumbotron text-center">
	<h1 class="display-4">
		@if (Auth::check())
        	Bienvenido {{ auth()->user()->nombre}}
        @else
        	Bienvenido visitante
        @endif
	</h1>
	<p class="lead">
    	Descubre todo lo que <em>Far Away!</em> puede hacer por ti
	</p>
</div>
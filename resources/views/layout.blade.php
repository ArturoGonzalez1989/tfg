<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
{{--   <meta name="description" content="">
  <meta name="author" content=""> --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="../../../../favicon.ico">
  <title>tusRutas</title>
  <!-- Bootstrap core CSS -->
  {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/font-awesome/css/font-awesome.min.css">
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</head>

<body>
  @if (auth()->guest() || auth()->user()->role_id === 2)
    <header>
      @include('partials.menu')
    </header>
    <main role="main">
        @yield('contenido')
    </main>
  @elseif(auth()->user()->role_id === 1)
    <main role="main">
      {{-- <div class="container-fluid"> --}}
        <div class="row">
          <div class="col-lg-2 navbar-dark bg-dark sidebar sidebar-sticky fixed-top" id="sidebar">
            @include('partials.menu_admin') <!-- Incluimos el navbar vertical -->    
          </div><!-- fin col-2 -->
          <div class="col-lg-10">
            @yield('contenido') <!-- Punto en el que producimos el contenido -->
          </div> {{-- fin col-10 --}}
        </div> {{-- fin row --}}
      {{-- </div> fin container-fluid --}}
    </main>
  @endif
  
    
  @include('partials.footer') <!-- Incluimos el navbar -->

  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="/js/all.js"></script>
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}

  <script type="text/javascript">
    $(function () {
      $('[data-toggle="popover"]').popover()
    })

    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>

    
{{--   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
{{--   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
</body>
</html>

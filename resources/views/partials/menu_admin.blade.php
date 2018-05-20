<nav class="navbar navbar-expand-lg flex-lg-column text-center">
    <div class="mt-4 pb-lg-4 d-none d-lg-block">
        <p class="text-white text-left align-bottom">{{ auth()->user()->nombre }}</p>  
        <img src="/img/admin.png" alt="foto admin" class="img-thumbnail rounded-circle mb-3" width="40px">
        <p><a class="text-danger mb-5" href="/logout">Cerrar sesión</a></p>
    </div>


    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav flex-lg-column">
            <a class="nav-item nav-link lead py-3 text-danger d-lg-none" data-scroll href="/logout">Cerrar sesión</a>
            <a class="nav-item nav-link lead" data-scroll href="/">Inicio</a>
            <a class="nav-item nav-link lead py-3" href="" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapseExample">Usuarios</a>
            <div class="collapse" id="collapse1">
                <a class="nav-item nav-link lead py-3 pl-4" data-scroll href=" {{ route('usuarios.create') }}">Crear usuario</a>
                <a class="nav-item nav-link lead py-3 pl-4" data-scroll href=" {{ route('usuarios.index') }}">Lista de usuarios</a>
            </div>
            <a class="nav-item nav-link lead py-3" href="" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapseExample">Rutas</a>
            <div class="collapse" id="collapse2">
                <a class="nav-item nav-link lead py-3 pl-4" data-scroll href=" {{ route('rutas.create') }}">Crear rutas</a>
                <a class="nav-item nav-link lead py-3 pl-4" data-scroll href=" {{ route('rutas.index') }}">Lista de rutas</a>
            </div>
            <a class="nav-item nav-link lead py-3" href="" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapseExample">Puntos de interés</a>
            <div class="collapse" id="collapse3">
                <a class="nav-item nav-link lead py-3 pl-4" data-scroll href=" {{ route('puntos.create') }}">Crear punto</a>
                <a class="nav-item nav-link lead py-3 pl-4" data-scroll href=" {{ route('puntos.index') }}">Lista de puntos</a>
            </div>
            
            <a class="nav-item nav-link lead py-3" href="" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapseExample">Mensajes</a>
            <div class="collapse" id="collapse4">
  {{--               <a class="nav-item nav-link lead py-3 pl-4" data-scroll href=" {{ route('mensajes.create') }}">Crear mensaje</a>
                <a class="nav-item nav-link lead py-3 pl-4" data-scroll href=" {{ route('mensajes.index') }}">Lista de mensajes</a> --}}
            </div>
            <a class="nav-item nav-link lead py-3" href="" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapseExample">Ciudades</a>
            <div class="collapse" id="collapse5">
                <a class="nav-item nav-link lead py-3 pl-4" data-scroll href=" {{ route('ciudades.create') }}">Crear ciudad</a>
                <a class="nav-item nav-link lead py-3 pl-4" data-scroll href=" {{ route('ciudades.index') }}">Lista de ciudades</a>
            </div>
            <a class="nav-item nav-link lead py-3" href="" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapseExample">Comunidades</a>
            <div class="collapse" id="collapse6">
                <a class="nav-item nav-link lead py-3 pl-4" data-scroll href=" {{ route('comunidades.create') }}">Crear comunidad</a>
                <a class="nav-item nav-link lead py-3 pl-4" data-scroll href=" {{ route('comunidades.index') }}">Lista de comunidades</a>
            </div>
        </div>
    </div>
</nav>

   
<?php

namespace App\Http\Controllers;

use App\Ciudad;
use App\Comunidad;
use App\Mensaje;
use App\Punto;
use App\Ruta;
use App\User;

class PagesController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('example', ['except' => ['home']]);
    // }

    public function home()
    {
        $usuarios    = User::all();
        $rutas       = Ruta::all();
        $mensajes    = Mensaje::all();
        $puntos      = Punto::all();
        $ciudades    = Ciudad::all();
        $comunidades = Comunidad::all();

        if (auth()->guest()) {
            $numRutas = $rutas->count();
            return view('visitantes.index', compact('rutas', 'numRutas', 'puntos'));
        } elseif (auth()->user()->role_id === 2) {
            return view('usuario.index', compact('rutas', 'usuarios', 'mensajes', 'puntos'));
        } elseif (auth()->user()->role_id === 1) {
            return view('admin.index', compact('rutas', 'usuarios', 'mensajes', 'puntos', 'comunidades', 'ciudades'));
        }
    }

    public function explorar()
    {
        $rutas    = Ruta::all();
        $puntos   = Punto::all();
        $ciudades = Ciudad::all();

        return view('usuario.explorar', compact('rutas', 'puntos', 'ciudades'));
    }

    public function base_legal()
    {
        return view('base_legal');
    }

    // public function mensajes(CreateMessageRequest $request) // Validación del formulario en el lado del servidor

    // {
    //     $data = $request->all(); // Devuelve un array
    //     return redirect()->route('contacto');
    //     // Una vez que hemos validado y guardado la información le damos una respuesta al usuario con los responses.
    //     // responses
    // }
}

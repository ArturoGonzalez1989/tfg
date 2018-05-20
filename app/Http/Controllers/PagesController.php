<?php

namespace App\Http\Controllers;

use App\Ciudad;
use App\Comunidad;
use App\Mensaje_Punto;
use App\Mensaje_Ruta;
use App\Punto;
use App\Ruta;
use App\Tematica;
use App\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('example', ['except' => ['home']]);
    // }

    public function home()
    {
        $usuarios        = User::all();
        $rutas           = Ruta::all();
        $mensajes_rutas  = Mensaje_Ruta::all();
        $mensajes_puntos = Mensaje_Punto::all();
        $puntos          = Punto::all();
        $ciudades        = Ciudad::all();
        $comunidades     = Comunidad::all();
        $tematicas       = Tematica::all();

        if (auth()->guest()) {
            return view('visitantes.index', compact('rutas', 'puntos', 'comunidades', 'tematicas', 'usuarios', 'ciudades'));
        } elseif (auth()->user()->role_id === 2) {
            return view('visitantes.index', compact('rutas', 'usuarios', 'mensajes_rutas', 'puntos', 'comunidades', 'ciudades', 'tematicas'));
        } elseif (auth()->user()->role_id === 1) {
            return view('admin.index', compact('rutas', 'usuarios', 'mensajes_rutas', 'mensajes_puntos', 'puntos', 'comunidades', 'ciudades', 'tematicas'));
        }
    }

    public function cuenta()
    {
        $usuarios        = User::all();
        $rutas           = Ruta::all();
        $mensajes_rutas  = Mensaje_Ruta::all();
        $mensajes_puntos = Mensaje_Punto::all();
        $puntos          = Punto::all();
        $ciudades        = Ciudad::all();
        $comunidades     = Comunidad::all();
        $tematicas       = Tematica::all();

        if (auth()->user()->role_id === 2) {
            return view('usuario.index', compact('rutas', 'usuarios', 'mensajes', 'puntos', 'comunidades', 'ciudades', 'tematicas'));
        } elseif (auth()->user()->role_id === 1) {
            return view('admin.index', compact('rutas', 'usuarios', 'mensajes_rutas', 'mensajes_puntos', 'puntos', 'comunidades', 'ciudades', 'tematicas'));
        }
    }

    public function verRutas(Request $request)
    {
        $req       = $request->input('ciudad');
        $ciudad    = Ciudad::where('id', $req)->get();
        $rutas     = Ruta::where('ciudad_id', $req)->get();
        $tematicas = Tematica::all();
        $puntos    = Punto::all();
        $mensajes  = Mensaje_Ruta::all();

        return view('usuario.ciudades.ver-rutas-ciudad', compact('ciudad', 'rutas', 'tematicas', 'puntos', 'mensajes'));
    }

    public function recomendarRutas()
    {
        $rutas     = Ruta::all();
        $mensajes  = Mensaje_Ruta::all();
        $tematicas = Tematica::all();
        $puntos    = Punto::all();

        return view('usuario.rutas.recomendar-rutas', compact('rutas', 'mensajes', 'tematicas', 'puntos'));
    }

    public function explorar_comunidades()
    {
        $rutas       = Ruta::all();
        $puntos      = Punto::all();
        $comunidades = Comunidad::all();

        return view('usuario.comunidades.explorar_comunidades', compact('rutas', 'puntos', 'comunidades'));
    }

    public function base_legal()
    {
        return view('base_legal');
    }

    public function contacto()
    {
        return view('contacto');
    }
}

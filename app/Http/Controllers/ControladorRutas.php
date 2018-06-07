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

class ControladorRutas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rutas    = Ruta::all();
        $mensajes = Mensaje_Ruta::all();
        $puntos   = Punto::all();
        $opcion   = 0;
        if (auth()->guest()) {
            return view('usuario.rutas.index', compact('rutas', 'mensajes'));
        } elseif (auth()->user()->role_id === 2) {
            return view('usuario.rutas.index', compact('rutas', 'mensajes', 'puntos', 'opcion'));
        } elseif (auth()->user()->role_id === 1) {
            return view('admin.rutas.index', compact('rutas'));
        }
    }

    public function ordenadas($opcion)
    {

        $rutas    = Ruta::all();
        $mensajes = Mensaje_Ruta::all();
        $puntos   = Punto::all();

        return view('usuario.rutas.index', compact('rutas', 'mensajes', 'puntos', 'opcion'));

    }

    public function mostrarPuntos($id)
    {
        return Punto::where('ciudad_id', $id)->get();
    }

    public function rutas_usuario($id)
    {
        $rutas     = Ruta::where('creador_id', $id)->get();
        $mensajes  = Mensaje_Ruta::all();
        $puntos    = Punto::all();
        $tematicas = Tematica::all();

        return view('usuario.rutas.rutas-usuario', compact('rutas', 'tematicas', 'mensajes', 'puntos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciudades    = Ciudad::all();
        $comunidades = Comunidad::all();
        $puntos      = Punto::all();

        if (auth()->guest()) {
            return view('usuario.rutas.create', compact('ciudades', 'comunidades'));
        } elseif (auth()->user()->role_id === 2) {
            return view('usuario.rutas.create', compact('ciudades', 'comunidades'));
        } elseif (auth()->user()->role_id === 1) {
            return view('admin.rutas.create', compact('ciudades', 'comunidades', 'puntos'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function elegirPuntos(Request $request)
    // {
    //     $ruta = Ruta::create($request->all());

    // }

    public function store(Request $request)
    {
        $ruta = Ruta::create($request->all());

        // $ruta->puntos()->attach($request->puntos);

        if ($request->hasFile('imagen')) {
            $ruta->imagen = $request->file('imagen')->store('public');
        }

        $ruta->save();

        $ciudades = Ciudad::all();
        $mensajes = Mensaje_Ruta::all();
        $puntos   = Punto::all();

        if (auth()->user()->role_id === 1) {
            return view('admin.rutas.elegirPuntos', compact('ruta', 'ciudades', 'puntos', 'mensajes'));
        } elseif (auth()->user()->role_id === 2) {
            return view('usuario.rutas.elegirPuntos', compact('ruta', 'ciudades', 'puntos', 'mensajes'));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ruta            = Ruta::findOrFail($id);
        $puntos          = Punto::all();
        $mensajes_ruta   = Mensaje_Ruta::all();
        $mensajes_puntos = Mensaje_Punto::all();

        if (auth()->guest()) {
            return view('usuario.rutas.show', compact('ruta', 'puntos', 'mensajes_ruta', 'mensajes_puntos'));
        } elseif (auth()->user()->role_id === 2) {
            return view('usuario.rutas.show', compact('ruta', 'puntos', 'mensajes_ruta', 'mensajes_puntos'));
        } elseif (auth()->user()->role_id === 1) {
            return view('admin.rutas.show', compact('ruta', 'puntos', 'mensajes'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ruta     = Ruta::findOrFail($id);
        $ciudades = Ciudad::all();
        $mensajes = Mensaje_Ruta::all();
        $puntos   = Punto::all();

        return view('admin.rutas.edit', compact('ruta', 'ciudades', 'puntos', 'mensajes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ruta = Ruta::findOrFail($id);

        if ($request->hasFile('imagen')) {
            $ruta->imagen = $request->file('imagen')->store('public');
        }

        $ruta->update($request->all());

        $ruta->puntos()->sync($request->puntos);

        return redirect()->route('rutas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ruta = Ruta::findOrFail($id)->delete();

        return back();
    }
}

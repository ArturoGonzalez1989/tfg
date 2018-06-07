<?php

namespace App\Http\Controllers;

use App\Ciudad;
use App\ImagenPunto;
use App\Mensaje_Punto;
use App\Mensaje_Ruta;
use App\Punto;
use Illuminate\Http\Request;

class ControladorPuntos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciudades = Ciudad::all();
        $puntos   = Punto::all();

        return view('admin.puntos.index', compact('puntos', 'ciudades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciudades = Ciudad::all();
        return view('admin.puntos.create', compact('ciudades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $punto = Punto::create($request->all());

        if ($request->hasFile('imagen')) {
            $punto->imagen = $request->file('imagen')->store('public');
        }

        $punto->save();

        if (auth()->user()->role_id === 1) {
            return redirect()->route('puntos.index');
        } elseif (auth()->user()->role_id === 2) {
            return redirect()->route('cuenta');
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
        $punto           = Punto::findOrFail($id);
        $puntos          = Punto::all();
        $ciudades        = Ciudad::all();
        $mensajes_ruta   = Mensaje_Ruta::all();
        $mensajes_puntos = Mensaje_Punto::all();
        $imagenes        = ImagenPunto::all();

        if (auth()->guest()) {
            return view('usuario.puntos.show', compact('punto', 'puntos', 'mensajes_puntos', 'mensajes_ruta', 'ciudades', 'imagenes'));
        } elseif (auth()->user()->role_id === 2) {
            return view('usuario.puntos.show', compact('punto', 'puntos', 'mensajes_puntos', 'mensajes_ruta', 'ciudades', 'imagenes'));
        } elseif (auth()->user()->role_id === 1) {
            return view('admin.puntos.show', compact('punto', 'mensajes_puntos'));
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
        $ciudades = Ciudad::all();
        $punto    = Punto::findOrFail($id);

        return view('admin.puntos.edit', compact('punto', 'ciudades'));
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
        $punto = Punto::findOrFail($id);

        if ($request->hasFile('imagen')) {
            $punto->imagen = $request->file('imagen')->store('public');
        }

        $punto->update($request->all());

        return redirect()->route('puntos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $puntos = Punto::findOrFail($id)->delete();

        return redirect()->route('puntos.index');
    }
}

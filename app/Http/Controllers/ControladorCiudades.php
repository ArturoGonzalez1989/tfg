<?php

namespace App\Http\Controllers;

use App\Ciudad;
use App\Comunidad;
use App\Http\Requests\ActualizarCiudadRequest;
use App\Mensaje_Ruta;
use App\Punto;
use App\Ruta;
use App\Tematica;
use Illuminate\Http\Request;

class ControladorCiudades extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comunidades = Comunidad::all();
        $ciudades    = Ciudad::all();
        $rutas       = Ruta::all();
        $puntos      = Punto::all();

        if (auth()->user()->role_id === 1) {
            return view('admin.ciudades.index', compact('ciudades', 'comunidades', 'rutas', 'puntos'));
        } elseif (auth()->user()->role_id === 2) {
            return view('usuario.ciudades.index', compact('ciudades', 'comunidades', 'rutas', 'puntos'));
        }
    }

    public function mostrarRutas($id)
    {
        // $tematicas = Tematica::where('id', $tema)->get();
        $rutas = Ruta::where('ciudad_id', $id)->get();
        // $tematicas = Ciudad::where('id', $id)->get();
        // $rutas = Ruta::all();
        // $rutas = DB::table('rutas')->join('rutas_has_tematicas', 'rutas.id', '=', 'rutas_has_tematicas.ruta_id')->get();
        // $rutas = Ruta::all()->join('rutas_has_tematicas', 'rutas.id', '=', 'rutas_has_tematicas.ruta_id')->get();
        // dd($rutas);
        return $rutas;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function byComunidad($id)
    {
        return Ciudad::where('comunidad_id', $id)->get();
    }

    // public function verRutas(Request $request)
    // {
    //     $req    = $request->input('ciudad');
    //     $ciudad = Ciudad::where('id', $req)->get();

    //     return view('usuario.ciudades.ver-rutas-ciudad', compact('ciudad'));
    // }

    public function create()
    {
        $comunidades = Comunidad::all();
        return view('admin.ciudades.create', compact('comunidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ciudad = Ciudad::create($request->all());

        // $ruta->puntos()->attach($request->puntos);

        if ($request->hasFile('imagen')) {
            $ciudad->imagen = $request->file('imagen')->store('public');
        }

        $ciudad->save();

        return redirect()->route('ciudades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ciudad    = Ciudad::findOrFail($id);
        $rutas     = Ruta::where('ciudad_id', $id)->get();
        $puntos    = Punto::all();
        $tematicas = Tematica::all();
        $mensajes  = Mensaje_Ruta::all();

        if (auth()->user()->role_id === 1) {
            return view('admin.ciudades.show', compact('ciudad', 'rutas', 'puntos'));
        } elseif (auth()->user()->role_id === 2) {
            return view('usuario.ciudades.show', compact('rutas', 'usuarios', 'mensajes', 'tematicas', 'mensajes', 'puntos', 'comunidades', 'ciudad'));
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
        $comunidades = Comunidad::all();
        $ciudad      = Ciudad::findOrFail($id);
        return view('admin.ciudades.edit', compact('ciudad', 'comunidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarCiudadRequest $request, $id)
    {
        $ciudad = Ciudad::findOrFail($id);

        if ($request->hasFile('imagen')) {
            $ciudad->imagen = $request->file('imagen')->store('public');
        }

        $ciudad->update($request->all());

        return redirect()->route('ciudades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ciudad = Ciudad::findOrFail($id)->delete();

        return redirect()->route('ciudades.index');
    }
}

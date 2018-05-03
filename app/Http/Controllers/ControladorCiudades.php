<?php

namespace App\Http\Controllers;

use App\Ciudad;
use App\Comunidad;
use App\Http\Requests\ActualizarCiudadRequest;
use App\Punto;
use App\Ruta;
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
        $comunidades = Ciudad::all();
        $ciudades    = Ciudad::all();

        return view('admin.ciudades.index', compact('ciudades', 'comunidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        Ciudad::create($request->all());

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
        $ciudad = Ciudad::findOrFail($id);
        $rutas  = Ruta::all();
        $puntos = Punto::all();
        return view('admin.ciudades.show', compact('ciudad', 'rutas', 'puntos'));
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
        // return $request->all();
        $ciudad = Ciudad::findOrFail($id);

        $ciudad->update($request->all());

        //return back()->with('info', 'actualizado');
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

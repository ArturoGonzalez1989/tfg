<?php

namespace App\Http\Controllers;

use App\Ciudad;
use App\Comunidad;
use App\Punto;
use App\Ruta;
use Illuminate\Http\Request;

class ControladorComunidades extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comunidades = Comunidad::all();

        return view('admin.comunidades.index', compact('comunidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comunidades = Comunidad::all();
        return view('admin.comunidades.create', compact('comunidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Comunidad::create($request->all());

        return redirect()->route('comunidades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $puntos    = Punto::all();
        $rutas     = Ruta::all();
        $ciudades  = Ciudad::all();
        $comunidad = Comunidad::findOrFail($id);

        return view('admin.comunidades.show', compact('comunidad', 'ciudades', 'puntos', 'rutas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comunidad = Comunidad::findOrFail($id);
        return view('admin.comunidades.edit', compact('comunidad'));
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
        $comunidad = Comunidad::findOrFail($id);

        $comunidad->update($request->all());

        //return back()->with('info', 'actualizado');
        return redirect()->route('comunidades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comunidad = Comunidad::findOrFail($id)->delete();

        return redirect()->route('comunidades.index');
    }
}

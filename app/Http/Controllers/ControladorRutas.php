<?php

namespace App\Http\Controllers;

use App\Punto;
use App\Ruta;
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
        $rutas = Ruta::all();

        return view('admin.rutas.index', compact('rutas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rutas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Ruta::create($request->all());

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ruta   = Ruta::findOrFail($id);
        $puntos = Punto::all();

        if (auth()->user()->role_id === 1) {
            return view('admin.rutas.show', compact('ruta', 'puntos'));
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
        $rutas = Ruta::findOrFail($id);

        return view('admin.rutas.edit', compact('rutas'));
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
        $rutas = Ruta::findOrFail($id);

        $rutas->update($request->all());

        return redirect()->route('admin.rutas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rutas = Ruta::findOrFail($id)->delete();

        return redirect()->route('admin.rutas.index');
    }
}

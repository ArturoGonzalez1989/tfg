<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActualizarUsuarioRequest;
use App\Http\Requests\CrearUsuarioRequest;
use App\Mensaje_Punto;
use App\Mensaje_Ruta;
use App\Punto;
use App\Ruta;
use App\Tematica;
use App\User;
use Illuminate\Http\Request;

class ControladorUsuarios extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:admin', ['except' => ['edit', 'show']]);
        $this->middleware('roles:usuario', ['except' => ['edit', 'show']]);
    }

    public function index()
    {
        $usuarios  = User::all();
        $tematicas = Tematica::all();
        $puntos    = Punto::all();

        return view('admin.usuarios.index', compact('usuarios', 'tematicas', 'puntos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tematicas = Tematica::all();

        return view('admin.usuarios.create', compact('tematicas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CrearUsuarioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CrearUsuarioRequest $request)
    {
        $usuario = User::create($request->all());

        $usuario->password = bcrypt($request->password);

        $usuario->tematicas()->attach($request->tematicas);

        if ($request->hasFile('imagen')) {
            $usuario->imagen = $request->file('imagen')->store('public');
        }

        $usuario->save();

        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario         = User::findOrFail($id);
        $rutas           = Ruta::where('creador_id', $id)->get();
        $mensajes_rutas  = Mensaje_Ruta::where('user_id', $id)->get();
        $mensajes_puntos = Mensaje_Punto::where('user_id', $id)->get();
        $tematicas       = Tematica::all();
        $puntos          = Punto::all();

        if (auth()->user()->role_id === 1) {
            return view('admin.usuarios.show', compact('usuario', 'rutas', 'mensajes_rutas', 'mensajes_puntos', 'puntos', 'tematicas'));
        } elseif (auth()->user()->role_id === 2) {
            return view('usuario.usuarios.show', compact('usuario', 'rutas', 'mensajes_rutas', 'mensajes_puntos', 'puntos'));
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
        $usuario   = User::findOrFail($id);
        $tematicas = Tematica::all();

        if (auth()->user()->role_id === 1) {
            return view('admin.usuarios.edit', compact('usuario', 'tematicas'));
        } elseif (auth()->user()->role_id === 2) {
            return view('usuario.usuarios.edit', compact('usuario', 'tematicas'));
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarUsuarioRequest $request, $id)
    {
        $usuario = User::findOrFail($id);

        if ($request->hasFile('imagen')) {
            $usuario->imagen = $request->file('imagen')->store('public');
        }

        $usuario->update($request->only('nombre', 'email'));

        $usuario->tematicas()->sync($request->tematicas);

        if (auth()->user()->role_id === 1) {
            return redirect()->route('usuarios.index');
        } elseif (auth()->user()->role_id === 2) {
            return redirect()->route('cuenta');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id)->delete();

        return redirect()->route('usuarios.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Mensaje;
use Illuminate\Http\Request;

class ControladorMensajes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['create', 'store']]);
    }

    public function index()
    {
        $mensajes = Mensaje::all();
        //$mensajes = DB::table('mensajes')->get(); // Solicitamos a la BD todos los registros y los guardamos en la variable mensajes

        return view('admin.mensajes.index', compact('mensajes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mensajes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Guardamos el mensaje
        // DB::table('mensajes')->insert([
        //     "nombre"     => $request->input('nombre'),
        //     "email"      => $request->input('email'),
        //     "mensaje"    => $request->input('mensaje'),
        //     // Carbon es un paquete que utiliza laravel para manejar fechas
        //     "created_at" => Carbon::now(),
        //     "updated_at" => Carbon::now(),
        // ]);

        // Mensaje::create([
        //     "nombre"     => $request->input('nombre'),
        //     "email"      => $request->input('email'),
        //     "mensaje"    => $request->input('mensaje'),
        //     //   Carbon es un paquete que utiliza laravel para manejar fechas
        //     "created_at" => Carbon::now(),
        //     "updated_at" => Carbon::now(),
        // ]);

        Mensaje::create($request->all());

        return redirect()->route('mensajes.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$mensaje = DB::table('mensajes')->where('id', $id)->first();
        $mensaje = Mensaje::findOrFail($id);
        return view('admin.mensajes.show', compact('mensaje'));
        // El método finOrFail nos ayuda a detectar si se introduce un id que no existe y si lo detecta, falla y redirige a la vista error 404
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$mensaje = DB::table('mensajes')->where('id', $id)->first();
        $mensaje = Mensaje::findOrFail($id);

        return view('admin.mensajes.edit', compact('mensaje'));
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
        $mensaje = Mensaje::findOrFail($id);

        $mensaje->update($request->all());

        // DB::table('mensajes')->where('id', $id)->update([
        //     "nombre"     => $request->input('nombre'),
        //     "email"      => $request->input('email'),
        //     "mensaje"    => $request->input('mensaje'),
        //     // Carbon es un paquete que utiliza laravel para manejar fechas
        //     "updated_at" => Carbon::now(),
        // ]);
        // Redireccionamos a la vista mensajes.index
        return redirect()->route('mensajes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mensaje = Mensaje::findOrFail($id)->delete();

        //DB::table('mensajes')->where('id', $id)->delete();

        return redirect()->route('mensajes.index');
    }
}

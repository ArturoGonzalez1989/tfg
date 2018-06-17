<?php

namespace App\Http\Controllers;

use App\Tematica;
use Illuminate\Http\Request;

class ControladorTematicas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware('roles');
    }

    public function index()
    {
        $tematicas = Tematica::all();

        if (auth()->guest()) {
            return view('usuario.tematicas.index', compact('tematicas'));
        } elseif (auth()->user()->role_id === 2) {
            return view('usuario.tematicas.index', compact('tematicas'));
        } elseif (auth()->user()->role_id === 1) {
            return view('admin.tematicas.index', compact('tematicas'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tematicas = Tematica::all();
        return view('admin.tematicas.create', compact('tematicas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tematica::create($request->all());

        return redirect()->route('tematicas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tematica = Tematica::findOrFail($id);

        return view('admin.tematicas.edit', compact('tematica'));
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
        $tematica = Tematica::findOrFail($id);
        $tematica->update($request->all());

        return redirect()->route('tematicas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tematica = Tematica::findOrFail($id)->delete();

        return redirect()->route('tematicas.index');
    }
}

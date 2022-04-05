<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modelo;
use App\Models\Marca;
use App\Models\Ano;

class ModeloController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $marcas = Marca::all();

        $context = [
            'marcas' => $marcas
        ];

        return view('dash-modelos-crear', $context);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        Modelo::create([
            'nombre' => $request->post('nombre'),
            'marca_id' => $request->post('marca')
        ]);

        $modelos = Modelo::all();

        $context = [
            'modelos' => $modelos
        ];

        return view('dash-modelos', $context);
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
        //
        $modelo = Modelo::find($id);
        $marcas = Marca::all();

        $context = [
            'marcas' => $marcas,
            'modelo' => $modelo
        ];

        return view('dash-modelos-crear', $context);
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
        //

        Modelo::find($id)->update([
            'nombre' => $request->post('nombre'),
            'marca_id' => $request->post('marca')
        ]);

        $modelos = Modelo::all();

        $context = [
            'modelos' => $modelos
        ];

        return view('dash-modelos', $context);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        Modelo::destroy($id);

        $modelos = Modelo::all();

        $context = [
            'modelos' => $modelos
        ];

        return view('dash-modelos', $context);
    }

    public function get_anos($modelo_id)
    {
        $anos = Ano::where('modelo_id', $modelo_id)->get();
        return response()->json([
            'anos' => $anos
        ]);
    }
}

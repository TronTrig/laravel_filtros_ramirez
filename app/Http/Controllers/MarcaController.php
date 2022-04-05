<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
use App\Models\Modelo;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $marcas = Marca::all();

        return response()->json([
            'marcas' => $marcas
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $context = [

        ];
        return view('dash-marcas-crear', $context);
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

        Marca::create([

            'nombre' => $request->post('nombre')

        ]);

        $marcas = Marca::all();

        $context = [

            'marcas' => $marcas

        ];

        return view('dash-marcas', $context);
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


        $marca = Marca::find($id);

        $context = [

            'marca' => $marca

        ];

        return view('dash-marcas-crear', $context);
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

        Marca::find($id)->update([
            'nombre' => $request->post('nombre')
        ]);
        $marcas = Marca::all();
        $context = [
            'marcas' => $marcas
        ];

        return view('dash-marcas', $context);
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
        Marca::destroy($id);

        $marcas = Marca::all();

        $context = [
            'marcas' => $marcas
        ];

        return view('dash-marcas', $context);
    }

    public function get_models($marca_id)
    {
        $modelos = Modelo::where('marca_id', $marca_id)->get();
        return response()->json([
            'modelos' => $modelos
        ]);
    }
}

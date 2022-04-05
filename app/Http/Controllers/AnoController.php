<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ano;
use App\Models\Modelo;
use App\Models\Version;
use App\Models\Marca;

class AnoController extends Controller
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

        $context = [
            'modelos' => Modelo::all(),
            'marcas' => Marca::all()
        ];

        return view( 'dash-anos-crear', $context);

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

        Ano::create([
            'nombre' => $request->post('nombre'),
            'modelo_id' => $request->post('modelo')
        ]);

        $context = [
            'anos' => Ano::all()
        ];

        return view( 'dash-anos', $context);
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
        $ano = Ano::find($id);
         $context = [
            'modelos' => Modelo::all(),
            'marcas' => Marca::all(),
            'ano' => $ano
        ];

        return view( 'dash-anos-crear', $context);
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

        Ano::find($id)->update([
            'nombre' => $request->post('nombre'),
            'modelo_id' => $request->post('modelo')
        ]);

        $context = [
            'anos' => Ano::all()
        ];

        return view( 'dash-anos', $context);
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
        Ano::destroy($id);
        
        $context = [
            'anos' => Ano::all()
        ];

        return view( 'dash-anos', $context);
    }

    public function get_versiones($ano_id)
    {
        $versiones = Version::where('ano_id', $ano_id)->get();
        return response()->json([
            'versiones' => $versiones
        ]);
    }
}

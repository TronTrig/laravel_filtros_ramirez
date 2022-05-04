<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\Marca;
use App\Models\Categoria;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $context = [

            'vehiculos' => Vehiculo::all()

        ];

        return view('dash-vehiculos', $context);
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

            'marcas' => Marca::all()

        ];

        return view('dash-vehiculos-crear', $context);
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

        Vehiculo::create($request->all());

        $context = [

            'vehiculos' => Vehiculo::all()

        ];

        return view('dash-vehiculos', $context);
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
         $context = [

            'marcas' => Marca::all(),
            'vehiculo' => Vehiculo::find($id),
            'modelos' => Vehiculo::find($id)->marca->modelo


        ];

        return view('dash-vehiculos-crear', $context);
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

        Vehiculo::find($id)->update($request->all());

        $context = [

            'vehiculos' => Vehiculo::all()

        ];

        return view('dash-vehiculos', $context);
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

        Vehiculo::destroy($id);

        $context = [

            'vehiculos' => Vehiculo::all()

        ];

        return view('dash-vehiculos', $context);
    }

    public function ver_prodcutos_vehiculo($id)
    {

        $vehiculo = Vehiculo::find($id);
        $productos_vehiculo = $vehiculo->productos;
        $filtros_aire = $productos_vehiculo->where('subcategoria_id', '=', '1');
        $filtros_aceite = $productos_vehiculo->where('subcategoria_id', '=', '2');
        $filtros_gasolina = $productos_vehiculo->where('subcategoria_id', '=', '3');
        $filtros_habitaculo = $productos_vehiculo->where('subcategoria_id', '=', '4');
        $filtros_otros = $productos_vehiculo->where('subcategoria_id', '=', '5');

        $numero_de_elementos = count($filtros_aire);
        $subcategoria_con_mas_elementos = $filtros_aire;

        if ($numero_de_elementos < count($filtros_aceite)) {
            $subcategoria_con_mas_elementos = $filtros_aceite;
        }

        if ($numero_de_elementos < count($filtros_gasolina)) {
            $subcategoria_con_mas_elementos = $filtros_gasolina;
        }
        
        if ($numero_de_elementos < count($filtros_habitaculo)) {
            $subcategoria_con_mas_elementos = $filtros_habitaculo;
        }

        if ($numero_de_elementos < count($filtros_otros)) {
            $subcategoria_con_mas_elementos = $filtros_otros;
        }

        $context = [
            'marcas' => Marca::all(),
            'vehiculo' => $vehiculo,
            'modelos' => Vehiculo::find($id)->marca->modelo,
            'categorias' => Categoria::all(),
            'filtros_aire' => $filtros_aire,
            'filtros_aceite' => $filtros_aceite,
            'filtros_gasolina' => $filtros_gasolina,
            'filtros_habitaculo' => $filtros_habitaculo,
            'filtros_otros' => $filtros_otros,
            'subcategoria_con_mas_elementos' => $subcategoria_con_mas_elementos,
        ];

        return view('vehiculo', $context);
    }


    public function get_versiones_by_model( Request $request, $id)
    {

        return response()->json([
            'versiones' => Vehiculo::where('modelo_id', '=', $id)->get(),
        ]);
    }
}

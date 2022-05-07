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

        $detach = [];

        foreach(Vehiculo::find($id)->productos as $producto){

            $detach[] = $producto->id;    
        }

        Vehiculo::find($id)->productos()->detach($detach);

        Vehiculo::destroy($id);

        $context = [

            'vehiculos' => Vehiculo::all()

        ];

        return view('dash-vehiculos', $context);
    }

    public function ver_prodcutos_vehiculo($id)
    {

        $vehiculo = Vehiculo::find($id);
        $productos_vehiculo = $vehiculo->productos();

        $filtros_aire = $vehiculo->productos()->where('subcategoria_id', '=', '1')->get();

        $filtros_aceite = $vehiculo->productos()->where('subcategoria_id', '=', '2')->get();
        $filtros_gasolina = $vehiculo->productos()->where('subcategoria_id', '=', '3')->get();
        $filtros_habitaculo = $vehiculo->productos()->where('subcategoria_id', '=', '4')->get();
        $filtros_otros = $vehiculo->productos()->where('subcategoria_id', '=', '5')->get();

       

        $numero_de_elementos = $filtros_aire->count();
        
        $subcategoria_con_mas_elementos = $filtros_aire;

        if ($numero_de_elementos < $filtros_aceite->count()) {
            $numero_de_elementos = $filtros_aceite->count();
            $subcategoria_con_mas_elementos = $filtros_aceite;
        }


        if ($numero_de_elementos < $filtros_gasolina->count()) {
            $numero_de_elementos = $filtros_gasolina->count();
            $subcategoria_con_mas_elementos = $filtros_gasolina;
        }
        
        if ($numero_de_elementos < $filtros_habitaculo->count()) {
            $numero_de_elementos = $filtros_habitaculo->count();
            $subcategoria_con_mas_elementos = $filtros_habitaculo;

        }
        

        if ($numero_de_elementos < $filtros_otros->count()) {
            $numero_de_elementos = $filtros_otros->count();
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;

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
            'action' => 'nuevo',
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

        $new_id = Marca::create([

            'nombre' => $request->post('nombre')

        ]);

        if($new_id){

            $nombre = $new_id->id.'.jpg' ;
            $request->file('imagen') ->storeAs('/images/marcas/'.$new_id->id, $nombre , 'public');
            
        }

        $marcas = Marca::all();
        $context = [

            'marcas' => $marcas,


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

            'marca' => $marca,
            'action' => 'edit',

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

         if (!empty($request->file('imagen'))) {
                
                Storage::disk('public')->deleteDirectory('images/marcas/'.$id);

            if($id){

                $nombre = $id.'.jpg' ;
                $request->file('imagen') ->storeAs('/images/marcas/'.$id, $nombre , 'public');
                
            }

        }
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
        Storage::disk('public')->deleteDirectory('images/marcas/'.$id);
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

    public function get_marcas_by_tipos($tipo_nombre)
    {   
        //dd($tipo_nombre);

        //Este codigo hace un query para obtener el id y nombre de las marcas
        //Con vehiculos registrados 
        //Va a ser usado en el Buscador de Filtros
        /*$marcas = Marca::select('marcas.id', 'marcas.nombre')
                    ->join('vehiculos', 'marcas.id', '=', 'vehiculos.marca_id')
                    ->groupBy('marcas.id')
                    ->get();*/

        $marcas = Marca::select('marcas.id', 'marcas.nombre')
                    ->join('vehiculos', 'marcas.id', '=', 'vehiculos.marca_id')
                    ->where('vehiculos.tipo', '=', $tipo_nombre)
                    ->groupBy('marcas.id', 'marcas.nombre')
                    ->get();


                    
        /*$marcas = Marca::select('id', 'nombre')->
                    where('tipo', '=', $tipo_nombre)
                    ->orderBy('nombre', 'asc')
                    ->get();*/
        return response()->json([
            'marcas' => $marcas
        ]);
    }


    public function get_marcas_by_tipos_pagina($tipo_nombre, $tipo_busqueda)
    {   
        //dd($tipo_nombre);

        //Este codigo hace un query para obtener el id y nombre de las marcas
        //Con vehiculos registrados 
        //Va a ser usado en el Buscador de Filtros
        /*$marcas = Marca::select('marcas.id', 'marcas.nombre')
                    ->join('vehiculos', 'marcas.id', '=', 'vehiculos.marca_id')
                    ->groupBy('marcas.id')
                    ->get();*/

        $marcas = Marca::select('marcas.id', 'marcas.nombre')
                    ->join('vehiculos', 'marcas.id', '=', 'vehiculos.marca_id')
                    ->where('vehiculos.tipo', '=', $tipo_nombre)
                    ->groupBy('marcas.id', 'marcas.nombre')
                    ->get();

        $context = [
            'marcas' => $marcas,
            'categorias' => Categoria::all(),
            'tipo_busqueda' => $tipo_busqueda
        ];

        return view('marcas', $context);
    }



     public function get_models_pagina($marca_id, $tipo_busqueda)
    {   
        

        if($tipo_busqueda == 'vehiculo'){
            $modelos = Modelo::where('marca_id', $marca_id)->get();

            $context = [
                'modelos' => $modelos,
                'categorias' => Categoria::all(),    
            ];

        return view('modelos', $context);

        }elseif ($tipo_busqueda == 'aplicacion') {



            $modelos = Modelo::where('marca_id', $marca_id)->get();

            $context = [
                'modelos' => $modelos,
                'categorias' => Categoria::all(),    
            ];

        return view('modelos', $context);



        }

        
    }
}

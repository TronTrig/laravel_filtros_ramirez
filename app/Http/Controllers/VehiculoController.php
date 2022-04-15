<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\Marca;

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
}

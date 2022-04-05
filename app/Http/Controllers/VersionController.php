<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Version;
use App\Models\Modelo;
use App\Models\Marca;
use App\Models\Ano
;
class VersionController extends Controller
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
            'anos' => Ano::all(),
            'modelos' => Modelo::all(),
            'marcas' => Marca::all()
        ];

        return view('dash-versiones-crear', $context);

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


        Version::create([
            'nombre' => $request->post('nombre'),
            'ano_id' => $request->post('ano')
        ]);

        $context = [
            'versiones' => Version::all()
        ];

        return view( 'dash-versiones', $context);

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

        $version = Version::find($id);

         $context = [
            'anos' => Ano::all(),
            'modelos' => Modelo::all(),
            'marcas' => Marca::all(),
            'version' => $version
        ];

        return view('dash-versiones-crear', $context);
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

        Version::find($id)->update([
            'nombre' => $request->post('nombre'),
            'ano_id' => $request->post('ano')
        ]);

        $context = [
            'versiones' => Version::all()
        ];

        return view( 'dash-versiones', $context);

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

        Version::destroy($id);
        
        $context = [
            'versiones' => Version::all()
        ];

        return view( 'dash-versiones', $context);
    }
}

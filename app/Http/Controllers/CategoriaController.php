<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    //

    public function index()
    {   

        $categorias = Categoria::all();

        return response()->json([

            'categorias' => $categorias

        ]);
    }

    public function create()
    {

        $context = [



        ];

        return view('dash-categorias-crear', $context);
    }

    public function store(Request $request)
    {   

        Categoria::create([
            'nombre' => $request->post('nombre')
        ]);

        $categorias = Categoria::all();
        $context = [
            'categorias' => $categorias
        ];

        return view('dash-categorias', $context);
    }

    public function edit($id)
    {
        $categoria = Categoria::find($id);

        $context = [

            'categoria' => $categoria

        ];

        return view('dash-categorias-crear', $context);
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

        Categoria::find($id)->update([
            'nombre' => $request->post('nombre')
        ]);
        $categorias = Categoria::all();
        $context = [
            'categorias' => $categorias
        ];

        return view('dash-categorias', $context);
    }


    public function destroy($id)
    {
        //

        Categoria::destroy($id);

        $categorias = Categoria::all();
        $context = [
            'categorias' => $categorias
        ];

        return view('dash-categorias', $context);   
    }
}

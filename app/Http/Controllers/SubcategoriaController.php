<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategoria;
use App\Models\Categoria;
use Illuminate\Http\Response;

class SubcategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $subcategorias = Subcategoria::all();

        return resposnse()->json([

            'subcategorias' => $subcategorias

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

        $categorias = Categoria::all();
        $context = [
            'categorias' => $categorias

        ];

        return view('dash-subcategorias-crear', $context);
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

        Subcategoria::create([
            'nombre' => $request->post('nombre'),
            'categoria_id' => $request->post('categoria')
        ]);

        $subcategorias = Subcategoria::all();
        $context = [
            'subcategorias' => $subcategorias
        ];
        
        return view('dash-subcategorias', $context);
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

        $subcategoria = Subcategoria::find($id);
        $categorias = Categoria::all();
        $context = [
            'categorias' => $categorias,
            'subcategoria' => $subcategoria

        ];

        return view('dash-subcategorias-crear', $context);
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

        Subcategoria::find($id)->update([
            'nombre' => $request->post('nombre'),
            'categoria_id' => $request->post('categoria')
        ]);

        $subcategorias = Subcategoria::all();
        $context = [
            'subcategorias' => $subcategorias
        ];
        
        return view('dash-subcategorias', $context);
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
        Subcategoria::destroy($id);

        $subcategorias = Subcategoria::all();
        $context = [
            'subcategorias' => $subcategorias
        ];
        return view('dash-subcategorias', $context);
    }
}

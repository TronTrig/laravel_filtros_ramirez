<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategoria;


class SubategoriaController extends Controller
{
    //

    public function index()
    {

        $subcategorias = Subcategoria::all();

        return resposnse()->json([

            'subcategorias' => $subcategorias

        ]);
    }
}

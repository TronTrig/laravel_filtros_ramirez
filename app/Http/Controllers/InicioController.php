<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Support\Facades\Storage;

class InicioController extends Controller
{
        //

    public function index()
    {
      //  $productos = producto::all()
        $promocionados = Producto::where('promocionado', 1)->take(8)->get();
    //este for es para hacer dummies de productos

        $dummy_promocionados = [];

        for ($i=0; $i < 8; $i++) { 

            foreach ($promocionados as $key => $promocionado) {
                $files_in_directory = Storage::disk('public')->files('images/productos/'.$promocionado->id);
               //  dd(count($files_in_directory));
                 $promocionado->number_imgs = count($files_in_directory);

                 $dummy_promocionados[] = $promocionado;
            }
        }
        

        //  $productos = producto::all()
        $mas_vendidos = Producto::all()->sortByDesc('numero_ventas')->take(8);
    //este for es para hacer dummies de productos

        $dummy_mas_vendidos = [];


       // for ($i=0; $i < 4; $i++) { 
            foreach ($mas_vendidos as $key => $vendido) {

                 $files_in_directory = Storage::disk('public')->files('images/productos/'.$vendido->id);
               //  dd(count($files_in_directory));
                 $vendido->number_imgs = count($files_in_directory);
                // dd($vendido->number_imgs);
                 $dummy_mas_vendidos[] = $vendido;
            }


            $tipos = [
                        [ 'nombre' => 'automóviles ligeros', 'nombre_img' => 'autos-ligeros.jpg'],
                        [ 'nombre' => 'camiones y autobuses', 'nombre_img' => 'camion.png'],
                        [ 'nombre' => 'vehículos pesados y máquinas', 'nombre_img' => 'maquinaria-pesada.jpg'],
                        [ 'nombre' => 'agrícolas', 'nombre_img' => 'tractor.png'],
                        [ 'nombre' => 'marinos', 'nombre_img' => 'marinos.jpg'],
                        [ 'nombre' => 'otros vehículos y máquinas', 'nombre_img' => 'otros.jpg'],
                        [ 'nombre' => 'motocicletas', 'nombre_img' => 'motos.png'],
                        [ 'nombre' => 'quads', 'nombre_img' => 'quads.jpg'],
                    ];


        $categorias = Categoria::all();
        $marcas = Marca::all();

        return view('inicio', [
        
            'promocionados' => $dummy_promocionados,
            'mas_vendidos' => $dummy_mas_vendidos,
            'categorias' => $categorias,
            'marcas' => $marcas,
            'tipos' => $tipos,

            ]

        );
    }

    public function show(Request $request, $producto_id)
    {   


        if ($request->isMethod('get')) {

            $producto = Producto::find($producto_id);

            if ($request->query('for') == 'modal') {
                // code...
            
                return response()->json([
                    'id' => $producto->id,
                    'nombre' => $producto->nombre,
                    'descripcion' => $producto->descripcion,
                    'precio' => $producto->precio
                ]);
            }
        }
        

       
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Subcategoria;
use App\Models\Version;
use App\Models\Ano;
use App\Models\Modelo;
use App\Models\Marca;
use Illuminate\Support\Facades\Storage;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productos = Producto::all();

        return response()->json([
            'productos' => $productos
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
        $subcategorias = Subcategoria::all();
        $context = [

            'subcategorias' => $subcategorias,
            'versiones' => Version::all(),
            'modelos' => Modelo::all(),
            'anos' => Ano::all(),
            'marcas' => Marca::all()

        ];
        return view('dash-productos-crear', $context);
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


        $categoria_id = Subcategoria::find($request->post('subcategoria'))->categoria->id;
        $data = [
            'sku' => $request->post('sku'),
            'id_sistema_administrativo' => $request->post('id-sistema-administrativo'),
            'id_numero_parte' => $request->post('numero-parte'),
            'nombre' => $request->post('nombre'),
            'subcategoria_id' => $request->post('subcategoria'),
            'descripcion' => $request->post('descripcion'),
            'caracteristicas' => $request->post('caracteristicas'),
            'peso' => $request->post('peso'),
            'dimensiones' => $request->post('dimensiones'),
            'precio' => $request->post('precio'),
            'promocionado' => ($request->post('promocionado') == '1') ? true : false ,
            'categoria_id' => $categoria_id,
            'version_id' => $request->post('version'),
            'ano_id' => $request->post('ano'),
            'modelo_id' => $request->post('modelo'),
            'marca_id' => $request->post('marca')
        ];

        $id = Producto::create($data)->id;
            //$id = 23;
            $i = 0;
            foreach($request->file('imagenes') as $file)
            {   
               // dd($file);
                $i++;
                $nombre = $i.'.jpg' ;
                $file->storeAs('/images/productos/'.$id, $nombre , 'public');
            }

//             dd($request);



        $productos = Producto::all();
        $context = [

            'productos' => $productos

        ];
        return view( 'dash-productos' , $context);
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

        $producto = Producto::find($id);

        $subcategorias = Subcategoria::all();

        $producto->number_imgs = Storage::disk('public')->files('images/productos/'.$id);

        $context = [

            'subcategorias' => $subcategorias,
            'versiones' => Version::all(),
            'modelos' => Modelo::all(),
            'anos' => Ano::all(),
            'marcas' => Marca::all(),
            'producto' => $producto

        ];
        return view('dash-productos-crear', $context);
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

        return $request->all();
        //$categoria_id = Subcategoria::find($request->post('subcategoria'))->categoria->id;
        /*$data = [
            'sku' => $request->post('sku'),
            'id_sistema_administrativo' => $request->post('id-sistema-administrativo'),
            'id_numero_parte' => $request->post('numero-parte'),
            'nombre' => $request->post('nombre'),
            'subcategoria_id' => $request->post('subcategoria'),
            'descripcion' => $request->post('descripcion'),
            'caracteristicas' => $request->post('caracteristicas'),
            'peso' => $request->post('peso'),
            'dimensiones' => $request->post('dimensiones'),
            'precio' => $request->post('precio'),
            'promocionado' => ($request->post('promocionado') == '1') ? true : false ,
            'categoria_id' => $categoria_id,
            'version_id' => $request->post('version'),
            'ano_id' => $request->post('ano'),
            'modelo_id' => $request->post('modelo'),
            'marca_id' => $request->post('marca')
        ];*/

       // $id = Producto::find($id)->update($data)->id;

          //  Storage::disk('public')->deleteDirectory('images/productos/'.$id);
            //$id = 23;
            $i = 0;
           /* foreach($request->file('imagenes') as $file)
            {   
               // dd($file);
                $i++;
                $nombre = $i.'.jpg' ;
                $file->storeAs('/images/productos/'.$id, $nombre , 'public');
            }*/

//             dd($request);



        $productos = Producto::all();
        $context = [

            'productos' => $productos

        ];
        return view( 'dash-productos' , $context);
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

        Producto::destroy($id);
        Storage::disk('public')->deleteDirectory('images/productos/'.$id);
        $productos = Producto::all();

        $context = [
            'productos' => $productos
        ];

        return view('dash-productos', $context);
    }

    public function guardar(Request $request, $id)
    {
        //

        
        $categoria_id = Subcategoria::find($request->post('subcategoria'))->categoria->id;
       $data = [
            'sku' => $request->post('sku'),
            'id_sistema_administrativo' => $request->post('id-sistema-administrativo'),
            'id_numero_parte' => $request->post('numero-parte'),
            'nombre' => $request->post('nombre'),
            'subcategoria_id' => $request->post('subcategoria'),
            'descripcion' => $request->post('descripcion'),
            'caracteristicas' => $request->post('caracteristicas'),
            'peso' => $request->post('peso'),
            'dimensiones' => $request->post('dimensiones'),
            'precio' => $request->post('precio'),
            'promocionado' => ($request->post('promocionado') == '1') ? true : false ,
            'categoria_id' => $categoria_id,
            'version_id' => $request->post('version'),
            'ano_id' => $request->post('ano'),
            'modelo_id' => $request->post('modelo'),
            'marca_id' => $request->post('marca')
        ];
        Producto::find($id)->update($data);

            Storage::disk('public')->deleteDirectory('images/productos/'.$id);
            //$id = 23;
            $i = 0;
           foreach($request->file('imagenes') as $file)
            {   
               // dd($file);
                $i++;
                $nombre = $i.'.jpg' ;
                $file->storeAs('/images/productos/'.$id, $nombre , 'public');
            }

//             dd($request);



        $productos = Producto::all();
        $context = [

            'productos' => $productos

        ];
        return view( 'dash-productos' , $context);
    }

}

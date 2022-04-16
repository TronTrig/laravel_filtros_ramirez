<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Subcategoria;
use App\Models\Marca;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{ 
    //

    public function index(Request $request )
    {   
       $productos = Producto::all();

       $categorias = Categoria::all();
       $marcas = Marca::all();

       foreach ($productos as $key => $producto) {
           $number_imgs = Storage::disk('public')->files('images/productos/'.$producto->id);
           $producto->number_imgs = count($number_imgs);
       }
    
        return view('productos',[

            'productos' => $productos,
            'categorias' => $categorias,
            'marcas' => $marcas

        ]);
    }

    public function cart()
    {
        return view('carrito');
    }


    public function addToCart(Request $request, $id)
    {

        $product = Producto::find($id);

        if(!$product) {
            abort(404);
        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $id => [
                        "nombre" => $product->nombre,
                        "cantidad" => $request->query('cantidad'),
                        "precio" => $product->precio,
                        "id" => $id
                    ]
            ];

        session()->put('cart', $cart);

        return response()->json([
            'success' => '1',
            'new' => true,
            'added' => $cart[$id],
            'cart' => $cart
        ]);


        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['cantidad'] = $request->query('cantidad');

            session()->put('cart', $cart);

            return response()->json([
                'success' => '1',
                'new' => false,
                'added' => $cart[$id],
                'cart' => $cart
            ]);

        }else{

            // if item not exist in cart then add to cart with quantity = 1
            $cart[$id] = [
                "nombre" => $product->nombre,
                "cantidad" => $request->query('cantidad'),
                "precio" => $product->precio,
                "id" => $id
            ];
            session()->put('cart', $cart);
     
            return response()->json([
                'success' => '1',
                'added' => $cart[$id],
                'cart' => $cart
            ]);

        }


        

    }

    public function removeFromCart(Request $request, $id)
    {

        $cart = session()->get('cart');
        unset($cart[$id]);
        session()->put('cart', $cart);
        $cart = session()->get('cart');

        return response()->json([
            'success' => '1',
            'cart' => $cart
        ]);
    }

    public function buscarCategoria(Request $request, $categoria)
    {
        $categoria_buscada = Categoria::where('slug', $categoria)->first();

        $productos = Producto::where('categoria_id', $categoria_buscada->id)->take(12)->get();
        $categorias = Categoria::all();
        $marcas = Marca::all();

        foreach ($productos as $key => $producto) {
            
            $number_imgs = Storage::disk('public')->files('images/productos/'.$producto->id);

            $producto->number_imgs = $number_imgs;
        }

        return view('productos',[

            'productos' => $productos,
            'categorias' => $categorias,
            'marcas' => $marcas

        ]);

    }


        public function buscarSubCategoria(Request $request, $categoria, $subcategoria)
    {   
        /*if (strpos($subcategoria, '-')) {
            $subcategoria = str_replace('-', ' ', $subcategoria);
        }*/

        $subcategoria_buscada = Subcategoria::where('slug', $subcategoria)->first();

       
        $productos = Producto::where('subcategoria_id', $subcategoria_buscada->id)->take(12)->get();

        $categorias = Categoria::all();
        $marcas = Marca::all();

        foreach ($productos as $key => $producto) {
            $number_imgs = Storage::disk('public')->files('images/productos/'.$producto->id);
            $producto->number_imgs = count($number_imgs);
        }

        return view('productos',[

            'productos' => $productos,
            'subcategoria' => $subcategoria,
            'categorias' => $categorias,
            'marcas' => $marcas

        ]);

    }

    public function buscar(Request $request)
    {

        if ( strpos($request->post('search-category'), '|')) {
            
           $scat = explode('|', $request->post('search-category'));
           $scat = $scat[1];
           $search = $request->post ('value-search');
           $productos = Producto::where([
                            ['nombre', 'like', '%'.$search.'%'],
                            ['subcategoria_id', $scat]
                            ])->get();

        }else{

           $cat = $request->post('search-category');
           $search = $request->post ('value-search');
           $productos = Producto::where([
                            ['nombre', 'like', '%'.$search.'%'],
                            ['categoria_id', $cat]
                            ])->get();

        }

        if(  $request->post('search-category') == 'todos'){
            $productos = Producto::where('nombre', 'like', '%'.$search.'%')->get();
        }
       
        $categorias = Categoria::all();
        $marcas = Marca::all();

        foreach ($productos as $key => $producto) {
            $number_imgs = Storage::disk('public')->files('images/productos/'.$producto->id);

            $producto->number_imgs = count($number_imgs);
        }

        return view('productos',[

            'productos' => $productos,
            'categorias' => $categorias,
            'marcas' => $marcas

        ]);

    }


    public function busca_por_filtro(Request $request){

        if ($request->get('bf-modelo') != '0') {

            $modelo_id = $request->get('bf-modelo');
            $productos = Producto::where('modelo_id', $modelo_id)->get();            
            
        }elseif ($request->get('bf-marca') != '0') {

            $marca_id = $request->get('bf-marca');
            $productos = Producto::where('marca_id', $marca_id)->get();  
        
        }elseif ($request->get('bf-marca') == '0') {

            $productos = Producto::all();

        }
       
        $categorias = Categoria::all();
        $marcas = Marca::all();

        foreach ($productos as $key => $producto) {
            $number_imgs = Storage::disk('public')->files('images/productos/'.$producto->id);

            $producto->number_imgs = count($number_imgs);
        }

        return view('productos',[

            'productos' => $productos,
            'categorias' => $categorias,
            'marcas' => $marcas

        ]);

    }
}

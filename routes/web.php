<?php

use Illuminate\Support\Facades\Route;


use App\User;

use App\Http\Controllers\InicioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SubcategoriaController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\VehiculoController;
use App\Models\Categoria;
use App\Models\Subcategoria;
use App\Models\Producto;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Vehiculo;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/dashboard', function () {
    return view('dash-productos', [
        'productos' => Producto::all()
    ]);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

///
Route::get('/container', function () {
    return view('layouts.container');
})->middleware(['auth']);

Route::get('/tables', function () {

            $subcategorias = Subcategoria::all();
        $context = [

            'subcategorias' => $subcategorias,
            'modelos' => Modelo::all(),
            'marcas' => Marca::all()

        ];
        return view('layouts.tables', $context);
})->middleware(['auth']);

///



Route::get('/dash-categorias', function () {
    return view('dash-categorias', [
        'categorias' => Categoria::all()
    ]);
})->middleware(['auth'])->name('dash-categorias');

Route::get('/dash-subcategorias', function () {
    return view('dash-subcategorias', [
        'subcategorias' => Subcategoria::all()
    ]);
})->middleware(['auth'])->name('dash-subcategorias');

Route::get('/dash-productos', function () {
    return view('dash-productos', [
         'productos' => Producto::all()
    ]);
})->middleware(['auth'])->name('dash-productos');

Route::get('/dash-marcas', function(){
    return view('dash-marcas', [
        'marcas' => Marca::all()
    ]);
})->middleware(['auth'])->name('dash-marcas');

Route::get('/dash-modelos', function(){
    return view('dash-modelos', [
        'modelos' => Modelo::all()
    ]);
})->middleware(['auth'])->name('dash-modelos');

Route::get('/dash-vehiculos', function(){
    return view('dash-vehiculos', [
        'vehiculos' => Vehiculo::all()
    ]);
})->middleware(['auth'])->name('dash-vehiculos');


Route::post(
    '/dproductos/guardar/{id}',
    [ProductosController::class, 'guardar']
);




Route::resource('categorias', CategoriaController::class)
    ->middleware(['auth']);

Route::resource('subcategorias', SubcategoriaController::class)
    ->middleware(['auth']);

Route::resource('dproductos', ProductosController::class)
    ->middleware(['auth']);

Route::resource('marcas', MarcaController::class)
    ->middleware(['auth']);

Route::resource('modelos', ModeloController::class)
    ->middleware(['auth']);

Route::resource('vehiculos', VehiculoController::class)
    ->middleware(['auth']);


Route::get(
    '/',
    [InicioController::class, 'index']
);

Route::get(
    '/producto/{id}',
    [InicioController::class, 'show']
);

Route::get(
    '/producto/{id}',
    [InicioController::class, 'show']
);


Route::get(
    '/productos',
    [ProductoController::class, 'index']
);

Route::post(
    '/buscar',
    [ProductoController::class, 'buscar']
);

Route::get(
    '/buscar',
    [ProductoController::class, 'buscar']
);


Route::get(
    '/carrito',
    [ProductoController::class, 'cart']
);

Route::get(
    '/add-to-cart/{id}',
    [ProductoController::class, 'addToCart']
);

Route::get(
    '/remove-from-cart/{id}',
    [ProductoController::class, 'removeFromCart']
);

Route::get(
    '/productos/{categoria}',
    [ProductoController::class, 'buscarCategoria']
);

Route::get(
    '/productos/{categoria}/{subcategoria}',
    [ProductoController::class, 'buscarSubCategoria']
);

Route::get('/vehiculos', function(){
    return view('vehiculos', [
        'vehiculos' => Vehiculo::all()
    ]);
})->middleware(['auth'])->name('vehiculos');


Route::get('/marcas', [MarcaController::class, 'index']);

Route::get('/marcas/{marca_id}/modelos', [MarcaController::class, 'get_models']);

Route::get('/modelos/{modelo_id}/versiones', [VehiculoController::class, 'get_versiones_by_model']);


Route::post('/buscar-por-vehiculo', [ProductoController::class, 'busca_por_filtro']);

Route::get('/ver-vehiculo/{id}', [VehiculoController::class, 'ver_prodcutos_vehiculo']);

Route::get('/tipos/{tipo_nombre}/marcas', [MarcaController::class, 'get_marcas_by_tipos']);

Route::get('/tipo/{tipo_nombre}/marcas', [MarcaController::class, 'get_marcas_by_tipos_pagina']);

Route::get('/marca/{marca_id}/modelos', [MarcaController::class, 'get_models_pagina']);

Route::get('/modelo/{modelo_id}/versiones', [VehiculoController::class, 'get_versiones_by_model_pagina']);


Route::post(
    '/buscar-por-vehiculo',
    [ProductoController::class, 'busca_por_filtro']
);

Route::get(
    '/buscar-por-vehiculo',
    [ProductoController::class, 'busca_por_filtro']
);

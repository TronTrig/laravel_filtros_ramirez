<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            'nombre' => 'Lubricantes SKY ALTO-KILOMETRAJE-25W60 Cadillac Scalade 2013',
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodoconsequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat nonproident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'precio' => 83.00,
            'promocionado' => 1,
            'numero_ventas' => 10,
            'categoria_id' => 2,
            'subcategoria_id' => 5,
            'version_id' => 1,
            'ano_id' => 1,
            'modelo_id' => 1,
            'marca_id' => 1
            
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Cauchos MAXXIS 285-75R16-AT771-8PR Chevrolet Super Carry 2020',
            'categoria_id' => 3,
            'subcategoria_id' => 8,
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'precio' => 183.00,
            'promocionado' => 0,
            'numero_ventas' => 20,
            'version_id' => 2,
            'ano_id' => 2,
            'modelo_id' => 2,
            'marca_id' => 1
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Repuestos Correa Isuzu NPR 2021',
            'categoria_id' => 4,
            'subcategoria_id' => 11,
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'precio' => 13.00,
            'promocionado' => 1,
            'numero_ventas' => 23,
            'version_id' => 3,
            'ano_id' => 3,
            'modelo_id' => 2,
            'marca_id' => 1
        ]);

         DB::table('productos')->insert([
            'nombre' => 'Cauchos Isuzu luv 2009',
            'categoria_id' => 3,
            'subcategoria_id' => 8,
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'precio' => 193.00,
            'promocionado' => 1,
            'numero_ventas' => 3,
            'version_id' => 4,
            'ano_id' => 4,
            'modelo_id' => 2,
            'marca_id' => 1
        ]);

         DB::table('productos')->insert([
            'nombre' => 'Filtros Wix Suzuki Vitara 2013',
            'categoria_id' => 1,
            'subcategoria_id' => 3,
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'precio' => 93.00,
            'promocionado' => 1,
            'numero_ventas' => 4,
            'version_id' => 5,
            'ano_id' => 5,
            'modelo_id' => 3,
            'marca_id' => 1
        ]);

         DB::table('productos')->insert([
            'nombre' => 'Repuestos Luces Traseras Suzuki Vitara 2013',
            'categoria_id' => 4,
            'subcategoria_id' => 13,
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'precio' => 23.00,
            'promocionado' => 1,
            'numero_ventas' => 1,
            'version_id' => 6,
            'ano_id' => 6,
            'modelo_id' => 4,
            'marca_id' => 1
        ]);


        DB::table('productos')->insert([
            'nombre' => 'Filtros Blanco Wix Cadillac Scalade 2014',
            'categoria_id' => 1,
            'subcategoria_id' => 2,
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'precio' => 13.00,
            'promocionado' => 1,
            'numero_ventas' => 1,
            'version_id' => 7,
            'ano_id' => 7,
            'modelo_id' => 5,
            'marca_id' => 1
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Filtros Grises Cadillac Scalade 2015',
            'categoria_id' => 1,
            'subcategoria_id' => 4,
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'precio' => 213.00,
            'promocionado' => 0,
            'numero_ventas' => 0,
            'version_id' => 8,
            'ano_id' => 8,
            'modelo_id' => 6,
            'marca_id' => 2
        ]);



    }
}

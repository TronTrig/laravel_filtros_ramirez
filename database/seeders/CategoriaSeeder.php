<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categorias')->insert([

            'nombre' => 'filtros',
            'slug' => 'filtros',
            'descripcion' => 'descripcion de filtros'

        ]);

         DB::table('categorias')->insert([

            'nombre' => 'lubricantes',
            'slug' => 'lubricantes',
            'descripcion' => 'descripcion de lubricantes'

        ]);

        DB::table('categorias')->insert([

            'nombre' => 'cauchos',
            'slug' => 'cauchos',
            'descripcion' => 'descripcion de cauchos'

        ]);

        DB::table('categorias')->insert([

            'nombre' => 'repuestos',
            'slug' => 'repuestos',
            'descripcion' => 'descripcion de repuestos'

        ]);
    }
}

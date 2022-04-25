<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //subcategorias de filtros
        DB::table('subcategorias')->insert([

            'nombre' => 'de aire',
            'slug' => 'de-aire',
            'descripcion' => 'subcategoria de filtros',
            'categoria_id' => 1

        ]);

        DB::table('subcategorias')->insert([

            'nombre' => 'de aceite',
            'slug' => 'de-aceite',
            'descripcion' => 'subcategoria de filtros',
            'categoria_id' => 1

        ]);

        DB::table('subcategorias')->insert([

            'nombre' => 'de combustible',
            'slug' => 'de-combustible',
            'descripcion' => 'subcategoria de filtros',
            'categoria_id' => 1

        ]);

        DB::table('subcategorias')->insert([

            'nombre' => 'de habítaculo',
            'slug' => 'de-habitaculo',
            'descripcion' => 'subcategoria de filtros',
            'categoria_id' => 1

        ]);

         DB::table('subcategorias')->insert([

            'nombre' => 'de otros',
            'slug' => 'de-otros',
            'descripcion' => 'subcategoria de filtros',
            'categoria_id' => 1

        ]);



        //De Lubricantes
        DB::table('subcategorias')->insert([

            'nombre' => 'de motor',
            'slug' => 'de-motor',
            'descripcion' => 'subcategoria de lubricantes',
            'categoria_id' => 2

        ]);

        DB::table('subcategorias')->insert([

            'nombre' => 'de transfer',
            'slug' => 'de-transfer',
            'descripcion' => 'subcategoria de lubricantes',
            'categoria_id' => 2

        ]);

        DB::table('subcategorias')->insert([

            'nombre' => 'mineral',
            'slug' => 'mineral',
            'descripcion' => 'subcategoria de lubricantes',
            'categoria_id' => 2

        ]);

        //De Cauchos

        DB::table('subcategorias')->insert([

            'nombre' => 'cotidianos',
            'slug' => 'cotidianos',
            'descripcion' => 'subcategoria de cauchos',
            'categoria_id' => 3

        ]);

        DB::table('subcategorias')->insert([

            'nombre' => 'camiones',
            'slug' => 'camiones',
            'descripcion' => 'subcategoria de cauchos',
            'categoria_id' => 3

        ]);

        DB::table('subcategorias')->insert([

            'nombre' => 'todo terreno',
            'slug' => 'todo-terreno',
            'descripcion' => 'subcategoria de cauchos',
            'categoria_id' => 3

        ]);

        //De Repuestos


        DB::table('subcategorias')->insert([

            'nombre' => 'de motor',
            'slug' => 'de-motor',
            'descripcion' => 'subcategoria de repuestos',
            'categoria_id' => 4

        ]);

        DB::table('subcategorias')->insert([

            'nombre' => 'eléctricos',
            'slug' => 'electricos',
            'descripcion' => 'subcategoria de repuestos',
            'categoria_id' => 4

        ]);

        DB::table('subcategorias')->insert([

            'nombre' => 'luces',
            'slug' => 'luces',
            'descripcion' => 'subcategoria de repuestos',
            'categoria_id' => 4

        ]);

    }
}

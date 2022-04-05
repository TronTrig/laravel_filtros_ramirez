<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('anos')->insert([

            'nombre' => '2000',
            'descripcion' => 'descripcion del año',
            'modelo_id' => 1 # Van Express 1
        ]);

         DB::table('anos')->insert([

            'nombre' => '2010',
            'descripcion' => 'descripcion del año',
            'modelo_id' => 2 # Tahoe 2
        ]);

          DB::table('anos')->insert([

            'nombre' => '2011',
            'descripcion' => 'descripcion del año',
            'modelo_id' => 2 #  Tahoe 3
        ]);

        DB::table('anos')->insert([

            'nombre' => '2012',
            'descripcion' => 'descripcion del año',
            'modelo_id' => 2 #  Tahoe 4 
        ]);

        DB::table('anos')->insert([

            'nombre' => '2012',
            'descripcion' => 'descripcion del año',
            'modelo_id' => 3 #  SuperCarry 5
        ]);

        DB::table('anos')->insert([

            'nombre' => '2015',
            'descripcion' => 'descripcion del año',
            'modelo_id' => 4 #  SuperCarry 6
        ]);

        DB::table('anos')->insert([

            'nombre' => '2015',
            'descripcion' => 'descripcion del año',
            'modelo_id' => 5 #  SuperCarry 7
        ]);

        DB::table('anos')->insert([

            'nombre' => '2016',
            'descripcion' => 'descripcion del año',
            'modelo_id' => 6 #  SuperCarry 8
        ]);

        DB::table('anos')->insert([

            'nombre' => '2016',
            'descripcion' => 'descripcion del año',
            'modelo_id' => 7 #  SuperCarry
        ]);

        DB::table('anos')->insert([

            'nombre' => '2016',
            'descripcion' => 'descripcion del año',
            'modelo_id' => 8 #  SuperCarry
        ]);

        DB::table('anos')->insert([

            'nombre' => '2016',
            'descripcion' => 'descripcion del año',
            'modelo_id' => 9 #  SuperCarry
        ]);

        DB::table('anos')->insert([

            'nombre' => '2016',
            'descripcion' => 'descripcion del año',
            'modelo_id' => 10 #  SuperCarry
        ]);

        DB::table('anos')->insert([

            'nombre' => '2016',
            'descripcion' => 'descripcion del año',
            'modelo_id' => 11 #  SuperCarry
        ]);

        DB::table('anos')->insert([

            'nombre' => '2016',
            'descripcion' => 'descripcion del año',
            'modelo_id' => 12 #  SuperCarry
        ]);

        DB::table('anos')->insert([

            'nombre' => '2016',
            'descripcion' => 'descripcion del año',
            'modelo_id' => 13 #  SuperCarry
        ]);
    }
}

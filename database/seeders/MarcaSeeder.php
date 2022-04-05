<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('marcas')->insert([

            'nombre' => 'chevroled',
            'descripcion' => 'descripcion de marca Chevroled'

        ]);

        DB::table('marcas')->insert([

            'nombre' => 'cadillac',
            'descripcion' => 'descripcion de marca Chevroled'

        ]);

        DB::table('marcas')->insert([

            'nombre' => 'hummer',
            'descripcion' => 'descripcion de marca hummer'

        ]);

        DB::table('marcas')->insert([

            'nombre' => 'gmc',
            'descripcion' => 'descripcion de marca gmc'

        ]);

        DB::table('marcas')->insert([

            'nombre' => 'suzuki',
            'descripcion' => 'descripcion de marca suzuki'

        ]);


        DB::table('marcas')->insert([

            'nombre' => 'isuzu',
            'descripcion' => 'descripcion de marca isuzu'

        ]);
    }
}

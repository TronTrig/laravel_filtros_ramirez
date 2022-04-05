<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModeloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Modelos De Chevroled

        DB::table('modelos')->insert([

            'nombre' => 'van express',
            'descripcion' => 'modelo de chevroled',
            'marca_id' => 1 
            #1
        ]);

        DB::table('modelos')->insert([

            'nombre' => 'tahoe',
            'descripcion' => 'modelo de chevroled',
            'marca_id' => 1 
            #2
        ]);

        DB::table('modelos')->insert([

            'nombre' => 'super carry',
            'descripcion' => 'modelo de chevroled',
            'marca_id' => 1 
            #3
        ]);

        DB::table('modelos')->insert([

            'nombre' => 'sunfire',
            'descripcion' => 'modelo de chevroled',
            'marca_id' => 1 
            #4
        ]);

        DB::table('modelos')->insert([

            'nombre' => 'spark',
            'descripcion' => 'modelo de chevroled',
            'marca_id' => 1 
            #5
        ]);

        //Modelos De Cadillac

        DB::table('modelos')->insert([

            'nombre' => 'scalade',
            'descripcion' => 'modelo de Cadillac',
            'marca_id' => 2 
            #6
        ]);

        //Modelos De GMC

        DB::table('modelos')->insert([

            'nombre' => 'trailblazer',
            'descripcion' => 'modelo de chevroled',
            'marca_id' => 4 

        ]);


        //Modelos De Hummer

        DB::table('modelos')->insert([

            'nombre' => 'hummer',
            'descripcion' => 'modelo de Hummer',
            'marca_id' => 3

        ]);

        //Modelos De Suzuki

        DB::table('modelos')->insert([

            'nombre' => 'npr',
            'descripcion' => 'modelo de Isuzu',
            'marca_id' => 6 

        ]);

        DB::table('modelos')->insert([

            'nombre' => 'nhr',
            'descripcion' => 'modelo de Isuzu',
            'marca_id' => 6 

        ]);

        DB::table('modelos')->insert([

            'nombre' => 'luv',
            'descripcion' => 'modelo de Isuzu',
            'marca_id' => 6 

        ]);

        //Modelos De Suzuki

        DB::table('modelos')->insert([

            'nombre' => 'vitara',
            'descripcion' => 'modelo de suzuki',
            'marca_id' => 5 

        ]);


        DB::table('modelos')->insert([

            'nombre' => 'swift',
            'descripcion' => 'modelo de suzuki',
            'marca_id' => 5 

        ]);




    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VersionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('versions')->insert([
            'nombre' => 'version 1',
            'descripcion' => 'descripcion de version',
            'ano_id' => 1

        ]);

        DB::table('versions')->insert([
            'nombre' => 'version 2',
            'descripcion' => 'descripcion de version',
            'ano_id' => 2

        ]);

        DB::table('versions')->insert([
            'nombre' => 'version 3',
            'descripcion' => 'descripcion de version',
            'ano_id' => 3

        ]);

        DB::table('versions')->insert([
            'nombre' => 'version 4',
            'descripcion' => 'descripcion de version',
            'ano_id' => 4

        ]);

        DB::table('versions')->insert([
            'nombre' => 'version 5',
            'descripcion' => 'descripcion de version',
            'ano_id' => 5

        ]);

        DB::table('versions')->insert([
            'nombre' => 'version 6',
            'descripcion' => 'descripcion de version',
            'ano_id' => 6

        ]);

        DB::table('versions')->insert([
            'nombre' => 'version 7',
            'descripcion' => 'descripcion de version',
            'ano_id' => 7

        ]);

        DB::table('versions')->insert([
            'nombre' => 'version 8',
            'descripcion' => 'descripcion de version',
            'ano_id' => 8

        ]);

        DB::table('versions')->insert([
            'nombre' => 'version 9',
            'descripcion' => 'descripcion de version',
            'ano_id' => 9

        ]);

        DB::table('versions')->insert([
            'nombre' => 'version 10',
            'descripcion' => 'descripcion de version',
            'ano_id' => 10

        ]);

        DB::table('versions')->insert([
            'nombre' => 'version 11',
            'descripcion' => 'descripcion de version',
            'ano_id' => 11

        ]);

        DB::table('versions')->insert([
            'nombre' => 'version 12',
            'descripcion' => 'descripcion de version',
            'ano_id' => 12

        ]);

        DB::table('versions')->insert([
            'nombre' => 'version 13',
            'descripcion' => 'descripcion de version',
            'ano_id' => 13

        ]);

        DB::table('versions')->insert([
            'nombre' => 'version 14',
            'descripcion' => 'descripcion de version',
            'ano_id' => 14

        ]);

        DB::table('versions')->insert([
            'nombre' => 'version 15',
            'descripcion' => 'descripcion de version',
            'ano_id' => 15

        ]);
    }
}

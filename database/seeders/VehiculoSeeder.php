<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehiculo;

class VehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Vehiculo::create([
            'marca_id' => 1,
            'modelo_id' => 1,
            'tipo' => 'automóviles ligeros',
            'tipo_modelo' => '1.1',
            'cc' => '11',
            'modelo_motor' => 'modelo motor',
            'kw' => 'adawda',
            'cv' => 'adawdaddd',
            'ano_fabricacion' => '2020 - 2021'
        ]);

        Vehiculo::create([
            'marca_id' => 1,
            'modelo_id' => 1,
            'tipo' => 'automóviles ligeros',
            'tipo_modelo' => '1.1',
            'cc' => '11',
            'modelo_motor' => 'modelo motor',
            'kw' => 'adawda',
            'cv' => 'adawdaddd',
            'ano_fabricacion' => '2020 - 2021'
        ]);

        Vehiculo::create([
            'marca_id' => 1,
            'modelo_id' => 2,
            'tipo' => 'automóviles ligeros',
            'tipo_modelo' => '1.2',
            'cc' => '222',
            'modelo_motor' => 'modelo motor 2',
            'kw' => 'adawda 2',
            'cv' => 'adawdaddd 2',
            'ano_fabricacion' => '2020 - 2021 2'
        ]);
    }
}

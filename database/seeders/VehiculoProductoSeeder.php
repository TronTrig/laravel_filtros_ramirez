<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehiculo;

class VehiculoProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $vehiculo = Vehiculo::find(1);

        $vehiculo->productos()->attach([1,2,3,4]);

        $vehiculo = Vehiculo::find(2);

        $vehiculo->productos()->attach([5,6,7]);

    }
}

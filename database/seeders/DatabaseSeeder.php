<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            CategoriaSeeder::class,
            SubcategoriaSeeder::class,
            MarcaSeeder::class,
            ModeloSeeder::class,
            AnoSeeder::class,
            VersionSeeder::class,
            ProductosSeeder::class,
            UserSeeder::class,
            VehiculoSeeder::class,
            VehiculoProductoSeeder::class,
        ]);
    }
}

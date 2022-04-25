<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::Create([
            'name' => 'Victor J',
            'email' => 'victor5rivas5@gmail.com',
            'password' => bcrypt('mariangel')
        ]);
    }
}

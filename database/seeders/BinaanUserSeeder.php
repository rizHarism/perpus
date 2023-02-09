<?php

namespace Database\Seeders;

use App\Models\User\BinaanUser;
use Illuminate\Database\Seeder;

class BinaanUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        BinaanUser::create([
            'name' => 'riski',
            'email' => 'riski@gmail.com',
            'password' => bcrypt('12345687'),
        ],);
        BinaanUser::create([
            'name' => 'bajong',
            'email' => 'bajong@gmail.com',
            'password' => bcrypt('12345687'),
        ],);
    }
}

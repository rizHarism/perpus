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
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin111'),
        ],);
        BinaanUser::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user111'),
        ],);
    }
}

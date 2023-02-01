<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User\InlisliteUser;

class InlisliteUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        InlisliteUser::create([
            'name' => 'riski',
            'email' => 'riski@gmail.com',
            'password' => bcrypt('12345687'),
        ],);
        InlisliteUser::create([
            'name' => 'bajong',
            'email' => 'bajong@gmail.com',
            'password' => bcrypt('12345687'),
        ],);
    }
}

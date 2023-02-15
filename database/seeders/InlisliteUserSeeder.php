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
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin111'),
        ],);
        InlisliteUser::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user111'),
        ],);
    }
}

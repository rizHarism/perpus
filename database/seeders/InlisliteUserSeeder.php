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
            'name' => 'Administrator',
            'username' => 'admin',
            'password' => bcrypt('pass123'),
            'avatar' => 'default-avatar.png',
        ],);
        InlisliteUser::create([
            'name' => 'user',
            'username' => 'user',
            'password' => bcrypt('pass123'),
            'avatar' => 'default-avatar.png',
        ],);
    }
}

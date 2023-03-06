<?php

namespace Database\Factories\User;

use App\Models\User\BinaanUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class BinaanUserFactory extends Factory
{

    protected $model = BinaanUser::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //binaan user faker
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'perpustakaan_id' => mt_rand(1, 3),
            'password' => bcrypt('pass123'), // password
            'avatar' => 'default-avatar.png', // password
            // 'remember_token' => Str::random(10),
        ];
    }
}

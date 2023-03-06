<?php

namespace Database\Factories\Binaan;

use App\Models\Binaan\Perpustakaan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PerpustakaanFactory extends Factory
{
    protected $model = Perpustakaan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'nama_sekolah' => $this->faker->word(),
            'alamat_sekolah' => $this->faker->address(),
            'nama_perpustakaan' => $this->faker->word(),
            'nama_kepala' => $this->faker->name(),
            'no_hp_kepala' => $this->faker->phoneNumber(),
        ];
    }
}

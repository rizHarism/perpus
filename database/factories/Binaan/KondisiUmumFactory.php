<?php

namespace Database\Factories\Binaan;

use App\Models\Binaan\KondisiUmum;
use Illuminate\Database\Eloquent\Factories\Factory;

class KondisiUmumFactory extends Factory
{
    protected $model = KondisiUmum::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'perpustakaan_id' => $this->faker->numberBetween(1, 5),
            'tahun' => '2023',
            'npp' => $this->faker->randomNumber(6, true),
            'sk_pendirian' => $this->faker->uuid(),
            'siswa_l' => $this->faker->randomNumber(3, true),
            'siswa_p' => $this->faker->randomNumber(3, true),
            'staff_l' => $this->faker->randomNumber(1, true),
            'staff_p' => $this->faker->randomNumber(1, true),
            'status' => '1',
        ];
    }
}

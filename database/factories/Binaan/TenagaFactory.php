<?php

namespace Database\Factories\Binaan;

use App\Models\Binaan\Tenaga;
use Illuminate\Database\Eloquent\Factories\Factory;

class TenagaFactory extends Factory
{
    protected $model = Tenaga::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'perpustakaan_id' => '1',
            'tahun' => '2023',
            'nama' => $this->faker->name(),
            'status_pegawai' => $this->faker->randomElement(['PNS', 'PTT', 'Honorer']),
            'status_pendidikan' => $this->faker->randomElement(['Sarjana', 'DIII/DII', 'SMA']),
            'jenis_kelamin' => $this->faker->randomElement(['l', 'p']),
            'status' => '1',
        ];
    }
}

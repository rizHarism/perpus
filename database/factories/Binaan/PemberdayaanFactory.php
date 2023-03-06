<?php

namespace Database\Factories\Binaan;

use App\Models\Binaan\Pemberdayaan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PemberdayaanFactory extends Factory
{
    protected $model = Pemberdayaan::class;
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
            'slogan' => 1,
            'program_kerja' => implode(',', $this->faker->randomElements(['1', '2', '3', '4', '5'], 4)),
            'pengunjung_harian' => $this->faker->randomNumber(2, true),
            'sumber_anggaran' => implode(',', $this->faker->randomElements(['1', '2', '3'], 3)),
            'alokasi_anggaran' => implode(',', $this->faker->randomElements(['1', '2', '3'], 3)),
            'penambahan_buku' =>  $this->faker->randomNumber(3, true),
            'status' => '1',
        ];
    }
}

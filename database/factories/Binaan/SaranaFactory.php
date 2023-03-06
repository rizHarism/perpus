<?php

namespace Database\Factories\Binaan;

use App\Models\Binaan\Sarana;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaranaFactory extends Factory
{
    protected $model = Sarana::class;

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
            'luas_ruangan' => $this->faker->randomNumber(3, true),
            'area_ruangan' => implode(',', $this->faker->randomElements(['1', '2', '3', '4', '5'], 4)),
            'kebersihan' => '1',
            'kerapian' => '1',
            'projector' => mt_rand(1, 3),
            'ac_kipas' =>  mt_rand(1, 3),
            'komputer' =>  mt_rand(1, 3),
            'internet' =>  mt_rand(1, 3),
            'televisi' => mt_rand(1, 3),
            'vcd' => mt_rand(1, 3),
            'rak_buku' => mt_rand(1, 3),
            'rak_koran' => mt_rand(1, 3),
            'rak_referensi' => mt_rand(1, 3),
            'rak_majalah' => mt_rand(1, 3),
            'meja_baca' => mt_rand(1, 3),
            'meja_sirkulasi' => mt_rand(1, 3),
            'meja_kerja' => mt_rand(1, 3),
            'kursi_baca' => mt_rand(1, 3),
            'kursi_kerja' => mt_rand(1, 3),
            'almari_katalog' => mt_rand(1, 2),
            'loker' => mt_rand(1, 3),
            'mading' => mt_rand(1, 2),
            'status' => $this->faker->randomElement(['0', '1']),
        ];
    }
}

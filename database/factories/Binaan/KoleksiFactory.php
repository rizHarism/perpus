<?php

namespace Database\Factories\Binaan;

use App\Models\Binaan\Koleksi;
use Illuminate\Database\Eloquent\Factories\Factory;

class KoleksiFactory extends Factory
{
    protected $model = Koleksi::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'perpustakaan_id' => $this->faker->randomElement(['1', '2', '3']),
            'tahun' => 2023,
            'buku_pelajaran_judul' => $this->faker->randomNumber(2, true),
            'buku_pelajaran_eksemplar' => $this->faker->randomNumber(3, true),
            'buku_panduan_judul' => $this->faker->randomNumber(2, true),
            'buku_panduan_eksemplar' => $this->faker->randomNumber(3, true),
            'buku_fiksi_judul' => $this->faker->randomNumber(2, true),
            'buku_fiksi_eksemplar' => $this->faker->randomNumber(3, true),
            'buku_non_fiksi_judul' => $this->faker->randomNumber(2, true),
            'buku_non_fiksi_eksemplar' => $this->faker->randomNumber(3, true),
            'buku_referensi_judul' => $this->faker->randomNumber(2, true),
            'buku_referensi_eksemplar' => $this->faker->randomNumber(3, true),
            'karya_guru_judul' => $this->faker->randomNumber(1, true),
            'karya_guru_eksemplar' => $this->faker->randomNumber(1, true),
            'karya_siswa_judul' => $this->faker->randomNumber(1, true),
            'karya_siswa_eksemplar' => $this->faker->randomNumber(1, true),
            'koran_judul' => $this->faker->randomNumber(1, true),
            'koran_eksemplar' => $this->faker->randomNumber(3, true),
            'majalah_judul' => $this->faker->randomNumber(2, true),
            'majalah_eksemplar' => $this->faker->randomNumber(3, true),
            'kaset' => $this->faker->randomNumber(1, true),
            'cd' => $this->faker->randomNumber(1, true),
            'vcd' => $this->faker->randomNumber(1, true),
            'dvd' => $this->faker->randomNumber(1, true),
            'multimedia_lain' => $this->faker->randomNumber(1, true),
            'atlas' => $this->faker->randomNumber(1, true),
            'peta' => $this->faker->randomNumber(1, true),
            'globe' => $this->faker->randomNumber(1, true),
            'karto_lain' => $this->faker->randomNumber(1, true),
            'peraga_matematika' => $this->faker->randomNumber(1, true),
            'peraga_ipa' => $this->faker->randomNumber(1, true),
            'peraga_lain' => $this->faker->randomNumber(1, true),
            'status' => $this->faker->randomElement(['0', '1']),
        ];
    }
}

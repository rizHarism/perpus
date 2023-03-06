<?php

namespace Database\Factories\Binaan;

use App\Models\Binaan\KondisiUmum;
use App\Models\Binaan\Layanan;
use Illuminate\Database\Eloquent\Factories\Factory;

class LayananFactory extends Factory
{
    protected $model = Layanan::class;
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
            'tahun' => '2023',
            'sistem_layanan' => $this->faker->randomElement(['Terbuka', 'Tertutup']),
            'hari_awal' => 'Senin',
            'hari_akhir' => 'Jumat',
            'jam_buka' => '07:00:00',
            'jam_tutup' => '16:00:00',
            'pengunjung_siswa_laki' => $this->faker->randomNumber(2, true),
            'pengunjung_siswa_perempuan' => $this->faker->randomNumber(2, true),
            'pengunjung_guru_laki' => $this->faker->randomNumber(2, true),
            'pengunjung_guru_perempuan' => $this->faker->randomNumber(2, true),
            'peminjam_siswa_laki' => $this->faker->randomNumber(2, true),
            'peminjam_siswa_perempuan' => $this->faker->randomNumber(2, true),
            'peminjam_guru_laki' => $this->faker->randomNumber(2, true),
            'peminjam_guru_perempuan' => $this->faker->randomNumber(2, true),
            'koleksi_terbaca_judul' => $this->faker->randomNumber(3, true),
            'koleksi_terbaca_eksemplar' => $this->faker->randomNumber(4, true),
            'koleksi_terpinjam_judul' => $this->faker->randomNumber(2, true),
            'koleksi_terpinjam_eksemplar' => $this->faker->randomNumber(3, true),
            'status' => $this->faker->randomElement(['0', '1']),
        ];
    }
}

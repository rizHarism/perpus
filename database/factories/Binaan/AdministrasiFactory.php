<?php

namespace Database\Factories\Binaan;

use App\Models\Binaan\Administrasi;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdministrasiFactory extends Factory
{
    protected $model = Administrasi::class;
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
            'buku_induk' => '1',
            'katalog_kartu' => '1',
            'status' => '1',
        ];
    }
}

<?php

namespace Database\Factories\Binaan;

use App\Models\Binaan\BahanPustaka;
use Illuminate\Database\Eloquent\Factories\Factory;

class BahanPustakaFactory extends Factory
{
    protected $model = BahanPustaka::class;
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
            'pedoman_katalog' => 'eDDc',
            'pedoman_klasifikasi' => 'Pedoman Harian perpustakaan',
            'aplikasi_perpus' => 'Sim Perpus ',
            'status' => '1',
        ];
    }
}

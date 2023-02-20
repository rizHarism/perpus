<?php

namespace Database\Seeders;

use App\Models\Binaan\Administrasi;
use App\Models\Binaan\BahanPustaka;
use App\Models\Binaan\KondisiUmum;
use App\Models\Binaan\Layanan;
use App\Models\Binaan\Pemberdayaan;
use App\Models\Binaan\Perpustakaan;
use App\Models\Binaan\Sarana;
use App\Models\Binaan\Tenaga;
use App\Models\Binaan\Koleksi;
use Illuminate\Database\Seeder;

class BinaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Perpustakaan::factory(3)->create();
        KondisiUmum::factory(3)->create();
        BahanPustaka::factory(3)->create();
        Administrasi::factory(3)->create();
        Pemberdayaan::factory(3)->create();
        Tenaga::factory(3)->create();
        Sarana::factory(3)->create();
        Koleksi::factory(3)->create();
        Layanan::factory(3)->create();
    }
}

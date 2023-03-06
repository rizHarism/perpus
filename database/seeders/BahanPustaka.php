<?php

namespace Database\Seeders;

use App\Models\Binaan\BahanPustaka as BinaanBahanPustaka;
use Illuminate\Database\Seeder;

class BahanPustaka extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        BinaanBahanPustaka::truncate();

        $csvFile = fopen(base_path("database/data/binaan/pengorganisasian_bahan_pustaka.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                BinaanBahanPustaka::create([
                    "perpustakaan_id" => $data["1"],
                    "tahun" => $data["2"],
                    "pedoman_katalog" => $data["3"],
                    "pedoman_klasifikasi" => $data["4"],
                    "aplikasi_perpus" => $data["5"],
                    "status" => $data["6"],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}

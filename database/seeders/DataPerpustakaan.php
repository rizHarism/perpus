<?php

namespace Database\Seeders;

use App\Models\Binaan\Perpustakaan;
use Illuminate\Database\Seeder;

class DataPerpustakaan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Perpustakaan::truncate();

        $csvFile = fopen(base_path("database/data/binaan/data_perpustakaan.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Perpustakaan::create([
                    "nama_sekolah" => $data["1"],
                    "alamat_sekolah" => $data["2"],
                    "nama_perpustakaan" => $data["3"],
                    "nama_kepala" => $data["4"],
                    "no_hp_kepala" => $data["5"],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}

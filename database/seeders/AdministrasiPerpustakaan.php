<?php

namespace Database\Seeders;

use App\Models\Binaan\Administrasi;
use Illuminate\Database\Seeder;

class AdministrasiPerpustakaan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Administrasi::truncate();

        $csvFile = fopen(base_path("database/data/binaan/administrasi_perpustakaan.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Administrasi::create([
                    "perpustakaan_id" => $data["1"],
                    "tahun" => $data["2"],
                    "buku_induk" => $data["3"],
                    "buku_pengunjung" => $data["4"],
                    "katalog_kartu" => $data["5"],
                    "status" => $data["6"],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}

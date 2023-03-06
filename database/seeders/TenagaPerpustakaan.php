<?php

namespace Database\Seeders;

use App\Models\Binaan\Tenaga;
use Illuminate\Database\Seeder;

class TenagaPerpustakaan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Tenaga::truncate();

        $csvFile = fopen(base_path("database/data/binaan/tenaga_perpustakaan.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Tenaga::create([
                    "perpustakaan_id" => $data["1"],
                    "tahun" => $data["2"],
                    "nama" => $data["3"],
                    "status_pegawai" => $data["4"],
                    "status_pendidikan" => $data["5"],
                    "jenis_kelamin" => $data["6"],
                    "status" => $data["7"],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}

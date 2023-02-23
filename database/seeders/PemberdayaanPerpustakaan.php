<?php

namespace Database\Seeders;

use App\Models\Binaan\Pemberdayaan;
use Illuminate\Database\Seeder;

class PemberdayaanPerpustakaan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Pemberdayaan::truncate();

        $csvFile = fopen(base_path("database/data/binaan/pemberdayaan_perpustakaan.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Pemberdayaan::create([
                    "perpustakaan_id" => $data["1"],
                    "tahun" => $data["2"],
                    "slogan" => $data["3"],
                    "program_leaflet" => $data["4"],
                    "program_banner" => $data["5"],
                    "program_brosur" => $data["6"],
                    "program_penyuluhan" => $data["7"],
                    "program_pameran" => $data["8"],
                    "program_lomba" => $data["9"],
                    "pengunjung_harian" => $data["10"],
                    "sumber_bos" => $data["11"],
                    "sumber_apbd" => $data["12"],
                    "sumber_lainnya" => $data["13"],
                    "alokasi_pelajaran" => $data["14"],
                    "alokasi_pengayaan" => $data["15"],
                    "alokasi_lainnya" => $data["16"],
                    "penambahan_buku" => $data["17"],
                    "status" => $data["18"],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}

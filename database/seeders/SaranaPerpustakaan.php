<?php

namespace Database\Seeders;

use App\Models\Binaan\Sarana;
use Illuminate\Database\Seeder;

class SaranaPerpustakaan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Sarana::truncate();

        $csvFile = fopen(base_path("database/data/binaan/sarana_prasarana.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Sarana::create([
                    "perpustakaan_id" => $data["1"],
                    "tahun" => $data["2"],
                    "luas_ruangan" => $data["3"],
                    "area_koleksi" => $data["4"],
                    "area_baca" => $data["5"],
                    "area_kerja" => $data["6"],
                    "area_multimedia" => $data["6"],
                    "kebersihan" => $data["7"],
                    "kerapian" => $data["8"],
                    "projector" => $data["9"],
                    "ac_kipas" => $data["10"],
                    "komputer" => $data["11"],
                    "internet" => $data["12"],
                    "televisi" => $data["13"],
                    "vcd" => $data["14"],
                    "rak_buku" => $data["15"],
                    "rak_koran" => $data["16"],
                    "rak_referensi" => $data["17"],
                    "rak_majalah" => $data["18"],
                    "meja_baca" => $data["19"],
                    "meja_sirkulasi" => $data["20"],
                    "meja_kerja" => $data["21"],
                    "kursi_baca" => $data["22"],
                    "kursi_kerja" => $data["23"],
                    "almari_katalog" => $data["24"],
                    "loker" => $data["25"],
                    "mading" => $data["26"],
                    "status" => $data["27"],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}

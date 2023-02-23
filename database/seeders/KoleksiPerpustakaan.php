<?php

namespace Database\Seeders;

use App\Models\Binaan\Koleksi;
use Illuminate\Database\Seeder;

class KoleksiPerpustakaan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Koleksi::truncate();

        $csvFile = fopen(base_path("database/data/binaan/koleksi.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Koleksi::create([
                    "perpustakaan_id" => $data["1"],
                    "tahun" => $data["2"],
                    "buku_pelajaran_judul" => $data["3"],
                    "buku_pelajaran_eksemplar" => $data["4"],
                    "buku_panduan_judul" => $data["5"],
                    "buku_panduan_eksemplar" => $data["6"],
                    "buku_fiksi_judul" => $data["7"],
                    "buku_fiksi_eksemplar" => $data["8"],
                    "buku_non_fiksi_judul" => $data["9"],
                    "buku_non_fiksi_eksemplar" => $data["10"],
                    "buku_referensi_judul" => $data["11"],
                    "buku_referensi_eksemplar" => $data["12"],
                    "karya_guru_judul" => $data["13"],
                    "karya_guru_eksemplar" => $data["14"],
                    "karya_siswa_judul" => $data["15"],
                    "karya_siswa_eksemplar" => $data["16"],
                    "koran_judul" => $data["17"],
                    "koran_eksemplar" => $data["18"],
                    "majalah_judul" => $data["19"],
                    "majalah_eksemplar" => $data["20"],
                    "kaset" => $data["21"],
                    "cd" => $data["22"],
                    "vcd" => $data["23"],
                    "dvd" => $data["24"],
                    "multimedia_lain" => $data["25"],
                    "atlas" => $data["26"],
                    "peta" => $data["27"],
                    "globe" => $data["28"],
                    "karto_lain" => $data["29"],
                    "peraga_matematika" => $data["30"],
                    "peraga_ipa" => $data["31"],
                    "peraga_lain" => $data["32"],
                    "status" => $data["33"],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}

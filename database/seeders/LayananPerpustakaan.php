<?php

namespace Database\Seeders;

use App\Models\Binaan\Layanan;
use Illuminate\Database\Seeder;

class LayananPerpustakaan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Layanan::truncate();

        $csvFile = fopen(base_path("database/data/binaan/layanan.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Layanan::create([
                    "perpustakaan_id" => $data["1"],
                    "tahun" => $data["2"],
                    "sistem_layanan" => $data["3"],
                    "hari_awal" => $data["4"],
                    "hari_akhir" => $data["5"],
                    "jam_buka" => $data["6"],
                    "jam_tutup" => $data["7"],
                    "pengunjung_siswa_laki" => $data["8"],
                    "pengunjung_siswa_perempuan" => $data["9"],
                    "pengunjung_guru_laki" => $data["10"],
                    "pengunjung_guru_perempuan" => $data["11"],
                    "peminjam_siswa_laki" => $data["12"],
                    "peminjam_siswa_perempuan" => $data["13"],
                    "peminjam_guru_laki" => $data["14"],
                    "peminjam_guru_perempuan" => $data["15"],
                    "koleksi_terbaca_judul" => $data["16"],
                    "koleksi_terbaca_eksemplar" => $data["17"],
                    "koleksi_terpinjam_judul" => $data["18"],
                    "koleksi_terpinjam_eksemplar" => $data["19"],
                    "status" => $data["20"],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Binaan\KondisiUmum;
use Illuminate\Database\Seeder;

class KondisiUmumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // KondisiUmum::factory(3)->create();
        KondisiUmum::truncate();

        $csvFile = fopen(base_path("database/data/binaan/kondisi_umum.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                KondisiUmum::create([
                    "perpustakaan_id" => $data["1"],
                    "tahun" => $data["2"],
                    "npp" => $data["3"],
                    "sk_pendirian" => $data["4"],
                    "program_kerja" => $data["5"],
                    "visi_misi" => $data["6"],
                    "siswa_l" => $data["7"],
                    "siswa_p" => $data["8"],
                    "staff_l" => $data["9"],
                    "staff_p" => $data["10"],
                    "rombongan_belajar" => $data["11"],
                    "status" => $data["12"],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}

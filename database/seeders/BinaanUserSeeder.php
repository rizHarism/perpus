<?php

namespace Database\Seeders;

use App\Models\User\BinaanUser;
use Illuminate\Database\Seeder;

class BinaanUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BinaanUser::truncate();

        $csvFile = fopen(base_path("database/data/binaan/user_binaan.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                BinaanUser::create([
                    "name" => $data["1"],
                    "username" => $data["2"],
                    "password" => bcrypt($data["3"]),
                    "perpustakaan_id" => $data["4"],
                    "avatar" => $data["5"],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}

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
        KondisiUmum::factory(3)->create();
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BinaanBahanPustakaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create table binaan_bahan_pustaka
        Schema::create('binaan_bahan_pustaka', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_binaan_id');
            $table->year('tahun');
            $table->string('pedoman_katalog');
            $table->string('pedoman_klasifikasi');
            $table->string('aplikasi_perpus');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropDatabaseIfExists('binaan_bahan_pustaka');
    }
}

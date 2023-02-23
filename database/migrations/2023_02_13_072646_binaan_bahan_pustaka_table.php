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
            $table->foreignId('perpustakaan_id');
            $table->year('tahun');
            $table->string('pedoman_katalog')->nullable();
            $table->string('pedoman_klasifikasi')->nullable();
            $table->string('aplikasi_perpus')->nullable();
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

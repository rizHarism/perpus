<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BinaanPemberdayaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create table binaan_pemberdayaan
        Schema::create('binaan_pemberdayaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perpustakaan_id');
            $table->year('tahun');
            $table->integer('slogan')->default('0');
            $table->boolean('program_leaflet')->default('0');
            $table->boolean('program_banner')->default('0');
            $table->boolean('program_brosur')->default('0');
            $table->boolean('program_penyuluhan')->default('0');
            $table->boolean('program_pameran')->default('0');
            $table->boolean('program_lomba')->default('0');
            $table->boolean('pengunjung_harian')->default('0');
            $table->boolean('sumber_bos')->default('0');
            $table->boolean('sumber_apbd')->default('0');
            $table->boolean('sumber_lainnya')->default('0');
            $table->boolean('alokasi_pelajaran')->default('0');
            $table->boolean('alokasi_pengayaan')->default('0');
            $table->boolean('alokasi_lainnya')->default('0');
            $table->integer('penambahan_buku')->default('0');
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
        Schema::dropIfExists('binaan_pemberdayaan');
    }
}

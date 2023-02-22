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
            $table->boolean('slogan');
            $table->boolean('program_leaflet');
            $table->boolean('program_banner');
            $table->boolean('program_brosur');
            $table->boolean('program_penyuluhan');
            $table->boolean('program_pameran');
            $table->boolean('program_lomba');
            $table->boolean('pengunjung_harian');
            $table->boolean('sumber_bos');
            $table->boolean('sumber_apbd');
            $table->boolean('sumber_lainnya');
            $table->boolean('alokasi_pelajaran');
            $table->boolean('alokasi_pengayaan');
            $table->boolean('alokasi_lainnya');
            $table->integer('penambahan_buku');
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

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
            $table->longText('program_kerja');
            $table->integer('pengunjung_harian');
            $table->longText('sumber_anggaran');
            $table->longText('alokasi_anggaran');
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

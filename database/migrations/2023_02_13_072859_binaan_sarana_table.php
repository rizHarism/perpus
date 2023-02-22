<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BinaanSaranaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create table binaan_sarana
        Schema::create('binaan_sarana', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perpustakaan_id');
            $table->year('tahun');
            $table->integer('luas_ruangan');
            $table->boolean('area_koleksi');
            $table->boolean('area_baca');
            $table->boolean('area_kerja');
            $table->boolean('area_multimedia');
            $table->boolean('kebersihan');
            $table->boolean('kerapian');
            $table->integer('projector');
            $table->integer('ac_kipas');
            $table->integer('komputer');
            $table->integer('internet');
            $table->integer('televisi');
            $table->integer('vcd');
            $table->integer('rak_buku');
            $table->integer('rak_koran');
            $table->integer('rak_referensi');
            $table->integer('rak_majalah');
            $table->integer('meja_baca');
            $table->integer('meja_sirkulasi');
            $table->integer('meja_kerja');
            $table->integer('kursi_baca');
            $table->integer('kursi_kerja');
            $table->integer('almari_katalog');
            $table->integer('loker');
            $table->integer('mading');
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
        Schema::dropIfExists('binaan_sarana');
    }
}

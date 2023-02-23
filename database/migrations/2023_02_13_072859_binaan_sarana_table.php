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
            $table->integer('luas_ruangan')->default('0');
            $table->boolean('area_koleksi')->default('0');
            $table->boolean('area_baca')->default('0');
            $table->boolean('area_kerja')->default('0');
            $table->boolean('area_multimedia')->default('0');
            $table->boolean('kebersihan')->default('0');
            $table->boolean('kerapian')->default('0');
            $table->integer('projector')->default('0');
            $table->integer('ac_kipas')->default('0');
            $table->integer('komputer')->default('0');
            $table->integer('internet')->default('0');
            $table->integer('televisi')->default('0');
            $table->integer('vcd')->default('0');
            $table->integer('rak_buku')->default('0');
            $table->integer('rak_koran')->default('0');
            $table->integer('rak_referensi')->default('0');
            $table->integer('rak_majalah')->default('0');
            $table->integer('meja_baca')->default('0');
            $table->integer('meja_sirkulasi')->default('0');
            $table->integer('meja_kerja')->default('0');
            $table->integer('kursi_baca')->default('0');
            $table->integer('kursi_kerja')->default('0');
            $table->integer('almari_katalog')->default('0');
            $table->integer('loker')->default('0');
            $table->integer('mading')->default('0');
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

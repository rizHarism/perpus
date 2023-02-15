<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BinaanKoleksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create table binaan_koleksi
        Schema::create('binaan_koleksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_binaan_id');
            $table->year('tahun');
            $table->integer('buku_pelajaran_judul');
            $table->integer('buku_pelajaran_eksemplar');
            $table->integer('buku_panduan_judul');
            $table->integer('buku_panduan_eksemplar');
            $table->integer('buku_fiksi_judul');
            $table->integer('buku_fiksi_eksemplar');
            $table->integer('buku_non_fiksi_judul');
            $table->integer('buku_non_fiksi_eksemplar');
            $table->integer('buku_referensi_judul');
            $table->integer('buku_referensi_eksemplar');
            $table->integer('karya_guru_judul');
            $table->integer('karya_guru_eksemplar');
            $table->integer('karya_siswa_judul');
            $table->integer('karya_siswa_eksemplar');
            $table->integer('koran_judul');
            $table->integer('koran_eksemplar');
            $table->integer('majalah_judul');
            $table->integer('majalah_eksemplar');
            $table->integer('kaset');
            $table->integer('cd');
            $table->integer('vcd');
            $table->integer('dvd');
            $table->integer('multimedia_lain');
            $table->integer('atlas');
            $table->integer('peta');
            $table->integer('globe');
            $table->integer('karto_lain');
            $table->integer('peraga_matematika');
            $table->integer('peraga_ipa');
            $table->integer('peraga_lain');
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
        Schema::dropIfExists('binaan_koleksi');
    }
}

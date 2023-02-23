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
            $table->foreignId('perpustakaan_id');
            $table->year('tahun');
            $table->integer('buku_pelajaran_judul')->default('0');
            $table->integer('buku_pelajaran_eksemplar')->default('0');
            $table->integer('buku_panduan_judul')->default('0');
            $table->integer('buku_panduan_eksemplar')->default('0');
            $table->integer('buku_fiksi_judul')->default('0');
            $table->integer('buku_fiksi_eksemplar')->default('0');
            $table->integer('buku_non_fiksi_judul')->default('0');
            $table->integer('buku_non_fiksi_eksemplar')->default('0');
            $table->integer('buku_referensi_judul')->default('0');
            $table->integer('buku_referensi_eksemplar')->default('0');
            $table->integer('karya_guru_judul')->default('0');
            $table->integer('karya_guru_eksemplar')->default('0');
            $table->integer('karya_siswa_judul')->default('0');
            $table->integer('karya_siswa_eksemplar')->default('0');
            $table->integer('koran_judul')->default('0');
            $table->integer('koran_eksemplar')->default('0');
            $table->integer('majalah_judul')->default('0');
            $table->integer('majalah_eksemplar')->default('0');
            $table->integer('kaset')->default('0');
            $table->integer('cd')->default('0');
            $table->integer('vcd')->default('0');
            $table->integer('dvd')->default('0');
            $table->integer('multimedia_lain')->default('0');
            $table->integer('atlas')->default('0');
            $table->integer('peta')->default('0');
            $table->integer('globe')->default('0');
            $table->integer('karto_lain')->default('0');
            $table->integer('peraga_matematika')->default('0');
            $table->integer('peraga_ipa')->default('0');
            $table->integer('peraga_lain')->default('0');
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

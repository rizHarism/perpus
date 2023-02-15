<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BinaanLayananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create table binaan_layanan
        Schema::create('binaan_layanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_binaan_id');
            $table->year('tahun');
            $table->string('sistem_layanan');
            $table->string('hari_awal');
            $table->string('hari_akhir');
            $table->time('jam_buka');
            $table->time('jam_tutup');
            $table->integer('pengunjung_siswa_laki');
            $table->integer('pengunjung_siswa_perempuan');
            $table->integer('pengunjung_guru_laki');
            $table->integer('pengunjung_guru_perempuan');
            $table->integer('peminjam_siswa_laki');
            $table->integer('peminjam_siswa_perempuan');
            $table->integer('peminjam_guru_laki');
            $table->integer('peminjam_guru_perempuan');
            $table->integer('koleksi_terbaca_judul');
            $table->integer('koleksi_terbaca_eksemplar');
            $table->integer('koleksi_terpinjam_judul');
            $table->integer('koleksi_terpinjam_eksemplar');
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
        Schema::dropIfExists('binaan_layanan');
    }
}

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
            $table->foreignId('perpustakaan_id');
            $table->year('tahun');
            $table->string('sistem_layanan');
            $table->string('hari_awal');
            $table->string('hari_akhir');
            $table->string('jam_buka');
            $table->string('jam_tutup');
            $table->integer('pengunjung_siswa_laki')->default('0');
            $table->integer('pengunjung_siswa_perempuan')->default('0');
            $table->integer('pengunjung_guru_laki')->default('0');
            $table->integer('pengunjung_guru_perempuan')->default('0');
            $table->integer('peminjam_siswa_laki')->default('0');
            $table->integer('peminjam_siswa_perempuan')->default('0');
            $table->integer('peminjam_guru_laki')->default('0');
            $table->integer('peminjam_guru_perempuan')->default('0');
            $table->integer('koleksi_terbaca_judul')->default('0');
            $table->integer('koleksi_terbaca_eksemplar')->default('0');
            $table->integer('koleksi_terpinjam_judul')->default('0');
            $table->integer('koleksi_terpinjam_eksemplar')->default('0');
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

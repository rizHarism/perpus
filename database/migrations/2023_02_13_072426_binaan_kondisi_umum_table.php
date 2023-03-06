<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BinaanKondisiUmumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create table binaan_kondisi_umum
        Schema::create('binaan_kondisi_umum', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perpustakaan_id');
            $table->year('tahun');
            $table->string('npp');
            $table->string('sk_pendirian')->nullable();
            $table->string('program_kerja')->nullable();
            $table->string('visi_misi')->nullable();
            $table->integer('siswa_l')->default('0');
            $table->integer('siswa_p')->default('0');
            $table->integer('staff_l')->default('0');
            $table->integer('staff_p')->default('0');
            $table->integer('rombongan_belajar')->default('0');
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
        Schema::dropDatabaseIfExists('binaan_kondisi_umum');
    }
}

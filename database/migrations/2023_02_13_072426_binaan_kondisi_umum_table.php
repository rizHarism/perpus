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
            $table->foreignId('user_binaan_id');
            $table->year('tahun');
            $table->string('npp');
            $table->string('sk_pendirian');
            $table->integer('siswa_l');
            $table->integer('siswa_p');
            $table->integer('staf_l');
            $table->integer('staf_p');
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

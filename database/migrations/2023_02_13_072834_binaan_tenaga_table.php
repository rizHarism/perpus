<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BinaanTenagaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create table binaan_tenaga
        Schema::create('binaan_tenaga', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_binaan_id');
            $table->tahun('tahun');
            $table->string('nama');
            $table->string('status_pegawai');
            $table->string('status_pendidikan');
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
        Schema::dropIfExists('binaan_tenaga');
    }
}

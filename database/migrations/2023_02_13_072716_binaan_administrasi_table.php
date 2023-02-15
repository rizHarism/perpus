<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BinaanAdministrasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // create binaan_adminstrasi_table
        Schema::create('binaan_administrasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_binaan_id');
            $table->year('tahun');
            $table->boolean('buku_induk');
            $table->boolean('katalog_kartu');
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
        Schema::dropIfExists('binaan_administrasi');
    }
}

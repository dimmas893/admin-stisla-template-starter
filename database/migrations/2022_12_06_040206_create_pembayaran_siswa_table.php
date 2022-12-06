<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tagihan_siswa', function (Blueprint $table) {
            $table->id();
            $table->string('id_tagihan', 15);
            $table->string('id_kategori_tagihan', 191);
            $table->string('id_siswa', 15);
            $table->double('nominal', 15, 2);
            $table->text('deskripsi');
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
        Schema::dropIfExists('tagihan_siswa');
    }
}

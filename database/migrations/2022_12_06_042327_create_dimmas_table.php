<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDimmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dimmas', function (Blueprint $table) {
            $table->id();
            $table->string('id_pembayaran', 15);
            $table->string('id_tagihan', 15);
            $table->date('tanggal_pembayaran');
            $table->string('nominal_pembayaran', 150);
            $table->string('metode_pembayaran', 150);
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
        Schema::dropIfExists('dimmas');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanGalonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman_galons', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->bigInteger('jumlah_galon');
            $table->text('keterangan');
            $table->timestamps();
            $table->unsignedBigInteger('id_kostumer');
            $table->foreign('id_kostumer')->references('id')->on('kostumers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman_galons');
    }
}

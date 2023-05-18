<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailPengeluaran extends Migration
{
    public function up()
    {
      Schema::create('detail_pengeluaran', function (Blueprint $table) {
          $table->id();
          $table->date('tanggal');
          $table->bigInteger('jumlah');
          $table->text('keterangan');
          $table->binary('foto');
          $table->timestamps($precision = 0);
          $table->unsignedBigInteger('id_pengeluaran');
           $table->foreign('id_pengeluaran')->references('id')->on('pengeluarans');
      });
    }

    public function down()
    {
      Schema::dropIfExists('detail_pengeluaran');
    }
}

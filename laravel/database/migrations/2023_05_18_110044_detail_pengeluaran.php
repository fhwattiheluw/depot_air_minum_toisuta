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
          $table->int('jumlah',100);
          $table->text('keterangan');
          $table->text('foto');
          $table->timestamps($precision = 0);

           $table->foreignId('item_pengeluaran')->constrained('pengeluarans');
          // $table->primary('id');
          // $table->increments('id');
      });
    }

    public function down()
    {
      Schema::dropIfExists('detail_pengeluaran');
    }
}

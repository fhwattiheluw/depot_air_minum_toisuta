<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualansTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('penjualan', function (Blueprint $table) {
      $table->id()->autoIncrement();
      $table->date('tanggal');
      $table->bigInteger('total_penjualan');
      $table->timestamps($precision = 0);
    });

    Schema::create('detail_penjualan', function (Blueprint $table) {
      $table->id()->autoIncrement();
      $table->string('tipe_penjualan',100);
      $table->bigInteger('harga_satuan');
      $table->bigInteger('jumlah');
      $table->enum('pembayaran', ['lunas', 'bon']);
      $table->timestamps($precision = 0);

      $table->bigInteger('id_kostumer')->nullable($value = true);

      $table->unsignedBigInteger('id_penjualan');
      $table->foreign('id_penjualan')->references('id')->on('penjualan');
    });
  }

  public function down()
  {
    Schema::dropIfExists('penjualan');
    Schema::dropIfExists('detail_penjualan');
  }
}

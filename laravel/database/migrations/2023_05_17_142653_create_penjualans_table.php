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
        Schema::create('penjualans', function (Blueprint $table) {
          $table->id()->autoIncrement();
          $table->date('tanggal');
          // $table->string('tipe_penjualan',100);
          $table->bigInteger('harga_satuan');
          $table->bigInteger('motor')->default(0);
          $table->bigInteger('mobil')->default(0);
          $table->bigInteger('tempat')->default(0);
          $table->bigInteger('total_harga');
          $table->enum('pembayaran', ['lunas', 'bon']);
          $table->timestamps($precision = 0);
          $table->bigInteger('id_kostumer')->nullable($value = true);

            // $table->id()->autoIncrement();
            // $table->date('tanggal');
            // $table->string('tipe_penjualan',100);
            // $table->bigInteger('harga_satuan');
            // $table->bigInteger('jumlah');
            // $table->bigInteger('total_harga');
            // $table->enum('pembayaran', ['lunas', 'bon']);
            // $table->timestamps($precision = 0);
            // $table->bigInteger('id_kostumer')->nullable($value = true);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualans');
    }
}

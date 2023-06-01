<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengeluaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_pengeluaran', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->bigInteger('total_transaksi');
            $table->timestamps($precision = 0);
        });

        Schema::create('item_pengeluaran', function (Blueprint $table) {
            $table->id();
            $table->char('nama_item', 150);
            $table->timestamps($precision = 0);
        });

        Schema::create('detail_pengeluaran', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('jumlah');
            $table->bigInteger('harga_satuan');
            $table->text('keterangan');
            $table->string('nota');
            $table->timestamps($precision = 0);

            $table->unsignedBigInteger('id_item');
             $table->foreign('id_item')->references('id')->on('item_pengeluaran');

             $table->unsignedBigInteger('id_pengeluaran');
              $table->foreign('id_pengeluaran')->references('id')->on('transaksi_pengeluaran');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengeluaran');
        Schema::dropIfExists('item_pengeluaran');
        Schema::dropIfExists('detail_pengeluaran');


    }
}

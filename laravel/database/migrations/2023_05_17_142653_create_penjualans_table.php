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
            $table->string('tipe_penjualan',100);
            $table->int('harga_satuan',100);
            $table->int('jumlah',100);
            $table->enum('pembayaran', ['lunas', 'bon']);
            $table->timestamps($precision = 0);
            // $table->primary('id');
            $table->foreignId('id_konstumer')->constrained('konstumers')->nullable($value = true);

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

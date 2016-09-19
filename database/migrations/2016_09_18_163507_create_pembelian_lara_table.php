<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembelianLaraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelian_lara', function (Blueprint $table) {
            $table->increments('id_pembelian');
            $table->integer('id_barang');
            $table->integer('id_transaksi');
            $table->integer('id_supplier');
            $table->integer('jumlah');
            $table->integer('sub_total');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pembelian_lara');
    }
}

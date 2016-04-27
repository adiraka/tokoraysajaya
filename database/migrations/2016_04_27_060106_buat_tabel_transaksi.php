<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_transaksi', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal');
            $table->integer('total');
            $table->integer('users_id');
            $table->integer('pelanggan_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tb_transaksi');
    }
}

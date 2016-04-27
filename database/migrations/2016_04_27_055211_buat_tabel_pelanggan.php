<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelPelanggan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pelanggan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 50);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Pria', 'Wanita']);
            $table->text('alamat');
            $table->string('telepon', 12);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tb_pelanggan');
    }
}

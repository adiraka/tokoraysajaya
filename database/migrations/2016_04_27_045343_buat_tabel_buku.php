<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelBuku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_buku', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul', 100);
            $table->string('pengarang', 50);
            $table->integer('kategori_id');
            $table->string('tahun', 4);
            $table->string('isbn', 10);
            $table->integer('harga');
            $table->integer('stock');           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tb_buku');
    }
}

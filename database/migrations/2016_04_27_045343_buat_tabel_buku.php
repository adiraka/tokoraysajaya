<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelBuku extends Migration
{
    public function up()
    {
        Schema::create('tb_buku', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul', 100);
            $table->string('pengarang', 50);
            $table->integer('kategori_id');
            $table->string('tahun', 4);
            $table->string('isbn', 25);
            $table->integer('harga');
            $table->integer('stock');
            $table->string('foto', 255);           
        });
    }

    public function down()
    {
        Schema::drop('tb_buku');
    }
}

<?php

namespace BookApp\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'tb_buku';

    protected $fillable = ['judul', 'pengarang', 'kategori_id', 'tahun', 'isbn', 'harga', 'stok'];

    public $timestamps = false;
}

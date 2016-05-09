<?php

namespace BookApp\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'tb_buku';

    protected $fillable = ['kodebuku', 'judul', 'pengarang', 'kategori_id', 'tahun', 'isbn', 'harga', 'stok', 'foto'];

    public $timestamps = false;

    public function kategori()
    {
    	return $this->belongsTo('BookApp\Models\Kategori');
    }
}

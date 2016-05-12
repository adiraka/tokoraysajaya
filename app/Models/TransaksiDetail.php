<?php

namespace BookApp\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    protected $table = 'tb_transaksi_detail';

    protected $fillable = ['transaksi_id', 'buku_id', 'jumlah', 'subtotal'];

    public $timestamps = false;

    public function buku()
    {
    	return $this->belongsTo('BookApp\Models\Buku');
    }
}

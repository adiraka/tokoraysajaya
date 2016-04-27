<?php

namespace BookApp\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'tb_transaksi';

    protected $fillable = ['tanggal', 'total', 'pelanggan_id'];

    public $timestamps = false;
}

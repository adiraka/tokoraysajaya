<?php

namespace BookApp\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'tb_transaksi';

    protected $fillable = ['tanggal', 'nama_pelanggan', 'telepon', 'total', 'created_at'];

    public $timestamps = false;
}

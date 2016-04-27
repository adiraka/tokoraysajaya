<?php

namespace BookApp\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'tb_pelanggan';

    protected $fillable = ['nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'telepon'];

    public $timestamps = false;
}

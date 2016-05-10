<?php

namespace BookApp\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'tb_pelanggan';

    protected $fillable = ['nama', 'jenis_kelamin', 'alamat', 'telepon'];

    public $timestamps = false;
}

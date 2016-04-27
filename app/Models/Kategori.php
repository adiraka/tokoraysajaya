<?php

namespace BookApp\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'tb_kategori';

    protected $fillable = ['nama'];

    public $timestamps = false;
}

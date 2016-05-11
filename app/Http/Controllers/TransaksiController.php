<?php

namespace BookApp\Http\Controllers;

use Illuminate\Http\Request;

use BookApp\Http\Requests;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('admin.transaksi')->with('title', 'Transaksi');
    }
}

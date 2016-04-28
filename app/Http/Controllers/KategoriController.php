<?php

namespace BookApp\Http\Controllers;

use Datatables;
use BookApp\Models\Kategori;
use Illuminate\Http\Request;

use BookApp\Http\Requests;

class KategoriController extends Controller
{
    public function index()
    {
    	return view('admin.kategori')->with('title', 'Kategori');
    }

    public function getDataKategori()
    {
    	return Datatables::of(Kategori::query())->make(true);
    }
}

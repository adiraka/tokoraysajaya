<?php

namespace BookApp\Http\Controllers;

use Datatables;
use BookApp\Models\Buku;
use Illuminate\Http\Request;

use BookApp\Http\Requests;

class BukuController extends Controller
{
    public function index()
    {
        return view('admin.buku')->with('title', 'Data Buku');
    }

    public function getDataBuku()
    {
        return Datatables::of(Buku::query())->editColumn('id', 'ID: {{ $id }}')->make(true);
    }
}

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
    	$kategoris = Kategori::select(['id', 'nama'])->get();
    	return Datatables::of($kategoris)
    		->addColumn('action', function ($kategori) {
    				return '
	    				<button type="button" class="green btn btn-detail bukak" value="'.$kategori->id.'"><i class="mdi mdi-pencil-box"></i></button>&nbsp;
	    				<button type="button" class="red btn btn-delete" value="'.$kategori->id.'"><i class="mdi mdi-delete"></i></button>
    				';
    			})
    		->make(true);
    }

    public function addDataKategori(Request $request)
    {
    	if ($request->ajax()) {
    		$kategori = Kategori::create($request->all());
    		return response()->json($kategori);
    	}
    }
}

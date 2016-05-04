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
    	return Datatables::of($kategoris)->make(true);
    }

    public function addDataKategori(Request $request)
    {
    	if ($request->ajax()) {
    		$this->validate($request, [
    			'nama' => 'required|unique:tb_kategori',
    		]);
    		$kategori = Kategori::create($request->all());
    		return response()->json($kategori);
    	}
    }

    public function getDetailDataKategori(Request $request, $id)
    {
    	if ($request->ajax()) {
    		$kategori = Kategori::find($id);
    		return response()->json($kategori);
    	}
    }

    public function deleteDataKategori(Request $request, $id)
    {
    	if ($request->ajax()) {
    		$kategori = Kategori::destroy($id);
    		return response()->json($kategori);
    	}
    }

    public function editDataKategori(Request $request, $id)
    {
    	if ($request->ajax()) {
    		$kategori = Kategori::find($id);
    		$kategori->nama = $request->nama;
    		$kategori->save();
    		return response()->json($kategori);
    	}
    }

    public function getListKategori(Request $request)
    {
    	if($request->ajax()) {
    		$kategoris = Kategori::where('nama', 'LIKE',  '%' .$request->term. '%')->get();
    		$count = $kategoris->count();
    		$kategori[] = array(
				'id' => '0',
				'text' => 'Kategori tidak ditemukan..'
			);
			if ($count > 0) {
				foreach ($kategoris as $key => $value) {
					$kategori[$key]['id'] = $value->id;
					$kategori[$key]['text'] = $value->nama; 
				}
			}
			return response()->json($kategori);
    	}
    }
}

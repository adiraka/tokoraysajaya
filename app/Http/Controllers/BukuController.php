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

    public function addDataBuku(Request $request)
    {
    	if ($request->ajax()) {
    		$this->validate($request, [
    			'kode_buku' => 'required|unique:tb_buku',
    			'judul' => 'required',
    			'pengarang' => 'required',
    			'kategori_id' => 'required',
    			'tahun' => 'required',
    			'isbn' => 'required|unique:tb_buku',
    			'harga' => 'required',
    			'stock' => 'required',
    			'foto' => 'image',
    		]);
    		$foto_ok = "";
    		if ($request->foto)
    		{
    			$foto = $request->foto;
    			$extension = $foto->getClientOriginalExtension();
    			$fileName = date('Y-m-d') . '-' .rand(11111, 99999) . '.' . $extension;
    			$destinationPath = 'foto';
    			$foto_ok =  'foto/' . $fileName;
    			$upload_success = $foto->move($destinationPath, $fileName);
    		}
    		$buku = new Buku;
    		$buku -> kode_buku = $request -> kode_buku;
    		$buku -> judul = $request -> judul;
    		$buku -> pengarang = $request -> pengarang;
    		$buku -> kategori_id = $request -> kategori_id;
    		$buku -> tahun = $request -> tahun;
    		$buku -> isbn = $request -> isbn;
    		$buku -> harga = $request -> harga;
    		$buku -> stock = $request -> stock;
    		$buku -> foto = $foto_ok;
    		$buku -> save();
    		return response()->json($buku);
    	}
    }
}

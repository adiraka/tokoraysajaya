<?php

namespace BookApp\Http\Controllers;

use Datatables;
use File;
use BookApp\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use BookApp\Http\Requests;

class BukuController extends Controller
{
    public function index()
    {
        return view('admin.buku')->with('title', 'Data Buku');
    }

    public function getDataBuku()
    {
    	$bukus = Buku::all();
    	$lengkap = new Collection;
    	foreach ($bukus as $key => $buku) {
    		$lengkap->push([
    			'id' => $buku->id,
    			'kode_buku' => $buku->kode_buku,
    			'judul' => $buku->judul,
    			'pengarang' => $buku->pengarang,
    			'kategori_id' => $buku->kategori->nama,
    			'stock' => $buku->stock
    		]);
    	}
        return Datatables::of($lengkap)->make(true);
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
    		$fileName = "";
    		if ($request->foto)
    		{
    			$foto = $request->foto;
    			$extension = $foto->getClientOriginalExtension();
    			$fileName = date('Y-m-d') . '-' .rand(11111, 99999) . '.' . $extension;
    			$destinationPath = 'foto';
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
    		$buku -> foto = $fileName;
    		$buku -> save();
    		return response()->json($buku);
    	}
    }

    public function getDetailDataBuku(Request $request, $id)
    {
    	if ($request->ajax()) {
    		$kategori = Buku::find($id);
    		return response()->json($kategori);
    	}
    }

    public function deleteDataBuku(Request $request, $id)
    {
    	if ($request->ajax()) {
    		$buku = Buku::destroy($id);
    		return response()->json($buku);
    	}
    }

    public function editDataBuku(Request $request, $id)
    {
    	if($request->ajax()) {
    		$buku = Buku::find($id);
    		if($request->foto) {
    			if(File::exists('foto/'.$buku->foto)) {
    				File::delete('foto/'.$buku->foto);
    			}
    			$foto = $request->foto;
    			$extension = $foto->getClientOriginalExtension();
    			$fileName = date('Y-m-d') . '-' .rand(11111, 99999) . '.' . $extension;
    			$destinationPath = 'foto';
    			$upload_success = $foto->move($destinationPath, $fileName);
    			$buku->foto = $fileName;
    		}
    		$buku->kode_buku = $request->kode_buku;
    		$buku->judul = $request->judul;
    		$buku->pengarang = $request->pengarang;
    		$buku->kategori_id = $request->kategori_id;
    		$buku->tahun = $request->tahun;
    		$buku->isbn = $request->isbn;
    		$buku->harga = $request->harga;
    		$buku->stock = $request->stock;
    		$buku->save();
    		return response()->json($buku);
    	}
    }

    public function getListBuku(Request $request)
    {
        if($request->ajax()) {
            $bukus = Buku::where('judul', 'LIKE',  '%' .$request->term. '%')
                            ->orwhere('kode_buku', 'LIKE',  '%' .$request->term. '%')
                            ->get();
            $count = $bukus->count();
            $buku[] = array(
                'id' => '0',
                'text' => 'Kategori tidak ditemukan..'
            );
            if ($count > 0) {
                foreach ($bukus as $key => $value) {
                    $buku[$key]['id'] = $value->id;
                    $buku[$key]['text'] = $value->kode_buku.' - '.$value->judul; 
                }
            }
            return response()->json($buku);
        }
    }
}

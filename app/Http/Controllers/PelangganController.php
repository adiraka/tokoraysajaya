<?php

namespace BookApp\Http\Controllers;

use Datatables;
use BookApp\Models\Pelanggan;
use Illuminate\Http\Request;

use BookApp\Http\Requests;

class PelangganController extends Controller
{
    public function index()
    {
    	return view('admin.pelanggan')->with('title', 'Data Pelanggan');
    }

    public function getDataPelanggan()
    {
    	return Datatables::of(Pelanggan::query())->make(true);
    }

    public function addDataPelanggan(Request $request)
    {
    	if($request->ajax()) {
    		$this->validate($request, [
    			'nama' => 'required',
    		]);
    		$pelanggan = Pelanggan::create($request->all());
    		return response()->json($pelanggan);
    	}
    }

    public function getDetailDataPelanggan(Request $request, $id)
    {
    	if ($request->ajax()) {
    		$pelanggan = Pelanggan::find($id);
    		return response()->json($pelanggan);
    	}
    }

    public function deleteDataPelanggan(Request $request, $id)
    {
    	if ($request->ajax()) {
    		$pelanggan = Pelanggan::destroy($id);
    		return response()->json($pelanggan);
    	}
    }

    public function editDataPelanggan(Request $request, $id)
    {
    	if ($request->ajax()) {
    		$pelanggan = Pelanggan::find($id);
    		$pelanggan->nama = $request->nama;
    		$pelanggan->jenis_kelamin = $request->jenis_kelamin;
    		$pelanggan->telepon = $request->telepon;
    		$pelanggan->alamat = $request->alamat;
    		$pelanggan->save();
    		return response()->json($pelanggan);
    	}
    }
}

<?php

namespace BookApp\Http\Controllers;

use Illuminate\Http\Request;
use BookApp\Models\Buku;
use BookApp\Models\Transaksi;
use BookApp\Models\TransaksiDetail;
use BookApp\Http\Requests;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('admin.transaksi')->with('title', 'Transaksi Penjualan Buku');
    }

    public function addDataTransaksi(Request $request)
    {
    	$dataTransaksi = $request->dataTransaksi;
    	$detailTransaksi = $request->detailTransaksi;

    	$dataTransaksi = json_decode($dataTransaksi, true);
    	$detailTransaksi = json_decode($detailTransaksi, true);

    	foreach ($dataTransaksi as $transaksi) {
    		$data = new Transaksi;
    		$data->tanggal = $transaksi['tanggal'];
    		$data->nama_pelanggan = $transaksi['nama'];
    		$data->telepon = $transaksi['telepon'];
    		$data->total = $transaksi['total'];
    		$data->save();
    	}

    	$lastTrans = Transaksi::orderBy('created_at', 'desc')->first();
    	$lastID = $lastTrans->id;

    	foreach ($detailTransaksi as $transaksi) {
    		$data = new TransaksiDetail;
    		$data->transaksi_id = $lastID;
    		$data->buku_id = $transaksi['buku_id'];
    		$data->jumlah = $transaksi['jumlah'];
    		$data->subtotal = $transaksi['subtotal'];
    		$data->save();
    		$buku = Buku::find($transaksi['buku_id']);
    		$buku->stock = $transaksi['stock'];
    		$buku->save();
    	}

   		return response()->json(['alert' => 'Sukses']);
    }
}

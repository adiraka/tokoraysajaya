<?php

namespace BookApp\Http\Controllers;

use Datatables;
use Illuminate\Http\Request;
use BookApp\Models\Buku;
use BookApp\Models\Transaksi;
use BookApp\Models\TransaksiDetail;
use BookApp\Http\Requests;

class LaporanController extends Controller
{
    public function index()
    {
    	return view('admin.laporan')->with('title', 'Laporan Data Transaksi');
    }

    public function getDataTransaksi()
    {
    	$transaksi = Transaksi::all();
    	return Datatables::of($transaksi)->make(true);
    }

    public function getDetailTransaksi(Request $request, $id)
    {
        if($request->ajax()) {
        	$detail = TransaksiDetail::where('transaksi_id', $id)->get();
        	$data = [];
        	foreach ($detail as $key => $value) {
        		$data[$key]['kode_buku'] = $value->buku->kode_buku;
        		$data[$key]['judul'] = $value->buku->judul;
        		$data[$key]['harga'] = $value->buku->harga;
        		$data[$key]['jumlah'] = $value->jumlah;
        		$data[$key]['subtotal'] = $value->subtotal;
        	}
        	return response()->json($data);
        }
    }

    public function deleteTransaksi(Request $request, $id)
    {
        if ($request->ajax()) {
            $xxx = TransaksiDetail::where('transaksi_id', '=', $id)->get();
            foreach ($xxx as $value) {
                $data = Buku::find($value->buku_id);
                $data->stock = $data->stock + $value->jumlah;
                $data->save();
            }
            $detail = TransaksiDetail::where('transaksi_id', '=', $id)->delete();
            $transaksi = Transaksi::destroy($id);
            return response()->json($transaksi);
        }
    }
}

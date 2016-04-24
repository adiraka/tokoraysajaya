<?php

namespace BookApp\Http\Controllers;

use Illuminate\Http\Request;

use BookApp\Http\Requests;

class KonsumenController extends Controller
{
    public function index()
    {
    	return view('konsumen.dataKonsumen');
    }
}

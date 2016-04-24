<?php

namespace BookApp\Http\Controllers;

use Illuminate\Http\Request;

use BookApp\Http\Requests;

class BerandaController extends Controller
{
    public function index()
    {
    	return view('admin.beranda')->with('title', 'Dashboard');
    }
}

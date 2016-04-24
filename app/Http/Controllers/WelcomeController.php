<?php

namespace BookApp\Http\Controllers;

use Illuminate\Http\Request;

use BookApp\Http\Requests;

class WelcomeController extends Controller
{
	public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
    	return view('home');
    }
}

<?php

namespace App\Http\Controllers;

class Tfa6PageController extends Controller
{
    public function index()
    {
        return view('tfa6.home');
    }

    public function about()
    {
        return view('tfa6.about');
    }
}

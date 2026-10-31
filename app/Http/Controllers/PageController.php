<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function index()
    {
        return view('tfa5.home');
    }

    public function about()
    {
        return view('tfa5.about');
    }
}

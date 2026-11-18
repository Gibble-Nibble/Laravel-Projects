<?php

namespace App\Http\Controllers;

use App\Models\Tfa7Customer;
use App\Models\Tfa7User;

class Tfa7PageController extends Controller
{
    public function index()
    {
        return view('tfa7.home', [
            'customerCount' => Tfa7Customer::count(),
            'userCount' => Tfa7User::count(),
        ]);
    }

    public function about()
    {
        return view('tfa7.about');
    }
}

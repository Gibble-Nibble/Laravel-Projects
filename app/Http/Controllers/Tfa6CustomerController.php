<?php

namespace App\Http\Controllers;

use App\Models\Customer;

class Tfa6CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::query()->orderBy('id')->get();

        return view('tfa6.customers', compact('customers'));
    }
}

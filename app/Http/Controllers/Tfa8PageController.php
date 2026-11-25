<?php

namespace App\Http\Controllers;

use App\Models\Tfa8Customer;
use App\Models\Tfa8User;
use Illuminate\Contracts\View\View;

class Tfa8PageController extends Controller
{
    public function index(): View
    {
        return view('tfa8.home', [
            'customerCount' => Tfa8Customer::query()->count(),
            'userCount' => Tfa8User::query()->count(),
        ]);
    }

    public function about(): View
    {
        return view('tfa8.about');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;

class Tfa6UserController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->whereNotNull('username')
            ->orderBy('id')
            ->get();

        return view('tfa6.users', compact('users'));
    }
}

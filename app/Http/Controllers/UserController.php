<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function index()
    {
        $users = [
            ['id' => 1, 'name' => 'Alex Admin', 'email' => 'alex.admin@example.com', 'role' => 'Administrator'],
            ['id' => 2, 'name' => 'Bea Cashier', 'email' => 'bea.cashier@example.com', 'role' => 'Cashier'],
            ['id' => 3, 'name' => 'Carlo Manager', 'email' => 'carlo.manager@example.com', 'role' => 'Manager'],
            ['id' => 4, 'name' => 'Dana Cashier', 'email' => 'dana.cashier@example.com', 'role' => 'Cashier'],
            ['id' => 5, 'name' => 'Eli Supervisor', 'email' => 'eli.supervisor@example.com', 'role' => 'Supervisor'],
        ];

        return view('tfa5.users', compact('users'));
    }
}

<?php

namespace App\Http\Controllers;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = [
            ['id' => 1, 'name' => 'Maria Santos', 'email' => 'maria.santos@example.com', 'phone' => '0917 123 4567'],
            ['id' => 2, 'name' => 'Juan Dela Cruz', 'email' => 'juan.delacruz@example.com', 'phone' => '0918 234 5678'],
            ['id' => 3, 'name' => 'Angela Reyes', 'email' => 'angela.reyes@example.com', 'phone' => '0919 345 6789'],
            ['id' => 4, 'name' => 'Paolo Garcia', 'email' => 'paolo.garcia@example.com', 'phone' => '0920 456 7890'],
            ['id' => 5, 'name' => 'Sofia Mendoza', 'email' => 'sofia.mendoza@example.com', 'phone' => '0921 567 8901'],
        ];

        return view('tfa5.customers', compact('customers'));
    }
}

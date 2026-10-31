<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Tfa6Seeder extends Seeder
{
    public function run(): void
    {
        $customers = [
            ['full_name' => 'Maria Santos', 'email' => 'maria.santos@example.com', 'phone' => '0917 123 4567'],
            ['full_name' => 'Juan Dela Cruz', 'email' => 'juan.delacruz@example.com', 'phone' => '0918 234 5678'],
            ['full_name' => 'Angela Reyes', 'email' => 'angela.reyes@example.com', 'phone' => '0919 345 6789'],
            ['full_name' => 'Paolo Garcia', 'email' => 'paolo.garcia@example.com', 'phone' => '0920 456 7890'],
            ['full_name' => 'Sofia Mendoza', 'email' => 'sofia.mendoza@example.com', 'phone' => '0921 567 8901'],
        ];

        foreach ($customers as $customer) {
            Customer::updateOrCreate(['email' => $customer['email']], $customer);
        }

        $users = [
            ['username' => 'alex.admin', 'full_name' => 'Alex Admin', 'email' => 'alex.admin@example.com'],
            ['username' => 'bea.cashier', 'full_name' => 'Bea Cashier', 'email' => 'bea.cashier@example.com'],
            ['username' => 'carlo.manager', 'full_name' => 'Carlo Manager', 'email' => 'carlo.manager@example.com'],
            ['username' => 'dana.cashier', 'full_name' => 'Dana Cashier', 'email' => 'dana.cashier@example.com'],
            ['username' => 'eli.supervisor', 'full_name' => 'Eli Supervisor', 'email' => 'eli.supervisor@example.com'],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['username' => $user['username']],
                [...$user, 'name' => $user['full_name'], 'password' => Hash::make('password')],
            );
        }
    }
}

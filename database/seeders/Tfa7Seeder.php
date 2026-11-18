<?php

namespace Database\Seeders;

use App\Models\Tfa7Customer;
use App\Models\Tfa7User;
use Illuminate\Database\Seeder;

class Tfa7Seeder extends Seeder
{
    public function run(): void
    {
        foreach ([
            ['full_name' => 'TFA7 Maria Santos', 'email' => 'tfa7.maria@example.com', 'phone' => '0917 700 0001'],
            ['full_name' => 'TFA7 Juan Dela Cruz', 'email' => 'tfa7.juan@example.com', 'phone' => '0918 700 0002'],
        ] as $customer) {
            Tfa7Customer::updateOrCreate(['email' => $customer['email']], $customer);
        }

        foreach ([
            ['username' => 'tfa7.admin', 'full_name' => 'TFA7 Administrator', 'email' => 'tfa7.admin@example.com'],
            ['username' => 'tfa7.cashier', 'full_name' => 'TFA7 Cashier', 'email' => 'tfa7.cashier@example.com'],
        ] as $user) {
            Tfa7User::updateOrCreate(['username' => $user['username']], $user);
        }
    }
}

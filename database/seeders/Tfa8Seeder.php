<?php

namespace Database\Seeders;

use App\Models\Tfa8Customer;
use Illuminate\Database\Seeder;

class Tfa8Seeder extends Seeder
{
    public function run(): void
    {
        foreach ([
            ['full_name' => 'Avery Customer', 'email' => 'avery@example.com', 'phone' => '555-0101'],
            ['full_name' => 'Jordan Customer', 'email' => 'jordan@example.com', 'phone' => '555-0102'],
        ] as $customer) {
            Tfa8Customer::query()->updateOrCreate(
                ['email' => $customer['email']],
                $customer,
            );
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create([
            "name" => 'Mark',
            "username" => 'mark123',
            "email" => 'mark123@gmail.com',
            "phone" => '9876555210',
            "password" => Hash::make('Mark@12345'),
            "address" => "San Francisco California ",
        ]);
    }
}

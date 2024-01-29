<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            "name" => 'Admin',
            "username" => 'admin123',
            "email" => 'admin123@gmail.com',
            "phone" => '9876543210',
            "password" => Hash::make('Admin@1234'),
            "address" => "San Andreas",
            "usertype" => 1
        ]);
    }
}

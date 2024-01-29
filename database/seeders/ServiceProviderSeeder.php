<?php

namespace Database\Seeders;

use App\Models\ServiceProvider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ServiceProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServiceProvider::create([
            "name" => 'Sam',
            "username" => 'Sam123',
            "email" => 'Sam123@gmail.com',
            "phone" => '9846432224',
            "password" => Hash::make('Sam@123456'),
            "address" => "Peris France",
        ]);
    }
}

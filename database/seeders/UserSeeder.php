<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::Create([
            'name' => 'Admin ThriftShop',
            'email' => 'admin@thriftshop.it',
            'password' => Hash::make('12345678'),
            'is_admin' => true,
            'is_revisor' => true
        ]);
    }
}

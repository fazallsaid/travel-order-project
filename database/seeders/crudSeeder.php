<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class crudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Users::create([
            'email' => 'admin@mail.com',
            'password' => Hash::make('dsadsadsa'),
            'first_name' => 'Admin',
            'last_name' => 'Pusat',
            'whatsapp' => '081234567890',
            'role' => 1,
        ]);

        Users::create([
            'email' => 'user1@mail.com',
            'password' => Hash::make('dsadsadsa'),
            'first_name' => 'User',
            'last_name' => 'Satu',
            'whatsapp' => '081234567891',
            'role' => 2,
        ]);

        Users::create([
            'email' => 'user2@mail.com',
            'password' => Hash::make('dsadsadsa'),
            'first_name' => 'User',
            'last_name' => 'Dua',
            'whatsapp' => '081234567892',
            'role' => 2,
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('email', 'admin@gmail.com')->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'is_admin' => true,
            ]);
        }
    }
}

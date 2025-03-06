<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'uuid' => 'Surya0710',
            'username' => 'Surya0710',
            'name' => 'Surya',
            'email' => 'surya@gmail.com',
            'phone' => '1234567890',
            'password' => Hash::make('Surya#12'),
            'transaction_password' => Hash::make('0710'),
            'user_type' => 'Boss',
            'status' => 1,
            'country' => 'India',
            'invitation_code' => Str::random(8) . rand(100,999),
            'badge' => null,
            'created_at' => now(),
        ]);
    }
}

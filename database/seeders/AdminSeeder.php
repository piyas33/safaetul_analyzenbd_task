<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::query()->where('email', 'user@gmail.com')->exists()) {
            User::create([
                'name' => 'Supper User',
                'email' => 'user@gmail.com',
                'image' => '/user.png',
                'password' => Hash::make('123456')
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       
        User::create([
            'name'              => 'M Dede Hidayatullah',
            'email'             => 'pasarsafe346@gmail.com',
            'phone'             => '6281290645584',
            'role'              => 'admin',
            'email_verified_at' => now(),
            'password'          => Hash::make('11223344')
        ]);
    }
}

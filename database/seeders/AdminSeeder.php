<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
   
    public function run()
    {
        if (!User::where('email', 'kola@gmail.com')->exists()) {
             User::create([
            'name' => 'kola',
            'email' => 'kola@gmail.com',
             'password' => Hash::make('password'),
            'user' => 'admin',
            ]);
        }

    }
}



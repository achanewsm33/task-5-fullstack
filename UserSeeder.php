<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Nabilah Fayza Amani',
            'email' => 'yoksmabarkuy@gmail.com',
            'password' => Hash::make('F@7z4U!N0d3J$'), // password default
        ]);
    }
}

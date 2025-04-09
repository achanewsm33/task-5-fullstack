<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
            'password' => Hash::make('F@yz4Ap1'), // default login password
        ]);
    }
}

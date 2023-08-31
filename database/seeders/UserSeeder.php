<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'Admin', 
            'email' => 'admin@gmail.com',
            'phone' => '01812345678',
            'address' => 'mirpur-14, dhaka',
            'password' => bcrypt('password'),
            'isAdmin' => '1'
        ]);
    }
}

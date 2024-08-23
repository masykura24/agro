<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'user',
            'email' => 'user@agro.com',
            'password' => bcrypt('password')
        ]);
        $user->assignRole('user');

        $seller = User::create([
            'name' => 'seller',
            'email' => 'seller@agro.com',
            'password' => bcrypt('password')
        ]);
        $seller->assignRole('seller');

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@agro.com',
            'password' => bcrypt('password')
        ]);
        $admin->assignRole('admin');
    }
}

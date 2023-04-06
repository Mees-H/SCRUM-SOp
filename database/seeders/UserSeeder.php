<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'test@gmail.com',
            'password' => bcrypt('Ab12345!'),
            'role_id' => 1,
        ]);

        User::create([
            'name' => 'coach',
            'email' => 'test2@gmail.com',
            'password' => bcrypt('Ab12345!'),
            'role_id' => 2,
        ]);

        User::create([
            'name' => 'supervisor',
            'email' => 'test3@gmail.com',
            'password' => bcrypt('Ab12345!'),
            'role_id' => 3,
        ]);
    }
}

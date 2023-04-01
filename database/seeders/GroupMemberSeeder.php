<?php

namespace Database\Seeders;

use App\Models\GroupMember;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GroupMember::create([
            'group_id' => 1,
            'name' => 'Emilia van Dijk',
            'adress' => 'Kerkstraat 32',
            'city' => 'Amsterdam',
            'email' => 'emiliavandijk87@gmail.com',
            'phone_number' => '0612345678',
            'description' => 'Ik ben 34 jaar en ik heb spasme.',
        ]);

        
    }
}

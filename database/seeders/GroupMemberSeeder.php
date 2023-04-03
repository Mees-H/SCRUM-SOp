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
            'name' => 'Jan Bakker',
            'adress' => 'Kreeftstraat 2',
            'city' => 'Rotterdam',
            'email' => 'janb@gmail.com',
            'phone_number' => '0612347678',
            'description' => 'Ik ben 40 jaar en kan goed golfen',
        ]);
        GroupMember::create([
            'group_id' => 1,
            'name' => 'Emilia van Dijk',
            'adress' => 'Kerkstraat 32',
            'city' => 'Amsterdam',
            'email' => 'emiliavandijk87@gmail.com',
            'phone_number' => '0612345678',
            'description' => 'Ik ben 34 jaar en ik heb spasme.',
        ]);
        GroupMember::create([
            'group_id' => 1,
            'name' => 'Kees van der Veen',
            'adress' => 'Hofweg 3',
            'city' => 'Amsterdam',
            'email' => 'kvdv@hotmail.com',
            'phone_number' => '0612345678',
            'description' => 'Ik heb een geestelijke handicap',
        ]);

        GroupMember::create([
            'group_id' => 2,
            'name' => 'Klaas Jacobs',
            'adress' => 'Erfweg 5',
            'city' => 'Den Haag',
            'email' => 'kjac@gmail.com',
            'phone_number' => '0612345678',
            'description' => 'Ik ben 23 en ik heb een lichamelijke handicap',
        ]);
    }
}

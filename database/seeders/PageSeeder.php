<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::factory()->create([
            'id' => 1,
            'title' => 'Evenementen'
        ]);

        Page::factory()->create([
            'id' => 2,
            'title' => 'Trainingen'
        ]);

        Page::factory()->create([
            'id' => 3,
            'title' => 'Veelgestelde vragen'
        ]);

        Page::factory()->create([
            'id' => 4,
            'title' => 'Partners'
        ]);

        Page::factory()->create([
            'id' => 5,
            'title' => 'Nieuws'
        ]);
    }
}

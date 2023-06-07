<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::create([
            'id' => 1,
            'title' => 'training',
        ]);

        Page::create([
            'id' => 2,
            'title' => 'evenement',
        ]);

        Page::create([
            'id' => 3,
            'title' => 'albums',
        ]);

        Page::create([
            'id' => 4,
            'title' => 'vragenantwoorden',
        ]);

        Page::create([
            'id' => 5,
            'title' => 'nieuws',
        ]);

        Page::create([
            'id' => 6,
            'title' => 'partner',
        ]);

        Page::create([
            'id' => 7,
            'title' => 'team',
        ]);

        Page::create([
            'id' => 8,
            'title' => 'overons',
        ]);

        Page::create([
            'id' => 9,
            'title' => 'locatie',
        ]);

        Page::create([
            'id' => 10,
            'title' => 'links',
        ]);
    }
}

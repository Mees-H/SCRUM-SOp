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
            'url' => 'training',
            'title' => 'Trainingen',
            'banner_image' => 'training.jpg'
        ]);

        Page::create([
            'id' => 2,
            'url' => 'evenement',
            'title' => 'Evenementen'
        ]);

        Page::create([
            'id' => 3,
            'url' => 'albums',
            'title' => 'Galerij'
        ]);

        Page::create([
            'id' => 4,
            'url' => 'vragenantwoorden',
            'title' => 'Veelgestelde vragen'
        ]);

        Page::create([
            'id' => 5,
            'url' => 'nieuws',
            'title' => 'Nieuws'
        ]);

        Page::create([
            'id' => 6,
            'url' => 'partner',
            'title' => 'Partners'
        ]);

        Page::create([
            'id' => 7,
            'url' => 'team',
            'title' => 'Team'
        ]);

        Page::create([
            'id' => 8,
            'url' => 'overons',
            'title' => 'Over Ons'
        ]);

        Page::create([
            'id' => 9,
            'url' => 'locatie',
            'title' => 'Locatie'
        ]);

        Page::create([
            'id' => 10,
            'url' => 'links',
            'title' => 'Links'
        ]);

        Page::create([
            'id' => 11,
            'url' => '',
            'title' => 'Special Golf Haverleij'
        ]);
    }
}

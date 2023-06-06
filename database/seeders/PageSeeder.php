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
            'title' => 'Trainingen',
        ]);

        Page::create([
            'id' => 2,
            'title' => 'Evenementen',
        ]);

        Page::create([
            'id' => 3,
            'title' => 'Galerij',
        ]);

        Page::create([
            'id' => 4,
            'title' => 'Veelgestelde_Vragen',
        ]);

        Page::create([
            'id' => 5,
            'title' => 'Nieuws',
        ]);

        Page::create([
            'id' => 6,
            'title' => 'Partners',
        ]);

        Page::create([
            'id' => 7,
            'title' => 'Team',
        ]);

        Page::create([
            'id' => 8,
            'title' => 'Over_Ons',
        ]);

        Page::create([
            'id' => 9,
            'title' => 'Locatie',
        ]);

        Page::create([
            'id' => 10,
            'title' => 'Links',
        ]);
    }
}

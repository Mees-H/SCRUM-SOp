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
            'banner_image' => 'default.jpg'
        ]);

        Page::create([
            'id' => 2,
            'title' => 'evenement',
            'banner_image' => 'default.jpg'
        ]);

        Page::create([
            'id' => 3,
            'title' => 'albums',
            'banner_image' => 'default.jpg'
        ]);

        Page::create([
            'id' => 4,
            'title' => 'vragenantwoorden',
            'banner_image' => 'default.jpg'
        ]);

        Page::create([
            'id' => 5,
            'title' => 'nieuws',
            'banner_image' => 'default.jpg'
        ]);

        Page::create([
            'id' => 6,
            'title' => 'partner',
            'banner_image' => 'default.jpg'
        ]);

        Page::create([
            'id' => 7,
            'title' => 'team',
            'banner_image' => 'default.jpg'
        ]);

        Page::create([
            'id' => 8,
            'title' => 'overons',
            'banner_image' => 'default.jpg'
        ]);

        Page::create([
            'id' => 9,
            'title' => 'locatie',
            'banner_image' => 'default.jpg'
        ]);

        Page::create([
            'id' => 10,
            'title' => 'links',
            'banner_image' => 'default.jpg'
        ]);
    }
}

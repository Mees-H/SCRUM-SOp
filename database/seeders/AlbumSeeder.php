<?php

namespace Database\Seeders;

use App\Models\Album;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Album::factory()->create([
            'id' => 1,
            'title' => 'Album 1',
            'description' => 'Dit is album 1',
            'date' => '2021-01-01'
        ]);
        Album::factory()->create([
            'id' => 2,
            'title' => 'Album 2',
            'description' => 'Dit is album 2',
            'date' => '2022-01-01'
        ]);
         Album::factory()->create([
            'id' => 3,
            'title' => 'Album 3',
            'description' => 'Dit is album 3',
            'date' => '2022-04-01'
        ]);
    }
}

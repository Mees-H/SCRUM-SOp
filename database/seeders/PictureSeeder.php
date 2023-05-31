<?php

namespace Database\Seeders;

use App\Models\Picture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Picture::factory()->create([
            'id' => 1,
            'album_id' => 1,
            'image' => 'album1foto1.jpg'
        ]);
        Picture::factory()->create([
            'id' => 2,
            'album_id' => 1,
            'image' => 'album1foto2.jpeg'
        ]);
        Picture::factory()->create([
            'id' => 3,
            'album_id' => 1,
            'image' => 'album1foto3.jpeg'
        ]);
        Picture::factory()->create([
            'id' => 4,
            'album_id' => 2,
            'image' => 'album2foto1.jpg'
        ]);
    }
}

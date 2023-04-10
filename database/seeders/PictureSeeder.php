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
            'imageUrl' => 'https://www.specialgolfhaverleij2021.com/uploads/1/4/0/3/140360495/a61897bc-6113-466c-827d-bbe3c75537b6_orig.jpg'
        ]);
        Picture::factory()->create([
            'id' => 2,
            'album_id' => 1,
            'imageUrl' => 'https://www.specialgolfhaverleij2021.com/uploads/1/4/0/3/140360495/img-0321_orig.jpeg'
        ]);
        Picture::factory()->create([
            'id' => 3,
            'album_id' => 1,
            'imageUrl' => 'https://www.specialgolfhaverleij2021.com/uploads/1/4/0/3/140360495/7bce0e71-6854-4429-b5d3-1ce6a051f800.jpeg'
        ]);
        Picture::factory()->create([
            'id' => 4,
            'album_id' => 2,
            'imageUrl' => 'https://www.specialgolfhaverleij2021.com/uploads/1/4/0/3/140360495/65cf6eb0-24b6-46bc-a569-80c3a9af1b7e.jpg'
        ]);
    }
}

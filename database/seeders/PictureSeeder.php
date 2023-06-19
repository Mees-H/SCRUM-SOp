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
        Picture::factory()->create([
            'id' => 5,
            'album_id' => 4,
            'image' => '0f667944-3c9a-45cb-b6cb-583b47ce7cc8_orig.jpeg'
        ]);
        Picture::factory()->create([
            'album_id' => 4,
            'image' => 'a1dc4372-d00d-4dd6-a627-b06b8b6b9c46_orig.jpeg'
        ]);
        Picture::factory()->create([
            'album_id' => 4,
            'image' => '2f40ddff-30ce-4eda-ad5c-d1f927d33733_orig.jpeg'
        ]);
        Picture::factory()->create([
            'album_id' => 4,
            'image' => '5fa3cc75-c353-49f8-b7a1-1beb4a8dae19_orig.jpeg'
        ]);

        Picture::factory()->create([
            'album_id' => 4,
            'image' => '24fae835-0002-4b31-ba9a-1e52d1202ab4_orig.jpeg'
        ]);
        Picture::factory()->create([
            'album_id' => 4,
            'image' => 'f4f70767-0e32-4ce3-bb10-9531ed745043_orig.jpeg'
        ]);
        Picture::factory()->create([
            'album_id' => 4,
            'image' => '0dd3cd40-e4a2-488a-9b10-12c35db84bbc_orig1687169209.jpeg'
        ]);
        Picture::factory()->create([
            'album_id' => 4,
            'image' => 'ff575d97-7a2d-466e-97f3-5db43593f6ff_orig.jpeg'
        ]);

        Picture::factory()->create([
            'album_id' => 5,
            'image' => '3e61f72f-9327-438a-b217-c76cbfc940ce_orig.jpeg'
        ]);
        Picture::factory()->create([
            'album_id' => 5,
            'image' => '3e3032b9-3601-4570-8d4f-1df3c8bf3bc5_orig.jpeg'
        ]);
        Picture::factory()->create([
            'album_id' => 5,
            'image' => '21e9def3-5fe8-4da4-b830-c294b41b7305_orig.jpeg'
        ]);
        Picture::factory()->create([
            'album_id' => 5,
            'image' => '27b882a6-f74a-4ee2-815f-3ec8b01c8d88_orig.jpeg'
        ]);
        Picture::factory()->create([
            'album_id' => 5,
            'image' => '38fca057-f1da-4564-84ba-69c8f76e27b7_orig.jpeg'
        ]);
        Picture::factory()->create([
            'album_id' => 5,
            'image' => '40d526be-32a4-48e8-90bf-146559439773_orig.jpeg'
        ]);
        Picture::factory()->create([
            'album_id' => 5,
            'image' => '98f74e86-19b7-4298-86d4-4a3585228cf4_orig.jpeg'
        ]);
        Picture::factory()->create([
            'album_id' => 5,
            'image' => 'b21c6a90-2ddb-4e0f-b7c7-01975d14b5b2_orig.jpeg'
        ]);
        Picture::factory()->create([
            'album_id' => 5,
            'image' => '571664a5-daa6-4768-9411-c858fc878c67_orig.jpeg'
        ]);
        Picture::factory()->create([
            'album_id' => 5,
            'image' => '7604591e-9aab-4b96-8792-75e4383c716a_orig.jpeg'
        ]);
        Picture::factory()->create([
            'album_id' => 6,
            'image' => '6adc2b78-3e14-4a27-9d0b-fd7e8e6935e9_orig.jpeg'
        ]);
        Picture::factory()->create([
            'album_id' => 6,
            'image' => '7d41f2da-b70a-47b1-bf31-d17dbcd8fd9f_orig.jpeg'
        ]);
        Picture::factory()->create([
            'album_id' => 6,
            'image' => '19c530b2-a2f6-4333-964b-77494f581e38_orig.jpeg'
        ]);
        Picture::factory()->create([
            'album_id' => 6,
            'image' => '29f876f1-a3d7-432b-bb9f-93943cc1dbc7_orig.jpeg'
        ]);
        Picture::factory()->create([
            'album_id' => 6,
            'image' => '6405adfe-e7b0-4d7a-abd3-d92283023543_orig.jpeg'
        ]);
        Picture::factory()->create([
            'album_id' => 6,
            'image' => '524898af-ddc1-43f0-9d63-e1f7bdba21b7_orig.jpeg'
        ]);
        Picture::factory()->create([
            'album_id' => 6,
            'image' => 'a94ab05d-db40-4599-9c58-f87e77963b75_orig.jpeg'
        ]);
        Picture::factory()->create([
            'album_id' => 6,
            'image' => 'dbcae96c-b0e8-42a6-b22c-da360f6f0e45_orig.jpeg'
        ]);
        Picture::factory()->create([
            'album_id' => 6,
            'image' => 'df79a5d3-59aa-4118-b023-0066a507ac6b_orig.jpeg'
        ]);
        Picture::factory()->create([
            'album_id' => 6,
            'image' => 'f3e83bad-4a6b-493d-99a8-366fcd162437_orig.jpeg'
        ]);


        Picture::factory()->create([
            'album_id' => 7,
            'image' => ''
        ]);

        Picture::factory()->create([
            'album_id' => 7,
            'image' => ''
        ]);
        Picture::factory()->create([
            'album_id' => 7,
            'image' => ''
        ]);
        Picture::factory()->create([
            'album_id' => 7,
            'image' => ''
        ]);
        Picture::factory()->create([
            'album_id' => 7,
            'image' => ''
        ]);
        Picture::factory()->create([
            'album_id' => 7,
            'image' => ''
        ]);

        Picture::factory()->create([
            'album_id' => 7,
            'image' => ''
        ]);
        Picture::factory()->create([
            'album_id' => 7,
            'image' => ''
        ]);
        Picture::factory()->create([
            'album_id' => 7,
            'image' => ''
        ]);
        Picture::factory()->create([
            'album_id' => 7,
            'image' => ''
        ]);
        Picture::factory()->create([
            'album_id' => 7,
            'image' => ''
        ]);

        Picture::factory()->create([
            'album_id' => 7,
            'image' => ''
        ]);
        Picture::factory()->create([
            'album_id' => 7,
            'image' => ''
        ]);
        Picture::factory()->create([
            'album_id' => 7,
            'image' => ''
        ]);
        Picture::factory()->create([
            'album_id' => 7,
            'image' => ''
        ]);
        Picture::factory()->create([
            'album_id' => 7,
            'image' => ''
        ]);

        Picture::factory()->create([
            'album_id' => 7,
            'image' => ''
        ]);
        Picture::factory()->create([
            'album_id' => 7,
            'image' => ''
        ]);
        Picture::factory()->create([
            'album_id' => 7,
            'image' => ''
        ]);
        Picture::factory()->create([
            'album_id' => 7,
            'image' => ''
        ]);




    }
}

<?php

namespace Database\Seeders;

use App\Models\Picture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Album;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ImageSeeder::class);
        $this->call(EventAndGroupSeeder::class);
        $this->call(AlbumSeeder::class);
        $this->call(PictureSeeder::class);
        $this->call(FAQSeeder::class);
    }



}

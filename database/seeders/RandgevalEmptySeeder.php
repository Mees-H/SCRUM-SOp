<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Picture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RandgevalEmptySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Album::truncate();
        Picture::truncate();
    }
}

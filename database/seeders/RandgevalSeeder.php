<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Picture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RandgevalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Album::truncate();
        Picture::truncate();

        $numberOfInstances = 1000;

        DB::transaction(function () use ($numberOfInstances) {
            Album::factory()->count($numberOfInstances)->create();
        });
        DB::transaction(function () use ($numberOfInstances) {
            Picture::factory()->count($numberOfInstances)->create();
        });
    }
}

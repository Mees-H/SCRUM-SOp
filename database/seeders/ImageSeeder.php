<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sliders')->insert([
            'image' => 'Slider1.jpg',
        ]);

        DB::table('sliders')->insert([
            'image' => 'Slider2.jpg',
        ]);
    }
}

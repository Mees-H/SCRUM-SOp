<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call(ImageSeeder::class);
        $this->call(MemberSeeder::class);
        $this->call(EventAndGroupSeeder::class);
        $this->call(AlbumSeeder::class);
        $this->call(PictureSeeder::class);
        $this->call(FAQSeeder::class);
        $this->call(OefensessieSeeder::class);
    }



}
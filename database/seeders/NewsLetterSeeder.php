<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NewsLetter;

class NewsLetterSeeder extends Seeder
{
    public function run(): void
    {
        NewsLetter::create([
            'date' => '2023-04-01',
            'pdf' => '01-04-2023.pdf'
        ]);

        NewsLetter::create([
            'date' => '2023-01-31',
            'pdf' => '31-01-2023.pdf'
        ]);

        NewsLetter::create([
            'date' => '2023-05-25',
            'pdf' => '25-05-2023.pdf'
        ]);
    }
}

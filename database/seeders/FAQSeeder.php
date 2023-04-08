<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FAQSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('faq')->insert([
            'question' => "Hoe kan ik me aanmelden voor evenementen?",
            'answer' => "U kunt op 'evenementen' in de menubalk klikken en vervolgens op 'aanmelden' klikken.",
        ]);

        DB::table('faq')->insert([
            'question' => "Hoe kan ik een vraag stellen die hier niet bij staat?",
            'answer' => "U kunt me op mail@mailadres.nl bereiken om een vraag te stellen.",
        ]);

        DB::table('faq')->insert([
            'question' => "Hoe kan ik zien waar mijn trainingen plaatsvinden?",
            'answer' => "U kunt op 'trainingen' in de menubalk klikken, waar u vervolgens een agenda met trainingen ziet.",
        ]);
    }
}

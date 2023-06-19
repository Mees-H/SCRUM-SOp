<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FooterSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('footer')->insert([
            'secretariaat' => "specialgolfhaverleij@gmail.com",
            'rekeningnummer' => "NL 38 RABO 0118102206",
            'KvKnr' => "88714543",
            'RSIN' => '864744328',
        ]);
    }
}

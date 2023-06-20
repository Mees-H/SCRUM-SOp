<?php

namespace Database\Seeders;

use App\Models\Album;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Album::factory()->create([
            'id' => 1,
            'title' => 'Album 1',
            'description' => 'Dit is album 1',
            'date' => '2021-01-01'
        ]);
        Album::factory()->create([
            'id' => 2,
            'title' => 'Album 2',
            'description' => 'Dit is album 2',
            'date' => '2022-01-01'
        ]);
         Album::factory()->create([
            'id' => 3,
            'title' => 'Album 3',
            'description' => 'Dit is album 3',
            'date' => '2022-04-01'
        ]);

         //Actuele albums
        Album::factory()->create([
            'id' => 4,
            'title' => 'Max Albertus',
            'description' => 'Op initiatief en onder leiding van Helmuth van Heel, gaf Max Albertus een golfdemonstratie op BurgGolf Haverleij aan de Jeugdcommissie waar ook enkele deelnemers van Special Golf bij aanwezig waren. Onder tropische temperatuur liet Max Albertus zien wat er binnen de golfvaardigheden allemaal mogelijk was.',
            'date' => '2023-11-06'
        ]);

        Album::factory()->create(
            [
                'id' => 5,
                'title' => 'Een warme zonnige dag',
                'description' => 'Ondanks een oplopende temperatuur naar 30 graden hebben de deelnemers weer met veel plezier deelgenomen aan de golfoefeningen.
                Korte pauzes met voldoende water maakte het mogelijk om samen de golfvaardigheden ter hand te nemen. Ook werd gespeeld op de Par-3 baan waar met name het korte spel werd doorgenomen.',
                'date' => '2023-10-06'
            ]
        );
        Album::factory()->create(
            [
                'id' => 6,
                'title' => 'Special Golf Extreem',
                'description' => 'Op de Par-3 baan werd afgeslagen met een \'tennisopslag\' en een \'hockeyafslag\' - waarna werd verder gespeeld met de golfclubs en golfballen. Een speed hole stond ook op het programma (hoe snel kun je op een hole uitholen) en werd het opgenomen tegen de Pro.',
                'date' => '2023-09-06'
            ]
        );

    }
}

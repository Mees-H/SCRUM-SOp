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
                'description' => 'Op de Par-3 baan werd afgeslagen met een \'tennisopslag\' en een \'hockeyafslag\' - waarna werd verder gespeeld met de golfclubs en golfballen. Een speed hole stond ook op het programma (hoe snel kun je op een hole uitholen) en werd het opgenomen tegen de Pro.Op de Par-3 baan werd afgeslagen met een \'tennisopslag\' en een \'hockeyafslag\' - waarna werd verder gespeeld met de golfclubs en golfballen. Een speed hole stond ook op het programma (hoe snel kun je op een hole uitholen) en werd het opgenomen tegen de Pro.',
                'date' => '2023-09-06'
            ]
        );

        Album::factory()->create([
            'id' => 7,
            'title' => 'Special Golf - Prise d\'Eau',
            'description' => 'Golf uitwisseling op BurgGolf Haverleij. Wedstrijd werd gespeeld op de par-3 baan waaraan 6 flights deelname. Iedere deelnemer werd gekoppeld aan een unified speler. Tijdens de wedstrijd kon op hole 9 een birdie worden verdiend, waar drie deelnemers in slaagde. Mede door onze sponsoren De plus in Engelen, Sportprijzen in Vught, BurgGolf Haverleij en KAVautoverhuur kunnen we terugkijken op een succesvolle dag.',
            'date' => '2023-05-13',
        ]);


        Album::factory()->create(
            [
                'id' => 8,
                'title' => 'Oefensessie BurgGolf Haverleij',
                'description' => 'Bij het chippen en putten konden de deelnemers zich weer uiten in hun golfvaardigheden. Tijdens de par-3 ronde werden deelnemers verrast met een bezoek door Kees van de Bevers, en kreeg Johan een birdie uitgereikt inclusief een golfbal van de golfprofessional voor het team voor hun prestatie in de baan. Een geslaagde middag met een zonnetje.',
                'date' => '2023-06-05'
            ]
        );

        Album::factory()->create(
            [
                'id' => 9,
                'title' => 'Special Golf Bokaal Liemeer',
                'description' => '',
                'date' => '2023-04-22'
            ]
        );
        Album::factory()->create(
            [
                'id' => 10,
                'title' => 'Indoor Golf',
                    'description' => '',
                'date' => '2023-01-21'
            ]
        );
        Album::factory()->create(
            [
                'id' => 11,
                'title' => 'Uitreiking certificaten',
                    'description' => 'Het najaar werd afgesloten met het uitreiken van de certificaten aan de deelnemers van Special Golf in het restaurant van het clubgebouw van de golfbaan onder genot van een drankje, aangeboden door BurgGolf Haverleij, met de afspraak, dat we elkaar terug zien, tijdens de oefensessie, na de winterstop op 4 maart 2023.',
                'date' => '2022-11-26'
            ]
        );
        Album::factory()->create(
            [
                'id' => 12,
                'title' => 'Oefensessie BurgGolf Haverleij',
                    'description' => '',
                'date' => '2022-10-01'
            ]
        );
        Album::factory()->create(
            [
                'id' => 13,
                'title' => 'Open Prise d\'Eau Tilburg',
                    'description' => '',
                'date' => '2022-09-17'
            ]
        );
        Album::factory()->create(
            [
                'id' => 14,
                'title' => 'Golf-Skills-Middag Haverleij',
                    'description' => '',
                'date' => '2022-09-17'
            ]
        );
        Album::factory()->create(
            [
                'id' => 15,
                'title' => 'Golfmiddag',
                    'description' => '',
                'date' => '2022-09-11'
            ]
        );
        Album::factory()->create(
            [
                'id' => 16,
                'title' => 'Start najaar met oefensessies',
                    'description' =>  '',
                'date' => '2022-09-03'
            ]
        );
        Album::factory()->create(
            [
                'id' => 17,
                'title' => 'Afsluiting voorjaar en uitreiking certificaten',
                    'description' => '',
                'date' => '2022-07-30'
            ]
        );
        Album::factory()->create(
            [
                'id' => 18,
                'title' => 'Skills',
                    'description' => '',
                'date' => '2022-07-17'
            ]
        );
        Album::factory()->create(
            [
                'id' => 19,
                'title' => 'Opleiding en materialen',
                    'description' => '',
                'date' => '2022-07-05'
            ]
        );Album::factory()->create(
        [
            'id' => 20,
            'title' => 'Nationale Special Olympics',
                'description' => '',
                'date' => '2022-06-12'
            ]
        );
        Album::factory()->create(
            [
                'id' => 21,
                'title' => 'G-Tennis Haverleij',
                    'description' => '',
                'date' => '2022-06-04'
            ]
        );
        Album::factory()->create(
            [
                'id' => 22,
                'title' => 'Golfdag Prise d\'Eau',
                    'description' => '',
                'date' => '2022-05-21'
            ]
        );
        Album::factory()->create(
            [
                'id' => 23,
                'title' => 'Golfbokaal Liemeer',
                    'description' => '',
                'date' => '2022-04-23'
            ]
        );
        Album::factory()->create(
            [
                'id' => 24,
                'title' => 'BurgGolf Haverleij',
                    'description' => '',
                'date' => '2022-04-09'
            ]
        );
        Album::factory()->create(
            [
                'id' => 25,
                'title' => 'BurgGolf Haverleij',
                    'description' => '',
                'date' => '2022-03-05'
            ]
        );
        Album::factory()->create(
            [
                'id' => 26,
                'title' => 'Impressie Special Golf',
                    'description' => '',
                'date' => '2022-02-05'
            ]
        );




    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Event;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        Event::create([
            'title' => 'Indoor-Golf-Middag',
            'date' => '2023-01-21',
            'slug' => 'event_1',
            'body' => 'Tijdens de winterstop organiseert Special Golf een Indoor-Golf-Middag voor de deelnemers van Special Golf. Begeleiders gaan bij Cello op De Binckhorst in Rosmalen een put & chip parcours uitzetten waar de deelnemers hun golfvaardigheid kunnen oefenen op verschillende onderdelen. We sluiten de middag af met een drankje.'
        ]);

        Event::create([
            'title' => 'Pro\'s en Begeleiders meeting',
            'date' => '2023-01-28',
            'slug' => 'event_2',
            'body' => 'Golfleraren en begeleiders die betrokken zijn bij Special Golf, kijken o deze dag terug op 2022 en focussen zich op het programma voor het seizoen 2023. Er wordt afgestemd over onderwerpen gerelateerd aan de oefensessies die op de zaterdagmiddag plaatsvinden op BurgGolf Haverleij, en de organisatie daar omheen. De beschikbaarheid van alle betrokkenen, de aanwezigheid bij wedstrijden en opleiding begeleiders komen eveneens aan de orde.'
        ]);

        Event::create([
            'title' => 'Special Golf - Prise d\'Eau',
            'date' => '2023-04-08',
            'slug' => 'event_3',
            'body' => 'Special Golf organiseert op deze dag een ontmoet met G-Golf Prise d\'Eau op de banen van BurgGolf Haverleij. Deelnemers en begeleiders (unified) spelen een ronde op de Par-3 baan en gaan aan de slag met skills. Deze ontmoeting is het tegenbezoek voor het spelen op Prise d’Eau in mei 2022. Na ontvangst in het clubgebouw van BurgGolf Haverleij waar de flights bekend worden gemaakt wordt er gestart op de  Par-3 baan. We sluiten af met een lunch in het clubgebouw.'
        ]);

        Event::create([
            'title' => 'Super-G \'s-Hertogenbosch',
            'date' => '2023-06-04',
            'slug' => 'event_4',
            'body' => 'In navolging van 2022 gaat Super-G weer plaatsvinden. Aan dit evenement nemen deel veel verenigingen en stichtingen o.a. tennis, paardrijden, basketbal, voetbal, wielrennen, wandelen, judo, hockey, darten en petanque uit de gemeente ’s-Hertogenbosch. 
            Ook Special Golf (G-Golf) is op deze dag gastheer op BurgGolf Haverleij, waar mensen met een verstandelijke beperking kunnen kennismaken met het Golfen. Een parcours bestaande uit golfvaardigheid skills kan door de deelnemers worden afgelegd, waarbij begeleiders van Special Golf hun de eerste beginselen zullen aanreiken. Deze dag staat dan ook in het teken van verbinden waar we iedereen een leuke ervaring willen meegeven. Voor het programma op 4 juni 2023 komen wij tijdig met nadere  informatie over de locatie en tijden, bezoek daarvoor de website: www.super-g.nl  of www.specialgolfhaverleij2021.com.'
        ]);
    }
}

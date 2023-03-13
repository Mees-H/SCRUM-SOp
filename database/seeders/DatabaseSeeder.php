<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Group;
use App\Models\Event;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $indoorGolf = Event::create([
            'title' => 'Indoor-Golf-Middag',
            'date' => '2023-01-21',
            'time' => '12:00:00',
            'slug' => 'event_1',
            'body' => 'Tijdens de winterstop organiseert Special Golf een Indoor-Golf-Middag voor de deelnemers van Special Golf. Begeleiders gaan bij Cello op De Binckhorst in Rosmalen een put & chip parcours uitzetten waar de deelnemers hun golfvaardigheid kunnen oefenen op verschillende onderdelen. We sluiten de middag af met een drankje.'
        ]);

        $pros = Event::create([
            'title' => 'Pro\'s en Begeleiders meeting',
            'date' => '2023-01-28',
            'time' => '12:00:00',
            'slug' => 'event_2',
            'body' => 'Golfleraren en begeleiders die betrokken zijn bij Special Golf, kijken o deze dag terug op 2022 en focussen zich op het programma voor het seizoen 2023. Er wordt afgestemd over onderwerpen gerelateerd aan de oefensessies die op de zaterdagmiddag plaatsvinden op BurgGolf Haverleij, en de organisatie daar omheen. De beschikbaarheid van alle betrokkenen, de aanwezigheid bij wedstrijden en opleiding begeleiders komen eveneens aan de orde.'
        ]);

        $prise = Event::create([
            'title' => 'Special Golf - Prise d\'Eau',
            'date' => '2023-04-08',
            'time' => '12:00:00',
            'slug' => 'event_3',
            'body' => 'Special Golf organiseert op deze dag een ontmoet met G-Golf Prise d\'Eau op de banen van BurgGolf Haverleij. Deelnemers en begeleiders (unified) spelen een ronde op de Par-3 baan en gaan aan de slag met skills. Deze ontmoeting is het tegenbezoek voor het spelen op Prise d’Eau in mei 2022. Na ontvangst in het clubgebouw van BurgGolf Haverleij waar de flights bekend worden gemaakt wordt er gestart op de  Par-3 baan. We sluiten af met een lunch in het clubgebouw.'
        ]);

        $superG = Event::create([
            'title' => 'Super-G \'s-Hertogenbosch',
            'date' => '2023-06-04',
            'time' => '12:00:00',
            'slug' => 'event_4',
            'body' => 'In navolging van 2022 gaat Super-G weer plaatsvinden. Aan dit evenement nemen deel veel verenigingen en stichtingen o.a. tennis, paardrijden, basketbal, voetbal, wielrennen, wandelen, judo, hockey, darten en petanque uit de gemeente ’s-Hertogenbosch. 
            Ook Special Golf (G-Golf) is op deze dag gastheer op BurgGolf Haverleij, waar mensen met een verstandelijke beperking kunnen kennismaken met het Golfen. Een parcours bestaande uit golfvaardigheid skills kan door de deelnemers worden afgelegd, waarbij begeleiders van Special Golf hun de eerste beginselen zullen aanreiken. Deze dag staat dan ook in het teken van verbinden waar we iedereen een leuke ervaring willen meegeven. Voor het programma op 4 juni 2023 komen wij tijdig met nadere  informatie over de locatie en tijden, bezoek daarvoor de website: www.super-g.nl  of www.specialgolfhaverleij2021.com.'
        ]);

        $burgGolf = Group::create([
            'name' => 'BurgGolf Haverleij',
            'housenumber' => 4,
            'street' => 'Leunweg',
            'zipcode' => '5221 BC',
            'city' => '\'s-Hertogenbosch',
            'link' => 'www.burggolf.nl'
        ]);

        $cello = Group::create([
            'name' => 'Cello - Zorg',
            'housenumber' => 2,
            'street' => 'De Binckhorst, Waterleidingstraat',
            'zipcode' => '5244 PE',
            'city' => 'Rosmalen',
            'link' => '​www.cello-zorg.nl'
        ]);

        $specialGolf = Group::create([
            'name' => 'Special Golf',
            'housenumber' => 4,
            'street' => 'Leunweg',
            'zipcode' => '5221 BC',
            'city' => '\'s-Hertogenbosch',
            'link' => '​www.specialgolfhaverleij2021.com'
        ]);

        $indoorGolf->groups()->attach($cello->id);
        $indoorGolf->groups()->attach($specialGolf->id);
        $pros->groups()->attach($burgGolf->id);
        $prise->groups()->attach($burgGolf->id);
        $superG->groups()->attach($specialGolf->id);
    }
}

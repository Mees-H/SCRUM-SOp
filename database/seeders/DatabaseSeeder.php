<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Album;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //testSeedData();
    }

    function testSeedData(){
        DB::table('albums')->insert([
            'title' => 'Eten en drinken',
            'description' => 'Vandaag heeft iedereen gegeten en gedronken op de golfbaan',
            'date' => '2023-03-10'
        ]);
        DB::table('albums')->insert([
            'title' => 'Bedrijfsuitje',
            'description' => 'Dit zijn fotos van het bedrijfsuitje van heel het team',
            'date' => '2023-02-23'
        ]);
        DB::table('albums')->insert([
            'title' => 'Buiten Golfen',
            'date' => '2023-01-11'
        ]);

        DB::table('pictures')->insert([
            'album_id' => '1',
            'imageUrl' => 'https://www.specialgolfhaverleij2021.com/uploads/1/4/0/3/140360495/a61897bc-6113-466c-827d-bbe3c75537b6_orig.jpg'
        ]);
        DB::table('pictures')->insert([
            'album_id' => '1',
            'imageUrl' => 'https://www.specialgolfhaverleij2021.com/uploads/1/4/0/3/140360495/img-0321_orig.jpeg'
        ]);

        DB::table('pictures')->insert([
            'album_id' => '2',
            'imageUrl' => 'https://www.specialgolfhaverleij2021.com/uploads/1/4/0/3/140360495/7bce0e71-6854-4429-b5d3-1ce6a051f800.jpeg'
        ]);
        DB::table('pictures')->insert([
            'album_id' => '1',
            'imageUrl' => 'https://www.specialgolfhaverleij2021.com/uploads/1/4/0/3/140360495/d5c749c9-c6c8-4a3b-8cd4-baddc1a2cf7a.jpg'
        ]);

        DB::table('pictures')->insert([
            'album_id' => '1',
            'imageUrl' => 'https://www.specialgolfhaverleij2021.com/uploads/1/4/0/3/140360495/65cf6eb0-24b6-46bc-a569-80c3a9af1b7e.jpg'
        ]);
        DB::table('pictures')->insert([
            'album_id' => '1',
            'imageUrl' => 'https://www.specialgolfhaverleij2021.com/uploads/1/4/0/3/140360495/10526cc9-7c01-4f25-bf39-9354b3900363.jpg'
        ]);
    }



}

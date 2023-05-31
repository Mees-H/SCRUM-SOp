<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventAndGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superG = Event::create([
            'title' => 'Super-G \'s-Hertogenbosch',
            'date' => '2023-06-04',
            'time' => '12:00:00',
            'price'=> 12.50,
            'body' => 'In navolging van 2022 gaat Super-G weer plaatsvinden. Aan dit evenement nemen deel veel verenigingen en stichtingen o.a. tennis, paardrijden, basketbal, voetbal, wielrennen, wandelen, judo, hockey, darten en petanque uit de gemeente ’s-Hertogenbosch.
            Ook Special Golf (G-Golf) is op deze dag gastheer op BurgGolf Haverleij, waar mensen met een verstandelijke beperking kunnen kennismaken met het Golfen. Een parcours bestaande uit golfvaardigheid skills kan door de deelnemers worden afgelegd, waarbij begeleiders van Special Golf hun de eerste beginselen zullen aanreiken. Deze dag staat dan ook in het teken van verbinden waar we iedereen een leuke ervaring willen meegeven. Voor het programma op 4 juni 2023 komen wij tijdig met nadere  informatie over de locatie en tijden, bezoek daarvoor de website: www.super-g.nl  of www.specialgolfhaverleij2021.com.'
        ]);

        $golfclinic = Event::create([
            'title' => 'Golfclinic',
            'date' => '2023-06-12',
            'time' => '12:00:00',
            'price' => '12',
            'body' => 'Op uitnodiging van Special Golf gaan de medewerkers van S’PORT ’s-Hertogenbosch deelnemen aan een Golfclinic op BurgGolf Haverleij. De middag vindt plaats onder begeleiding van een golfprofessional die de deelnemers meeneemt op de driving range en de oefengreen om hun kennis te laten maken met het golfen in een ontspannen sfeer. De clinic wordt afgesloten met een drankje in het clubhuis.'
        ]);

        $celloClinic = Event::create([
            'title' => 'Cello Clinic BurgGolf Haverleij',
            'date' => '2023-08-12',
            'time' => '12:00:00',
            'price' => '15',
            'body' => 'In het kader van \'n zomer vol​, een initiatief van Cello-zorg, organiseert Special Golf \'s-Hertogenbosch een clinic voor mensen met een beperking, waaraan 8 deelnemers gaan meedoen. Het programma voor deze clinic is aangepast aan de doelgroep waar met name de skills in spelvorm worden doorlopen. We starten op deze dag met een ontvangst in het clubhuis van BurgGolf Haverleij \'s-Hertogenbosch om 14.00 uur. Het programma richt zich op golfvaardigheden door aan de slag te gaan met de skills. We  sluiten de middag af om 15.30 uur met een drankje in het clubhuis. De clinic wordt verzorgt door een golfprofessional van Special Golf met ondersteuning van twee begeleiders.'
        ]);

        $partnerdag = Event::create([
            'title' => 'Partnerdag Special Golf',
            'date' => '2023-08-27',
            'time' => '12:00:00',
            'body' => 'Special Golf organiseert voor haar sponsoren en begeleiders een golfdag op BurgGolf Haverleij als waardering voor hun bijdrage en ondersteuning. Zonder deze bijdrage en ondersteuning zou het niet mogelijk zijn om deelnemers aan Special Golf, op de zaterdagmiddag deel te laten nemen aan de golfsport. De golfdag wordt gespeeld op de 18 holes baan van BurgGolf Haverleij met een drankje en een hapje.'
        ]);

        $burgGolf = Group::create([
            'name' => 'BurgGolf Haverleij',
            'housenumber' => 4,
            'street' => 'Leunweg',
            'zipcode' => '5221 BC',
            'city' => '\'s-Hertogenbosch',
            'link' => 'www.burggolf.nl',
            'imageurl' => 'https://www.specialgolfhaverleij2021.com/uploads/1/4/0/3/140360495/06e9dae4-b46c-4e7f-b2d4-18a1bffd3e2c-1-201-a-orig-orig_orig.jpeg',
        ]);

        $cello = Group::create([
            'name' => 'Cello - Zorg',
            'housenumber' => 2,
            'street' => 'De Binckhorst, Waterleidingstraat',
            'zipcode' => '5244 PE',
            'city' => 'Rosmalen',
            'link' => '​www.cello-zorg.nl',
            'imageurl' => 'https://www.specialgolfhaverleij2021.com/uploads/1/4/0/3/140360495/img-5066_orig.jpeg',
        ]);

        $specialGolf = Group::create([
            'name' => 'Special Golf',
            'housenumber' => 4,
            'street' => 'Leunweg',
            'zipcode' => '5221 BC',
            'city' => '\'s-Hertogenbosch',
            'link' => '​www.specialgolfhaverleij2021.com',
            'imageurl' => 'https://www.specialgolfhaverleij2021.com/uploads/1/4/0/3/140360495/published/specialgolflogodark.png?1679827834',
        ]);

        $superG->groups()->attach($specialGolf->id);
        $golfclinic->groups()->attach($specialGolf->id);
        $celloClinic->groups()->attach($specialGolf->id);
        $celloClinic->groups()->attach($cello->id);
        $partnerdag->groups()->attach($specialGolf->id);
    }
}

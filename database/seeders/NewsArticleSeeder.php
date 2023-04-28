<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NewsArticle;

class NewsArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NewsArticle::create([
            'title' => 'Hall of Fame Special Golf',
            'body' => 'De Special Golf Birdie wordt tijdens een wedstrijd, onder auspiciën van Special Golf, uitgereikt aan een speler die één onder par speelt op een hole. De volgende spelers hebben deze ontvangen:
            Magriet Venrooy, Jan Hartsuiker, Wil Driesser, Henk Koper, Trudy Bakker, Hetty van Hilten, Josine Vos, Corry Verschuur en Josje van Stralendorff.

            ​Birdie is ontworpen en beschikbaar gesteld door Venrooy Goud- en Zilverindustrie b.v.
            www.venrooybv.nl – nique.venrooy@venrooybv.nl - +31 (0) 73 631 28 31',
            'date' => '2023-01-31',
            'imgurl' => ['birdie.jpg']
        ]);

        NewsArticle::create([
            'title' => 'Activiteiten 2023',
            'body' => '2023. Naast de oefensessies op de zaterdagmiddag, worden weer diverse activiteiten georganiseerd waaraan de deelnemers van Special Golf gaan deelnemen. Op de Events site kunt u lezen op welke activiteit op welke datum en locatie plaatsvindt.
            U bent van harte welkom om bij de activiteiten een kijkje te komen nemen.  ',
            'date' => '2023-01-31'
        ]);

        NewsArticle::create([
            'title' => 'Golf seizoen 2023 gestart',
            'body' => '4 maart 2023. De deelnemers aan Special Golf hebben hun eerste oefensessie weer gehad op BurgGolf Haverleij. Het weerzien na de winterstop was als vanouds en er werd ondanks de lage temperatuur met veel plezier en overgave gewerkt aan de golfvaardigheden onder leiding van Robbin Schuurman en ondersteund door onze begeleiders. Dit seizoen is besloten om de oefensessies te laten plaatsvinden in twee groepen van 14.00-15.00 uur en 15.00-16.00 uur, rekening wordt gehouden met de golfvaardigheid van de deelnemers.',
            'date' => '2023-03-04',
            'imgurl' => ['golf.jpg']
        ]);
        NewsArticle::create([
            'title' => 'Activiteiten 2023',
            'body' => '2023. Naast de oefensessies op de zaterdagmiddag, worden weer diverse activiteiten georganiseerd waaraan de deelnemers van Special Golf gaan deelnemen. Op de Events site kunt u lezen op welke activiteit op welke datum en locatie plaatsvindt.
            U bent van harte welkom om bij de activiteiten een kijkje te komen nemen.  ',
            'date' => '2023-01-31'
        ]);

        NewsArticle::create([
            'title' => 'Golf seizoen 2023 gestart',
            'body' => '4 maart 2023. De deelnemers aan Special Golf hebben hun eerste oefensessie weer gehad op BurgGolf Haverleij. Het weerzien na de winterstop was als vanouds en er werd ondanks de lage temperatuur met veel plezier en overgave gewerkt aan de golfvaardigheden onder leiding van Robbin Schuurman en ondersteund door onze begeleiders. Dit seizoen is besloten om de oefensessies te laten plaatsvinden in twee groepen van 14.00-15.00 uur en 15.00-16.00 uur, rekening wordt gehouden met de golfvaardigheid van de deelnemers.',
            'date' => '2023-03-04',
            'imgurl' => ['golf.jpg']
        ]);
    }
}

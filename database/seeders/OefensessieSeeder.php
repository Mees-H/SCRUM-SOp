<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TrainingSessionGroup;
use App\Models\TrainingSession;
use App\Models\Participant;
use Illuminate\Support\Facades\DB;

class OefensessieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->seedTrainingGroups();

        $this->seedTrainingSessions();

        $this->seedParticipants();
    }

    /**
     * @return void
     */
    public function seedTrainingGroups(): void
    {
        DB::table('training_session_group')->insert([
            'GroupNumber' => 1,
            'Name' => 'Groep 1',
        ]);
        DB::table('training_session_group')->insert([
            'GroupNumber' => 2,
            'Name' => 'Groep 2',
        ]);
    }

    /**
     * @return void
     */
    public function seedTrainingSessions(): void
    {
        $dates=[
            '04-03-2023',
            '11-03-2023',
            '18-03-2023',
            '25-03-2023',
            '01-04-2023',
            '15-04-2023',
            '29-04-2023',
            '06-05-2023',
            '20-05-2023',
            '03-06-2023',
            '10-06-2023',
            '17-06-2023',
            '24-06-2023',
            '01-07-2023',
            '08-07-2023',
            '15-07-2023',
            '22-07-2023',
            '02-08-2023',
            '09-08-2023',
            '16-08-2023',
            '23-08-2023',
            '30-08-2023',
            '07-09-2023',
            '21-09-2023',
            '28-09-2023',
            '04-10-2023',
            '11-10-2023',
            '18-10-2023'
        ];
        $values = [];
        foreach ($dates as $date) {
            $values[] = [
                'Date' => Carbon::createFromFormat('d-m-Y', $date)->toDateString(),
                'StartTime' => Carbon::createFromFormat('H:i', '13:00')->toTimeString(),
                'EndTime' => Carbon::createFromFormat('H:i', '15:00')->toTimeString(),
                'Description' => 'BurgGolf Haverleij',
                'GroupNumber' => 1,
                'IstrainingSession' => true,
            ];
            $values[] = [
                'Date' => Carbon::createFromFormat('d-m-Y', $date)->toDateString(),
                'StartTime' => Carbon::createFromFormat('H:i', '13:00')->toTimeString(),
                'EndTime' => Carbon::createFromFormat('H:i', '15:00')->toTimeString(),
                'Description' => 'BurgGolf Haverleij',
                'GroupNumber' => 2,
                'IstrainingSession' => true,
            ];
        }
        DB::table('training_session')->insert($values);

        DB::table('training_session')->insert([
            [
                'Date' => Carbon::createFromFormat('d-m-Y', '08-04-2023')->toDateString(),
                'StartTime' => Carbon::createFromFormat('H:i', '13:00')->toTimeString(),
                'EndTime' => Carbon::createFromFormat('H:i', '15:00')->toTimeString(),
                'Description' => 'Pasen',
                'GroupNumber' => 1,
                'IstrainingSession' => false,
            ],
            [
                'Date' => Carbon::createFromFormat('d-m-Y', '08-04-2023')->toDateString(),
                'StartTime' => Carbon::createFromFormat('H:i', '13:00')->toTimeString(),
                'EndTime' => Carbon::createFromFormat('H:i', '15:00')->toTimeString(),
                'Description' => 'Pasen',
                'GroupNumber' => 2,
                'IstrainingSession' => false,
            ],
            [
                'Date' => Carbon::createFromFormat('d-m-Y', '22-04-2023')->toDateString(),
                'StartTime' => Carbon::createFromFormat('H:i', '13:00')->toTimeString(),
                'EndTime' => Carbon::createFromFormat('H:i', '15:00')->toTimeString(),
                'Description' => 'Limeer Golf Bokaal',
                'GroupNumber' => 1,
                'IstrainingSession' => false,
            ],
            [
                'Date' => Carbon::createFromFormat('d-m-Y', '22-04-2023')->toDateString(),
                'StartTime' => Carbon::createFromFormat('H:i', '13:00')->toTimeString(),
                'EndTime' => Carbon::createFromFormat('H:i', '15:00')->toTimeString(),
                'Description' => 'Limeer Golf Bokaal',
                'GroupNumber' => 2,
                'IstrainingSession' => false,
            ],
            [
                'Date' => Carbon::createFromFormat('d-m-Y', '13-05-2023')->toDateString(),
                'StartTime' => Carbon::createFromFormat('H:i', '13:00')->toTimeString(),
                'EndTime' => Carbon::createFromFormat('H:i', '15:00')->toTimeString(),
                'Description' => 'Haverleij Prise d\'Eau',
                'GroupNumber' => 1,
                'IstrainingSession' => false,
            ],
            [
                'Date' => Carbon::createFromFormat('d-m-Y', '13-05-2023')->toDateString(),
                'StartTime' => Carbon::createFromFormat('H:i', '13:00')->toTimeString(),
                'EndTime' => Carbon::createFromFormat('H:i', '15:00')->toTimeString(),
                'Description' => 'Haverleij Prise d\'Eau',
                'GroupNumber' => 2,
                'IstrainingSession' => false,
            ],
            [
                'Date' => Carbon::createFromFormat('d-m-Y', '27-05-2023')->toDateString(),
                'StartTime' => Carbon::createFromFormat('H:i', '13:00')->toTimeString(),
                'EndTime' => Carbon::createFromFormat('H:i', '15:00')->toTimeString(),
                'Description' => 'Pinksterren',
                'GroupNumber' => 1,
                'IstrainingSession' => false,
            ],
            [
                'Date' => Carbon::createFromFormat('d-m-Y', '27-05-2023')->toDateString(),
                'StartTime' => Carbon::createFromFormat('H:i', '13:00')->toTimeString(),
                'EndTime' => Carbon::createFromFormat('H:i', '15:00')->toTimeString(),
                'Description' => 'Pinksterren',
                'GroupNumber' => 2,
                'IstrainingSession' => false,
            ],
            [
                'Date' => Carbon::createFromFormat('d-m-Y', '29-07-2023')->toDateString(),
                'StartTime' => Carbon::createFromFormat('H:i', '13:00')->toTimeString(),
                'EndTime' => Carbon::createFromFormat('H:i', '15:00')->toTimeString(),
                'Description' => 'Zomervakantie',
                'GroupNumber' => 1,
                'IstrainingSession' => false,
            ],
            [
                'Date' => Carbon::createFromFormat('d-m-Y', '29-07-2023')->toDateString(),
                'StartTime' => Carbon::createFromFormat('H:i', '13:00')->toTimeString(),
                'EndTime' => Carbon::createFromFormat('H:i', '15:00')->toTimeString(),
                'Description' => 'Zomervakantie',
                'GroupNumber' => 2,
                'IstrainingSession' => false,
            ],
            [
                'Date' => Carbon::createFromFormat('d-m-Y', '14-09-2023')->toDateString(),
                'StartTime' => Carbon::createFromFormat('H:i', '13:00')->toTimeString(),
                'EndTime' => Carbon::createFromFormat('H:i', '15:00')->toTimeString(),
                'Description' => 'Herfstvakantie',
                'GroupNumber' => 1,
                'IstrainingSession' => false,
            ],
            [
                'Date' => Carbon::createFromFormat('d-m-Y', '14-09-2023')->toDateString(),
                'StartTime' => Carbon::createFromFormat('H:i', '13:00')->toTimeString(),
                'EndTime' => Carbon::createFromFormat('H:i', '15:00')->toTimeString(),
                'Description' => 'Herfstvakantie',
                'GroupNumber' => 2,
                'IstrainingSession' => false,
            ],
            [
                'Date' => Carbon::createFromFormat('d-m-Y', '25-10-2023')->toDateString(),
                'StartTime' => Carbon::createFromFormat('H:i', '13:00')->toTimeString(),
                'EndTime' => Carbon::createFromFormat('H:i', '15:00')->toTimeString(),
                'Description' => 'Afsluiting seizoen',
                'GroupNumber' => 1,
                'IstrainingSession' => false,
            ],
            [
                'Date' => Carbon::createFromFormat('d-m-Y', '25-10-2023')->toDateString(),
                'StartTime' => Carbon::createFromFormat('H:i', '13:00')->toTimeString(),
                'EndTime' => Carbon::createFromFormat('H:i', '15:00')->toTimeString(),
                'Description' => 'Afsluiting seizoen',
                'GroupNumber' => 2,
                'IstrainingSession' => false,
            ],
        ]);
    }

    /**
     * @return void
     */
    public function seedParticipants(): void
    {
        DB::table('participant')->insert([
            [
                'Name' => 'Frans Toonen',
                'GroupNumber' => 1,
            ],
            [
                'Name' => 'Connie van de Ven',
                'GroupNumber' => 1,
            ],
            [
                'Name' => 'Renee Balvers',
                'GroupNumber' => 1,
            ],
            [
                'Name' => 'Roel Rademakers',
                'GroupNumber' => 1,
            ],
            [
                'Name' => 'Jacky Dekker',
                'GroupNumber' => 1,
            ],
            [
                'Name' => 'Bert van de Burgt',
                'GroupNumber' => 1,
            ],
            [
                'Name' => 'Johan Voermans',
                'GroupNumber' => 1,
            ],
            [
                'Name' => 'Bart van der Maale',
                'GroupNumber' => 1,
            ],
            [
                'Name' => 'Ilco Bosboom',
                'GroupNumber' => 2,
            ],
            [
                'Name' => 'Sjoerd Veenstra',
                'GroupNumber' => 2,
            ],
            [
                'Name' => 'Bart Schenk',
                'GroupNumber' => 2,
            ],
            [
                'Name' => 'Frank Bijnen',
                'GroupNumber' => 2,
            ],
            [
                'Name' => 'Peter van der Putten',
                'GroupNumber' => 2,
            ],
        ]);
    }
}

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
        DB::table('training_session')->insert([
            [
                'Date' => Carbon::now()->addRealDays(4)->toDateString(),
                'StartTime' => Carbon::now()->toTimeString(),
                'EndTime' => Carbon::now()->addHours(2)->toTimeString(),
                'Description' => 'Eerste oefensesie',
                'GroupNumber' => 1,
                'IstrainingSession' => true,
            ],
            [
                'Date' => Carbon::now()->toDateString(),
                'StartTime' => Carbon::now()->addHours(6)->toTimeString(),
                'EndTime' => Carbon::now()->addHours(8)->toTimeString(),
                'Description' => 'Derde oefensesie',
                'GroupNumber' => 1,
                'IstrainingSession' => true,
            ],
            [
                'Date' => Carbon::now()->addDays(38)->toDateString(),
                'StartTime' => Carbon::now()->addHours(2)->toTimeString(),
                'EndTime' => Carbon::now()->addHours(4)->toTimeString(),
                'Description' => 'Vakantie',
                'GroupNumber' => 1,
                'IstrainingSession' => false,
            ],
            [
                'Date' => Carbon::now()->addRealDays(4)->toDateString(),
                'StartTime' => Carbon::now()->addHours(2)->toTimeString(),
                'EndTime' => Carbon::now()->addHours(4)->toTimeString(),
                'Description' => 'Vakantie',
                'GroupNumber' => 2,
                'IstrainingSession' => false,
            ],
            [
                'Date' => Carbon::now()->addRealDays(32)->toDateString(),
                'StartTime' => Carbon::now()->addHours(2)->toTimeString(),
                'EndTime' => Carbon::now()->addHours(4)->toTimeString(),
                'Description' => 'Vakantie',
                'GroupNumber' => 2,
                'IstrainingSession' => false,
            ],
            [
                'Date' => Carbon::now()->addRealDays(12)->toDateString(),
                'StartTime' => Carbon::now()->addHours(3)->toTimeString(),
                'EndTime' => Carbon::now()->addHours(5)->toTimeString(),
                'Description' => 'Tweede oefensesie',
                'GroupNumber' => 2,
                'IstrainingSession' => true,
            ],
            [
                'Date' => Carbon::now()->addRealDays(16)->toDateString(),
                'StartTime' => Carbon::now()->addHours(9)->toTimeString(),
                'EndTime' => Carbon::now()->addHours(11)->toTimeString(),
                'Description' => 'Laatste oefensesie',
                'GroupNumber' => 2,
                'IstrainingSession' => true,
            ]
        ]);
    }

    /**
     * @return void
     */
    public function seedParticipants(): void
    {
        DB::table('participant')->insert([
            [
                'Name' => 'John',
                'GroupNumber' => 1,
            ],
            [
                'Name' => 'Jack',
                'GroupNumber' => 1,
            ],
            [
                'Name' => 'Marit',
                'GroupNumber' => 1,
            ],
            [
                'Name' => 'Emma',
                'GroupNumber' => 1,
            ],
            [
                'Name' => 'Tom',
                'GroupNumber' => 2,
            ],
            [
                'Name' => 'Thomas',
                'GroupNumber' => 2,
            ],
            [
                'Name' => 'Jack Meester',
                'GroupNumber' => 2,
            ],
            [
                'Name' => 'Hans Bolwerk',
                'GroupNumber' => 2,
            ],
            [
                'Name' => 'Jill',
                'GroupNumber' => 2,
            ],
            [
                'Name' => 'Jane',
                'GroupNumber' => 2,
            ]
        ]);
    }
}

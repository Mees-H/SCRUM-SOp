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
        $now = Carbon::now();
        DB::table('training_session')->insert([
            [
                'Date' => $now->toDateString(),
                'StartTime' => $now->toTimeString(),
                'EndTime' => $now->addHours(2)->toTimeString(),
                'Description' => 'Eerste oefensesie',
                'GroupNumber' => 1,
                'IstrainingSession' => true,
            ],
            [
                'Date' => $now->toDateString(),
                'StartTime' => $now->addHours(3)->toTimeString(),
                'EndTime' => $now->addHours(5)->toTimeString(),
                'Description' => 'Tweede oefensesie',
                'GroupNumber' => 2,
                'IstrainingSession' => true,
            ],
            [
                'Date' => $now->toDateString(),
                'StartTime' => $now->addHours(6)->toTimeString(),
                'EndTime' => $now->addHours(8)->toTimeString(),
                'Description' => 'Derde oefensesie',
                'GroupNumber' => 1,
                'IstrainingSession' => true,
            ],
            [
                'Date' => $now->toDateString(),
                'StartTime' => $now->addHours(9)->toTimeString(),
                'EndTime' => $now->addHours(11)->toTimeString(),
                'Description' => 'Vierde oefensesie',
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
                'Name' => 'Jane',
                'GroupNumber' => 2,
            ],
            [
                'Name' => 'Jack',
                'GroupNumber' => 1,
            ],
            [
                'Name' => 'Jill',
                'GroupNumber' => 2,
            ]
        ]);
    }
}

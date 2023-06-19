<?php

namespace Tests\Unit;

use App\Models\TrainingSession;
use App\Models\TrainingSessionGroup;
use App\Models\User;
use App\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Mockery\MockInterface;

class TrainingTest extends TestCase
{
    use RefreshDatabase;

    public function testAddGroup()
    {
        //Arrange
        $user = User::factory()->make();
        $user->role = 'admin';
        $user->save();
        $lastGroup = TrainingSessionGroup::all()->sortByDesc('id')->first();

        //Act
        $result = $this->actingAs($user)->post('traininggroups');

        //Assert
        $result->assertValid();
        $result->assertRedirect('/traininggroups');
        $this->assertDatabaseHas('training_session_group', [
            'id' => $lastGroup->id + 1
        ]);
    }

    public function testAddParticipant()
    {
        //Arrange
        $user = User::factory()->make();
        $user->role = 'admin';
        $user->save();

        //Act
        $result = $this->actingAs($user)->post('traininggroups/participants', [
            'name' => 'test',
            'group' => 1
        ]);

        //Assert
        $result->assertValid();
        $result->assertRedirect('/traininggroups');
        $this->assertDatabaseHas('participant', [
            'Name' => 'test',
            'group_id' => 1
        ]);
    }

    public function testDeleteGroup()
    {
        //Arrange
        $user = User::factory()->make();
        $user->role = 'admin';
        $user->save();

        //Act
        $result = $this->actingAs($user)->delete('traininggroups/1');

        //Assert
        $result->assertValid();
        $result->assertRedirect('/traininggroups');
        $this->assertDatabaseMissing('training_session_group', [
            'id' => 1
        ]);
    }

    public function testDeleteParticipant()
    {
        //Arrange
        $user = User::factory()->make();
        $user->role = 'admin';
        $user->save();

        //Act
        $result = $this->actingAs($user)->delete('traininggroups/participants/1');

        //Assert
        $result->assertValid();
        $result->assertRedirect('/traininggroups');
        $this->assertDatabaseMissing('participant', [
            'id' => 1
        ]);
    }

    public function testFailAddParticipant()
    {
        //Arrange
        $user = User::factory()->make();
        $user->role = 'admin';
        $user->save();

        //Act
        $result = $this->actingAs($user)->post('traininggroups/participants', [
            'name' => '',
            'group' => ''
        ]);

        //Assert
        $result->assertInvalid();
    }
}

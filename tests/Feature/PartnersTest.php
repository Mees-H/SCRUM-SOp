<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PartnersTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    public function test_can_create_partner(): void
    {
        $this->seed();
        //Arrange
        $user = new User([
            'role' => 'admin'
        ]);

        $request = [
            'name' => 'Partner',
            'housenumber' => '8',
            'street' => 'Randomstreet',
            'zipcode' => '1234AB',
            'city' => 'Dimsdale',
            'link' => 'kanikeenkortebroekaan.nl',
            'contact_person' => 'Dinkleberg',
            'imageurl' => 'https://preview.redd.it/silly-seal-v0-taovvyqnjjz91.jpg?width=640&crop=smart&auto=webp&s=c4762b7818dd7790415437b6bbf48f9d90bec72d'
        ];

        try{
            //Act
            $this->actingAs($user);
            $response = $this->post('groups', $request);

        } catch(\Exception $e){
            echo "<script>console.log(".$e.");</script>";
        }
        
        //Assert
        $response->assertRedirect('/groups');
        $this->assertDatabaseHas('groups', [
            'name' => 'Partner',
        ]);
    }

    public function test_cannot_create_partner(): void
    {
        $this->seed();
        //Arrange
        $user = new User([
            'role' => 'admin'
        ]);

        $request = [];

        try{
            //Act
            $this->actingAs($user);
            $response = $this->post('groups', $request);

        } catch(\Exception $e){
            echo "<script>console.log(".$e.");</script>";
        }
        
        //Assert
        $response->assertSessionHasErrors(
            $keys = ['name',
            'housenumber',
            'street',
            'zipcode',
            'city',
            'link',
            'contact_person',
            'imageurl']
        );
        $this->assertDatabaseMissing('groups', [
            'name' => 'Partner',
        ]);
    }

    public function test_can_update_partner(): void
    {
        $this->seed();
        //Arrange
        $user = new User([
            'role' => 'admin'
        ]);

        $request = [
            'name' => 'Partner',
            'housenumber' => '8',
            'street' => 'Randomstreet',
            'zipcode' => '1234AB',
            'city' => 'Dimsdale',
            'link' => 'kanikeenkortebroekaan.nl',
            'contact_person' => 'Dinkleberg',
            'imageurl' => 'https://preview.redd.it/silly-seal-v0-taovvyqnjjz91.jpg?width=640&crop=smart&auto=webp&s=c4762b7818dd7790415437b6bbf48f9d90bec72d'
        ];

        try{
            //Act
            $this->actingAs($user);
            $response = $this->patch('groups/'.Group::all()->first()->id.'/', $request);

        } catch(\Exception $e){
            echo "<script>console.log(".$e.");</script>";
        }
        
        //Assert
        $response->assertRedirect('/groups');
        $this->assertDatabaseHas('groups', [
            'name' => 'Partner',
        ]);
    }

    public function test_cannot_update_partner(): void
    {
        $this->seed();
        //Arrange
        $user = new User([
            'role' => 'admin'
        ]);

        $request = [];

        try{
            //Act
            $this->actingAs($user);
            $response = $this->patch('groups/'.Group::all()->first()->id.'/', $request);

        } catch(\Exception $e){
            echo "<script>console.log(".$e.");</script>";
        }
        
        //Assert
        $response->assertSessionHasErrors(
            $keys = ['name',
            'housenumber',
            'street',
            'zipcode',
            'city',
            'link',
            'contact_person',
            'imageurl']
        );
        $this->assertDatabaseMissing('groups', [
            'name' => 'Partner',
        ]);
    }

    public function test_can_delete_partner(): void
    {
        $this->seed();
        //Arrange
        $user = new User([
            'role' => 'admin'
        ]);

        $request = [];

        $id = Group::all()->first()->id;

        try{
            //Act
            $this->actingAs($user);
            $response = $this->delete('groups/'.$id.'/', $request);

        } catch(\Exception $e){
            echo "<script>console.log(".$e.");</script>";
        }
        
        //Assert
        $response->assertRedirect('/groups');
        $this->assertDatabaseMissing('groups', [
            'id' => $id,
        ]);
    }
}

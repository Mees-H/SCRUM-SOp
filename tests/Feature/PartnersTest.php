<?php

namespace Tests\Unit;

use Illuminate\Http\UploadedFile;
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
        //Arrange
        $user = new User([
            'role' => 'admin'
        ]);

        $file = UploadedFile::fake()->create('image.jpg', 200);
        $request = [
            'name' => 'Partner',
            'housenumber' => '8',
            'street' => 'Randomstreet',
            'zipcode' => '1234AB',
            'city' => 'Dimsdale',
            'link' => 'kanikeenkortebroekaan.nl',
            'contact_person' => 'Dinkleberg',
            'image' => $file,
        ];

        try {
            //Act
            $this->actingAs($user);
            $response = $this->post('groups', $request);

        } catch (\Exception $e) {
            echo "<script>console.log(" . $e . ");</script>";
        }

        //Assert
        $response->assertRedirect('/groups');
        $this->assertDatabaseHas('groups', [
            'name' => 'Partner',
        ]);
    }

    public function test_cannot_create_partner(): void
    {
        //Arrange
        $user = new User([
            'role' => 'admin'
        ]);

        $request = [];

        //Act
        $this->actingAs($user);
        $response = $this->post('groups', $request);


        //Assert
        $response->assertSessionHasErrors(
            $keys = ['name',
                'housenumber',
                'street',
                'zipcode',
                'city',
                'link',
                'contact_person',
                'image',
            ]
        );
        $this->assertDatabaseMissing('groups', [
            'name' => 'Partner',
        ]);
    }

    public function test_can_update_partner(): void
    {
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
        ];

        try {
            //Act
            $this->actingAs($user);
            $response = $this->patch('groups/' . Group::all()->first()->id . '/', $request);

        } catch (\Exception $e) {
            echo "<script>console.log(" . $e . ");</script>";
        }

        //Assert
        $response->assertRedirect('/groups');
        $this->assertDatabaseHas('groups', [
            'name' => 'Partner',
        ]);
    }

    public function test_cannot_update_partner(): void
    {
        //Arrange
        $user = new User([
            'role' => 'admin'
        ]);

        $request = [];

        $this->actingAs($user);
        $response = $this->patch('groups/' . Group::all()->first()->id . '/', $request);


        //Assert
        $response->assertSessionHasErrors(
            $keys = ['name',
                'housenumber',
                'street',
                'zipcode',
                'city',
                'link',
                'contact_person',
            ]
        );
        $this->assertDatabaseMissing('groups', [
            'name' => 'Partner',
        ]);
    }

    public function test_can_delete_partner(): void
    {
        //Arrange
        $user = new User([
            'role' => 'admin'
        ]);

        $request = [];

        $id = Group::all()->first()->id;

        try {
            //Act
            $this->actingAs($user);
            $response = $this->delete('groups/' . $id . '/', $request);

        } catch (\Exception $e) {
            echo "<script>console.log(" . $e . ");</script>";
        }

        //Assert
        $response->assertRedirect('/groups');
        $this->assertDatabaseMissing('groups', [
            'id' => $id,
        ]);
    }
}

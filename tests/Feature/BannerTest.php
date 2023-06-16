<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class BannerTest extends TestCase
{
    use RefreshDatabase;

    public function test_change_banner(): void
    {
        //Arrange
        $user = new User([
            'role' => 'admin'
        ]);
        
        $file = UploadedFile::fake()->create('image.jpg', 200);

        $request = [
            'image' => $file,
        ];

        try {
            //Act
            $this->actingAs($user);
            $response = $this->post('banners/1', $request);

        } catch (\Exception $e) {
            echo "<script>console.log(" . $e . ");</script>";
        }

        //Assert
        $response->assertRedirect('/banners');
    }
}

<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
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
        
        $page = Page::first();

        $originalBanner = $page->banner_image;

        File::copy(public_path('img/banners/' . $page->banner_image), public_path('img/banners/tmpimg.jpg'));

        $file = UploadedFile::fake()->create('image.jpg', 200);

        $request = [
            'image' => $file,
        ];

        try {
            //Act
            $this->actingAs($user);
            $response = $this->post('banners/' . $page->id, $request);

        } catch (\Exception $e) {
            echo "<script>console.log(" . $e . ");</script>";
        }

        //Assert
        $response->assertRedirect('/banners');

        //Cleanup
        $page = Page::find($page->id);
        File::delete(public_path('img/banners/' . $page->banner_image));
        File::move(public_path('img/banners/tmpimg.jpg'), public_path('img/banners/' . $originalBanner));
        $page->banner_image = $originalBanner;
        $page->save();

    }
}

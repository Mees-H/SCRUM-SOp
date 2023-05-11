<?php

namespace Tests\Unit;

use App\Http\Controllers\GalleryController;
use App\Models\Album;
use App\Models\Picture;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Tests\TestCase;

class GalleryControllerTest extends TestCase
{
    /**
     * @test
     * @group authentication
     */
    public function it_returns_the_foto_toevoegen_view_with_album_data_for_authenticated_admin()
    {
        // Arrange
        $album = Album::factory()->create();
        $year = Carbon::parse($album->date)->format('Y');
        $title = $album->title;
        $requestData = [
            'album_id' => $album->id,
        ];
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        // Act
        $response = $this->actingAs($admin)->post("galerij/'$album->id'/addPhoto", $requestData);

        // Assert
        $response->assertOk();
        $response->assertViewIs('Gallery.fotoToevoegen');
        $response->assertViewHasAll([
            'album' => $album,
            'year' => $year,
            'title' => $title,
        ]);

        // Teardown
        $album->delete();
        $admin->delete();
    }


    /** @test */
    public function it_redirects_to_show_gallery_when_album_is_not_found()
    {
        // Arrange
        $year = '2021';
        $albumId = 'non-existent-id';
        $galleryController = new GalleryController();

        // Act
        $response = $galleryController->show($albumId, $year);

        // Assert
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(
            route('galerij_jaar', ['year' => $year]),
            $response->headers->get('Location')
        );
    }

    /**
     * @test
     * @after tearDown
     */
    public function it_shows_the_album_and_its_pictures_when_album_is_found()
    {
        // Arrange
        $album = Album::factory()->create([
            'date' => Carbon::now()->toDateString(),
            'title' => 'TestAlbum23467',
            'description' => 'TestDescription2346',
            'id' => 16333378,
        ]);
        $picture1 = Picture::factory()->create(['album_id' => $album->id, 'image' => 'TestImageSpecialGolf.jpg']);
        $picture2 = Picture::factory()->create(['album_id' => $album->id, 'image' => 'TestImageSpecialGolf.jpg']);
        $year = Carbon::parse($album->date)->year;
        $galleryController = new GalleryController();

        // Act
        $response = $galleryController->show($album->id, $year);

        // Assert
        $response->assertOk();
        $response->assertViewIs('albums.showAlbum');
        $response->assertViewHas('album', $album);
        $response->assertViewHas('pictures', [$picture1, $picture2]);
        $response->assertViewHas('year', $year);

        // Clean up
        $picture1->delete();
        $picture2->delete();
        $album->delete();

    }

    /**
     * @test
     */
    public function it_redirects_to_gallery_when_album_is_not_found()
    {
        // Arrange
        $year = '2021';
        $id = '123';

        // Act
        $response = $this->get(route('galerij_album', ['year' => $year, 'id' => $id]));

        // Assert
        $response->assertRedirectToRoute('galerij_jaar', ['year' => $year]);
    }
}

<?php

namespace Tests\Unit;

use App\Http\Controllers\GalleryController;
use App\Models\Album;
use App\Models\Picture;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class GalleryControllerTest extends TestCase
{
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

    /**
     * @test
     * @after tearDown
     */
    public function it_shows_the_album_and_its_pictures_when_album_is_found()
    {
        // Arrange
        $album = Album::factory()->create();

        $picture1 = Picture::factory()->create(['album_id' => $album->id, 'image' => 'album1foto1.jpg']);
        $picture2 = Picture::factory()->create(['album_id' => $album->id, 'image' => 'TestImageSpecialGolf.jpg']);
        $pictures = Picture::with('album')->where('album_id', $album->id)->get();

        $year = Carbon::parse($album->date)->year;

        // Act
        $uri = route('galerij_album', ['year' => $year, 'id' => $album->id]);
        $response = $this->get($uri);

        // Assert
        $response->assertOk();
        $response->assertViewIs('albums.showAlbum');
        $response->assertViewHas('album', $album);
        $response->assertViewHas('pictures', $pictures);
        $response->assertViewHas('year', $year);

        // Clean up
        $picture1->delete();
        $picture2->delete();
        $album->delete();
    }

    /**
     * @test
     * @group authentication
     */
    public function it_returns_the_foto_toevoegen_view_with_album_data_for_authenticated_admin()
    {
        // Arrange
        $album = Album::factory()->create();
        $year = Carbon::parse($album->date)->year;
        $title = $album->title;
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        // Act
        $response = $this->actingAs($admin)->get("/galerij/$album->id/addPhoto?album_id=$album->id");

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

    public function test_delete_album_pictures_should_remove_picture()
    {
        // Arrange
        $album = Album::factory()->create();
        $pic1 = Picture::factory()->create(['id' => rand(100, 6789), 'album_id' => $album->id, 'image' => 'TestImageSpecialGolf.jpg']);
        $pic2 = Picture::factory()->create(['id' => rand(100, 6789), 'album_id' => $album->id, 'image' => 'TestImageSpecialGolf.jpg']);
        $year = Carbon::parse($album->date)->format('Y');
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        // Act
        $response = $this->actingAs($admin)->post(url("/galerij/{$year}/{$album->title}/verwijderfotos"), ['images' => [$pic1->id, $pic2->id]]);

        // Assert that the pictures were destroyed
        $this->assertDatabaseMissing('pictures', ['id' => $pic1->id]);
        $this->assertDatabaseMissing('pictures', ['id' => $pic2->id]);

        // Assert the redirect and success message
        $response->assertRedirect('');
        $response->assertSessionHas('success');
        $response->assertSessionHas('success', 'Afbeeldingen zijn verwijderd uit album');

        // Teardown
        $pic1->delete();
        $pic2->delete();
        $album->delete();
        $admin->delete();
    }
}

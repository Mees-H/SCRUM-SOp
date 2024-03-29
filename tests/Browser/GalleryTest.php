<?php

namespace Tests\Browser;;

use App\Models\Picture;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Illuminate\Support\Facades\DB;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\Album;

class GalleryTest extends DuskTestCase
{

    use DatabaseTruncation;

    /**
     * @throws \Throwable
     */
    public function testGalleryRoutes(): void
    {

        //database testobjecten ophalen
        $album = Album::factory()->create([
            'id' => 1,
            'title' => 'Test album',
            'description' => 'Test description',
            'date' => '2021-01-01'
        ]);

        Picture::factory()->create([
            'id' => 1,
            'album_id' => $album->id,
            'imageUrl' => '/TestImage/TestImageSpecialGolf.jpg'
        ]);


            $this->browse(function (Browser $browser) use ($album) {
                $year = date('Y', strtotime($album->date));
                $browser
                    ->resize(3000,3000)
                    ->visitRoute('galerij_jaar', ['year' => $year])
                    ->assertPathIs("/albums/" . $year)
                    ->assertSee($album->title)
                    ->visitRoute('galerij_album', ['year' => $year, 'title' => $album->title])
                    ->assertPathIs("/albums/" . $year . "/" . "Test%20album")
                    ->visit('/albums/' . $year . '/' . "Test%20album")
                    ->press("Terug")
                    ->assertPathIs("/albums/" . $year)
                    ->click('@AlbumTest')
                    ->assertPathIs("/albums/" . $year . "/" . "Test%20album")
                    ->click('@PictureTest')
                    ->assertAttribute('@PictureTest', 'src', '/TestImage/TestImageSpecialGolf.jpg');
            });

    }
}

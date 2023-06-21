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

        $pic1 = Picture::factory()->create([
            'id' => 1,
            'album_id' => $album->id,
            'image' => 'TestImage/TestImageSpecialGolf.jpg'
        ]);


            $this->browse(function (Browser $browser) use ($album, $pic1) {
                $year = date('Y', strtotime($album->date));
                $browser
                    ->visitRoute('galerij_jaar', ['year' => $year])
                    ->assertPathIs("/albums/" . $year);
                $browser->
                    visit("/albums/". $album->id . "/" . $year)
                    ->click("@terug")
                    ->assertPathIs("/albums/" . $year);
                $browser
                    ->click('@AlbumTest')
                    ->assertPathIs("/albums/". $album->id . "/" . $year);
                $browser
                    ->click('@PictureTest')
                    ->assertAttribute('@PictureTest', 'src', '/img/'.$pic1->image);
            });

    }
}

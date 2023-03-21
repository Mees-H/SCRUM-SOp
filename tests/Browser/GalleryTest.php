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

        //database objecten ophalen
        $album = Album::factory()->create([
            'id' => 1,
            'title' => 'Test album',
            'description' => 'Test description',
            'date' => '2021-01-01'
        ]);

        Picture::factory()->create([
            'id' => 1,
            'album_id' => $album->id,
            'imageUrl' => 'https://www.specialgolfhaverleij2021.com/uploads/1/4/0/3/140360495/a61897bc-6113-466c-827d-bbe3c75537b6_orig.jpg'
        ]);


            $this->browse(function (Browser $browser) use ($album) {
                $year = date('Y', strtotime($album->date));
                $browser
                    ->visitRoute('galerij_jaar', ['year' => $year])
                    ->assertPathIs("/galerij/" . $year)
                    ->assertSee($album->title);
                $browser
                    ->visitRoute('galerij_album', ['year' => $year, 'title' => $album->title])
                    ->assertPathIs("/galerij/" . $year . "/" . "Test%20album");
                $browser->
                    visit('/galerij/' . $year . '/' . "Test%20album")
                    ->press("Terug")
                    ->assertPathIs("/galerij/" . $year);
                $browser
                    ->click('img')
                    ->assertPathIs("/galerij/" . $year . "/" . "Test%20album");
                $browser
                    ->press('img')
                    ->assertAttribute('img', 'src', 'https://www.specialgolfhaverleij2021.com/uploads/1/4/0/3/140360495/a61897bc-6113-466c-827d-bbe3c75537b6_orig.jpg');
            });

    }
}

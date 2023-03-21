<?php

namespace Tests\Browser;;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\Album;

class GalleryTest extends DuskTestCase
{

    use DatabaseTruncation;

    public function testGallery(): void
    {
        $album = Album::factory()->create();

        try {
            $this->browse(function (Browser $browser) use ( $album) {
                $year = date('Y', strtotime($album->date));
                $browser->visitRoute('galerij_jaar', ['year' => $year])
                    ->assertPathIs("/galerij/$year")
                    ->assertSee($album->title);
            });
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
    }
}
